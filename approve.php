<?php
    $link = mysqli_connect("localhost", "root") or die(mysql_connect_error());
    mysqli_select_db($link, "kiosk") or die(mysqli_error());

    $Vname = $_GET['username'];

    $query = "SELECT * from food_vendor WHERE vendor_name = '$Vname'"
    or die(mysqli_connect_error());

    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_assoc($result);
    $username= $row['vendor_name'];
    $email= $row['vendor_email'];
    $phonenum= $row['vendor_phonenum'];
    $status= $row['approvalStatus'];

    $updateQuery = "UPDATE food_vendor SET approvalStatus = 'Approved' WHERE vendor_name = '$Vname'";


    $result1 = mysqli_query($link,$updateQuery);
    if($result1){
        ?>
        <script>
            alert("Registration Approval Successfully!");
        </script>           
        <?php
    }
    else{
        ?>
        <script>
            alert("Registration Approval Failed!");
        </script>           
        <?php
    }
    header("location:adminDashboard.php"); 
    mysqli_close($link);


      
?>