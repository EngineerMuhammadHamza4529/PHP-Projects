<?php

include '../admin/db.php';
session_start();
if($_SESSION['role']==2)

$user_id = $_SESSION['uId'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_qualification = mysqli_real_escape_string($conn, $_POST['update_qualification']);
   $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
   $update_deb = mysqli_real_escape_string($conn, $_POST['update_deb']);
   $update_dob = mysqli_real_escape_string($conn, $_POST['update_dob']);
   $update_ph = mysqli_real_escape_string($conn, $_POST['update_ph']);



   mysqli_query($conn, "UPDATE registration SET username = '$update_name', email = '$update_email'
   ,qualification='$update_qualification'
   ,address='$update_address',category='$update_deb',dob='$update_dob',ph_no='$update_ph' WHERE user_id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = $_POST['update_pass'];
   $new_pass =$_POST['new_pass'];
   $confirm_pass = $_POST['confirm_pass'];

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE registration SET password = '$confirm_pass' WHERE user_id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = '../admin/uploads-images/'.$update_image;

   if(!empty($update_image)){
         $image_update_query = mysqli_query($conn, "UPDATE registration SET lawyer_photograph = '$update_image' WHERE user_id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../frontend/css/style2.css">

</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM registration WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form  method="post" enctype="multipart/form-data" class="form">
      <?php
         if($fetch['lawyer_photograph'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="../admin/uploads-images/'.$fetch['lawyer_photograph'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['username']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="lawyer_photograph/jpeg,lawyer_photograph/jpg,lawyer_photograph/png,lawyer_photograph/webp,lawyer_photograph/jfif,lawyer_photograph/gif,lawyer_photograph/tiff"
             class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
         <div class="inputBox">
         <span>Qualification :</span>
            <input type="text" name="update_qualification" value="<?php echo $fetch['qualification']; ?>" class="box">
            <span>Address:</span>
            <input type="text" name="update_address" placeholder="enter new password" value="<?php echo $fetch['address']; ?>" class="box">
            <span>Department :</span>
              <select name="update_deb" class="box">
    <option selected value=""><?php echo $fetch['category']; ?></option>
<?php 
$sql="Select * From categories";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
    ?>
     <option value="<?php echo $row["category_name"]?>"><?php echo $row["category_name"]?></option>
 <?php } ?>
 </select>     
    </div>
    <div class="inputBox">
            <span>Date Of Birth :</span>
            <input type="date" name="update_dob" value="<?php echo $fetch['dob']; ?>" class="box">
            <span>Phone No :</span>
            <input type="text" name="update_ph" value="<?php echo $fetch['ph_no']; ?>" class="box">
            
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="lawyers.php" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>
