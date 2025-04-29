<?php 
include 'db.php';
if (isset($_GET['id'])) {
    $lawyer_id = $_GET['id'];
    $sql = "UPDATE registration SET status = 'rejected' WHERE user_id = $lawyer_id";
    mysqli_query($conn, $sql);
    header("Location: index.php");
}
?>