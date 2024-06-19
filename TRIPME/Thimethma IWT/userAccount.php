<?php     session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link " aria-current="page" href="./destinations.php">Destinations</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link " aria-current="page" href="./userAccount.php">Tourist</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link " aria-current="page" href="./booking.php">Bookings</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link " aria-current="page" href="#">About Us</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link " aria-current="page" href="#">Help</a>
                </li>

                <li class="nav-item p-2">
                    <a class="btn btn-info" aria-current="page" href="www.gooogle.com">Sign Up</a>
                </li>
                <li class="nav-item p-2">
                    <a class="btn btn-info" aria-current="page" href="../Dinusanka IWT/log.php">Login</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<body style="height:1500px">

    <div class="container mt-4 mb-4 p-2 d-flex justify-content-center">
        <div class="card p-4">
            <h1 class=" p-2 text-center">Tourist profile</h1>

            <?php
            //$userId = $_SESSION['user_id'];
       

            $userId = $_SESSION['uname'];
            $userIdNum="";
            $conn = mysqli_connect("localhost", "root", "", "destinations");

            $sql = "select * from tourist_data where Email ='". $userId."'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { 
                    $userIdNum = $row['TID'];
                    ?>



                    <div class=" image d-flex flex-column justify-content-center align-items-center">
                        <button class="btn btn-secondary"> <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" />
                        </button>
                        <span class="name mt-3">Name: <?php echo $row['First_name'] . " "   ?> <?php echo $row['Last_Name'] ?></span>
                        <span class="name mt-3">Email: <?php echo $row['Email'] ?></span>
                        <span class="name mt-3">Mobile: <?php echo $row['Phone_Number'] ?></span>



                <?php }
            }
            $conn->close(); ?>

                <div class="row">
                    <a class="btn btn-info col-md-12 p-3 m-2" href="./userUpdate.php?user_id=<?php echo $userIdNum ?>" >Update</a>
                    <a class="btn btn-warning col-md-12 p-3 m-2"  href="./controllers/userDeleteController.php?user_id= <?php echo $userIdNum ?>" >Delete</a>
                </div>


                    </div>
        </div>
    </div>

    <div class="container" style="height:1500px">
        <h2 class="h2 p-4">Booking status</h2>
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Accomodation provider</th>
                    <th scope="col">Tour agent</th>
                    <th scope="col">Tour guide</th>
                </tr>
            </thead>
            <tbody>

                <?php
                //$userId = $_SESSION['user_id'];
                $userId = $_SESSION['uname'];
                $conn = mysqli_connect("localhost", "root", "", "destinations");


                $sql = "SELECT * from bookings where user_id ='".$userIdNum."'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>


                        <tr>
                            <th scope="row"><?php echo $row['date'] ?> </th>
                            <td><?php echo $row['acc_provider'] ?></td>
                            <td><?php echo $row['tour_agent'] ?></td>
                            <td><?php echo $row['tour_guide'] ?></td>
                        </tr>

                <?php }
                }
                $conn->close(); ?>

            </tbody>
        </table>
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