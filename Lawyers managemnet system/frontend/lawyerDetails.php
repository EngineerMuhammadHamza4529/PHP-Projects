<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LawyerDetails</title>
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>


   
   <div class="container">

<form class="well form-horizontal" method="post"  id="contact_form" enctype="multipart/form-data" novalidate="novalidate">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Welcome To Lawyer Registration Page!</b></h2></center></legend><br>




<div class="form-group">
<label class="col-md-4 control-label"> Name</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  name="name" placeholder="Enter Your Name" class="form-control"  type="text" required>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Email</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  name="email" placeholder="Email" class="form-control"  type="email" required>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Password</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  name="pass" placeholder="Enter Your Password" class="form-control"  type="password" required>
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label"> Qualification</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  name="qualf" placeholder="Enter Your Qualification" class="form-control"  type="text" required>
</div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label" > Address</label> 
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="add" placeholder=" Enter Your Address" class="form-control"  type="text" required>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Department</label>
<div class="col-md-4 selectContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select class="form-control" id="category" name="dep" required>
    <?php 
include "../admin/db.php";
$sql="Select * From categories";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
    ?>
     <option value="<?php echo $row["category_name"]?>"><?php echo $row["category_name"]?></option>
 <?php } ?>
</select>


 

</div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label">Date Of Birth</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  name="dob" placeholder=" Enter Your Date Of Birht" class="form-control"  type="date" value="date(Y-m-d)" required>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Contact No.</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
<input name="phone" placeholder="(+92)" class="form-control" type="text"required>
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label">Uploade Your Picture</label>  

<div class="col-md-4 inputGroupContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-camera"></i></span>
    <div class="form-control">
                            <input type="file"  name="lawyer_photograph"/>
                                <p class="help-block text-danger"></p>
                            </div>
</div>
</div>
</div>

<input type="submit" name="lawSubmit" value="Confirm Registration!" class="button" >

</fieldset>
</form>
</div>
</div><!-- /.container -->
</body>
</html>
<?php
if(isset($_POST["lawSubmit"])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pwd=$_POST['pass'];
    $qualf=$_POST['qualf'];
    $add=$_POST['add'];  
    $dep=$_POST['dep'];
    $dob=$_POST['dob']; 
    $ph=$_POST['phone']; 
    $img_name = $_FILES['lawyer_photograph']['name'];
    $img_tmp_name = $_FILES['lawyer_photograph']['tmp_name'];

    $accept =['jpeg','jpg','png','webp','jfif','gif','tiff'];
    $to_lowerCase = strtolower(pathinfo($_FILES['lawyer_photograph']['name'], PATHINFO_EXTENSION));
    if(in_array($to_lowerCase, $accept)){

    $blobimage = addslashes(file_get_contents($_FILES['lawyer_photograph']['tmp_name']));
    move_uploaded_file($img_tmp_name, "../admin/uploads-images/".$img_name);

    $sql = "INSERT INTO registration (username, email, password, qualification, address, category, dob, ph_no, lawyer_photograph, role_id, status)
    VALUES ('$name', '$email', '$pwd', '$qualf', '$add', '$dep', '$dob', '$ph', '$img_name', 2, 'pending')";


    $result=mysqli_query($conn,$sql);
    if(!$sql){
        echo"Something Went Wrong";
    }
    else{
        ?>
<script> window.location.href="login.php"</script>
    <?php }
}}
?>
<style>
.container{
margin-top: 2%;
width:70%;
}


body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
   background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%);
  overflow: hidden;
}

.button {
    margin-left:35%;
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
    background-color: #FF4B2B;

}

.button:active {
	transform: scale(0.95);
}

.button:focus {
	outline: none;
}

.button:hover{
    background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%);

}

.profile-pic {
    width: 200px;
    max-height: 200px;
    display: inline-block;
}

.file-upload {
    display: none;
}
.circle {
    border-radius: 100% !important;
    overflow: hidden;
    width: 128px;
    height: 128px;
    border: 2px solid rgba(255, 255, 255, 0.2);
    position: absolute;
    top: 72px;
}
img {
    max-width: 100%;
    height: auto;
}
.p-image {
  position: absolute;
  top: 167px;
  right: 30px;
  color: #666666;
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.p-image:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.upload-button {
  font-size: 1.2em;
}

.upload-button:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
  color: #999;
}
</style>
<script>
    $(document).ready(function() {

    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
});

$(".upload-button").on('click', function() {
   $(".file-upload").click();
});
});
</script>


