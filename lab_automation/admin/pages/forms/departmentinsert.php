<?php
include('Connect.php');
if(isset($_POST['dept_submit']))
{
    $dept=$_POST['dep_name'];
    $q="INSERT INTO `departments`(`DepartmentName`) VALUES ('$dept')";
    $run=mysqli_query($con,$q);
    if($run){
    
        echo"<script> alert('New Department Added Succesfully'); window.location.href='../tables/showdepartment.php' </script>";
    }
    else{

        echo mysqli_error($con);
    }
}

?>