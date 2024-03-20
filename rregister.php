<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$cno = $_POST['cno'];
$email = $_POST['email'];
$bgroup = $_POST['bgroup'];

try {
    $host = "myazsqldemo.mysql.database.azure.com";
    $port = 3306;
    $dbname = "project";
    $dbuser = "myadmin@myazsqldemo";
    $dbpass = "Server@1";

    $cn = mysqli_init();
    mysqli_ssl_set($cn, NULL, NULL, "DigiCertGlobalRootG2.crt.pem", NULL, NULL);
    mysqli_real_connect($cn, $host, $dbuser, $dbpass, $dbname, $port);
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

$sql = "INSERT INTO reciver (firstname, lastname, contcactno, email, bloodgroup) VALUES ('$fname', '$lname', '$cno', '$email', '$bgroup')";
$result = mysqli_query($cn, $sql);

if ($result) {
    mysqli_close($cn);
    header("location: index.php");
    exit; 
} else {
    mysqli_close($cn);
    ?>
    <script type="text/javascript">alert('Failed to register. Please try again.');</script>
    <?php
    header("location: register1.html");
    exit; 
}

?>
