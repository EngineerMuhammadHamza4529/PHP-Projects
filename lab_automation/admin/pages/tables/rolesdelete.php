<?php

include('Connect.php');
$id=$_GET["eyeD"];
$delq="DELETE FROM `roles` WHERE RoleID=$id";
$run=mysqli_query($con,$delq);
if($run){

    echo"<script> alert('Record Delete Succesfully'); window.location.href='showroles.php' </script>";
}

else{

    echo"<script> alert('Error in Delition') </script>";
}
?>