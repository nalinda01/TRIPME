<?php

$conn = new mysqli('localhost', 'root', '', 'destinations');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   
}
