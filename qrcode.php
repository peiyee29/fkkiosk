<?php
    $link = mysqli_connect("localhost", "root") or die(mysql_connect_error());
    mysqli_select_db($link, "kiosk") or die(mysqli_error());
    require_once 'phpqrcode/qrlib.php';
    $path = 'images/';
    $qrcode= $path.time().".png";
    $qrimage = time().".png";

    if(isset($_REQUEST['submit']))
    {
    $userID = $_REQUEST['userid'];
    $query1 = mysqli_query($link,"insert into user set userID='$userID', qrcode='$qrimage'");
        if($query1)
        {
            ?>
            <script>
                alert("Data save successfully");
            </script>
            <?php
        }
    }

    QRcode :: png("HEll0:)", $qrcode, 'H', 4, 4);
    echo "<img src='".$qrcode."'>";
?>