<!DOCTYPE html>
<html lang="en">
<?php
 include('tablesheader.php');
 include('Connect.php');
$q='select * from products ';
$rows=mysqli_query($con,$q);?>

<body>
  <div class="container-scroller col-lg-12">
   
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product's table</li>
              </ol>
            </nav>
          </div>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Product's table</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                    <a href='../forms/ProductsForm.php' ><input type="button" value="ADD NEW +" class="btn btn-primary mr-2"/></a>
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product status</th>
                            <?php if($_SESSION['ROL']==8) { ?>
                            <th>Update</th>
                            <th>Delete</th>
                            <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                  $counter=1;
                  while ($data=mysqli_fetch_assoc($rows)) {
                    
                  ?>
                        <tr>
                        <td><?php echo $counter++ ?></td>
                            <td><?php echo $data['ProductCode']?></td>
                            <td><?php echo $data['ProductName']?></td>
                            <td ><img src="<?php echo $data['UserImage']?>" ></td>
                            <td><?php echo $data['status']?></td>


                            <?php if($_SESSION['ROL']==8) { ?>

                            <td><a href="userupdate.php?eyeD=<?php echo $data['UserID']?>"><button class="btn btn-outline-info">Update</button></a></td>
                            <td><a href="userdelete.php?eyeD=<?php echo $data['UserID']?>"><button class="btn btn-outline-danger">Delete</button></a></td>
                         <?php } ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
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
  <script src="../../js/data-table.js"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:41 GMT -->
</html>
