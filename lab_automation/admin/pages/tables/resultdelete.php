<?php

include('Connect.php');
$id=$_GET["eyeD"];
$delq="DELETE FROM `testing` WHERE TESTID=$id";
$run=mysqli_query($con,$delq);
if($run){

    echo"<script> alert('Record Delete Succesfully'); window.location.href='../tables/showresult.php' </script>";
}

else{

    echo"<script> alert('Error in Deletion') </script>";
}
?>