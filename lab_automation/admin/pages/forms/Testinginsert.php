<?php
include('Connect.php');
if(isset($_POST['test_submit']))
{
    $dept=$_POST['dep'];
    $tst=$_POST['test_name'];
    $q="INSERT INTO `testing`(`TestName`,DepartmentID) VALUES ('$tst','$dept')";
    $run=mysqli_query($con,$q);
    if($run){
    
        echo"<script> alert('New Test is Added Succesfully'); window.location.href='../tables/showtesting.php' </script>";
    }
    else{

        echo mysqli_error($con);
    }
}

?>