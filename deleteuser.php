<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "kiosk") or die(mysqli_error($link));

$idURL = $_GET['id'];

//SQL query
$query = "SELECT * FROM user WHERE user_id = '$idURL'"
	or die(mysqli_connect_error());
	
//Execute the query (the recordset $rs contains the result)
    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_assoc($result);
    $userID = $row['user_id'];
    $username= $row['user_name'];
    $email= $row['user_email'];
    $phonenum= $row['user_phonenum'];
    $address= $row['user_address'];

    $deleteQuery = "DELETE FROM user WHERE user_id = '$idURL'";

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
    header("location:userlist.php"); 
    mysqli_close($link);
?>

