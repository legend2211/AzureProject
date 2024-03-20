<?php 
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $cno=$_POST['cno'];
  $email=$_POST['email'];
  $bgroup=$_POST['bgroup'];
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
$sql="insert into reciver(firstname,lastname,contcactno,email,bloodgroup) values('$fname','$lname',$cno,'$email','$bgroup')";
$result=$cn->query($sql);
$rowcount=$result->rowCount();
if($rowcount==1)
{
   ?>
    <script type="text/javascript">alert('Successfully Registered !!!');</script>
    <?php
    header("location:home.php");
}
else 
{
    ?>
    <script type="text/javascript">alert('please register First !!!');</script>
    <?php
    header("location:register1.html");
}
?>
