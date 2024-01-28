<?php
    $link = mysqli_connect("localhost", "root") or die(mysql_connect_error());
    mysqli_select_db($link, "kiosk") or die(mysqli_error());
    require_once 'phpqrcode/qrlib.php';
    $path = 'images/';
    $qrcode= $path.time().".png";
    $qrimage = time().".png";
    
    session_start();

    if(isset($_POST["submit"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $selectedValues = isset($_POST["usertype"]) ? $_POST["usertype"] : [];
        $serializedSelections = implode(",", $selectedValues);
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phonenum = $_POST["phonenum"];
        $approvalStatus = 'Pending';
        $qrcontent = "Username: $username\nEmail: $email\nPhone Number: $phonenum";

        $vendorquery = mysqli_query($link, "SELECT vendor_name FROM food_vendor WHERE vendor_name='$username'");
		$userquery = mysqli_query($link, "SELECT user_name FROM user WHERE user_name='$username'");
        if (mysqli_num_rows($vendorquery) > 0 || mysqli_num_rows($userquery) > 0) 
        {
           $errorU = "Username already exists. Please try again.";
        }
        elseif ($serializedSelections == "foodvendor") {
            $vendoridQuery = mysqli_query($link, "SELECT MAX(SUBSTRING(vendor_id, 2)) AS maxnumeric_id FROM food_vendor");
			$row = mysqli_fetch_assoc($vendoridQuery);
			$highestNumericID = $row['maxnumeric_id'];

			$newNumericID = $highestNumericID + 1;

			$newvendorid = 'F' . str_pad($newNumericID, 3, '0', STR_PAD_LEFT);
            
            $query = "SELECT * FROM food_vendor WHERE vendor_email='$email'";
            $result =  mysqli_query($link, $query);

            if ($result) {
                $rowCount = mysqli_num_rows($result);
                if ($rowCount > 0) {
                    $errorE = "Email already exists. Please try again.";
                }
                else{
                    mysqli_query($link, "INSERT INTO food_vendor (vendor_id, vendor_name, vendor_password, vendor_email, vendor_address, vendor_phonenum, vendor_qrcode, approvalStatus) VALUES ('$newvendorid','$username', '$password', '$email', '$address', '$phonenum', '$qrimage', '$approvalStatus')")
                    or die(mysqli_connect_error()); 
                    ?>
                    <script>
                        alert("Thank You for Registering! Your registration is pending approval from the administrator.");
                    </script>   
                    <?php 
                    QRcode :: png($qrcontent, $qrcode, 'H', 4, 4);
                }
            }
        } 
        elseif ($serializedSelections == "user")
        {
            $useridQuery = mysqli_query($link, "SELECT MAX(SUBSTRING(user_id, 2)) AS maxnumeric_id FROM user");
			$row = mysqli_fetch_assoc($useridQuery);
			$highestNumericID = $row['maxnumeric_id'];

			$newNumericID = $highestNumericID + 1;

			$newuserid = 'R' . str_pad($newNumericID, 3, '0', STR_PAD_LEFT);

            $query = "SELECT * FROM user WHERE user_email='$email'";
            $result =  mysqli_query($link, $query);

            if ($result) {
                $rowCount = mysqli_num_rows($result);
                if ($rowCount > 0) {
                    $errorE = "Email already exists. Please try again.";
                }
                else{
                    mysqli_query($link, "INSERT INTO user (user_id, user_name, user_password, user_email, user_address, user_phonenum, user_qrcode) VALUES ('$newuserid','$username', '$password', '$email', '$address', '$phonenum', '$qrimage')")
                    or die(mysqli_connect_error());
                ?>
                <script>
                    alert("Thank You for Registering!");
                </script>           
                <?php
                QRcode :: png($qrcontent, $qrcode, 'H', 4, 4);
                }
            }
        }
    }
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register Page</title>
        <link rel="stylesheet" href="css/mystyle.css?v=<?php echo time(); ?>">
    </head>

    <body>
        <header>    
                <div class="row">
                    <div class="line"><img src="Image/fk logo.png" alt="Logo" height="85px"></div>
                    <div class="line1">
                        <span style="font-size: 55px">K&ensp;I&ensp;O&ensp;S&ensp;K</span>
                        <br>UMPSA Faculty of Computing
                    </div>
                    <div class="line2">
                        <a href="login.php">Login</a>
                    </div>
                </div>
        </header>

        <div class="background">
            <div class="row1">
                <div class="column3">
                    Welcome to UMPSA FK KIOSK!
                    <br>KIOSK provides comprehensive access to the food menu list at different stalls and enables online food ordering.
                </div>
                <div class="column2">
                    <span style="font-size: 36px; padding: 10px 170px;"><b>REGISTER</b></span>
                    <form class="registerForm" action="register.php" method="post">
                        <?php
                            // Display error message if set
                            if (isset($errorU)) {
                                echo "<p style='color: red;'>$errorU</p>";
                            }
                            if (isset($errorE)) {
                                echo "<p style='color: red;'>$errorE</p>";
                            }
                        ?>
                        <label>Username&emsp;&ensp;&ensp;&ensp;:</label><input type="text" name="username" required>
                        <br><label>Password&emsp;&ensp;&ensp;&ensp;:</label><input type="text" name="password" minlength=8 required>
                        <br><label>Email&emsp;&emsp;&emsp;&ensp;&ensp;:</label><input type="text" name="email" required>
                        <br><label>Address&emsp;&emsp;&ensp;&ensp;:</label><input type="text" name="address" required>
                        <br><label>Phone Number&ensp;:</label><input type="text" name="phonenum" required>
                        <br><br><select name="usertype[]" required>
                            <option value="select" disabled selected required>Select user type</option>
                            <option value="user">User</option>
                            <option value="foodvendor">Food Vendor</option>
                        </select>
                        <br><br><input type="submit" name="submit" value="Register">
                        <br><br>Login as a <a href="generalDashboard.php">Guest</a>
                        <br><br>Already Registered? <a href="login.php">Login</a>
                    </form>
                </div>
            </div>
        </div>

        <footer>
            Copyright <script>document.write(new Date().getFullYear())</script>. University Malaysia Pahang Al-Sultan Abdullah. All Right Reserved.</span>
        </footer>
    </body>
</html>