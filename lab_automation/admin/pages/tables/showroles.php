<!DOCTYPE html>
<html lang="en">
<?php
include('Connect.php');
 include('tablesheader.php');
$q='select * from roles';
$rows=mysqli_query($con,$q);
?>
<body>
  <div class="container-scroller col-lg-12">
   
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              LABIFY TABLES
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Role's table</li>
              </ol>
            </nav>
          </div>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Role's table</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                    <a href='../forms/RolesForm.php' ><input type="button" value="ADD NEW +" class="btn btn-primary mr-2"/></a>
                      <thead>
                    
                        <tr>
                            <th>#</th>
                            <th>Roles</th>
                            <th>Update</th>
                            <th>Delete</th>
                            
                        </tr>
                      </thead>
                      
                      <tbody>
                        
                      <?php 
                  $counter=1;
                  while ($data=mysqli_fetch_assoc($rows)) {
                    
                  ?>
                        <tr>
                            <td><?php echo $counter++ ?></td>
                            <td><?php echo $data['RoleName']?></td>
                            <td><a href="rolesupdate.php?eyeD=<?php echo $data['RoleID']?>"><button class="btn btn-outline-info">Update</button></a></td>
                            <td><a href="rolesdelete.php?eyeD=<?php echo $data['RoleID']?>"><button class="btn btn-outline-danger">Delete</button></a></td>
                         
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
