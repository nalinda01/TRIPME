<!DOCTYPE html>


<head>
    
    <title>Accommodation Provider</title>
    
    <link rel="stylesheet" type="text/css" href="CSS/APCstyles.css"> 
</head>


<body>


    <div class="container">
           <div class="hd">
            <center><h1 >Accommodation Provider profile</h1></center></div>

            <?php
            session_start();

            $uid = $_SESSION['uname'];
          
           
            $conn = mysqli_connect("localhost", "root", "", "destinations");
            if ($conn->connect_error) {
                echo"dd";
                die("Connection failed: " . $conn->connect_error);
                
               
            }
            
            $sql = "SELECT * FROM `accommodation_provider_data` WHERE Email="."'".$uid."'";
            $result = $conn->query($sql);
          
           

            if ($result) {
                while ($row = $result->fetch_assoc()) { ?>



                    
                        <div>
                        <img src="images/user_pic.png" height="100" width="100" />
                        </div>
                    <div class="dcontainer">   
                        <p>Name: <?php echo $row['First_name'] . " "   ?> <?php echo $row['Last_Name'] ?></p>
                       
                        <p>Email: <?php echo $row['Email'] ?></p>
                        <p>Contact no: <?php echo $row['Phone_Number'] ?></p></div>
                       



                <?php }
            }
            else{
                echo'err';
            }
            $conn->close(); ?>

                


                    
     
   

    
    <div class = "discription">
        <h2 class="h2 p-4"></h2>
        <?php
           
            
            $conn = mysqli_connect("localhost", "root", "", "destinations");

            $sql = "SELECT * FROM `accommodation_provider_data` WHERE Email="."'".$uid."'";
            $result = $conn->query($sql);
          

            if ($result) {
                while ($row = $result->fetch_assoc()) { ?>



                     
                        
                     
                        <p>Description:</p>
                        <?php echo $row['Description'] ?>
                      



                <?php }
            }
            else{
                echo'err';
            }
            $conn->close(); ?>

        </div>



        <table class="table">
            <thead>
                <tr>
                    <th>Accommodation Name</th>
                    <th>Accommodation Type</th>
              
                </tr>
            </thead>
            <tbody>
        

                 <?php
     
            $conn = mysqli_connect("localhost", "root", "", "destinations");

            $sql = "SELECT * FROM `accommodation_provider_data` WHERE Email="."'".$uid."'";
            $result = $conn->query($sql);
          

            if ($result) {
                while ($row = $result->fetch_assoc()) { ?>



                    <div class="dis ">
                        
                     
                    <tr>
                            <td scope="row"><?php echo $row['Accommodation_Name'] ?> </td>
                            <td scope="row"><?php echo $row['Accommodation_Type'] ?></td>
                            
                        </tr></div>
                      



                <?php }
            }
            else{
                echo'err';
            }
            $conn->close(); ?>

            </tbody>
        </table>
        <div class="btn">
        
    <form action="userUpdate.php" method="POST">
    <input type="submit" name="submit" value="Update" class="update-button">
     
   
    <form action="controllers/userDeleteController.php" method="POST">
    <input type="submit" name="submit" value="Delete" class="delete-button">
    </div>
    
    </div>
</body>


</html>