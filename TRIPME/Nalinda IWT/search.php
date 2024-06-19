<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destination Results Page</title>
    <link rel="stylesheet" href="CSS/Homepage.css">
    <link rel="stylesheet" href="CSS/DestinationPage.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>


    <div class="Top">
        <a href="#home"><img class="logo" src="images\Trip Me .LK.png"></a>
        <hr>
        <div class="topnav">
            <a class="active" href="HomePage.html">Home</a>
            <a href="destinations.php">Destinations</a>
            <a href="#contact">About Us</a>
            <a href="help.html">Help</a>
            <form action="../Dinusanka IWT/signup.php">
            <input type="submit" value="Sign Up" class="signUp" ></form>
            <form action="../Dinusanka IWT/log.php">
            <input type="submit" value="Sign In" class="signIn"></form>
          </div>
    </div>

<body>

    <?php
        //assigning the search input into a variable
        $searchQuery=$_POST["searchBar"];
        //checking whether search bar contains a whitespace
        if(empty($searchQuery)){
            header("location:HomePage.html");
        }
        //checking whether search button clicked or not
        if(isset($_POST["searchButton"])){
            include_once("config.php");
           
        }
        //retreving data from the database table
        $sql="SELECT * FROM destination_data WHERE D_name LIKE '%$searchQuery%'";
        $result=$conn->query($sql);//performs the query

        //checking if there are results returned to the serach results
        if($result->num_rows>0){
            
            while($row=$result->fetch_assoc()){
                echo"<div class='destinationResults'>";
                echo"<h1 calss='destinationName'><center>".$row["D_name"]."</center></h1>";
                echo "<img src='images/" . $row['D_imgsrc'] . ".jpg' class='destinationImg' alt='...'>";
                echo "<p class='destinationDescription'>".$row["D_description"]."</p>";
                
                    
            }
           echo "<form action='../Thimethma IWT/booking.php' method='post'>
           <center>
               <input type='submit' name='createBookingButton' value='Create Booking' class='createBookingButton'>
           </center>
           </form>";
        }
        //no search reults found
        else{
            
            echo "<center><h1>No Search Results Found!</h1></center>";
            
        }
        $conn->close();
        
    ?>
    
    </div>
    </body>



    <footer>
    
        <div Class="ftContactUs">
            <p><strong><a href="#CtUs">Contact Us</a></strong>
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
