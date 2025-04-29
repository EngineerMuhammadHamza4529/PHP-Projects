<?php 
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: signin.php");
    exit;

}

// Fetch counts for different sections
$users_query = "SELECT COUNT(*) AS user_count FROM registration WHERE role_id = 3";
$users_result = mysqli_query($conn, $users_query);
$users_count = mysqli_fetch_assoc($users_result)['user_count'];

$roles_query = "SELECT COUNT(*) AS role_count FROM roles";
$roles_result = mysqli_query($conn, $roles_query);
$roles_count = mysqli_fetch_assoc($roles_result)['role_count'];

$categories_query = "SELECT COUNT(*) AS category_count FROM categories";
$categories_result = mysqli_query($conn, $categories_query);
$categories_count = mysqli_fetch_assoc($categories_result)['category_count'];

$appointments_query = "SELECT COUNT(*) AS appointment_count FROM appointments";
$appointments_result = mysqli_query($conn, $appointments_query);
$appointment_count = mysqli_fetch_assoc($appointments_result)['appointment_count'];

$lawyers_query = "SELECT COUNT(*) AS lawyer_count FROM registration WHERE role_id = 2";
$lawyers_result = mysqli_query($conn, $lawyers_query);
$lawyers_count = mysqli_fetch_assoc($lawyers_result)['lawyer_count'];


include 'header.php';
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- Users Card -->
        <div class="col-sm-6 col-xl-4">
            <div class="shadow-lg bg-light rounded d-flex align-items-center justify-content-between p-4 shadow-sm">
                <i class="fa fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2 text-muted">Users</p>
                    <h6 class="mb-0"><?php echo $users_count; ?></h6>
                </div>
            </div>
        </div>
        <!-- Roles Card -->
        <div class="col-sm-6 col-xl-4">
            <div class="shadow-lg bg-light rounded d-flex align-items-center justify-content-between p-4 shadow-sm">
                <i class="fa fa-user-tag fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2 text-muted">Roles</p>
                    <h6 class="mb-0"><?php echo $roles_count; ?></h6>
                </div>
            </div>
        </div>
        <!-- Categories Card -->
        <div class="col-sm-6 col-xl-4">
            <div class="shadow-lg bg-light rounded d-flex align-items-center justify-content-between p-4 shadow-sm">
                <i class="fa fa-tags fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2 text-muted">Categories</p>
                    <h6 class="mb-0"><?php echo $categories_count; ?></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-4">
        <!-- Appointments Card -->
        <div class="col-sm-6 col-xl-4">
            <div class="shadow-lg bg-light rounded d-flex align-items-center justify-content-between p-4 shadow-sm">
                <i class="fa fa-calendar-check fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2 text-muted">Appointments</p>
                    <h6 class="mb-0"><?php echo $appointment_count; ?></h6>
                </div>
            </div>
        </div>

        <!-- Lawyers Card -->
        <div class="col-sm-6 col-xl-4">
            <div class="shadow-lg bg-light rounded d-flex align-items-center justify-content-between p-4 shadow-sm">
                <i class="fa fa-gavel fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2 text-muted">Lawyers</p>
                    <h6 class="mb-0"><?php echo $lawyers_count; ?></h6>
                </div>
            </div>
        </div>
    </div>

    <section class="mt-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h1>Pending Lawyer Registrations</h1>
                    <div class="table-responsive">
                        <table class="table text-dark align-middle table-bordered table-hover mb-0 bg-light">
                            <thead>
                                <tr>
                                    <th>Lawyer Name</th>
                                    <th>Email</th>
                                    <th>Qualification</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody><?php
                            $pending_lawyers_query = "SELECT * FROM registration WHERE role_id = 2 AND status = 'pending'";
                            $pending_lawyers_result = mysqli_query($conn, $pending_lawyers_query);
                            while ($row = mysqli_fetch_assoc($pending_lawyers_result)) {
                            // Display lawyer info
                            echo "<tr>
                            <td>".$row['username']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['qualification']."</td>
                            <td>
                            <a href='approve.php?id=".$row['user_id']."' class='btn btn-success'>Approve</a>
                            <a href='reject.php?id=".$row['user_id']."' class='btn btn-danger'>Reject</a>
                            </td>
                            </tr>";
                             }
                              ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="mt-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h1>Contact Us Messages</h1>
                    <div class="table-responsive">
                        <table class="table text-dark align-middle table-bordered table-hover mb-0 bg-light">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Client Email</th>
                                    <th>Subject</th>
                                    <th>Messages</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contact_query = "SELECT * FROM contact";
                                $contact_result = mysqli_query($conn, $contact_query);
                                while ($row = mysqli_fetch_assoc($contact_result)) {
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['subject']); ?></td>
                                    <td><?php echo htmlspecialchars($row['message']); ?></td>
                                    <td>
                                        <a href="deletecon.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Facts Section -->

</div>

<?php include 'footer.php'; ?>
