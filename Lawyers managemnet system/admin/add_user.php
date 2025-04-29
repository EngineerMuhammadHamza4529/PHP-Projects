<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: signin.php");
    exit;
}
?>
<?php
include("db.php");
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure the form fields are set and not empty
    if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['role_id'], $_FILES['image']['name']) &&
        !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role_id'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role_id = $_POST['role_id'];

        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];

        $upload_dir = "uploads-images/";

        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if (!empty($file_name)) {
            if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
                // Use a prepared statement to prevent SQL injection
                $stmt = $conn->prepare("INSERT INTO registration (username, email, password, lawyer_photograph, role_id) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssi", $name, $email, $hashed_password, $file_name, $role_id);

                if ($stmt->execute()) {
                    echo "<script>alert('User added successfully!'); window.location.href = 'view_user.php';</script>";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
                mysqli_close($conn);
            } else {
                echo "Failed to upload the image.";
            }
        } else {
            echo "No image file selected.";
        }
    } else {
        echo "All fields are required.";
    }
}
?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-8">
                        <div class="bg-light rounded h-100 p-4">
                            <h2 class="mb-4">Add User</h2>
                            <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="pname">Name:</label>
                <input type="text" class="form-control" id="pname" name="name" required>
            </div>

            <div class="form-group">
                <label for="price">Email:</label>
                <input type="email" class="form-control" id="price" name="email" required>
            </div>

            <div class="form-group">
                <label for="price">Password:</label>
                <input type="password" class="form-control" id="price" name="password" required>
            </div>

            <div class="form-group">
    <label for="image">Profile_Picture:</label>
    <input type="file" class="form-control" id="image" name="image" required>
</div>


            <div class="form-group">
            
                <label for="category">Select Role:</label>
           
                <select class="form-control" id="category" name="role_id" required>
                    <?php
                    
                    $sql = "SELECT role_id, role_type FROM roles";
                    $result = mysqli_query($conn, $sql);
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['role_id'] . "'>" . $row['role_type'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No role available</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
            <button type="submit" class="btn btn-primary">Add User</button>
            </div>
        </form>
                        </div>
                    </div>
              
                </div>
            </div>
            <!-- Form End -->
          


<?php include 'footer.php' ?>