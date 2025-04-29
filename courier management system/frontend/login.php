<?php

session_start();
include '../backend/db.php';


$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roleId = 6;


    $sql = "SELECT user_id, name, password, role_id FROM user WHERE email = '$email' AND role_id = '$roleId'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['userId'] = $user['user_id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['profile_picture'] = $user['profile_picture'];
        $_SESSION['role_id'] = $user['role_id'];
        $_SESSION['userlogin'] = true;

        if ($user['role_id'] == 6) {
            header("Location: index.php");
        } else {
            echo "Invalid";
        }
        exit();
    } else {
        $showError = 'Invalid Credentials';
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
                <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <span class="heading">please login</span>
                    <div class="form-group">
                        <input required="" name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input required="" name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <div class="main-checkbox">
                            <input value="None" id="checkbox1" name="check" type="checkbox">
                            <label for="checkbox1"></label>
                        </div>
                        <span class="text">Remember me</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">login</button>
                    </div>
                    <?php
                    if ($showError) {
                        echo '<div class="alert alert-danger bg-dark text-center" role="alert">
                    ' . $showError . '
                     </div>';
                    }
                    ?>
                    <div class="form-group link-box">
                        <span class="text1">New in this site ? <a href="register.php">Create New Account</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>