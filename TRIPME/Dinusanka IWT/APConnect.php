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
    $description = $_POST['description'];
    $accommodation_name = $_POST['accommodation_name'];
    $accommodation_type = $_POST['accommodation_type'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $tableName = 'accommodation_provider_data';
    $errors = array();


    if(empty($first_name) or empty($last_name) or empty($phone_number) or empty($email) or empty($age) or empty($gender) or empty($description) or empty($accommodation_name) or empty($accommodation_type)){
        array_push($errors, "can not be empty");
      }


    //Check empty spaces
    if(inputSpace($first_name, $last_name, $phone_number, $email, $age, $gender, $accommodation_name, $accommodation_type) !== false AND (count($errors) === 0))
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
                                        $sql = "INSERT INTO accommodation_provider_data (First_Name, Last_Name, Phone_Number, Email, Age, Gender, Description, Accommodation_Name, Accommodation_Type, Password)
                                        VALUES ('$first_name', '$last_name', '$phone_number', '$email', '$age', '$gender', '$description', '$accommodation_name', '$accommodation_type', '$password')";
                            
                                                            if ($conn->query($sql) === TRUE)
                                                {
                                                    
                                                
                                                    echo '<script type="text/javascript">';
                                                    echo 'alert("Registration successful!");';
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
                                        echo 'alert("Password & Confirm password does not match");';
                                        echo 'window.location = "log.php";';
                                        echo '</script>';
                                        
                                    }




                                    $conn->close();
                            } 
                            else
                            {
                                echo '<script type="text/javascript">';
                                echo 'alert("Invalid password type!");';
                                echo 'window.location = "log.php";';
                                echo '</script>';
                           
                            }  
                        }
                        else
                        {
                            
                            echo '<script type="text/javascript">';
                            echo 'alert("email exist");';
                            echo 'window.location = "log.php";';
                            echo '</script>';
                        }
        }
        else
        {
       
        echo '<script type="text/javascript">';
        echo 'alert("Invalid email type!");';
        echo 'window.location = "log.php";';
        echo '</script>';
        } 
                       
    } 
        
        else
        {
           
            echo '<script type="text/javascript">';
            echo 'alert("The content has white spaces.");';
            echo 'window.location = "log.php";';
            echo '</script>';
        }                  
            
                
}
    
        
else{
    echo 'error';
    }

    function inputSpace($first_name, $last_name, $phone_number, $email, $age, $gender,  $accommodation_name, $accommodation_type)
    {
       $inputs = array($first_name, $last_name, $phone_number, $email, $age, $gender, $accommodation_name, $accommodation_type);
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
   