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

$category_id = "";
$category_name = "";
$category_description = "";

if (isset($_GET["category_id"]) && !empty($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    $sql = "SELECT * FROM categories WHERE category_id = $category_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $category_name = $row['category_name'];
        $category_description = $row['category_details'];
    } else {
        echo "Category not found";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = $_POST['name'];
    $new_description = $_POST['description'];

    // Update category name
    $update_sql = "UPDATE `categories` SET `category_name`='$new_name', `category_details`='$new_description' WHERE category_id = $category_id";

    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Category Updated successfully!'); window.location.href = 'view_category.php';</script>";
    } else {
        echo "Category Not Updated!: " . $update_sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>


    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Category</h6>
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Category Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($category_name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Category Details:</label>
                            <input type="text" class="form-control" id="description" name="description" value="<?php echo htmlspecialchars($category_description); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Category</button>
                        <a href="view_category.php" class="btn btn-secondary mt-3">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->

<?php include 'footer.php'; ?>