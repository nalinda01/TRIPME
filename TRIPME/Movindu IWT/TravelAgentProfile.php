<?php

session_start();

require "connection.php";

$email = $_SESSION['uname'];
/*
if (isset($_GET["email"])) {
    $email = $_GET["email"];
} else {
    $email = "a@gmail.com";
}*/

if (!isset($_SESSION["loggedin"])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Travel Agent Profile</title>
        <link rel="stylesheet" href="CSS\Header&footer.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <!-- header -->
        <div class="Top">
            <a href="#home"><img class="logo" src="images\Trip Me .LK.png"></a>
            <hr>
            <div class="topnav">
                <a class="active" href="#home">Home</a>
                <a href="#Destinations">Destinations</a>
                <a href="#contact">About Us</a>
                <a href="#Help">Help</a>
                <input type="submit" value="Sign Up" class="signUp">
                <input type="submit" value="Sign In" class="signIn">
            </div>
        </div>
        <!-- end header -->

        <?php

        $q = "SELECT * FROM `travel_agent_data` WHERE `Email` = '" . $email . "'";
        $rs = $conn->query($q);

        $d = $rs->fetch_assoc();

        ?>
        <h1 class="hdr">Travel Agent Profile</h1>

        <form action="UpdateProfile.php" method="POST" enctype="multipart/form-data">

            <div style="display: inline-block;text-align: center;">
                <div class="imgD" style="background-image: url('<?php echo $d['image_src'] ?>');" id="prev">

                </div>
                <input name="ui" type="file"  style="display: block;margin-left: 160px;" id="imguploader" onclick="changeImage();" />
        
            </div>


            <div class="detD">
                <label class="labS">First Name:</label>
                <input class="inpS" name="fn" type="text" value="<?php echo $d['First_name'] ?>" /><br /><br />

                <label class="labS">Last Name:</label>
                <input class="inpS" name="ln" type="text" value="<?php echo $d['Last_Name'] ?>" /><br /><br />

                <label class="labS">E mail:</label>
                <input class="inpS" name="e" type="text" value="<?php echo $d['Email'] ?>" /><br /><br />

                <label class="labS">Password:</label>
                <input class="inpS" name="p" type="text" value="<?php echo $d['Password'] ?>" /><br /><br />

                <label class="labS">Contact No:</label>
                <input class="inpS" name="cn" type="text" value="<?php echo $d['Phone_Number'] ?>" /><br /><br />

                <label class="labS">Number Plate:</label>
                <input class="inpS" name="np" type="text" value="<?php echo $d['Number_plate'] ?>" /><br /><br />

                <label class="labS">Vehicle Type:</label>
                <input class="inpS" name="vt" type="text" value="<?php echo $d['Vehicle_Type'] ?>" /><br /><br />

                <label class="labS">Driving License Number:</label>
                <input class="inpS" name="dln" type="text" value="<?php echo $d['Driving_Lisence_Number'] ?>" /><br /><br />
            </div>

            <div class="desD">
                <label class="des">Description:</label>
                <textarea rows="6" class="inpS ta" name="d"><?php echo $d['Description'] ?></textarea>
            </div>

            <button class="btn1" type="submit">UPDATE</button><br /><br />

        </form>

        <!-- footer -->
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
                <input id="newsLetter" type="email"> </input>
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
        <!-- end footer -->

    </body>
    <script src="js/script.js"></script>

    </html>
<?php

} else {
?>
    <script>
        alert("Please Register First");
        window.location = "../Dinusanka IWT/TAIndex.php";
    </script>
<?php
}

?>