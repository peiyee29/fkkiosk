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
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Food Vendor List</title>
        <link rel="stylesheet" href="css/dash.css?v=<?php echo time(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <div class="container">
            <div class="side-menu">
                <ul>
                <li onclick="redirectPage()">Dashboard</li>
                    <li onclick="redirectUlist()">User List</li>
                    <li onclick="redirectVlist()">Food Vendor List</li>
                    <li onclick="redirectReport()">User Insight Report</li>
                    <li onclick="redirectMlist()">Menu List</li>
                    <li onclick="redirectLogout()">Logout</li>
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
                    <div class="cards">
                        <div class="btn3">
                            <div class="box1">
                                <a href="adduser.php"><h2>+&ensp;ADD FOOD VENDOR</h2></a>
                            </div>
                            <div class="icon-case">
                                <a href="adduser.php"><img src="Image/user.png" alt="user" height="60px"></a>
                            </div>
                        </div>
                    </div>
            <div class="content-3">
                <table class="userlist">
                 <tr>
                    <th colspan="6">User List</th>
                </tr>

                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                                    
                <?php
                    $link = mysqli_connect("localhost", "root") or die(mysql_connect_error());
                    mysqli_select_db($link, "kiosk") or die(mysqli_error());

                    $query = "SELECT * FROM food_vendor WHERE approvalStatus='Approved'";
                    $result = mysqli_query($link, $query);

                    if (mysqli_num_rows($result) > 0){
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)){
                        $userID = $row['vendor_id'];
                        $username= $row['vendor_name'];
                        $email= $row['vendor_email'];
                        $phonenum= $row['vendor_phonenum'];
                        $address= $row['vendor_address'];
                    ?>	
                        <tr>
                            <td><?php echo $userID; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $phonenum; ?></td>
                            <td><?php echo $address; ?></td>
                            <td>
                                <a href="deletevendor.php?id=<?php echo $userID; ?>" class="userbtn">DELETE</a> <br><br>
                                <a href="updatevendor.php?id=<?php echo $userID; ?>" class="userbtn">UPDATE</a>
                            </td>
                        </tr>
                    <?php
                        }
                    }
                    else
                    {
                        ?>
                            <tr>
                                <td colspan="6" style="padding: 50px 100px">No Record Found!</td>
                            </tr>
                        <?php
                    }
                ?>
                </table>              
            </div>
            </div>
           
        </div>
        <div class="footer">
            Copyright <script>document.write(new Date().getFullYear())</script>. University Malaysia Pahang Al-Sultan Abdullah. All Right Reserved.</span>
        </div>
        <script>
                function redirectPage() {
                // Specify the URL of the next webpage
                var nextPageUrl = 'adminDashboard.php';
                // Redirect to the next webpage
                window.location.href = nextPageUrl;
            }
            function redirectUlist()
            {
                var nextPageUrl = 'userlist.php';
                window.location.href = nextPageUrl;
            }
            function redirectVlist()
            {
                var nextPageUrl = 'vendorlist.php';
                window.location.href = nextPageUrl;
            }
            function redirectMlist()
            {
                var nextPageUrl = 'menuList.php';
                window.location.href = nextPageUrl;
            }
            function redirectReport()
            {
                var nextPageUrl = 'userreport.php';
                window.location.href = nextPageUrl;
            }
            function redirectLogout()
            {
                var nextPageUrl = 'logout.php';
                window.location.href = nextPageUrl;
            }
            
        </script>
    
    </body>
</html>