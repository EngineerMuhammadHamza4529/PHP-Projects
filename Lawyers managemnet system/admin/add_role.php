<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: signin.php");
    exit;
}
?>
<?php
include 'db.php';
include 'header.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role_id = $_POST['role_id'];
    $role_type = $_POST['role_type'];


    $sql = "INSERT INTO `roles`(`role_id` , `role_type`) VALUES (' $role_id' , '$role_type')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Role added successfully!'); window.location.href = 'view_role.php';</script>";
    } else {
        echo "Role Not Found!: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>


 

     <!-- Form Start -->
     <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Role</h6>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label  class="form-label">Role ID</label>
                                    <input type="text" class="form-control" name="role_id">
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Role Type</label>
                                    <input type="text" class="form-control" name="role_type">
                                </div>

                                <button type="submit" class="btn btn-primary">Add Role</button>
                            </form>
                        </div>
                    </div>
              
                </div>
            </div>
            <!-- Form End -->


            <?php include 'footer.php' ?>
  