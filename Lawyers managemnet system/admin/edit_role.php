<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: signin.php");
    exit;
}
?>
<?php
include 'db.php';
include 'header.php';

$role_id = "";
$role_type = "";

if (isset($_GET["role_id"]) && !empty($_GET['role_id'])) {
    $role_id = $_GET['role_id'];

    $sql = "SELECT * FROM roles WHERE role_id = $role_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $role_id = $row['role_id'];
        $role_type = $row['role_type'];
    } else {
        echo "Role not found";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role_id = $_POST['role_id'];
    $role_type = $_POST['role_type'];

    // Update category name
    $update_sql = "UPDATE `roles` SET `role_id`='$role_id', `role_type`='$role_type' WHERE role_id = $role_id";

    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Role Updated successfully!'); window.location.href = 'view_role.php';</script>";
    } else {
        echo "role Not Updated!: " . $update_sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>


    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Role</h6>
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Role ID:</label>
                            <input type="text" class="form-control" id="name" name="role_id" value="<?php echo htmlspecialchars($role_id); ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Role Type:</label>
                            <input type="text" class="form-control" id="description" name="role_type" value="<?php echo htmlspecialchars($role_type); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Role</button>
                        <a href="view_role.php" class="btn btn-secondary mt-3">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->

<?php include 'footer.php'; ?>