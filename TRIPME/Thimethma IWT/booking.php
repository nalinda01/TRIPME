<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<style>
    .logo {
        width: 400px;
        margin-left: auto;
        margin-right: auto;
        display: block;
        box-sizing: border-box;
    }

    .Top {
        background-color: #05445E;
        border: 5px solid #05445E;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
    }

    .topnav {
        background-color: #D4F1F4;
        overflow: hidden;
    }

    .topnav a {
        float: left;
        color: #05445E;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #f6f7f8;
        color: black;
    }

    .signUp,
    .signIn {
        float: right;
        padding: 10px 15px;
        text-align: center;
        margin-right: 10px;
        margin-top: 5px;
        margin-bottom: 5px;
        color: black;
        text-decoration: none;
        border: 2px solid #2372c1;
        border-radius: 25px
    }

    .signIn:hover,
    .signUp:hover {
        background-color: #2372c1;
    }

    body {}

    footer {
        background-color: #05445E;
        padding: 10px;
        text-align: center;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
    }

    .ftContactUs {
        color: white;
        font-size: 14px;
        text-align: left;
        float: left;

    }

    .footerLinks {
        margin-left: auto;
        margin-right: auto;
        color: white;
        text-align: center;
        display: inline-block;
        margin-left: -40px;


    }

    .footerLinks a,
    .ftContactUs a {
        color: white;
    }

    .socialMedia {
        color: white;
        float: right;
        font-size: 14px;
        margin-right: 50px;

    }

    .SMicons {
        width: 110px;
        height: 20px;

    }

    #newsLetter {
        border: 2px solid #2372c1;
        border-radius: 20px;
    }

    #nwsLetterSubmitbtn {
        border: 2px solid #2372c1;
        border-radius: 20px;
    }
</style>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top" style="background-color: #05445E!important;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="images\Trip Me .LK.png" alt="..." height="36">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item p-2">
                    <a class="nav-link active" aria-current="page" href="../Movindu IWT/HomePage.html">Home</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link " aria-current="page" href="destinations.php">Destinations</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link " aria-current="page" href="../Nethmi IWT/aboutus.html">About Us</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link " aria-current="page" href="../Movindu IWT/help.php">Help</a>
                </li>

                <li class="nav-item p-2">
                    <a class="btn btn-info" aria-current="page" href="../Dinusanka IWT/signup.php">Sign Up</a>
                </li>
                <li class="nav-item p-2">
                    <a class="btn btn-info" aria-current="page" href="../Dinusanka IWT/log.php">Login</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<body style="height:5000px">

    <div class="container-fluid p-5">
        <form action="./controllers/bookingController.php" method="POST">
            <center>
                <h1>
                    Tour Booking
                </h1>
                <br>
                <div class="text-center col-md-4">
                    <input type="date" class="form-control col-md-3" name="date">

                </div>
            </center>

            <br>

            <hr>
            <div class="row">
                <h2 class="p-4">Accomodation provider</h2>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "destinations");
                $sql = "select * from accommodation_provider_data";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>


                        <div class="col-md-3 mb-3 pb-5" style="height:500px">
                            <div class="card" style="width: 18rem;height:10px !important">
                                <img src="./images/<?php echo $row['image_src'] . ".jpg" ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['Accommodation_Name'] ?></h5>
                                    <p class="card-text"><?php echo $row['Description'] ?></p>
                                    <input name="accProvider" type="radio" class="btn-check" id="acc<?php echo $row['ACPID'] ?>" value="<?php echo $row['ACPID'] ?>" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="acc<?php echo $row['ACPID'] ?>">Select</label>
                                </div>
                            </div>
                        </div>


                <?php }
                }
                $conn->close(); ?>


                <h2 class="p-4">Tour Agent</h2>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "destinations");
                $sql = "select * from travel_agent_data";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>


                        <div class="col-md-3 mb-3 pb-5" style="height:500px">
                            <div class="card" style="width: 18rem;height:10px !important">
                                <img src="./images/<?php echo $row['image_src'] . ".jpg" ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['First_name'] ?></h5>
                                    <p class="card-text"><?php echo $row['Description'] ?></p>
                                    <input name="tourAgent" type="radio" class="btn-check" id="ta<?php echo $row['TAID'] ?>" autocomplete="off" value="<?php echo $row['TAID'] ?>" >
                                    <label class="btn btn-outline-primary" for="ta<?php echo $row['TAID'] ?>">Select</label>
                                </div>
                            </div>
                        </div>


                <?php }
                }
                $conn->close(); ?>

                <h2 class="p-4">Tour Guide</h2>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "destinations");
                $sql = "select * from tour_guide_data";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>


                        <div class="col-md-3 mb-3 pb-5" style="height:500px">
                            <div class="card" style="width: 18rem;height:10px !important">
                                <img src="./images/<?php echo $row['image_src'] . ".jpg" ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['First_name'] ?></h5>
                                    <p class="card-text"><?php echo $row['Description'] ?></p>
                                    <input name="tourGuide" type="radio" class="btn-check" id="tg<?php echo $row['TGID'] ?>" value="<?php echo $row['TGID'] ?>" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="tg<?php echo $row['TGID'] ?>">Select</label>
                                </div>
                            </div>
                        </div>


                <?php }
                }
                $conn->close(); ?>

            </div>

            <center>
                <button class="btn btn-info p-3" type="submit"><a href="../Nalinda IWT/payment.php">Make Payment</a></button>
            </center>

        </form>

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


</html>