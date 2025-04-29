<?php
include("db.php");

if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    // Correctly assign the user_id from the GET request
    $user_id = intval($_GET['user_id']);

    // Prepare the SQL statement to prevent SQL injection
    $sql = "DELETE FROM registration WHERE user_id = $user_id";

    // Execute the query and check for success
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('User deleted successfully!'); window.location.href = 'view_user.php';</script>";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid user ID.";
}
?>