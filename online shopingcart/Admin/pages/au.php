<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Tables</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
       <?php include "navbar.php";?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
       <div class="nav-left-sidebar sidebar-dark">
      <?php include "left side bar.php";?>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Product </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- ============================================================== -->
        <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <form method="post"  enctype="multipart/form-data">
                   
                    <div class="body">
                    <h2>First </h2>
                        <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="logo" placeholder="about1">
                        </div>
                            <input type="text" class="form-control" name="he1" placeholder="Heading 1">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="p1" placeholder="Paragraph 1">
                        </div>
                        
                        
                        <button class="btn btn-primary btn-block waves-effect waves-light" name="btn_submit" type="submit">Change</button>

                        

                    </div>
                </form>
                
            </div>
            
            <div class="col-lg-12 col-sm-12">
                <form method="post"  enctype="multipart/form-data">
                   
                    <div class="body">
                    <h1></h1>
                    <h2>Second </h2>

                        <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="logo1" placeholder="about2">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="he2" placeholder=" Heading 2">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="p2" placeholder="Paragraph 2">
                        </div>
                        
                        <button class="btn btn-primary btn-block waves-effect waves-light" name="btn_submit1" type="submit">Change</button>

                        

                    </div>
                </form>
                
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    
</body>
 
</html>
<?php 
if(isset($_POST["btn_submit"]))
{
$a=$_POST['he1'];
$a1=$_POST['p1'];




move_uploaded_file($_FILES["logo"]["tmp_name"],"project/12/img/about1.jpg");
echo "<script>alert('About Updated sucessecfully...!')</script>";

}

?>
<?php 
if(isset($_POST["btn_submit1"]))
{

$b=$_POST['he2'];
$b2=$_POST['p2'];



move_uploaded_file($_FILES["logo1"]["tmp_name"],"project/12/img/about2.jpg");
echo "<script>alert('About Updated sucessecfully...!')</script>";

}

?>