<?php 
session_start();
//grant access for users who only came through admin login page
if(!isset($_SESSION['adminUsername'])){
    echo"<script>window.location='adminlogin.html';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login Page</title>
    <link rel="stylesheet" href="CSS\adminPage.css">
   
</head>


    <div class="Top">
        <a href="HomePage.html"><img class="logo" src="images\Trip Me .LK.png"></a>
    </div>

<body>
    <center>
<h1><?php echo "Welcome ".$_SESSION['adminUsername']."!"; ?><h1>
</center>

<h2>Active Users
<hr style="height:2px;border-width:0;color:gray;background-color:black"></h2>

<?php
//active users counting function
include_once('adminPortalFunc.php');

$touristDataCount = getEntryCount("tourist_data");
$accommodationProviderCount = getEntryCount("accommodation_provider_data");
$tourGuideCount = getEntryCount("tour_guide_data");
$travelAgentCount = getEntryCount("travel_agent_data");
?>

<div class="grid-container">
        <div class="grid-item">
            <h3>Tourist Data</h3>
            <p>USER COUNT: <?php echo $touristDataCount; ?></p>
        </div>
        <div class="grid-item">
            <h3>Accommodation Provider Data</h3>
            <p>USER COUNT: <?php echo $accommodationProviderCount; ?></p>
        </div>
        <div class="grid-item">
            <h3>Tour Guide Data</h3>
            <p>USER COUNT: <?php echo $tourGuideCount; ?></p>
        </div>
        <div class="grid-item">
            <h3>Travel Agent Data</h3>
            <p>USER COUNT: <?php echo $travelAgentCount; ?></p>
        </div>
    </div>

<!--Retreived data from all the tables that are available-->

<h2>Tourists
<hr style="height:2px;border-width:0;color:gray;background-color:black"></h2>

<?php 
//connection establishment
include_once "config.php";
//retrive query
$sql="SELECT * FROM tourist_data;";
//query execution 
$result=$conn->query($sql);

//chcking wheather there are any results or not
if($result->num_rows>0){
    //creating table
    echo "<table class='userData' border='1px'; height: 300px; overflow: auto;>";
    echo "<tr><th>Tourist ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Age</th><th>Gender</th><th>Password</th><th>Actions</th></tr>";
    //fetch one row at a time in to a associative array
    while ($row = $result->fetch_assoc()) {
        $id=$row['TID'];
        echo "<form method='post' action='adminPortalFunc.php'>
        <input type='hidden' name='tableName' value='tourist_data'>
        <input type='hidden' name='tableNameId' value='TID'>
        <input type='hidden' name='Id' value=' $id'>";
        echo "<tr>";
        echo'<td> '.$id.' </td>';
        echo '<td><input type="text" name="first_name" value="' . $row["First_name"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="last_name" value="' . $row["Last_Name"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="Email" value="' . $row["Email"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="phone_number" value="' . $row["Phone_Number"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="age" value="' . $row["Age"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="gender" value="' . $row["Gender"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="password" value="' . $row["Password"] . '" class="admininput"></td>';
        echo "<td>";
        echo "<button class='update' name='touristUpdate'>Update</button>";
        echo"<button class='deleteButton' type='submit'  name='deleteButton'>Delete</button>
        </form>";
        echo "</td>";
        echo "</tr>";
        
    }

    echo "</table>";
} else {
    echo "No data found in Tourist_data table.";
}
?>

<h2>Active Bookings
<hr style="height:2px;border-width:0;color:gray;background-color:black"></h2>

<?php
include_once "config.php";

$sql = "SELECT * FROM bookings;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='userData' border='1px';>";
    echo "<tr><th>Booking ID</th><th>User ID</th><th>Date</th><th>Accommodation Provider</th><th>Tour Agent</th><th>Tour Guide</th><th>Actions</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        echo "<form method='post' action='adminPortalFunc.php'>
        <input type='hidden' name='tableName' value='bookings'>
        <input type='hidden' name='tableNameId' value='id'>
        <input type='hidden' name='Id' value='$id'>";
        echo "<tr>";
        echo '<td>' . $id . '</td>';
        echo '<td><input type="text" name="user_id" value="' . $row["user_id"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="date" value="' . $row["date"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="acc_provider" value="' . $row["acc_provider"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="tour_agent" value="' . $row["tour_agent"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="tour_guide" value="' . $row["tour_guide"] . '" class="admininput"></td>';
        echo "<td>";
        echo "<button name='bookingUpdate' class='update'>Update</button>";
        echo "<button type='submit' class='deleteButton' name='deleteButton'>Delete</button>
      </form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data found in the bookings table.";
}
?>


<h2>Accommodation Providers
<hr style="height:2px;border-width:0;color:gray;background-color:black"></h2>
<?php 
include_once "config.php";
$sql="SELECT * FROM accommodation_provider_data;";
$result=$conn->query($sql);


if($result->num_rows>0){
    echo "<table class='userData' border='1px';>";
    echo "<tr><th>Acc_provider ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Age</th><th>Gender</th><th>Description</th><th>Acc_Name</th><th>Acc_Type</th><th>Password</th><th>Actions</th></tr>";


    while ($row = $result->fetch_assoc()) {
        $id=$row['ACPID'];
        echo "<form method='post' action='adminPortalFunc.php'>
        <input type='hidden' name='tableName' value='accommodation_provider_data'>
        <input type='hidden' name='tableNameId' value='ACPID'>
        <input type='hidden' name='Id' value=' $id'>";
        echo "<tr>";
        echo'<td> '.$id.' </td>';
        echo '<td><input type="text" name="first_name" value="' . $row["First_name"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="last_name" value="' . $row["Last_Name"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="Email" value="' . $row["Email"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="phone_number" value="' . $row["Phone_Number"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="age" value="' . $row["Age"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="gender" value="' . $row["Gender"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="description" value="' . $row["Description"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="accommodation_name" value="' . $row["Accommodation_Name"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="accommodation_type" value="' . $row["Accommodation_Type"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="password" value="' . $row["Password"] . '" class="admininput"></td>';

        echo "<td>";
        echo "<button name='accommodationProviderUpdate'class='update'>Update</button>";
       echo" <button type='submit' class='deleteButton'name='deleteButton'>Delete</button>
      </form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data found in Accommodation_provider_data table.";
}
?>

<h2>Tour Guides
<hr style="height:2px;border-width:0;color:gray;background-color:black"></h2>

<?php 
include_once "config.php";
$sql="SELECT * FROM tour_guide_data;";
$result=$conn->query($sql);


if($result->num_rows>0){
    echo "<table class='userData' border='1px';>";
    echo "<tr><th>Tour guide ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Age</th><th>Gender</th><th>Description</th><th>Languages</th><th>Places</th><th>Password</th><th>Actions</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $id=$row['TGID'];
        echo "<form method='post' action='adminPortalFunc.php'>
        <input type='hidden' name='tableName' value='tour_guide_data'>
        <input type='hidden' name='tableNameId' value='TGID'>
        <input type='hidden' name='Id' value=' $id'>";
        echo "<tr>";
        echo'<td> '.$id.' </td>';
        echo '<td><input type="text" name="first_name" value="' . $row["First_name"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="last_name" value="' . $row["Last_Name"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="Email" value="' . $row["Email"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="phone_number" value="' . $row["Phone_Number"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="age" value="' . $row["Age"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="gender" value="' . $row["Gender"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="description" value="' . $row["Description"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="languages" value="' . $row["Languages"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="places" value="' . $row["Places"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="password" value="' . $row["Password"] . '" class="admininput"></td>';
        echo "<td>";
        echo "<button name='tourGuideUpdate' class='update'>Update</button>";
        echo"<button type='submit' class='deleteButton' name='deleteButton'>Delete</button>
      </form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data found in Tour_guide_data table.";
}
?>

<h2>Travel Agents
<hr style="height:2px;border-width:0;color:gray;background-color:black"></h2>
<div class='table-container'>
    <?php 
include_once "config.php";
$sql="SELECT * FROM travel_agent_data;";
$result=$conn->query($sql);


if($result->num_rows>0){
    echo "<table class='userData' border='1px';>";
    echo "<tr><th>Travel Agent ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Age</th><th>Gender</th><th>Description</th><th>Number Plate</th><th>Vehicle Type</th><th>Driving License Number</th><th>Password</th><th>Actions</th></tr>";

    
    while ($row = $result->fetch_assoc()) {
        $id=$row['TAID'];
        echo "<form method='post' action='adminPortalFunc.php'>
        <input type='hidden' name='tableName' value='travel_agent_data'>
        <input type='hidden' name='tableNameId' value='TAID'>
        <input type='hidden' name='Id' value=' $id'>";
        echo "<tr>";
        echo'<td> '.$id.' </td>';
        echo '<td><input type="text" name="first_name" value="' . $row["First_name"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="last_name" value="' . $row["Last_Name"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="Email" value="' . $row["Email"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="phone_number" value="' . $row["Phone_Number"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="age" value="' . $row["Age"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="gender" value="' . $row["Gender"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="description" value="' . $row["Description"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="number_plate" value="' . $row["Number_plate"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="vehicle_type" value="' . $row["Vehicle_Type"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="$driving_lisence_number" value="' . $row["Driving_Lisence_Number"] . '" class="admininput"></td>';
        echo '<td><input type="text" name="password" value="' . $row["Password"] . '" class="admininput"></td>'; 
        echo'<td>';
        echo "<button name='travelAgentUpdate' class='update'>Update</button>";
       echo"<button type='submit' class='deleteButton' name='deleteButton'>Delete</button>
      </form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data found in Travel_agent_data table.";
}
?>
</div>


<h2>Messages
<hr style="height:2px;border-width:0;color:gray;background-color:black"></h2>
<div class='table-container'>
<?php 
include_once "config.php";
$sql="SELECT * FROM help;";
$result=$conn->query($sql);


if($result->num_rows>0){
    echo "<div class='table-container'>";
    echo "<table class='userData' border='1px';>";
    echo "<tr><th>REUEST_ID</th><th>Email</th><th>Message</th><th>Action</tr>";

    while ($row = $result->fetch_assoc()) {
        $id=$row['Help_ID'];
        echo "<tr>";
        echo "<td>".$row['Help_ID']."</td>";
        echo "<td>".$row['Email']."</td>";
        echo "<td>".$row['Message']."</td>";
        echo "<td>";
        echo "<form method='post' action='adminPortalFunc.php'>
        <input type='hidden' name='tableName' value='help'>
        <input type='hidden' name='tableNameId' value='Help_ID'>
        <input type='hidden' name='Id' value=' $id'>
        <button type='submit' class='responseButton' name='deleteButton'>Mark as Responded</button>
      </form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo"</div>";
} else {
    echo "No data found in help_data table.";
}
?>
</div>
<form action="adminPortalFunc.php" method='POST'>
<center>
<button type='submit' class='logoutButton' name='logoutButton'>Logout</button>
</center>
</form>
</body>
<footer>
    
        <div Class="ftContactUs">
            <p><strong><a href="">Contact Us</a></strong>
                <br>
                    <strong>Address:</strong> TripMeLK HQ, Malabe, Sri Lanka<br>
                    <strong>Phone:</strong> +94 123 456 789<br>
                    <strong>Email:</strong> info@TripMe.lk
                </p>
        </div>
 
    
   
    <div Class="footerLinks">
        <input id="newsLetter" type="email" > </input>
        <input id="nwsLetterSubmitbtn" type="submit" value="Subscribe">
    <p>
            <strong><a href="#help">Help &nbsp</a></strong> 
            <strong><a href="#abtUs">About Us &nbsp</a></strong> 
            <strong><a href="#PP">Privacy Policy</a></strong>
            <p class="copyright">Copyright &#169; 2023, All rights reserved</p>
    </p>
    </div>

    <div Class="socialMedia">
        <p>
            <strong>Social Media</strong> 
            <br><br>
            <img src="images\SM icons.png" class="SMicons">
         </p>

    </div>
        
 
    
    
</footer>  


</html>
