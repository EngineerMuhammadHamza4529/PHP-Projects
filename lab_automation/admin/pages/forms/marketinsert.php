<?php
include('Connect.php');
if(isset($_POST['mrk_submit']))
{
    $mark=$_POST['market'];
    $q="INSERT INTO `markets`(`MarketName`) VALUES ('$mark')";
    $run=mysqli_query($con,$q);
    if($run){
    
        echo"<script> alert('New Market Added Succesfully'); window.location.href='../tables/showmarkets.php' </script>";
    }
    else{

        echo mysqli_error($con);
    }
}

?>