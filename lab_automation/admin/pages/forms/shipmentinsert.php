<?php
include('Connect.php');
if(isset($_POST['ship_submit']))
{
    $mark=$_POST['market'];
    $prodn=$_POST['Prod'];
    $q="INSERT INTO `shipment`(`MarketID`,`ProductID`) VALUES ('$mark','$prodn')";
    $run=mysqli_query($con,$q);
    if($run){
    
        echo"<script> alert('shipment is Succesfully confirmed'); window.location.href='../tables/showshipment.php' </script>";
    }
    else{

        echo mysqli_error($con);
    }
}

?>

