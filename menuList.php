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

<?php include 'methods/get_menu.php'; ?>
<!DOCTYPE html>
<html>

<body>

    <head>
        <title>Menu List</title>
        <link rel="stylesheet" href="css2/dash2.css?v=<?php echo time(); ?>">
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
                    <br><br><span style="font-size: 28px; padding-left: 500px;"><b>LIST OF MENU</b></span>
                    <table class="menuList">
                        <form action="">
                            <tr>
                                <th>Menu Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($datas as $data) { ?>
                                <tr>
                                    <td>
                                        <?php echo $data['menu_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['quantity']; ?>
                                    </td>
                                    <td>
                                        <?php echo 'RM ' . $data['price']; ?>
                                    </td>
                                    <td><a class="userbtn" href="editMenu.php?id=<?php echo $data['id']; ?>">Edit</a> <br><br>
                                        <a class="userbtn"
                                            href="methods/destroy_menu.php?id=<?php echo $data['id']; ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </form>
                    </table>

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