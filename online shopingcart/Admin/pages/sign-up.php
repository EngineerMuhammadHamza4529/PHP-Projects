<?php
  include "connection.php";
  $query = mysqli_query($cn,"Select * from role");
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
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
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Registrations Form</h3>
                <p>Please enter your user information.</p>
            </div>
            <div class="card-body">
               
                 <div class="form-group">
                    <input class="form-control form-control-lg" type="text"  required="" name="name" placeholder="Full Name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email"  required="" name="email" placeholder="Email" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" type="password" required="" name="pass" placeholder="Password">
                </div>
                 <div class="form-group">
                 	  <select class="form-control" name="sel_role">
                      <option>Select User Role</option>
                      <?php
                        while($result = mysqli_fetch_array($query)){
                          echo '<option value="'.$result['id'].'">'.$result['user_type'].'</option>';
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg"  type="file" required="" name="pics" placeholder="Profile Pic">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" name="btn_submit" type="submit">Register My Account</button>
                </div>
               
                
            </div>
           
        </div>
    </form>
</body>

 
</html>
<?php 
if(isset($_POST["btn_submit"]))
{
$c="SELECT * FROM sign_up WHERE Email = '".$_POST['email']."'";
if(!$c)
{
    echo "<script>alert('Registration Failed')</script>";

    echo "<script>alert('Email is Already Exist in our database')</script>";
}
else
{
$a="INSERT INTO sign_up(Name,Email,Password,user_role) VALUES ('".$_POST['name']."','".$_POST['email']."','".md5($_POST['pass'])."','".$_POST['sel_role']."')";
mysqli_query($cn,$a);
move_uploaded_file($_FILES["pics"]["tmp_name"],"uploads/".mysqli_insert_id($cn).".jpeg");

echo "<script>alert('Registration sucessecfull...!')</script>";
header("location:login.php");
}
}

?>

