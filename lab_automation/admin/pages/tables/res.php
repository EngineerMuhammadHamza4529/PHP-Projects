<?php
include 'Connect.php';
$id=$_GET['id'];
$status=$_GET['st'];

$q="UPDATE `products` SET `status`='$status' WHERE ProductID='$id'";
$run=mysqli_query($con,$q);
    if($run){

        echo"<script> alert('Record is Succesfully Updated'); window.location.href='../forms/shipmentForm.php' </script>";
    }

    else{

        echo"<script> alert('Failed') </script>";
    }




?>