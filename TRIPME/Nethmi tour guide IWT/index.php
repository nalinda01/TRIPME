<?php
// Connect to your MySQL database
$servername = 'localhost';
$username = 'your_username';
$password = 'your_password';
$dbname = 'your_database';

$conn = new mysqli($servername, $username, $password, $dbname);

// Query to retrieve tour guide information
$sql = 'SELECT * FROM tour_guides';
$result = $conn->query($sql);

// Fetch the data and encode it as JSON
$tourGuides = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $tourGuides[] = $row;
  }
}

  