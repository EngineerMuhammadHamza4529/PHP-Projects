<?php
include '../backend/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    $sql = "INSERT INTO `message`( `name`, `email`, `message`) VALUES ('$name','$email','$message')";

    $result = mysqli_query($conn, $sql);

    header("Location: index.php");

    mysqli_close($conn);
    
}


?>