<!DOCTYPE html>
<html>
    <head>
        <title>General User Dashboard</title>
        <link rel="stylesheet" href="css/dash.css?v=<?php echo time(); ?>">
    </head>

    <body>
        <div class="container">
            <div class="side-menu">
                <ul>
                    <li onclick="redirectMenu()">Menu</li>
                    <li onclick="redirectOrder()">Order</li>
                    <li onclick="redirectOperation()">Kiosk Operation</li>
                    <li onclick="redirectRegister()">Register</li>
                    <li onclick="redirectLogin()">Log In</li>
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
                            <a href="login.php">General User</a>
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
            function redirectRegister()
            {
                var nextPageUrl = 'register.php';
                window.location.href = nextPageUrl;
            }
            function redirectLogin()
            {
                var nextPageUrl = 'login.php';
                window.location.href = nextPageUrl;
            }
            
        </script>
    
    </body>
</html>