<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online Shopping cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
<?php include "navbar.php";  ?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
      <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
               <?php include "left side bar.php";?>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Add Products </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Products</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-16 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <form method="post"  enctype="multipart/form-data">
                   
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="pn" placeholder="Product Name">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="pt" placeholder="Product Title">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="pd" placeholder="Product Description">
                        </div>
                        <div class="form-group">
                 	  <select class="form-control" name="cat">
                      <option>Select Category Of Product</option>
                      <?php
                      include "connection.php";
                      $query = mysqli_query($cn,"Select * from tbl_prd_category");                    
                        while($result = mysqli_fetch_array($query)){
                          echo '<option value="'.$result['code'].'">'.$result['prd_category'].'</option>';
                        }
                      ?>
                       </select>
                  </div>
                

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="pp" placeholder="Product Price">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="pic" placeholder="Product pic">
                        </div>

                        <button  class="btn btn-primary btn-block waves-effect waves-light" name="btn_submit" type="submit"> <a href="./product.php">Add</a></button>

                        

                    </div>
                </form>
                
            </div>
            
        </div>
    </div>
</div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
</body>
 
</html>
<?php include("connection.php"); 
if(isset($_POST["btn_submit"]))
{
    $cnt=""; 
    $ft=mysqli_query($cn,"Select max(right(prd_id,5)) XT from tbl_product where left(prd_id,2)='".$_POST["cat"]."'");
     if($ty=mysqli_fetch_array($ft))
     {
         $cnt=$ty["XT"]; $cnt++; 
        if($cnt>0 && $cnt<=9) 
        { $cnt="0000".$cnt; } 
        else if($cnt>9 && $cnt<99)
        { $cnt="000".$cnt; }
        else if($cnt>99 && $cnt<999)
        { $cnt="00".$cnt; }
        else if($cnt>999 && $cnt<9999)
        { $cnt="0".$cnt; }
        else if($cnt>9999 && $cnt<99999)
        { $cnt="".$cnt; } 
       
        $p_id= $_POST['cat'].$cnt;
        $a="INSERT INTO tbl_product (prd_name,prd_title,prd_description,prd_price,prd_cat) VALUES ('".$_POST['pn']."','".$_POST['pt']."','".$_POST['pd']."','".$_POST['pp']."','".$_POST['cat']."')";
        echo "$a";
        mysqli_query($cn,$a);
        $last_id = $cn->insert_id;
        move_uploaded_file($_FILES["pic"]["tmp_name"],"product/".$last_id.".jpeg");
        echo "<script>alert('Data Saved...!')</script>";
     }
}
     ?>

