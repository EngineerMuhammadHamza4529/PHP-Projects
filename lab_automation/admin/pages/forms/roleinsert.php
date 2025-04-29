<?php
include('Connect.php');
if(isset($_POST['rol_submit']))
{
    $rol=$_POST['role'];
    $q="INSERT INTO `roles`(`RoleName`) VALUES ('$rol')";
    $run=mysqli_query($con,$q);
    if($run){
    
        echo"<script> alert('New Role Succesfully Inserted'); window.location.href='../tables/showroles.php' </script>";
    }
    else{

        echo mysqli_error($con);
    }
}

?>