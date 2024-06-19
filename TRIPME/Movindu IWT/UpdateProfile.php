<?php

require "connection.php";

$fn = $_POST["fn"];
$ln = $_POST["ln"];
$e = $_POST["e"];
$cn = $_POST["cn"];
$np = $_POST["np"];
$vt = $_POST["vt"];
$dln = $_POST["dln"];
$d = $_POST["d"];
$p = $_POST["p"];

if(empty($fn)){
    ?>
    <script>
        alert("Please enter your First Name");
        window.location = "TravelAgentProfile.php?email=<?php echo $e ?>";
    </script>
    <?php
}else if(empty($ln)){
    ?>
    <script>
        alert("Please enter your Last Name");
        window.location = "TravelAgentProfile.php?email=<?php echo $e ?>";
    </script>
    <?php
}else if(empty($e)){
    ?>
    <script>
        alert("Please enter your Email");
        window.location = "TravelAgentProfile.php?email=<?php echo $e ?>";
    </script>
    <?php
}else if(empty($cn)){
    ?>
    <script>
        alert("Please enter your Contact Number");
        window.location = "TravelAgentProfile.php?email=<?php echo $e ?>";
    </script>
    <?php
}else if(empty($cn)){
    ?>
    <script>
        alert("Please enter your Number Plate");
        window.location = "TravelAgentProfile.php?email=<?php echo $e ?>";
    </script>
    <?php

}else if(empty($p)){
    ?>
    <script>
        alert("Please enter your password");
        window.location = "TravelAgentProfile.php?email=<?php echo $e ?>";
    </script>
    <?php    
}else if(empty($vt)){
    ?>
    <script>
        alert("Please enter your Vehicle Type");
        window.location = "TravelAgentProfile.php?email=<?php echo $e ?>";
    </script>
    <?php
}else if(empty($dln)){
    ?>
    <script>
        alert("Please enter your Driver License Number");
        window.location = "TravelAgentProfile.php?email=<?php echo $e ?>";
    </script>
    <?php
}else{
    
    $q = "UPDATE `travel_agent_data` SET `First_name` = '".$fn."' , `Last_Name` = '".$ln."' ,
    `Email` = '".$e."' , `Password` = '".$p."' , 
     `Phone_Number` = '".$cn."' , `Description` = '".$d."' , `Number_Plate` = '".$np."' ,
    `Vehicle_Type` = '".$vt."' , `Driving_Lisence_Number` = '".$dln."' WHERE `Email` = '".$e."'";

    $conn->query($q);

    $image = $_FILES["ui"];

    $allowed_image_extention = array("image/jpeg", "image/jpg", "image/png", "image/svg");
                $file_extention = $image["type"];

                if (!in_array($file_extention, $allowed_image_extention)) {
                    echo "Please Select a valid image.";
                } else {

                    $newimgextention;
                    if ($file_extention = "image/jpeg") {
                        $newimgextention = ".jpeg";
                    } elseif ($file_extention = "image/jpg") {
                        $newimgextention = ".jpg";
                    } elseif ($file_extention = "image/png") {
                        $newimgextention = ".png";
                    } elseif ($file_extention = "image/svg") {
                        $newimgextention = ".svg";
                    }

                    $filename = "profile_pic//" . uniqid() . $newimgextention;

                    move_uploaded_file($image["tmp_name"], $filename);

                    $q2 = "UPDATE `travel_agent_data` SET `image_src`='" . $filename . "' WHERE `Email`='" . $e . "'  ";
                    $conn->query($q2);
                }  

    ?>
    <script>
        alert("Sucessfully Updated");
       window.location = "TravelAgentProfile.php?email=<?php echo $e ?>";
    </script>
    <?php

}

?>