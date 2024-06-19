<!DOCTYPE html>

<html lang="en">

<head>
    <title>Payment</title>
    <link rel="stylesheet" href="CSS\Header&footer.css">
    <link rel="stylesheet" href="style.css">

</head>

<div class="Top">
    <a href="#home"><img class="logo" src="images\Trip Me .LK.png"></a>
    <hr>
    <div class="topnav">
            <a class="active" href="../Movindu IWT/HomePage.html">Home</a>
            <a href="../Thimethma IWT/destinations.php">Destinations</a>
            <a href="../Nethmi IWT/aboutus.html">About Us</a>
            <a href="../Movindu IWT/help.html">Help</a>
            <form action="../Dinusanka IWT/signup.php">
            <input type="submit" value="Sign Up" class="signUp" ></form>
            <form action="../Dinusanka IWT/log.php">
            <input type="submit" value="Sign In" class="signIn"></form>
    </div>
</div>

<body>

    <center>

        <h1>Payment Details</h1>
        <br>

        <form action="indexpayment.php" method="POST">

            <div class="container">

            <img src="resources/payment.jpg" width="500px" height="75px"/>

                <label for="Card Holder Name">Card Holder Name:</label>
                <br>
                <input class="inp" type="text" name="chname" required>
                <br>

                <label for="Card Number">Card Number:</label>
                <br>
                <input class="inp" type="text" name="cnumber" required>
                <br><br>

                <label for="expiryMonth">Expiry Month:</label>
                <select id="expiry month" name="emonth">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>

                <label for="expiryYear">Expiry Year:</label>
                <input class="inp" id="eyear" type="text" name="eyear"  required><br><br>

                <label for="cvv">CVV:</label>
                <input class="inp" type="number" name="cvv" id="cvv"   required><br><br>

                <label for="amount">Amount:</label>
                <input class="inp" type="text" name="Amount" required>
                <select>
                    <option>LKR</option>
                    <option>USD</option>
                </select><br/><br/>

            </div>

            <input  class="but1" type="submit" value="Make Payment" name="sub" id="Make Payment">

        </form>
    </center>

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
            <strong><a href="../Nethmi IWT/contactUs.html">contact Us &nbsp</a></strong> 
            <strong><a href="../Nethmi IWT/aboutus.html">About Us &nbsp</a></strong> 
            <strong><a href="../Nalinda IWT/privacy.php">Privacy Policy</a></strong>
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

    <script src="script.js"></script>
</body>


</html>