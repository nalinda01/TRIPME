

<?php
include_once 'connection.php';
?>

<?php
if (isset($_POST["sub"])) {
    $chname = $_POST['chname'];
    $cnumber = $_POST['cnumber'];
    $emonth = $_POST['emonth'];
    $eyear = $_POST['eyear'];
    $cvv = $_POST['cvv'];
    $amount = $_POST['Amount'];

    $sql = "insert into payment(id,Card_Holder_Name,Card_Number,Expiry_Month,Expiry_Year,CVV,Amount) 
values('','$chname','$cnumber','$emonth','$eyear','$cvv','$amount')";



    if (mysqli_query($conn, $sql)) {
?>
        <script>
            alert("Successful!!!");
            window.location = "payment.php";
        </script>

<?php
    } else {
        echo "error";
    }


    mysqli_close($conn);
}
?>