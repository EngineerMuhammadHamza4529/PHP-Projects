<?php

include('Connect.php');
$id=$_GET["eyeD"];
$delq="DELETE FROM `Departments` WHERE DepartmentID=$id";
$run=mysqli_query($con,$delq);
if($run){

    echo"<script> alert('Record Delete Succesfully'); window.location.href='showdepartment.php' </script>";
}

else{

    echo"<script> alert('Error in Delition') </script>";
}
?>