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

// Check if user_id is set
if (!isset($_GET['user_id'])) {
    echo "User ID not provided.";
    exit();
}

$user_id = $_GET['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];
    $file_name = '';

    // Check if an image file is uploaded
    if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $upload_dir = "uploads-images/";

        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
            // Update with image
            $stmt = $conn->prepare("UPDATE users SET name=?, email=?, password=?, profile_picture=?, role_id=? WHERE user_id=?");
            $stmt->bind_param("ssssii", $name, $email, $password, $file_name, $role_id, $user_id);
        } else {
            echo "Could not upload file.";
            exit;
        }
    } else {
        // Update without image
        $stmt = $conn->prepare("UPDATE users SET name=?, email=?, password=?, role_id=? WHERE user_id=?");
        $stmt->bind_param("ssssi", $name, $email, $password, $role_id, $user_id);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Profile updated successfully!'); window.location.href = 'index.php';</script>";
    } else {
        echo "Error updating user: " . $stmt->error;
    }
} else {
    // Fetch user details for editing
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit();
    }

    // Fetch roles for the dropdown
    $sql_roles = "SELECT * FROM roles";
    $roles_result = mysqli_query($conn, $sql_roles);
}
?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <?php if (!empty($user['profile_picture'])) { ?>
                <img class="rounded-circle mt-5" width="150px" src="uploads-images/<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture">
            <?php } else { ?>
                <p>No profile picture available.</p>
            <?php } ?>
            <span class="font-weight-bold"><?php echo htmlspecialchars($_SESSION['name']); ?></span>
            <span class="text-black-50"><?php echo htmlspecialchars($_SESSION['email']); ?></span>
            <span> </span>
        </div>
        </div>

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form method="POST" enctype="multipart/form-data">
                <div class="row mt-3">
                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
                    <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" name="name" placeholder="User Name" value="<?php echo htmlspecialchars($user['name']); ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo htmlspecialchars($user['email']); ?>"></div>
                    <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo htmlspecialchars($user['password']); ?>"></div>
                    <div class="col-md-12"><label class="labels">Profile Picture</label><input type="file" class="form-control" name="image">
                    <?php if (!empty($user['profile_picture'])): ?>
                        <p>Current picture: <img src="uploads-images/<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture" style="width: 50px; height: 50px;"></p>
                    <?php endif; ?></div>
                    <div class="col-md-12"><label class="labels">Select Role</label>
                    <select class="form-control" id="role_id" name="role_id" required>
                    <?php
                while ($row = mysqli_fetch_assoc($roles_result)) {
                    $selected = $row['role_id'] == $user['role_id'] ? 'selected' : '';
                    echo "<option value='" . htmlspecialchars($row['role_id']) . "' $selected>" . htmlspecialchars($row['role_type']) . "</option>";
                }
                ?>
                </select></div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </div>
        </div>
    </div>
</div>
                </form>

<?php include 'footer.php'; ?>

<style>
.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>
