<!DOCTYPE html>
<html lang="en">
<?php

 include('Headerform.php');
 include('Connect.php')
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
                <li class="breadcrumb-item active" aria-current="page">Products Form</li>
                </ol>
            </nav>
          </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">PRODUCT's FORM</h4>
                  <form class="forms-sample" action="productinsert.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Product Code</label>
                      <input type="text" name="prodcode" class="form-control" id="exampleInputName1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Product Name</label>
                      <input type="text"name="prodname"  class="form-control" id="exampleInputName1" placeholder="Enter Product Name">
                    </div>
                    <div class="card">
                         <div class="card-body">
                         <h4 class="card-title">Upload Image</h4>
                         <input type="file" name="prodimg"  class="dropify" data-max-file-size="1024mb" />
                          </div>
                    </div>
                    <input type="submit"  name="prodsuBMIT" class="btn btn-primary mr-2"/>
                    <a href='../tables/showproducts.php' ><input type="button" value="VIEW" class="btn btn-light"/></a> 
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
