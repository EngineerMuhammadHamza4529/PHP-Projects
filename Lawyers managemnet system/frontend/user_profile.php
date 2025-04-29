<?php

include '../admin/db.php';
session_start();
if($_SESSION['role']==3)

$user_id = $_SESSION['uId'];

if (isset($_POST['update_profile'])) {
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    
    
    mysqli_query($conn, "UPDATE registration SET username = '$update_name', email = '$update_email' WHERE user_id = '$user_id'") or die('query failed');
    
    if ($conn) {
      echo "<script>alert('Profile updated successfully!');</script>";
  } else {
      echo "<script>alert('Profile update failed!');</script>";
  }

   
    if (isset($_POST['old_pass'], $_POST['update_pass'], $_POST['new_pass'], $_POST['confirm_pass'])) {
        $old_pass = $_POST['old_pass'];
        $update_pass = $_POST['update_pass'];
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];

        if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
            if ($update_pass != $old_pass) {
                $message[] = 'Old password does not match!';
            } elseif ($new_pass != $confirm_pass) {
                $message[] = 'New password and confirm password do not match!';
            } else {
                mysqli_query($conn, "UPDATE registration SET password = '$confirm_pass' WHERE user_id = '$user_id'") or die('query failed');
                $message[] = 'Password updated successfully!';
            }
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Profile</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="update-profile-container">
   <form method="post" class="profile-form">
      <h1>Profile Settings</h1>
      <?php
      $select = mysqli_query($conn, "SELECT * FROM registration WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
      
      <?php
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>

      <div class="form-group">
         <label for="update_name">Username:</label>
         <input type="text" id="update_name" name="update_name" value="<?php echo $fetch['username']; ?>" required>
      </div>

      <div class="form-group">
         <label for="update_email">Email:</label>
         <input type="email" id="update_email" name="update_email" value="<?php echo $fetch['email']; ?>" required>
      </div>

      <div class="form-group">
         <label for="old_pass">Old Password:</label>
         <input type="password" id="old_pass" name="update_pass" placeholder="Enter previous password">
      </div>

      <div class="form-group">
         <label for="new_pass">New Password:</label>
         <input type="password" id="new_pass" name="new_pass" placeholder="Enter new password">
      </div>

      <div class="form-group">
         <label for="confirm_pass">Confirm Password:</label>
         <input type="password" id="confirm_pass" name="confirm_pass" placeholder="Confirm new password">
      </div>

      <div class="form-group">
         <input type="submit" value="Update Profile" name="update_profile" class="btn-submit">
      </div>
      
      <a href="index.php" class="btn btn-danger">Go Back</a>
   </form>
</div>

</body>
</html>
<style>
* {
   margin: 0;
   padding: 0;
   box-sizing: border-box;
   font-family: Arial, sans-serif;
}

body {
   background-image: url("images/background_img.jpg");
   background-color: #f4f4f4;
   display: flex;
   justify-content: center;
   align-items: center;
   height: 100vh;
}

/* Container styling */
.update-profile-container {
   width: 100%;
   max-width: 400px;
   background-color: #fff;
   padding: 20px;
   border-radius: 10px;
   box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

/* Form styling */
.profile-form {
   display: flex;
   flex-direction: column;
}

h1 {
   text-align: center;
   margin-bottom: 20px;
   font-size: 24px;
   color: #333;
}

.form-group {
   margin-bottom: 15px;
}

.form-group label {
   display: block;
   margin-bottom: 5px;
   font-size: 14px;
   color: #333;
}

.form-group input {
   width: 100%;
   padding: 10px;
   font-size: 14px;
   border: 1px solid #ccc;
   border-radius: 5px;
}

.btn-submit {
   width: 100%;
   padding: 10px;
   background-color: #28a745;
   color: white;
   border: none;
   border-radius: 5px;
   cursor: pointer;
   font-size: 16px;
}

.btn-submit:hover {
   background-color: #218838;
}

.back-link {
   display: block;
   text-align: center;
   margin-top: 15px;
   font-size: 14px;
   color: #007bff;
   text-decoration: none;
}

.back-link:hover {
   text-decoration: underline;
}

/* Responsive styles */
@media only screen and (max-width: 480px) {
   .update-profile-container {
      padding: 15px;
   }

   h1 {
      font-size: 20px;
   }

   .form-group input {
      font-size: 12px;
      padding: 8px;
   }

   .btn-submit {
      font-size: 14px;
      padding: 8px;
   }

   .back-link {
      font-size: 12px;
   }
}

</style>