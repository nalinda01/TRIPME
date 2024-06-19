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

<body>

    <div class="container mt-4 mb-4 p-2 d-flex justify-content-center">
        <div class="card p-4">
            <h1 class=" p-2 text-center">Tourist profile Update</h1>

            <?php
            //$userId = $_SESSION['user_id'];
            $userId = $_GET['user_id'];
            $conn = mysqli_connect("localhost", "root", "", "destinations");

            $sql = "select * from tourist_data where TID =" . $userId;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>



                    <div class=" image d-flex flex-column justify-content-center align-items-center">
                        <button class="btn btn-secondary"> <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" />
                        </button>

                        <form action="./controllers/userUpdateController.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="nameId" name="firstName" value="<?php echo $row['First_name'] ?>">
                                <input type="text" class="form-control" id="nameId" name="user_id" value="<?php echo $row['TID'] ?>" hidden>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="nameId" name="lastName" value="<?php echo $row['Last_Name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="emailId" name="email" value="<?php echo $row['Email'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="mobileId" name="mobile" value="<?php echo $row['Phone_Number'] ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                <?php }
            }
            $conn->close(); ?>


                    </div>
        </div>
    </div>



</body>


</html>