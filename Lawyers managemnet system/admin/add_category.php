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
    $category_name = $_POST['c_name'];
    $category_description = $_POST['c_description'];


    $sql = "INSERT INTO `categories`(`category_name` , `category_details`) VALUES (' $category_name' , '$category_description')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Category added successfully!'); window.location.href = 'view_category.php';</script>";
    } else {
        echo "Category Not Found!: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Category</h6>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label  class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="c_name">
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Category Description</label>
                                    <input type="text" class="form-control" name="c_description">
                                </div>

                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
              
                </div>
            </div>
            <!-- Form End -->

            <?php include 'footer.php'; ?>

