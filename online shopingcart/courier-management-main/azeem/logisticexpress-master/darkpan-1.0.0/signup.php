
<?php include "nav/nav.php" ?>

<!-- <?php include "config/config.php" ?> -->



<?php

$fetch_registered_user = "SELECT * FROM `admin-dashboard-signup`";
$fetch_registered_prepare = $connection->prepare($fetch_registered_user);
$fetch_registered_prepare->execute();
$registered_user_data = $fetch_registered_prepare->fetchAll(PDO::FETCH_ASSOC);
print_r($registered_user_data);


	$isEmailNotExist =  false;




   

if(isset($_POST['submit']))
{
    $username = $_POST['admin_username'];
    $email = $_POST['admin_email'];
    $password = $_POST['admin_password'];
  



        if(empty($username) || empty($email) || empty($password) ){
            echo "<script>alert('Kindly fill all the fields')</script>";
    }else{
   
       foreach($registered_user_data as $user)
       {
        if($email === $user['admin_email'])
        {
            echo "<script>alert('your email is already taken')</script>";
            return;
         }else{
            $isEmailNotExist = true;
          
         } }
         if($isEmailNotExist)
         {
      
            $signup_query = "INSERT INTO `admin-dashboard-signup`( `admin_username`, `admin_email`, `admin_password`) VALUES (:admin_username,:admin_email,:admin_password)";

            $hash_password = password_hash($password, PASSWORD_BCRYPT);
            $signup_query_prepare =  $connection->prepare($signup_query);
        $signup_query_prepare->bindParam(":admin_username", $username);
        $signup_query_prepare->bindParam(":admin_email", $email);
        $signup_query_prepare->bindParam(":admin_password", $hash_password);
      
        $signup_query_prepare->execute();
        // if($password  !== $confirmpassword)
        // {
        //     echo "<script>alert('please insert same password')</script>";
        // }

       
         }
        }
      
   
}


?>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                            </a>
                            <form action="signup.php" method="post">
                            <h3>Sign Up</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="admin_username" class="form-control" id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="admin_email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="admin_password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- Sign Up End -->
    </div>

    <?php include "footer/footer.php" ?>