<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "kiosk") or die(mysqli_error($link));

$idURL = $_GET['id'];

//SQL query
$query = "SELECT * FROM food_vendor WHERE vendor_id = '$idURL'"
	or die(mysqli_connect_error());
	
//Execute the query (the recordset $rs contains the result)
    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_assoc($result);
    $userID = $row['vendor_id'];
    $username= $row['vendor_name'];
    $email= $row['vendor_email'];
    $phonenum= $row['vendor_phonenum'];
    $address= $row['vendor_address'];

    $deleteQuery = "DELETE FROM food_vendor WHERE vendor_id = '$idURL'";

    $result1 = mysqli_query($link,$deleteQuery);
    if($result1){
        ?>
        <script>
            alert("User Deleted Successfully!");
        </script>           
        <?php
    }
    else{
        ?>
        <script>
            alert("User Deleted Failed!");
        </script>           
        <?php
    }
    header("location:vendorlist.php"); 
    mysqli_close($link);
?>

