<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    
    <link rel="stylesheet" type="text/css" href="CSS/APUpdateStyle.css"> 
    
</head>


<body>

   
          <div class="container">
       
            <h1 > Accommodation Provider Update </h1>

            <?php
            //$userId = $_SESSION['user_id'];
            $userId = '2';
            $conn = mysqli_connect("localhost", "your_username", "your_password", "your_database");

            $sql = "select * from tour_guide_data where ACPID =" . $userId;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>


                    
                  
                    <div>
                        <img src="images/user_pic.png" height="100" width="100" />
                        </div>
                          
                        <form action="./controllers/userUpdateController.php" method="POST">
                            <div>
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="nameId" name="firstName" value="<?php echo $row['First_name'] ?>">
                                <input type="text" class="form-control" id="nameId" name="user_id" value="<?php echo $row['ACPID'] ?>" hidden>
                         
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="nameId" name="lastName" value="<?php echo $row['Last_Name'] ?>">
                          
                                <label for="email" name="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="emailId" name="e_mail" value="<?php echo $row['Email'] ?>"> 
                        
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="mobileId" name="mobile" value="<?php echo $row['Phone_Number'] ?>">
                           
                            <label for="age">Age:</label>
                            <input type="number" min="18" id="age" name="age" required>
                            
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" rows="4" value="<?php echo $row['Description'] ?>"></textarea>
                         
                            <label for="tour_details">Tour_Details:</label>
                            <input type="text" id="tour_details" name="tour_details" value="<?php echo $row['Tour_Details'] ?>">
                           
                            <label for="destinations">Destinations:</label>
                            <select id="destinations" name="destinations" value="<?php echo $row['Destinations'] ?>">
                                <option value="">Select Destinations</option>
                                <option value="parks">Parks</option>
                                <option value="historical places">Historical Places</option>
                              
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