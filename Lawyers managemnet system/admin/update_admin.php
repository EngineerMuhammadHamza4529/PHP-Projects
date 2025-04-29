<?php
session_start();
include 'db.php';

if (isset($_SESSION['role']) && $_SESSION['role'] == 1) 

    $user_id = $_SESSION['uId'];

    if (isset($_POST['update_profile'])) {

        $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
        $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

        // Update name and email
        $update_query = "UPDATE users SET name = '$update_name', email = '$update_email' WHERE user_id";
        mysqli_query($conn, $update_query) or die('Query failed: ' . mysqli_error($conn));

        // Handle password update
        $old_pass = $_POST['old_pass'];
        $update_pass = $_POST['update_pass'];
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];

        if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
            if (!password_verify($update_pass, $old_pass)) {
                $message[] = 'Old password does not match!';
            } elseif ($new_pass !== $confirm_pass) {
                $message[] = 'Confirm password does not match!';
            } else {
                $hashed_new_pass = password_hash($confirm_pass, PASSWORD_BCRYPT);
                mysqli_query($conn, "UPDATE users SET password = '$hashed_new_pass' WHERE user_id") or die('Query failed');
                $message[] = 'Password updated successfully!';
            }
        }

        // Handle profile picture upload
        if (isset($_FILES['update_image']) && $_FILES['update_image']['error'] == 0) {
            $update_image = $_FILES['update_image']['name'];
            $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
            $update_image_folder = '../uploads-images/' . basename($update_image);

            $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp', 'image/jfif', 'image/gif', 'image/tiff'];
            $file_type = $_FILES['update_image']['type'];

            if (in_array($file_type, $allowed_types)) {
                if (($update_image_tmp_name)) {
                    mysqli_query($conn, "UPDATE users SET profile_picture = '$update_image' WHERE user_id") or die('Query failed');
                    $message[] = 'Image updated successfully!';
                    $_SESSION['profile_picture'] = $update_image; // Update session with new profile picture
                } else {
                    $message[] = 'Error uploading image.';
                }
            } else {
                $message[] = 'Invalid image format.';
            }
        }
    }

    // Fetch user data
    $select = mysqli_query($conn, "SELECT * FROM users WHERE user_id") or die('Query failed: ' . mysqli_error($conn));

    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
    } else {
        echo 'No user found with the specified user_id.';
    }

    include 'header.php';

?>
<div class="d-flex flex-column">
    <div class="update-profile">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Update Profile</h6>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">User Name</label>
                                <input type="text" name="update_name" value="<?php echo htmlspecialchars($fetch['name']); ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Your Email</label>
                                <input type="email" name="update_email" value="<?php echo htmlspecialchars($fetch['email']); ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Update Your Pic</label>
                                <input type="file" name="update_image" accept="image/*" class="form-control">
                            </div>
                            <div class="inputBox">
                                <input type="hidden" name="old_pass" value="<?php echo htmlspecialchars($fetch['password']); ?>">
                                <label class="form-label">Old Password</label>
                                <input type="password" name="update_pass" placeholder="Enter previous password" class="form-control">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_pass" placeholder="Enter new password" class="form-control">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_pass" placeholder="Confirm new password" class="form-control">
                                <input type="submit" value="Update Profile" name="update_profile" class="btn btn-success pt-2 mt-2">
                                <a href="index.php" class="btn btn-danger pt-2 mt-2">Go Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include 'footer.php';
?>
