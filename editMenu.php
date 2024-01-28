<?php include 'methods/edit_menu.php'; 
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

<body>

    <head>
        <title>Edit Menu</title>
        <link rel="stylesheet" href="css2/dash2.css">
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
                    <br><br><span style="font-size: 36px; padding-left: 360px;"><b>EDIT MENU</b></span>
                    <table class="updateMenu">
                        <form action="./methods/update_menu.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <tr>
                                <th>Menu Name</th>
                                <td><input type="text" name="menuName" value="<?php echo $row['menu_name']; ?>"></td>
                            </tr>
                            <tr>
                                <th>Quantity</th>
                                <td><input type="number" name="qty" value="<?php echo $row['quantity']; ?>"></td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td><input type="text" name="price" value="<?php echo $row['price']; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Submit">
                                </td>
                            </tr>
                        </form>
                    </table>
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