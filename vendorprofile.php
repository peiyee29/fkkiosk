<?php
    $link = mysqli_connect("localhost", "root") or die(mysql_connect_error());
    mysqli_select_db($link, "kiosk") or die(mysqli_error());

    session_start();
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        // Redirect to the login page if the user is not logged in
        header("Location: login.php");
        exit();
    }

    require_once 'phpqrcode/qrlib.php';
    $path = 'images/';
    $qrcode= $path.time().".png";
    $qrimage = time().".png";


    if(isset($_POST['submit'])){
        $userID = $_POST['userid'];
        $username= $_POST['username'];
        $password=$_POST['password'];
        $email= $_POST['email'];
        $phonenum= $_POST['phonenum'];
        $address= $_POST['address'];
        $qrCodeData = "Username: $username\nEmail: $email\nPhone Number: $phonenum";
        QRcode :: png($qrCodeData, $qrcode, 'H', 4, 4);

                $updatequery = "UPDATE food_vendor SET vendor_id = '$userID', vendor_name = '$username', vendor_password= '$password', vendor_email = '$email', vendor_phonenum = '$phonenum', vendor_address = '$address', vendor_qrcode = '$qrimage' WHERE vendor_name='$username'";

                $result = mysqli_query($link, $updatequery);
                if($result){
                    ?>
                    <script>
                        alert("Food Vendor Updated Successfully!");
                    </script>           
                    <?php
                }
                else{
                    ?>
                    <script>
                        alert("Food Vendor Updated Failed!");
                    </script>           
                    <?php
                }
    }
    mysqli_close($link);
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Food Vendor Dashboard</title>
        <link rel="stylesheet" href="css/dash.css?v=<?php echo time(); ?>">
    </head>

    <body>
        <div class="container">
            <div class="side-menu">
                <ul>
                    <li onclick="redirectPage()">Dashboard</li>
                    <li onclick="redirectAddMenu()">Add New Menu</li>
                    <li onclick="redirectMenu()">Menu List</li>
                    <li onclick="redirectProfile()">Vendor Profile</li>
                    <li onclick="redirectLogout()">Log Out</li>
                </ul>
            </div>

            <div class="side-content">
            <div class="header">
                <div class="row">
                    <div class="line"><img src="Image/fk logo.png" alt="Logo" height="85px"></div>
                        <div class="line1">
                            <span style="font-size: 55px">K&ensp;I&ensp;O&ensp;S&ensp;K</span>
                            <br>UMPSA Faculty of Computing
                        </div>
                    <div class="line2">
                        <a href="logout.php"><?php echo $username?></a>
                    </div>
                </div>
            </div>
            <div class="content">
                <br><br><span style="font-size: 36px; padding-left: 400px;"><b>FOOD VENDOR PROFILE</b></span>
                    <form name="update" action="" method="post"> 
                        <table class="updateUser">
                                                
                            <?php
                                $link = mysqli_connect("localhost", "root") or die(mysql_connect_error());
                                mysqli_select_db($link, "kiosk") or die(mysqli_error());
                                require_once 'phpqrcode/qrlib.php';
                                $path = 'images/';

                                $query = "SELECT * FROM food_vendor WHERE vendor_name = '$username'";
                                $result = mysqli_query($link, $query);

                                if (mysqli_num_rows($result) > 0){
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)){
                                    $qr_image_relative = $row['vendor_qrcode']; // Assuming the path is stored in the database
                                    $qr_image = $path . $qr_image_relative; // Concatenate with the base path
                                    $userID = $row['vendor_id'];
                                    $username= $row['vendor_name'];
                                    $password= $row['vendor_password'];
                                    $email= $row['vendor_email'];
                                    $phonenum= $row['vendor_phonenum'];
                                    $address= $row['vendor_address'];

                                    
                                    ?>	

                                    <tr>   
                                        <td rowspan="7"><?php echo "<img src='".$qr_image."' alt=''>";?></td>
                                    </tr>

                                    <tr>
                                        <th>User ID</th>
                                        <td><input type="text" name="userid" value="<?php echo $userID; ?>"readonly></td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td><input type="text" name="password" value="<?php echo $password; ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td><input type="text" name="phonenum" value="<?php echo $phonenum; ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><input type="text" name="address" value="<?php echo $address; ?>"></td>
                                    </tr>
            
                                    <?php
                                    }
                                }
                            ?>
                        </table>        
                        <span style="padding-left: 520px"><input type="submit" name="submit" value="UPDATE"/></span>
            </div>
        </div>
        <div class="footer">
            Copyright <script>document.write(new Date().getFullYear())</script>. University Malaysia Pahang Al-Sultan Abdullah. All Right Reserved.</span>
        </div>
        <script>
            function redirectPage() {
                        var nextPageUrl = 'vendorDashboard.php';
                        window.location.href = nextPageUrl;
                    }
                    function redirectAddMenu() {
                        var nextPageUrl = '../Module 2/addMenu.php';
                        window.location.href = nextPageUrl;
                    }
                    function redirectMenu() {
                        var nextPageUrl = '../Module 2/menuList.php';
                        window.location.href = nextPageUrl;
                    }
                    function redirectProfile() {
                        var nextPageUrl = 'vendorprofile.php';
                        window.location.href = nextPageUrl;
                    }
                    function redirectLogout() {
                        var nextPageUrl = 'logout.php';
                        window.location.href = nextPageUrl;
                    }

        </script>
    
    </body>
</html>