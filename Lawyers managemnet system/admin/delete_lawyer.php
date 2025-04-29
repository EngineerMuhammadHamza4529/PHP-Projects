<?php

include "db.php";
$id = $_GET['user_id'];
$sql = "DELETE from Registration where user_id = '$id'";
$result=mysqli_query($conn,$sql);
header("location:index.php");
?>