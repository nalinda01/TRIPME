<?php

$db = mysqli_connect("localhost", "root", "", "destinations");

if (!$db) {
  die("Connection failed". mysqli_connect_error());
}
session_start();
$user_id = $_SESSION['uname'];

$errors = array();

if(isset($_POST['submit'])) {
  $first_name = mysqli_real_escape_string($db, $_POST['firstName']);
  $last_name = mysqli_real_escape_string($db, $_POST['lastName']);
  $phone_number = mysqli_real_escape_string($db, $_POST['mobile']);
  $age = mysqli_real_escape_string($db,$_POST['age']);
  $description = mysqli_real_escape_string($db,$_POST['description']);
  $accommodation_name = mysqli_real_escape_string($db,$_POST['accommodation_name']);
  $accommodation_type = mysqli_real_escape_string($db,$_POST['accommodation_type']);
 // $user_id = mysqli_real_escape_string($db, $_POST['user_id']);

if(empty($first_name) or empty($phone_number) or empty($age) or empty($description) or empty($accommodation_name) or empty($accommodation_type))
{
  array_push($errors, "can not be empty");
}


  if(inputSpace($first_name, $last_name, $phone_number, $age, $accommodation_name, $accommodation_type) !== false AND (count($errors) === 0))
    { 
      
      
    
        $sql=" UPDATE `accommodation_provider_data` SET `First_name`= '".$first_name."', `Last_Name`= '".$last_name."', `Phone_Number`= '".$phone_number."' , `Age`= '".$age."', `Description`= '".$description."', `Accommodation_Name`= '".$accommodation_name."', `Accommodation_Type`= '".$accommodation_type."' WHERE Email = '" . $user_id . "'" ;
        mysqli_query($db, $sql);
        if (mysqli_query($db, $sql) === TRUE)
        {
          header('location: ../userAccount.php?user_id='.$user_id);
        } 
        else
        {
              echo 'Update error!';
        }
        

    
      

    }
  
else{
  echo 'Fields can not be empty and space not allowed';
 
}

}
else{
  echo 'error!';
}

function inputSpace($first_name, $last_name, $phone_number, $age, $accommodation_name, $accommodation_type)
{
   $inputs = array($first_name, $last_name, $phone_number, $age, $accommodation_name, $accommodation_type);
   $result = true;
   foreach ($inputs as $input) 
   {
       if (strpos($input, ' ') !== false)  
       {
           $result = false; 
       } 
       
       
   }
   return $result;
}

