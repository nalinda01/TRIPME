<?php
 require_once 'Includes/dbh.inc.php';

//Check email type 
function invalidEmail($email){
   
  
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
   else 
   {
       $result = false;

   }
   return $result;

}


   //Check email exsist or not
    function checkEmailExistence($email,$tableName)
    {

        $conn = new mysqli('localhost', 'root', '', 'destinations');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
           
        }
          
    
        $sql = "SELECT * FROM " . $tableName . " WHERE Email = '" . $email . "'";
        $result = $conn->query($sql);

            if ($result->num_rows === 1) 
            {
                $exist = true;                  
            }
            else
            {
                $exist = false;
    
            }
        return  $exist;   
    }
    
//Check password type 
function validatePassword($password) {
    // Check if password is at least 8 characters long
    if (strlen($password) < 8) {
        return false;
    }

    // Check if password contains at least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }

    // Check if password contains at least one lowercase letter
    if (!preg_match('/[a-z]/', $password)) {
        return false;
    }

    // Check if password contains at least one number
    if (!preg_match('/[0-9]/', $password)) {
        return false;
    }

    // Check if password contains at least one special character
    if (!preg_match('/[!@#$%^&*]/', $password)) {
        return false;
    }
 
    return true;
}
