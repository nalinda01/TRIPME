<?php

$conn = mysqli_connect("localhost", "root", "", "destinations");

if (!$conn) {
  die("Connection failed" . mysqli_connect_error());
}

$errors = array();

if (isset($_POST['accProvider'])) {

  $date = $_POST['date'];
  $accProvider = $_POST['accProvider'];
  $tourGuide = $_POST['tourGuide'];
  $tourAgent = $_POST['tourAgent'];
  //$user_id = $_SESSION['user_id'];
  $user_id = 1;


  $sql = "SELECT `First_name` FROM `accommodation_provider_data` WHERE ACPID = " .$accProvider;
  $result = $conn->query($sql);
  $accProvider = $result->fetch_row()[0];

  $sql = "SELECT `First_name` FROM `travel_agent_data` WHERE TAID = " .$tourAgent;
  $result = $conn->query($sql);
  $tourAgent = $result->fetch_row()[0];

  $sql = "SELECT `First_name` FROM `tour_guide_data` WHERE TGID = " .$tourGuide;
  $result = $conn->query($sql);
  $tourGuide = $result->fetch_row()[0];

  if (count($errors) === 0) {
    $sql = " INSERT INTO `bookings`(`user_id`, `date`, `acc_provider`, `tour_agent`, `tour_guide`) VALUES 
                        ('".$user_id."','".$date."','".$accProvider."','".$tourAgent."','".$tourGuide."')";
    mysqli_query($conn, $sql);
    header('location: ../userAccount.php?user_id=' . $user_id);
  }
}
