<?php
include '../backend/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $password = $_POST['password'];  
    $role = 6;
    
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $file_name = $_FILES['profile_picture']['name'];
    $file_tmp = $_FILES['profile_picture']['tmp_name'];
    $file_type = $_FILES['profile_picture']['type'];
    $file_size = $_FILES['profile_picture']['size'];
    
    $upload_dir = "../backend/uploads-images/";

    if (!empty($file_name)) {
        if ($file_type == "image/png" || $file_type == "image/jpg" || $file_type == "image/jpeg") {
            if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
                $profile_picture = $file_name;
            } else {
                echo "<script>alert('Error uploading image');</script>";
                exit();
            }
        } else {
            echo "<script>alert('Invalid image format');</script>";
            exit();
        }
    } else {
        $profile_picture = "";
    }
    


     $sql = "INSERT INTO user (name, email, password, profile_picture, role_id) VALUES ('$name', '$email', '$hashed_password', '$profile_picture', '$role')";

     if (mysqli_query($conn, $sql)) {
         header("Location: login.php");
     } else {
         echo "Error: " . mysqli_error($conn);
     }

    
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login-style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <title>COURIER</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST"  enctype="multipart/form-data">
                <span class="heading">please Register</span>
                <div class="form-group">
                    <input required="" name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <input required="" name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                    <input required="" name="password" type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <input required="" name="profile_picture" type="file" class="form-control" placeholder="Profile picture">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Register</button>
                </div>
                <div class="form-group link-box">
                    <span class="text1">Already hava an account ? <a href="login.php">Login</a></span>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>