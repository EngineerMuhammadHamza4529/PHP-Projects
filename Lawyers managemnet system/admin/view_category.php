<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: signin.php");
    exit;
}
?>
<?php
    include("db.php"); 
    include("header.php"); 
 ?>
   <!-- Table Start -->
   <div class="container-fluid pt-4 px-4">
      <div class="row g-4">
         <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
               <h1>Categories List</h1>
               <table class="table">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Category Details</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                    
                        $sql = "SELECT * FROM categories";
                        
                        
                        if (isset($_GET['query'])) {
                            $search = mysqli_real_escape_string($conn, $_GET['query']);
                        
                            $sql .= " WHERE category_name LIKE '%$search%'
                                      OR category_details LIKE '%$search%'";
                        }
                        
                        $result = mysqli_query($conn, $sql);
                        
                        if(mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                     <tr>
                        <td><?php echo $row['category_id']; ?></td>
                        <td><?php echo $row['category_name']; ?></td>
                        <td><?php echo $row['category_details']; ?></td>
                        <td>
                        <button class='btn btn-warning'>  <a class='text-light' href="edit_category.php?category_id=<?php echo $row['category_id']; ?>">Edit</a></button>
                        <button class='btn btn-danger'>   <a class='text-light' href="delete_category.php?category_id=<?php echo $row['category_id']; ?>">Delete</a></button>
                        </td>
                     </tr>
                     <?php
                        }
                        }
                        
                        else
                        {
                        
                        echo "<tr><td colspan='4'>No categories found</td></tr>";
                        }
                        
                        mysqli_close($conn);
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

<?php include 'footer.php' ?>