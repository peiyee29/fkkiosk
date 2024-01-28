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
        <title>User Dashboard</title>
        <link rel="stylesheet" href="css/dash.css?v=<?php echo time(); ?>">
    </head>

    <body>
        <div class="container">
            <div class="side-menu">
                <ul>
                    <li onclick="redirectPage()">Dashboard</li>
                    <li onclick="redirectMenu()">Menu</li>
                    <li onclick="redirectOrder()">Order</li>
                    <li onclick="redirectOperation()">Kiosk Operation</li>
                    <li onclick="redirectHistory()">Order History</li>
                    <li onclick="redirectProfile()">User Profile</li>
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
                    <div class="cards">
                        <div class="Gbtn">
                            <div class="box">
                                <h1>Menu</h1>
                            </div>
                            <div class="icon-case">
                                <img src="Image/menu.png" alt="user" height="80px">
                            </div>
                        </div>
                        <div class="Gbtn">
                            <div class="box">
                                <h1>Order</h1>
                            </div>
                            <div class="icon-case">
                                <img src="Image/order.png" alt="approval" height="80px">
                            </div>
                        </div>
                        <div class="Gbtn">
                            <div class="box">
                                <h1>Kiosk Operation</h1>
                            </div>
                            <div class="icon-case">
                                <img src="Image/kiosk.png" alt="approval" height="80px">
                            </div>
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
                var nextPageUrl = 'userDashboard.php';
                // Redirect to the next webpage
                window.location.href = nextPageUrl;
            }

            function redirectMenu()
            {
                var nextPageUrl = '';
                window.location.href = nextPageUrl;
            }
            function redirectOrder()
            {
                var nextPageUrl = '';
                window.location.href = nextPageUrl;
            }
            function redirectOperation()
            {
                var nextPageUrl = '';
                window.location.href = nextPageUrl;
            }
            function redirectHistory()
            {
                var nextPageUrl = '';
                window.location.href = nextPageUrl;
            }
            function redirectProfile()
            {
                var nextPageUrl = 'userprofile.php';
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