<?php
include 'db.php';
// Fetch profile picture
$user_id = $_SESSION['user_id']; // Assuming user_id is stored in the session
$sql = "SELECT profile_picture FROM users WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $profile_picture = $row['profile_picture'];
} else {
    $profile_picture = null;
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Online Lawyers Application</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">
      <!-- Favicon -->
      <link href="img/favicon.ico" rel="icon">
      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com crossorigin">
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
      <!-- Icon Font Stylesheet -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <!-- Libraries Stylesheet -->
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
      <!-- Customized Bootstrap Stylesheet -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Template Stylesheet -->
      <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
      <div class="container-xxl position-relative bg-white d-flex p-0">

      <!-- Sidebar Start -->
      <div class="sidebar pe-4 pb-3">
         <nav class="navbar bg-light navbar-light">
            <a href="index.php" class="navbar-brand mx-4 mb-3">
               <h4 class="text-primary"><i class="fa fa-gavel me-2 text-primary"></i></i>Online Lawyers</h4>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
               <div class="position-relative">
               <img src="uploads-images/<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture" style="width: 40px; height: 40px; border-radius: 50%;">
                  <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
               </div>
               <div class="ms-3">
                  <h6><?php echo $_SESSION['name']; ?></h6>
                  <span>Admin</span>
               </div>
            </div>
            <div class="navbar-nav w-100">
               <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
               <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user-tag me-2"></i>Roles</a>
                  <div class="dropdown-menu bg-transparent border-0">
                     <a href="add_role.php" class="dropdown-item">Add Roles</a>
                     <a href="view_role.php" class="dropdown-item">View Roles</a>
                  </div>
               </div>
               <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-users me-2"></i>Users</a>
                  <div class="dropdown-menu bg-transparent border-0">
                     <a href="add_user.php" class="dropdown-item">Add Users</a>
                     <a href="view_user.php" class="dropdown-item">View Users</a>
                  </div>
               </div>
               <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-tags me-2"></i>Category</a>
                  <div class="dropdown-menu bg-transparent border-0">
                     <a href="add_category.php" class="dropdown-item">Add Category</a>
                     <a href="view_category.php" class="dropdown-item">View Category</a>
                  </div>
               </div>
               <a href="lawyers.php" class="nav-item nav-link"><i class="fa fa-gavel me-2"></i>Lawyers</a>
               <a href="appointment.php" class="nav-item nav-link"><i class="fa fa-calendar-check me-2"></i>Appointments</a>
               
            </div>
         </nav>
      </div>
      <!-- Sidebar End -->
      <!-- Content Start -->
      <div class="content">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
         <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0">Online Lawyers</h2>
         </a>
         <a href="#" class="sidebar-toggler flex-shrink-0">
         <i class="fa fa-bars"></i>
         </a>

         <div class="navbar-nav align-items-center ms-auto">  
            <div class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
        <?php if (!empty($profile_picture)) { ?>
            <img src="uploads-images/<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50%;">
        <?php } else { ?>
            <p>No profile picture available.</p>
        <?php } ?>
        <span class="d-none d-lg-inline-flex"><?php echo htmlspecialchars($_SESSION['name']); ?></span>
    </a>
    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
    <a href="admin_profile.php?user_id=<?php echo htmlspecialchars($_SESSION['user_id']); ?>" class="dropdown-item">My Profile</a>
        <a href="logout.php" class="dropdown-item">LogOut</a>
    </div>  
</div>
         </div>
      </nav>
      <!-- Navbar End -->