<?php

$db = mysqli_connect("localhost", "root", "", "destinations");

if (!$db) {
  die("Connection failed". mysqli_connect_error());
}

$errors = array();

if(isset($_POST['firstName'])) {
  $fname = mysqli_real_escape_string($db, $_POST['firstName']);
  $lname = mysqli_real_escape_string($db, $_POST['lastName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);

if(empty($fname)){
  array_push($errors, "can not be empty");
}
if(empty($email)){
  array_push($errors, "can not be empty");
}

if(empty($mobile)){
  array_push($errors, "can not be empty");
}
  // else{
  //   //$sql = "SELECT * FROM ;";
  //    //$sql = "SELECT * FROM timetable WHERE cityfrom =? OR cityto=? OR time=?;";
  // }

  if(count($errors) === 0) {
  $sql=" UPDATE `tourist_data` SET `First_name`= '".$fname."', `Last_Name`= '".$lname."', `Email`= '".$email."', `Phone_Number`= '".$mobile."' WHERE  TID = " . $user_id;
  mysqli_query($db, $sql);
  header('location: ../userAccount.php?user_id='.$user_id);
  
}

}
