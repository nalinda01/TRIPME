<?php
session_start();
//deny accesses to the users who are trying to bypass the login page 
if(isset($_POST['adminLoginButton'])){
    $adusername=$_POST["adminUsername"];
    $adPassword=$_POST["adminPassword"];

    include_once "config.php";
    $result = $conn->query("SELECT admin_password FROM admin_data WHERE admin_username = '$adusername'");
    
  if($result->num_rows==1){
        $password=$result->fetch_assoc();
        //checking the password
    if($password['admin_password']==$adPassword){
        //setting up the session
        $_SESSION['adminUsername']=$adusername;
        //redirecting to the portal page
        echo"<script>window.location='adminPortal.php';</script>";
    }
    else{
        echo"<script>alert('Invalid Password!');</script>";
        echo"<script>window.location='adminlogin.html';</script>";
    }
    }
    else{
        echo"<script>alert('Username is Unavailable!');</script>";
        echo"<script>window.location='adminlogin.html';</script>";
    }
}

else{
    header('location:adminlogin.html');
}
?>