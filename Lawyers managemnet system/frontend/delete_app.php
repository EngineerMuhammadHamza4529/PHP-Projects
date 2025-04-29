<?php
include("../admin/db.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Correctly assign the user_id from the GET request
    $user_id = intval($_GET['id']);

    // Prepare the SQL statement to prevent SQL injection
    $sql = "DELETE FROM appointments WHERE id = $user_id";

    // Execute the query and check for success
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Appointment deleted successfully!'); window.location.href = 'lawyer_dashboard.php';</script>";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid user ID.";
}
?>