<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Guide</title>
    
    <link rel="stylesheet" type="text/css" href="CSS/APCstyles.css"> 
</head>


<body>
<script>
            function connect_UpdatePage(){
                window.location='controllers/userUpdateController.php';
            }
            function connect_DeletePage(){
                window.location='controllers/userDeleteController.php';
            }
           
</script>

    <div class="container">
           <div class="hd">
            <center><h1 >Tour Guide Profile</h1></center></div>

            <?php
            //$userId = $_SESSION['user_id'];
            $userId = '2';//$_GET['user_id'];
            $conn = mysqli_connect("localhost", "your_username", "your_password", "your_database");

            $sql = "select * from tour guide_data where ACPID =" . $userId;
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
            //$userId = $_SESSION['user_id'];
            $userId = '2';//$_GET['user_id'];
            $conn = mysqli_connect("localhost", "root", "", "destinations");

            $sql = "select * from tour guide_data where ACPID =" . $userId;
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
                    <th>Tour Details</th>
                    <th>Destinations</th>
              
                </tr>
            </thead>
            <tbody>
        

                 <?php
            //$userId = $_SESSION['user_id'];
            $userId = '2';//$_GET['user_id'];
            $conn = mysqli_connect("localhost", "root", "", "destinations");

            $sql = "select * tour guide_data where ACPID =" . $userId;
            $result = $conn->query($sql);
          

            if ($result) {
                while ($row = $result->fetch_assoc()) { ?>



                    <div class="dis ">
                        
                     
                    <tr>
                            <td scope="row"><?php echo $row['tour_details'] ?> </td>
                            <td scope="row"><?php echo $row['Destinations'] ?></td>
                            
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