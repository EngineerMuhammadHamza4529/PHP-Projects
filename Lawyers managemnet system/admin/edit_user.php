<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: signin.php");
    exit;
}
?>
<?php
include("db.php"); 
include("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];

    // Initialize file_name variable
    $file_name = '';

    // Check if an image file is uploaded
    if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $upload_dir = "uploads-images/";

        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
            // Update with image
            $sql = "UPDATE registration SET username='$name', email='$email', password='$password', lawyer_photograph='$file_name', role_id='$role_id' WHERE user_id = $user_id";
        } else {
            echo "Could not upload file.";
            exit;
        }
    } else {
        // Update without image
        $sql = "UPDATE registration SET username='$name', email='$email', password='$password', role_id='$role_id' WHERE user_id = $user_id";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('user Updated successfully!'); window.location.href = 'view_user.php';</script>";

    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
} else {
    // Fetch product details for editing
    $user_id = $_GET['user_id'];
    $sql = "SELECT * FROM registration WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "Product not found.";
        exit();
    }

    // Fetch categories for the dropdown
    $sql_roles = "SELECT * FROM roles";
    $roles_result = mysqli_query($conn, $sql_roles);
}
?>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 ">
                        <div class="bg-light rounded h-100 p-4">
    <h1>Edit User</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
        <div class="form-group">
            <label for="pname">Name:</label>
            <input type="text" class="form-control" id="pname" name="name" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required>
        </div>
        <div class="form-group">
            <label for="image">Profile Picture:</label>
            <input type="file" class="form-control" id="image" name="image">
            <?php if (!empty($user['lawyer_photograph'])): ?>
                <p>Current picture: <img src="uploads-images/<?php echo htmlspecialchars($user['lawyer_photograph']); ?>" alt="Profile Picture" style="width: 50px; height: 50px;"></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="role_id">Select Role:</label>
            <select class="form-control" id="role_id" name="role_id" required>
                <?php
                while ($row = mysqli_fetch_assoc($roles_result)) {
                    $selected = $row['role_id'] == $user['role_id'] ? 'selected' : '';
                    echo "<option value='" . htmlspecialchars($row['role_id']) . "' $selected>" . htmlspecialchars($row['role_type']) . "</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
            </div>
            </div>
            </div>

<?php include 'footer.php'; ?>