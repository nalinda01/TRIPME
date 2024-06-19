<?php 

$host= "localhost";
$db="tripme";
$pass="demon"; // demon
$username="snowflake"; // snowflake
$dbName="tripme";
$connection= mysqli_connect($host,$username,$pass);
$db = mysqli_select_db($connection,$dbName);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

 ?>
