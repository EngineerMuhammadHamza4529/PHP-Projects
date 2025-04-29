<!DOCTYPE html>
<html lang="en">
<?php

 include('Headerform.php')
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
                <li class="breadcrumb-item active" aria-current="page">Product Testing Form</li>
                </ol>
            </nav>
          </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
              <form action="" Method="POST">
                <div class="card-body">
                  <h4 class="card-title">PRODUCT TESTING FORM</h4>
                  <div class="form-group">
                  <label>Select Product</label>
                    <select class="js-example-basic-single w-100" name="products">
                  <?php 
$q="select * from products where status='pending'";
$rows=mysqli_query($con,$q);
while ($data=mysqli_fetch_assoc($rows)) {
?>
                      <option value="<?php echo $data['ProductID']?>"><?php echo $data['ProductName']?></option>
<?php } ?>
                    </select>    
                  </div>
                  <div class="form-group">
                  <label>Select Test</label>
                    <select class="js-example-basic-single w-100" name="tests">
                    <?php 
$q="select * from testing";
$rows=mysqli_query($con,$q);
while ($data=mysqli_fetch_assoc($rows)) {
?>
                      <option value="<?php echo $data['TestID']?>"><?php echo $data['TestName']?></option>
<?php } ?>
                    </select>    
                  </div>
              
                  <div class="form-group">
                      <label for="exampleTextarea1">Remarks description</label>
                      <textarea name="re" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary mr-2" name="testSubmit"/>
                    <a href='../tables/showproducttesting.php' ><input type="button" value="VIEW" class="btn btn-light"/></a> 
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
if(isset($_POST['testSubmit']))
{
    $PRO=$_POST['products'];
    $TEST=$_POST['tests'];
    $REM=$_POST['re'];
    $US=$_SESSION['ID'];



    $q="INSERT INTO `producttesting`( `ProductID`, `TestID`, `UserID`, `Remarks`) VALUES ('$PRO','$TEST','$US','$REM')";
    $run=mysqli_query($con,$q);
    if($run){
    
        echo"<script> alert('Your Remarks are inserted, Thankyou'); window.location.href='../tables/showproducttesting.php' </script>";
    }
    else{

        echo mysqli_error($con);
    }
}

?>


?>