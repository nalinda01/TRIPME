<?php
if(isset($_POST["submit"]))
{
 
    // Connect to the database
     // Include function file      
    require_once 'Includes/dbh.inc.php';
    require_once 'Includes/functions.inc.php';
    
        //Get Data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $tableName = 'tourist_data';
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $inputs = array($password);
        $errors = array();

        if(empty($first_name) or empty($last_name) or empty($phone_number) or empty($email) or empty($age) or empty($gender)){
            array_push($errors, "can not be empty");
          }

        //Check empty spaces
        if(inputSpace($first_name, $last_name, $phone_number, $email, $age, $gender) !== false AND (count($errors) === 0))
        {
            //Check email type 
            if(invalidEmail($email))
            {

                      //Check email exsist or not
                      if(checkEmailExistence($email,$tableName) !== true)
                            {                       

                             //Password Validation       
                            if(validatePassword($password)!==false) 
                                {

                                        
                                    
                            

                                        if($password == $confirm_password)
                                        {
                                            //Store Data
                                            $sql = "INSERT INTO tourist_data(First_Name, Last_Name, Phone_Number, Email, Age, Gender, Password)
                                            VALUES ('$first_name', '$last_name', '$phone_number', '$email', '$age', '$gender', '$password')";

                                                    if ($conn->query($sql) === TRUE)
                                                    {
                                                        
                                                        echo '<script type="text/javascript">';
                                                        echo 'alert("Registration successful!")';
                                                        echo 'window.location = "log.php";';
                                                        echo '</script>';
                                                        
                                                    } 
                                                    else 
                                                    {
                                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                                    }
                                                    

                                        }
                                        else
                                        {
                                           
                                            echo '<script type="text/javascript">';
                                            echo 'alert("Password & Confirm password does not match!");';
                                            echo 'window.location = "Tindex.php";';
                                            echo '</script>';
                                        }




                                        $conn->close();
                                } 
                                else
                                {
                              
                                echo '<script type="text/javascript">';
                                echo 'alert("Invalid password type!");';
                                echo 'window.location = "Tindex.php";';
                                echo '</script>';
                                }  
                            }
                            else
                            {
                                
                                echo '<script type="text/javascript">';
                                echo 'alert("Email exist!");';
                                echo 'window.location = "Tindex.php";';
                                echo '</script>';
                            }
            }
            else
            {
                
                echo '<script type="text/javascript">';
                echo 'alert("Invalid email type!");';
                echo 'window.location = "Tindex.php";';
                echo '</script>';
            }                        
                    
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("The content has white spaces.");';
            echo 'window.location = "Tindex.php";';
            echo '</script>';
        }               
}
    
        
else{ 
    echo 'error';
    }

   function inputSpace($first_name, $last_name, $phone_number, $email, $age, $gender)
    {
       $inputs = array($first_name, $last_name, $phone_number, $email, $age, $gender);
   
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