<!DOCTYPE html>

<head>
    
    <title>Profile Update Page</title>
    
    <link rel="stylesheet" type="text/css" href="CSS/APUpdateStyle.css"> 
    
</head>


<body>

   
          <div class="container">
       
            <h1 > Accommodation Provider Update </h1>

            <?php
           
            session_start();

            $uid = $_SESSION['uname'];
            $conn = mysqli_connect("localhost", "root", "", "destinations");
            
            $sql = "SELECT * FROM `accommodation_provider_data` WHERE Email="."'".$uid."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>


                    
                  
                    <div>
                        <img src="images/user_pic.png" height="100" width="100" />
                        </div>
                          
                        <form action="./controllers/userUpdateController.php" method="POST">
                            <div>
                                <label for="exampleInputEmail1" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="nameId" name="firstName" value="<?php echo $row['First_name'] ?>">
                               
                         
                                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="nameId" name="lastName" value="<?php echo $row['Last_Name'] ?>">
                          
            
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="mobileId" name="mobile" value="<?php echo $row['Phone_Number'] ?>">
                           
                            <label for="age">Age:</label>
                            <input type="number" min="18" id="age" name="age" value="<?php echo $row['Age']?>">
                            
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" rows="4" value="<?php echo $row['Description'] ?>"></textarea>
                         
                            <label for="accommodation_name">Accommodation Name:</label>
                            <input type="text" id="accommodation_name" name="accommodation_name" value="<?php echo $row['Accommodation_Name'] ?>">
                           
                            <label for="accommodation_type">Accommodation Type:</label>
                            <select id="accommodation_type" name="accommodation_type">
                                <option value=""><?php echo $row['Accommodation_Type'] ?></option>
                                <option value="Hotel">Hotel</option>
                                <option value="Apartment">Apartment</option>
                                <option value="Guest House">Guest House</option> 
                                <option value="Resort">Resort</option></select>
                            </div>
                           
                            <div>
                            <button type="submit" name='submit'> Update </button></div>
                        </form></div>

                <?php }
            }
            $conn->close(); ?>


                    </div>
        </div>
    </div>



</body>
</html> 