<!DOCTYPE html>
<html lang="en">
<?php

include('tablesheader.php');
 include('Connect.php');
 $id=$_GET['eyeD'];

 $q="select * from roles";
 $rows=mysqli_query($con,$q);
 //testing
 $q1="select * from users where UserID='$id' ";
 $rows1=mysqli_query($con,$q1);
 $data1=mysqli_fetch_assoc($rows1);
 $dep=$data1['RoleID'];

?>
<body>
  <div class="container-scroller col-lg-12">
  
      <div class="main-panel ">        
        <div class="content-wrapper ">
          <div class="page-header">
            <h3 class="page-title">
            LABIFY FORMS
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../../Index.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Roles Form</li>
                </ol>
            </nav>
          </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">USER's FORM</h4>
                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Select Role For user</label>
                    <select name="rolee" class="js-example-basic-single w-100">
                    <?php while ($data=mysqli_fetch_assoc($rows)) {?>
                      <option value="<?php echo $data['RoleID']?>" <?php if($data['RoleName'] == $dep){ echo "selected"; } ?>><?php echo $data['RoleName']?></option>
                      <?php }?>
                    </select>    
                  </div>
                    <div class="form-group">
                      <label for="exampleInputName1">User Name</label>
                      <input type="text" value="<?php echo $data1['UserName']; ?>" name="usr_n" class="form-control" id="exampleInputName1" placeholder="Enter user Name">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputName1">Email Address</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                      </div>
                      <input type="text" value="<?php echo $data1['UserEmail']; ?>" name="usr_em" class="form-control" placeholder="example@xyz.com" aria-label="email">
                    </div>
                  </div>
                  <div class="form-group">
                      <label>Phone:</label>
                      <input class="form-control"   name="usr_con" data-inputmask="'alias': 'phonebe'" />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" value="<?php echo $data1['UserPassword']; ?>" name="usr_pas" class="form-control" id="exampleInputPassword4" placeholder="Password">
                    </div>
                    <div class="card">
                         <div class="card-body">
                         <h4 class="card-title">Upload Image(Optional)</h4>
                         <input type="file"  name="usr_img" class="dropify"  data-max-file-size="30kb">
                         <img id="Userimg" src="<?php echo $data1['UserImage']; ?>">
                          </div>
                    </div>
                    <input type="submit" name="usr_up" class="btn btn-primary mr-2"/>
                    <a href='RolesForm.php'><button class="btn btn-light">Cancel</button></a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
    <!-- Custom js for drpify page-->
    <script src="../../js/dropify.js"></script>
  <!-- End custom js for drpify page-->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:07:34 GMT -->
</html>
<?php
include('Connect.php');
if(isset($_POST['usr_up']))
{
  $u_name=$_POST['usr_n'];
  $u_cont=$_POST['usr_con'];
  $u_email=$_POST['usr_em'];
  $u_pass=$_POST['usr_pas'];
  $image = $_FILES['usr_img']['name'];
  $imgtn = $_FILES['usr_img']['tmp_name'];
  $imgty = $_FILES['usr_img']['type'];
  $imgsi =$_FILES['usr_img']['size'];
  $folder ="../../images";
  if ($imgty=="image/png" || $imgty=="image/png" || $imgty=="image/jpg" || $imgty=="image/jpeg" || $imgty=="image/jfif" ) {
      if ($imgsi<=1000000) {
          $path =$folder.$image;
         $imgq="UPDATE users SET `UserName`='$u_name',`UserContatct`='$u_cont',`UserEmail`='$u_email',`UserPassword`='$u_pass', `UserImage`='$path' WHERE UserID='$id'";
  $run= mysqli_query($con,$imgq);
         move_uploaded_file($imgtn,$path);
         if ($run) {
            echo "<script> alert('New User Added '); window.location.href='showusers.php' </script>";
         }
         else{
             echo mysqli_error($con);
         }  
         }
         else{
            echo"<script> alert('The picture you choose its too large');  </script>";
        }
  }
  else{
    echo"<script> alert('Wrong format'); window.location.href='showusers.php' </script>";
}

}

?>