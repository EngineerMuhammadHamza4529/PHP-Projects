<?php

include "../admin/db.php";
$id = $_GET['id'];
$sql = "UPDATE Appointments  set status='Done' where id = '$id'";
$result=mysqli_query($conn,$sql);
header("location:lawyer_dashboard.php");
?>