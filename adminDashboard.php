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



    $totalQuery = "SELECT COUNT(*) as totalU FROM user";
    $result1 = mysqli_query($link, $totalQuery);
    $values = mysqli_fetch_assoc($result1);
    $totaluser = $values['totalU'];

    $vendorQuery = "SELECT COUNT(*) as totalV FROM food_vendor WHERE approvalStatus='Approved'";
    $result3 = mysqli_query($link, $vendorQuery);
    $values3 = mysqli_fetch_assoc($result3);
    $totalvendor = $values3['totalV'];

    $approvedQuery = "SELECT COUNT(*) as totalApprove FROM food_vendor";
    $result2 = mysqli_query($link, $approvedQuery);
    $values1 = mysqli_fetch_assoc($result2);
    $totalapproved = $values1['totalApprove'];


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="css/dash.css?v=<?php echo time(); ?>">
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
                    <div class="card">
                        <div class="btn2">
                            <div class="box">
                                <a href="userreport.php"><h1><?php echo $totaluser+$totalvendor?></h1></a>
                                <a href="userreport.php"><h2>Total Users</h2></a>
                            </div>
                            <div class="icon-case">
                                <a href="userreport.php"><img src="Image/user.png" alt="user" height="60px"></a>
                            </div>
                        </div>
                        <div class="btn2">
                            <div class="box">
                                <a href="approval.php"><h1><?php echo $totalapproved?></h1></a>
                                <a href="approval.php"><h2>Approval Status</h2></a>
                            </div>
                            <div class="icon-case">
                                <a href="approval.php"><img src="Image/approval.png" alt="approval" height="60px"></a>
                            </div>
                        </div>
                    </div>
                    <div class="content-2">
                            <table class="approvalTable">
                                <tr>
                                    <th colspan="5">Registration Approval of Food Vendor</th>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Approval Status</th>
                                    <th>Action</th>
                                </tr>
                                <?php

                                    $query = "SELECT * FROM food_vendor WHERE approvalStatus ='Pending'";
                                    $result = mysqli_query($link, $query);

                                    if (mysqli_num_rows($result) > 0){
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)){
                                        $username= $row['vendor_name'];
                                        $email= $row['vendor_email'];
                                        $phonenum= $row['vendor_phonenum'];
                                        $status= $row['approvalStatus'];
                                    ?>	
                                        <tr>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $phonenum; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td>
                                                <a href="approve.php?username=<?php echo $username; ?>" class="userbtn" style="margin: 20px;">APPROVE</a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan="5" style="padding: 50px 300px;">No Pending Registration!</td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
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