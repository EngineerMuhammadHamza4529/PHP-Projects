<!DOCTYPE html>
<html lang="en">
<?php
 include('HeaderIndex.php');

 include('Connect.php');
 $sql1 = "SELECT COUNT(*) AS total_usr FROM `Users`";
  $result1 = mysqli_query($con, $sql1);
  $row1 = mysqli_fetch_object($result1);

  $sql2 = "SELECT COUNT(*) AS total_pro FROM `products`";
  $result2 = mysqli_query($con, $sql2);
  $row2 = mysqli_fetch_object($result2);


  $sql3 = "SELECT COUNT(*) AS total_tst FROM `Testing`";
  $result3 = mysqli_query($con, $sql3);
  $row3 = mysqli_fetch_object($result3);



?>
<body>
 
   <!-- partial -->
   <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              DASHBOARD
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Sample pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pricing Table</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="container text-center pt-5">
                    <h4 class="mb-3 mt-5">Start up your Bussiness today</h4>
                    <p class="w-75 mx-auto mb-5">Choose a plan that suits you the best. If you are not fully satisfied, we offer 30-day money-back guarantee no questions asked!!</p>
                    <div class="row pricing-table">
                      <div class="col-md-4 grid-margin stretch-card pricing-card">
                        <div class="card border-primary border pricing-card-body">
                          <div class="text-center pricing-card-head">
                            <h4>EMPLOYEES</h4>
                           
                            <h1 class="font-weight-normal mb-4"><?php   echo $row1->total_usr; ?></h1>
                          </div>
                         
                          <div class="wrapper">
                            <a href="pages/tables/showusers.php" class="btn btn-outline-primary btn-block">View</a>
                          </div>
                          <p class="mt-3 mb-0 plan-cost text-gray">We appricate our employess</p>
                        </div>
                      </div>
                      <div class="col-md-4 grid-margin stretch-card pricing-card">
                        <div class="card border border-success pricing-card-body">
                          <div class="text-center pricing-card-head">
                            <h3 class="text-success">Products</h3>
                          
                            <h1 class="font-weight-normal mb-4"><?php   echo $row2->total_pro; ?></h1>
                          </div>
                          
                          <div class="wrapper">
                            <a href="pages/tables/showproducts.php" class="btn btn-success btn-block">View</a>
                          </div>
                          <p class="mt-3 mb-0 plan-cost text-success">only tested products are approved</p>
                        </div>
                      </div>
                      <div class="col-md-4 grid-margin stretch-card pricing-card">
                        <div class="card border border-primary pricing-card-body">
                          <div class="text-center pricing-card-head">
                            <h3>Testing Methods</h3>
                            
                            <h1 class="font-weight-normal mb-4"><?php   echo $row3->total_tst; ?></h1>
                          </div>
                          
                          <div class="wrapper">
                            <a href="pages/tables/showtesting.php" class="btn btn-outline-primary btn-block">View</a>
                          </div>
                          <p class="mt-3 mb-0 plan-cost text-gray">our testing methods are reliable</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->


  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>


</html>
