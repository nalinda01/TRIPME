<?php

$db = mysqli_connect("localhost", "root", "", "destinations");

if (!$db) {
  die("Connection failed" . mysqli_connect_error());
}
session_start();
$user_id = $_SESSION['uname'];

$errors = array();

if (isset($_GET['user_id'])) {

  $user_id = $_GET['user_id'];
  if (count($errors) === 0) {
    $sql = " DELETE FROM `accommodation_provider_data` WHERE Email ='" . $user_id . "'";
    mysqli_query($db, $sql);
    header('location: ../login.php');

  }
}
