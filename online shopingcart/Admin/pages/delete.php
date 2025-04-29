<?php
include "connection.php";
$a=mysqli_query($cn,"Delete from sign_up where id='".$_GET['id']."'");
echo "<script>alert('Done...!');

</scrript>";
header("location:data-tables.php");
?>