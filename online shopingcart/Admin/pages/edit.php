<?php
  include "connection.php";
  $query = mysqli_query($cn,"Select * from role");
  $query1 = mysqli_query($cn,"Select * From sign_up where id='".$_GET['id']."'");
  while($result = mysqli_fetch_array($query1)){

?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online shoping cart</title>
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
                    <input class="form-control form-control-lg" type="text"  required="" name="name" placeholder="Full Name" autocomplete="" value="<?= $result['Name'] ?>">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email"  required="" name="email" placeholder="Email" autocomplete="" value="<?= $result['Email'] ?>">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" required="" name="pass" placeholder="Password" value="">
                </div>
                 

                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" name="btn_submit" type="submit">Update</button>
                </div>
               
                
            </div>
           
        </div>
    </form>
</body>

 
</html>
<?php 
if(isset($_POST["btn_submit"]))
{
    
$a="UPDATE `sign_up` SET `Name`='".$_POST['name']."',`Email`='".$_POST['email']."',`Password`='".md5($_POST['pass'])."' WHERE `id`='".$_GET['id']."'";
// $a="update  `sign_up` set `id`='".$_GET['id']."' (Name,Email,Password) VALUES ('".$_POST['name']."','".$_POST['email']."','".md5($_POST['pass'])."') ";

mysqli_query($cn,$a);

echo "<script>alert('Update sucessecfull...!')</script>";
header("location:data-tables.php");
}
  }
?>

