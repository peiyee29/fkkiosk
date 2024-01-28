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

include("vendorDashboardChart.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Vendor Dashboard</title>
    <link rel="stylesheet" href="css/dash.css">
    <style>
        .chart-container {
            margin-top: 20px;
        }
    </style>
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
                        <a href="vendorProfile.php">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content">
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <div class="chart-container" style="width:90%;">
                    <canvas id="myDoughnutChart"></canvas>
                </div>

                <script>
                    var data = {
                        labels: <?php echo $menuNames; ?>,
                        datasets: [{
                            data: <?php echo $menuQty; ?>,
                            backgroundColor: generateRandomColors(4) // Call function to generate random colors
                        }]
                    }; 

                    // Configuration options
                    var options = {
                        responsive: true,
                        maintainAspectRatio: false,
                        aspectRatio: .5,
                    };

                    // Get the context of the canvas element we want to select
                    var ctx = document.getElementById('myDoughnutChart').getContext('2d');

                    // Create the doughnut chart
                    var myDoughnutChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: data,
                        options: options
                    });

                    // Function to generate random colors
                    function generateRandomColors(count) {
                        var colors = [];
                        for (var i = 0; i < count; i++) {
                            var randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
                            colors.push(randomColor);
                        }
                        return colors;
                    }
                </script>
            </div>
        </div>
    </div>
    <div class=" footer">
        Copyright
        <script>document.write(new Date().getFullYear())</script>. University Malaysia Pahang Al-Sultan
        Abdullah. All
        Right Reserved.</span>
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