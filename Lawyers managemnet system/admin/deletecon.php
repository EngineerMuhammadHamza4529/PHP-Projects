<?php
include "db.php";
$id = $_GET['id'];
$sql = "DELETE from contact where id = '$id'";
$result=mysqli_query($conn,$sql);
header("location:index.php");
?>
