<?php
session_start(); 
include "connection.php";
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="../index.php"><img class="logo-img" src="../assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" type="email" placeholder="Username" name="email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="pass" type="password" placeholder="Password">
                    </div>
                    
                       <input type="submit" name="btn_submit" class="btn btn-primary btn-user btn-block" value="Login">                    
               
                </form>
            </div>
          
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>
<?php
if(isset($_POST["btn_submit"]))
{
$c="SELECT * FROM sign_up WHERE Email = '".$_POST['email']."' AND Password = '".md5($_POST['pass'])."' ";

    $query = mysqli_query($cn,$c);
if($result = mysqli_fetch_array($query))
{
    $_SESSION['login'] = $result['Name'];
    $_SESSION['uid'] = $result['id'];
    echo "<script>window.location.assign('http://localhost:82/project/Admin/')</script>";
  }
  else{
   echo "<script>alert('Email or Password is incorrect');</script>";
  }

}
?>