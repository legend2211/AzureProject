<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$cno = $_POST['cno'];
$email = $_POST['email'];
$bgroup = $_POST['bgroup'];
$date = $_POST['date'];
$ans = $_POST['ans'];
$que = $_POST['que'];
$pass = $_POST['pass'];

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

$sql = "INSERT INTO register (firstname, lastname, contactno, email, bloodgroup, passward, recoveryque, answer, lasttime) 
        VALUES ('$fname', '$lname', '$cno', '$email', '$bgroup', '$pass', '$que', '$ans', '$date')";
$result = mysqli_query($cn, $sql);

if ($result) {
    ?>
    <script type="text/javascript">alert('Successfully Registered !!!');</script>
    <?php
    mysqli_close($cn);
    header("location: index.php");
    exit;
} else {
    ?>
    <script type="text/javascript">alert('Please register first !!!');</script>
    <?php
    header("location: register1.html");
    exit;
}

?>
