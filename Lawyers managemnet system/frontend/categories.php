<?php
// Include your database connection
include '../admin/db.php'; 

// Get the category ID from the URL
$category_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch category details based on category_id
$query = "SELECT category_name, category_details FROM categories WHERE category_id = $category_id";
$result = mysqli_query($conn, $query);

// Check if the category exists
if (mysqli_num_rows($result) > 0) {
    $category = mysqli_fetch_assoc($result);
    $category_name = htmlspecialchars($category['category_name']);
    $category_details = htmlspecialchars($category['category_details']);
    
    echo "<h1>$category_name</h1>";
    echo "<p>$category_details</p>";
} else {
    echo 'Category not found.';
}
?>
