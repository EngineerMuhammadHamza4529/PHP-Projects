<?php
include 'db.php';



if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
    $category_id = $_GET['category_id'];


    $delete_sql = "DELETE FROM categories WHERE category_id = $category_id";


    if (mysqli_query($conn, $delete_sql)) {
   
        header("Location: view_category.php");
        exit();
    } else {
        echo 'Error deleting category: ' . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo 'Category ID not found.';
}
?>