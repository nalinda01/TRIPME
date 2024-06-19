
<?php
//delete function
if (isset($_POST['deleteButton'])) {
    //function name
    function deleteData($tableName,$tableIdName,$id){
        //connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $databasename="destinations";
        //query
        $conn = new mysqli ($servername, $username, $password, $databasename);
        $result = $conn->query("DELETE FROM $tableName WHERE $tableIdName='$id'");
        if($result){
            echo"<script>alert('Record Deleted!');</script>";
            echo"<script>window.location='adminPortal.php';</script>";
        }
        else{
            echo"<script>alert('Record Deletion failed!');</script>";
        }
    }
//form data
    $tableName=$_POST['tableName'];
    $tableIdName=$_POST['tableNameId'];
    $id=$_POST['Id'];
    //calling function
    deleteData($tableName,$tableIdName,$id);
}

//count function
function getEntryCount($tableName) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename="destinations";
    
    $conn = new mysqli ($servername, $username, $password, $databasename);
    $result = $conn->query("SELECT COUNT(*) AS entryCount FROM $tableName");
    $row = $result->fetch_assoc();
    return $row['entryCount'];
}
//Update functions
include_once "config.php";
if(isset($_POST['touristUpdate'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email=$_POST['Email'];
    $phone_number = $_POST['phone_number'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $id=$_POST['Id'];

    $sql = "UPDATE Tourist_data SET
                First_name = '$first_name',
                Last_Name = '$last_name',
                Email=' $email',
                Phone_Number = '$phone_number',
                Age = $age,
                Gender = '$gender',
                Password = '$password'
              WHERE TID = '$id'"; 

    $result=$conn->query($sql);

    if ($result) {
        echo "<script>alert('Tourist data updated successfully!');</script>";
        echo"<script>window.location='adminPortal.php';</script>";
    } else {
        echo "Error updating tourist data: " ;
    }
}


if (isset($_POST['bookingUpdate'])) {
    $user_id = $_POST['user_id'];
    $date = $_POST['date'];
    $acc_provider = $_POST['acc_provider'];
    $tour_agent = $_POST['tour_agent'];
    $tour_guide = $_POST['tour_guide'];
    $id = $_POST['Id'];

    $sql = "UPDATE bookings SET
                user_id = '$user_id',
                date = '$date',
                acc_provider = '$acc_provider',
                tour_agent = '$tour_agent',
                tour_guide = '$tour_guide'
            WHERE id = '$id'";

    $result = $conn->query($sql);

    if ($result) {
        echo "<script>alert('Booking data updated successfully!');</script>";
        echo "<script>window.location='adminPortal.php';</script>";
    } else {
        echo "Error updating booking data: " . $conn->error;
    }
}


if (isset($_POST['tourGuideUpdate'])) {
  
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email=$_POST['Email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $description = $_POST['description'];
    $languages = $_POST['languages'];
    $places = $_POST['places'];
    $password = $_POST['password'];
    $id = $_POST['Id'];


    $sql = "UPDATE Tour_guide_data SET
                First_name = '$first_name',
                Last_Name = '$last_name',
                Email=' $email',
                Phone_Number = '$phone_number',
                Age = $age,
                Gender = '$gender',
                Description = '$description',
                Languages = '$languages',
                Places = '$places',
                Password = '$password'
                WHERE TGID = $id";

    $result=$conn->query($sql);

    
    if ($result) {
        echo "<script>alert('Tour guide data updated successfully!');</script>";
        echo"<script>window.location='adminPortal.php';</script>";
    } else {
        echo "Error updating tour guide data: " ;
    }
}

if (isset($_POST['accommodationProviderUpdate'])) {
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email=$_POST['Email'];
    $phone_number = $_POST['phone_number'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $description = $_POST['description'];
    $accommodation_name = $_POST['accommodation_name'];
    $accommodation_type = $_POST['accommodation_type'];
    $password = $_POST['password'];
    $id = $_POST['Id'];

   
    $sql = "UPDATE Accommodation_provider_data SET
                First_name = '$first_name',
                Last_Name = '$last_name',
                Email=' $email',
                Phone_Number = '$phone_number',
                Age = $age,
                Gender = '$gender',
                Description = '$description',
                Accommodation_Name = '$accommodation_name',
                Accommodation_Type = '$accommodation_type',
                Password = '$password'
              WHERE ACPID = $id";

    $result=$conn->query($sql);
   
    
    
    if ($result) {
        echo "<script>alert('Accommodation provider data updated successfully!');</script>";
        echo"<script>window.location='adminPortal.php';</script>";
    } else {
        echo "Error updating accommodation provider data: ";
    }
}

if (isset($_POST['travelAgentUpdate'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email=$_POST['Email'];
    $phone_number = $_POST['phone_number'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $description = $_POST['description'];
    $number_plate = $_POST['number_plate'];
    $vehicle_type = $_POST['vehicle_type'];
    $driving_lisence_number = $_POST['$driving_lisence_number'];
    $password = $_POST['password'];
    $id = $_POST['Id'];


    $sql = "UPDATE Travel_agent_data SET
                First_name = '$first_name',
                Last_Name = '$last_name',
                Email=' $email',
                Phone_Number = '$phone_number',
                Age = $age,
                Gender = '$gender',
                Description = '$description',
                Number_plate = '$number_plate',
                Vehicle_Type = '$vehicle_type',
                Driving_Lisence_Number = '$driving_lisence_number',
                Password = '$password'
              WHERE TAID = $id";

 
    $result=$conn->query($sql);


    if ($result) {
        echo "<script>alert('Travel Agent data updated successfully!');</script>";
        echo"<script>window.location='adminPortal.php';</script>";
    } else {
        echo "Error updating travel agent data: " . mysqli_error($connection);
    }
}

//logout function
if (isset($_POST['logoutButton'])) {
    function logout(){
        include_once "adminlogin.php";
        session_destroy();
        echo"<script>location.href='adminlogin.php';</script>";
    }
    logout();
  }
?>


