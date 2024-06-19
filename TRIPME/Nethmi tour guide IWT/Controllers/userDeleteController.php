<?php

$db = mysqli_connect("localhost", "your_username", "your_password", "your_database");

if (!$db) {
  die("Connection failed" . mysqli_connect_error());
}

$errors = array();

if (isset($_GET['user_id'])) {

  $user_id = $_GET['user_id'];
  if (count($errors) === 0) {
    $sql = " DELETE FROM `tour_guide_data` WHERE ACPID =" . $user_id;
    mysqli_query($db, $sql);
    header('location: ../login.php');

  }
}
