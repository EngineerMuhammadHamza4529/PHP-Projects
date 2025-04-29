<?php
include('Connect.php');
if(isset($_POST['res_submit']))
{
    $prodn=$_POST['prod'];
    $stts=$_POST['sts'];
    $q="INSERT INTO `result`(`ProductID`,ProductStatus) VALUES ('$prodn','$stts')";
    $run=mysqli_query($con,$q);
    if($run){
    
        echo"<script> alert('Status is added Succesfully'); window.location.href='../tables/showresult.php' </script>";
    }
    else{

        echo mysqli_error($con);
    }
}

?>