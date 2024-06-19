<?php

        
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] === "POST") 
        {
            require_once 'dbh.inc.php';
            
            session_start();
                 
                           
            // Get selected account
            $selectedAccount = $_POST["options"];

            // Get email and password from the corresponding account table
            $email = $_POST["username"];
            $password = $_POST["password"];

            $_SESSION['uname']=$email;


            
       
            // Prepare the query based on the selected account
            $table = ""; // table name
            switch ($selectedAccount) 
            {
                case "option1":
                      
                    $table = "tourist_data";
                    
                    
                    break;
                case "option2":
                   
                    $table = "accommodation_provider_data";
                    
                    break;
                case "option3":
                    $table = "travel_agent_data";
                    
                    break;
                case "option4":
                    $table = "tour_guide_data";
                    
                    break;
                default:
                    
                    echo "Invalid account selection!";    
                    exit;
            }
            

            // Query the database
            $sql = "SELECT * FROM " . $table . " WHERE Email = '" . $email . "'";
            $result = $conn->query($sql);

            if ($result->num_rows === 1) 
            {
                $row = $result->fetch_assoc();
                $storedPasswordHash = $row["Password"];
                //$_SESSION['loggedin'] == false;
                
                  
                 
                 
                // Verify the password
                if((($password === $storedPasswordHash))or($_SESSION['loggedin'] === true))
                {
                    if(isset($_POST["remember"]))
                    {
                         $_SESSION['loggedin'] = true;

                    }
                     
                    
                    // Password is correct
                   
                    
                    
                    switch ($selectedAccount) 
                    {
                        case "option1":
                        
                            header('location: ../../Thimethma IWT/userAccount.php?Email='.$email);                                                   
                            break;

                        case "option2":

                            header('location: ../../Dinusanka IWT/userAccount.php?Email='.$email);                                                 
                            break;

                        case "option3":

                            header('location: ../../Nalinda IWT/TravelAgentProfile.php?Email='.$email);
                            break;

                        case "option4":

                            header('location: ../../Nethmi tour guide IWT/userAccount.php?Email='.$email);                       
                            break;
                    }
                    
                   
                } 
                else 
                {
                   

                       // Invalid password
                      
                       echo '<script type="text/javascript">';
                       echo 'alert("Invalid password!");';
                       echo 'window.location = "../log.php";';
                       echo '</script>';
                       
                      
                    
                    
                }
            } 
            else 
            {
                
                // Invalid email or account does not exist
               
              
                echo '<script type="text/javascript">';
                echo 'alert("Invalid email or account does not exist!");';
                echo 'window.location = "../log.php";';
                echo '</script>';
                
            }

         
            $conn->close();
        
        if(isset($_POST["logoff"])) 
        {
            session_destroy();
          
            echo 'finish';
        }
        
    }        
    else
    {
        echo 'error';
    }