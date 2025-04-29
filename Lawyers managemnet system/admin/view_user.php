<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: signin.php");
    exit;
}
?>
<?php
include("db.php"); // Include your database connection file
include 'header.php';

$sql = "SELECT reg.user_id, reg.username, reg.email, reg.password, reg.lawyer_photograph, rol.role_type
        FROM registration reg
        INNER JOIN roles rol ON reg.role_id = rol.role_id
        WHERE reg.role_id = 3";

if (isset($_GET['query'])) {
    $search = mysqli_real_escape_string($conn, $_GET['query']);
    $sql .= " WHERE reg.username LIKE '%$search%'";
}

$result = mysqli_query($conn, $sql);
?>



            <!-- Form Start -->
            <div class="container-fluid pt-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
            <h1>User List</h1>
            <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
               <thead>
                  <tr>
                     <th>User_ID</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Profile_Picture</th>
                     <th>Role_Type</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  // Assuming $result is already set with a valid SQL query result
                  if (mysqli_num_rows($result) > 0) {
                     while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['user_id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>";
                        if (!empty($row['lawyer_photograph'])) {
                           echo "<img src='uploads-images/" . $row['lawyer_photograph'] . "' alt='Profile Picture' style='width: 50px; height: 50px;'>";
                        } else {
                           echo "No image";
                        }
                        echo "</td>";
                        echo "<td>" . $row['role_type'] . "</td>";
                        echo "<td>
                               <button class='btn btn-warning'>  <a class='text-light' href='edit_user.php?user_id=" . $row['user_id'] . "'>Edit</a> </button> 
                               <button class='btn btn-danger'>  <a class='text-light' href='delete_user.php?user_id=" . $row['user_id'] . "'>Delete</a></button>
                              </td>";
                        echo "</tr>";
                     }
                  } else {
                     echo "<tr><td colspan='7'>No users found.</td></tr>";
                  }
                  ?>
               </tbody>
            </table>
            </div>
         </div>
      </div>
   </div>
</div>

            <!-- Form End -->


        <?php include 'footer.php' ?>