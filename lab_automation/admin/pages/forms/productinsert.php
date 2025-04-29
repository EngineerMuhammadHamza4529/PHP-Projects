<?php
include('Connect.php');
if(isset($_POST['prodsuBMIT']))
{
$p_code=$_POST['prodcode'];
  $p_name=$_POST['prodname'];
  
  $image = $_FILES['prodimg']['name'];
  $imgtn = $_FILES['prodimg']['tmp_name'];
  $imgty = $_FILES['prodimg']['type'];
  $imgsi =$_FILES['prodimg']['size'];
  $folder ="../images/";
  if ($imgty=="image/png" || $imgty=="image/png" || $imgty=="image/jpg" || $imgty=="image/jpeg" || $imgty=="image/jfif" ) {
      if ($imgsi<=1000000) {
          $path =$folder.$image;
         $imgq="INSERT INTO products (`ProductCode`, `ProductName`, `ProductImage`, `status`) VALUES ('$p_code','$p_name','$path','Pending')";
         
         $result =mysqli_query($con,$imgq);
         move_uploaded_file($imgtn,$path);
         if ($result) {
            echo"<script> alert('New Product Added '); window.location.href='../tables/showproducts.php' </script>";
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
    echo"<script> alert('Wrong format'); window.location.href='ProductsForm.php' </script>";
}

}

?>