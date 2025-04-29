<?php
include('Connect.php');
if(isset($_POST['usr_btn']))
{
$u_role=$_POST['rolee'];
  $u_name=$_POST['usr_n'];
  $u_cont=$_POST['usr_con'];
  $u_email=$_POST['usr_em'];
  $u_pass=$_POST['usr_pas'];
  $image = $_FILES['usr_img']['name'];
  $imgtn = $_FILES['usr_img']['tmp_name'];
  $imgty = $_FILES['usr_img']['type'];
  $imgsi =$_FILES['usr_img']['size'];
  $folder ="../images/";
  if ($imgty=="image/png" || $imgty=="image/png" || $imgty=="image/jpg" || $imgty=="image/jpeg" || $imgty=="image/jfif" ) {
      if ($imgsi<=1000000) {
          $path =$folder.$image;
         $imgq="INSERT INTO `users`(RoleID,`UserName`,`UserContatct`,`UserEmail`,`UserPassword`, `UserImage`) VALUES ('$u_role','$u_name','$u_cont','$u_email','$u_pass','$path')";
         $result =mysqli_query($con,$imgq);
         move_uploaded_file($imgtn,$path);
         if ($result) {
            echo"<script> alert('New User Added '); window.location.href='../tables/showusers.php' </script>";
         }
         else{
             echo mysqli_error($con);
         }  
         }
         else{
            echo"<script> alert('The picture you choose its too large');  </script>";
        }
  }
  else{
    echo"<script> alert('Wrong format'); window.location.href='UserForm.php' </script>";
}

}

?>