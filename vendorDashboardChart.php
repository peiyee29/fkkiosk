<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kiosk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM list_of_menu WHERE vendor_id = '{$_SESSION['vendorID']}'";
$result = $conn->query($sql);

$menuNames = [];
$menuQty = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menuNames[] = $row['menu_name'];
        $menuQty[] = (int)$row['quantity'];
    }
    $menuNames = json_encode($menuNames);
    $menuQty = json_encode($menuQty);
} else {
    echo "0 results";
}

$conn->close();
?>