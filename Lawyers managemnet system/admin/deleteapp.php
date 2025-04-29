<?php
include "db.php";
$id = $_GET['id'];
$sql = "DELETE from Appointments where id = '$id'";
$result=mysqli_query($conn,$sql);
header("location:appointment.php");
?>
