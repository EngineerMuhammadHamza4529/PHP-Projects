<?php
include 'db.php';



if (isset($_GET['role_id']) && !empty($_GET['role_id'])) {
    $role_id = $_GET['role_id'];


    $delete_sql = "DELETE FROM roles WHERE role_id = $role_id";


    if (mysqli_query($conn, $delete_sql)) {
   
        header("Location: view_role.php");
        exit();
    } else {
        echo 'Error deleting Role: ' . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo 'Role ID not found.';
}
?>