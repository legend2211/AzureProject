<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$group = $_POST['bgroup'];

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

$sql = "SELECT * FROM register WHERE firstname='$fname' AND lastname='$lname' AND bloodgroup='$group'";
$result = mysqli_query($cn, $sql);

if ($result) {
    $rowcount = mysqli_num_rows($result);

    if ($rowcount >= 1) {
        ?>

        <html>
        <head>
            <title>Login page</title>
            <link rel="stylesheet" href="style.css">
        </head>

        <body>
            <div class="container">
                <form action="login.php" method="POST">
                    <h1>Certificate</h1>
                    <h2>Certificate of Appreciation</h2>
                    <h2>Our Sincere and Heartfelt thanks to <?php echo $fname." ".$lname ?> for the life saving Gift of Blood. You gave someone a better Tomorrow by donating <?php echo $group?> Blood</h2>
                    <h1>Be Our Blood Buddy For Life!</h1>
                </form>
            </div>
        </body>
        </html>

        <?php
    } else {
        echo "Please donate first";
        ?>
        <script type="text/javascript">alert('No Donor found !!!');</script>
        <?php
    }
} else {
    echo "Error in query execution";
}

mysqli_close($cn);
?>
