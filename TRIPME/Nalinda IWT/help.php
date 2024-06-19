<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Portal</title>
    <link rel="stylesheet" href="CSS/Homepage.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>


    <div class="Top">
        <a href="HomePage.html"><img class="logo" src="images\Trip Me .LK.png"></a>
        <hr>
        <div class="topnav">
            <a class="active" href="HomePage.html">Home</a>
            <a href="../Thimethma IWT/destinations.php">Destinations</a>
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
$email=$_POST["Helpemail"];
$message=$_POST["HelpReq"];

if(empty($email)||empty($message)){
    header("location:help.html");
}

if(isset($_POST["HelpButton"])){
    include_once("config.php");
  
    $stmt = $conn->prepare("INSERT INTO help (Email, Message) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $message);
    $status = $stmt->execute();
 
    if($status===TRUE){
        echo"<div class='RecStatusMsg'><center><h1>Your Massage Recorded Successfully <br> Our team will Contact you Soon!</center></h1></div>";
    }
    else{
        echo"<div class='RecStatusMsg'><h1><center>Error occurred!</center></h1></div>";
    }

}
else{
    header("location:help.html");
}
    
?>

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

