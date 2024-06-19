<?php

$db = mysqli_connect("localhost", "your_username", "your_password", "your_database");

if (!$db) {
  die("Connection failed". mysqli_connect_error());
}

$errors = array();

if(isset($_POST['submit'])) {
  $fname = mysqli_real_escape_string($db, $_POST['firstName']);
  $lname = mysqli_real_escape_string($db, $_POST['lastName']);
  $email = mysqli_real_escape_string($db, $_POST['e_mail']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $age = mysqli_real_escape_string($db,$_POST['age']);
  $description = mysqli_real_escape_string($db,$_POST['description']);
  $tour_details = mysqli_real_escape_string($db,$_POST['your_details']);
  $destinations = mysqli_real_escape_string($db,$_POST['destinations']);
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

if(empty($age)){
  array_push($errors, "can not be empty");
}

if(empty($description)){
  array_push($errors, "can not be empty");
  
}

if(empty($accommodation_name)){
  array_push($errors, "can not be empty");
}

if(empty($accommodation_type)){
  array_push($errors, "can not be empty");
}
  // else{
  //   //$sql = "SELECT * FROM ;";
  //    //$sql = "SELECT * FROM timetable WHERE cityfrom =? OR cityto=? OR time=?;";
  // }

  if(count($errors) === 0) {
    
  $sql=" UPDATE tour_guide_data SET `First_name`= '".$fname."', `Last_Name`= '".$lname."', `Email`= '".$email."', `Phone_Number`= '".$mobile."' , `Age`= '".$age."', `Description`= '".$description."', `Accommodation_Name`= '".$accommodation_name."', `Accommodation_Type`= '".$accommodation_type."' WHERE ACPID = " . $user_id;
  mysqli_query($db, $sql);
  if (mysqli_query($db, $sql) === TRUE)
   {
    header('location: ../userAccount.php?user_id='.$user_id);
   } 
   else
   {
        echo 'Update error!';
  }
  

  //
} 
  
else{
  echo 'Fields can not be empty';
 
}

}
else{
  echo 'error!';
}
