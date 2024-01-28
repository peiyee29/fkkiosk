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
    $query = "SELECT COUNT(*) as total FROM user";
    $result = mysqli_query($link, $query);
    $values = mysqli_fetch_assoc($result);
    $totaluser = $values['total'];

    $Vendorquery = "SELECT COUNT(*) as totalF FROM food_vendor WHERE approvalStatus='Approved'";
    $result1 = mysqli_query($link, $Vendorquery);
    $values1 = mysqli_fetch_assoc($result1);
    $totalvendor = $values1['totalF'];
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/dash.css?v=<?php echo time(); ?>">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <title>User Insight Report</title>
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
                    <br><br><br><span style="font-size: 36px; padding: 30px 380px;"><b>USER INSIGHT REPORT</b></span>
                    <table class="resultTable">
                        <tr>
                            <th>Total Number of User</th>
                            <th><?php echo $totaluser+$totalvendor; ?></th>
                        </tr>

                        <tr>
                            <th>User</th>
                            <th>Food Vendor</th>
                        </tr>

                        <tr>
                            <td><?php echo $totaluser; ?></td>
                            <td><?php echo $totalvendor; ?></td>
                        </tr>

                    </table>

                    <div class="piechart">
                        <canvas id="mypiechart" width="300px" height="300px"></canvas>
                    </div>
                        <?php
                            $query1 = "SELECT * FROM food_vendor WHERE approvalStatus='Approved'" or die(mysqli_connect_error());
                            $result1 = mysqli_query($link, $query1);
                            $query2 = "SELECT * FROM user" or die(mysqli_connect_error());
                            $result2 = mysqli_query($link, $query2);

                            $vendorCount = 0;
                            $userCount = 0;

                            if (mysqli_num_rows($result1) > 0){
                                while($row = mysqli_fetch_assoc($result1)){
                                    $vendorCount++;
                                }
                            }
                            if (mysqli_num_rows($result2) > 0){
                                while($row = mysqli_fetch_assoc($result2)){
                                    $userCount++;
                                }
                            }   
                            mysqli_close($link);
                        ?>
                    
                    <script>
                    var ctx = document.getElementById('mypiechart').getContext('2d');
                    var usertypeChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ['Food Vendor', 'User'],
                            datasets: [{
                                data: [<?php echo $vendorCount; ?>, <?php echo $userCount; ?>],
                                backgroundColor: ['#0059a9', '#a4ccca'],
                                borderColor: ['#f6f7f8'],
                                borderWidth: 2
                            }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: 'User Type Distribution'
                            }
                        }
                    });

                    </script>
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