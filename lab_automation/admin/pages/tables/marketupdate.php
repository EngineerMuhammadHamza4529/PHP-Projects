<!DOCTYPE html>
<html lang="en">
<?php

include('tablesheader.php');
 include('Connect.php');
 $id=$_GET['eyeD'];
 $q="select * from Markets where MarketID='$id'";
 $rows=mysqli_query($con,$q);
 $data=mysqli_fetch_assoc($rows);
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
                <li class="breadcrumb-item active" aria-current="page">Market Form</li>
                </ol>
            </nav>
          </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">MARKET FORM</h4>
                  <form class="forms-sample" method="POST" action="">
                    <div class="form-group">
                      <label for="exampleInputName1">Market Name</label>
                      <input type="text" value="<?php echo $data['MarketName']; ?>"  name="market" class="form-control" id="exampleInputName1" placeholder="Enter Market Name">
                    </div>
                    <input type="submit" name="mrk_up" class="btn btn-primary mr-2"/>
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
if(isset($_POST['mrk_up']))
{
 $mark=$_POST['market'];
  $q="Update Markets SET MarketName='$mark'where MarketID='$id'";
  $run=mysqli_query($con,$q);
    if($run){

        echo"<script> alert('Record is Succesfully Updated'); window.location.href='showmarkets.php' </script>";
    }

    else{

        echo"<script> alert('Failed') </script>";
    }
}

?>
