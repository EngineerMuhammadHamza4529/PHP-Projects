<?php include "config/config.php" ?> 
<?php require "nav/nav.php"; ?>

<?php

$fetch_registered_user = "SELECT * FROM `user_login`";
$fetch_registered_prepare = $connection->prepare($fetch_registered_user);
$fetch_registered_prepare->execute();
$registered_user_data = $fetch_registered_prepare->fetchAll(PDO::FETCH_ASSOC);
print_r($registered_user_data);


	$isEmailNotExist =  false;




   

if(isset($_POST['submit']))
{
    
    $email = $_POST['email'];
    $password = $_POST['password'];



$isLoginNotSuccessfull = false;
        
   foreach($registered_user_data as $user_data)
   {
    if($user_data['user_email'] === $email && password_verify($password, $user_data['user_password']))
    {
        $_SESSION['userId'] = $user_data['user_id'];
        $_SESSION['userEmail'] = $user_data['user_email'];
        $_SESSION['userPassword'] = $user_data['user_password'];
        header("location:index.php");
    }
    else
    {
        $isLoginNotSuccessfull = true;
    }
   }
    
    if($isLoginNotSuccessfull)
    {
        echo "<script>alert('Either email or password is wrong!')</script>";
    }


      
   
}


?>
<!--? contact-form start -->
<section class="contact-form-area section-bg  pt-115 pb-120 fix" data-background="assets/img/gallery/section_bg02.jpg">
        <div class="container">
            <div class="row justify-content-end">
                <!-- Contact wrapper -->
                <div class="col-xl-8 col-lg-9">
                    <div class="contact-form-wrapper">
                        <!-- From tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Section Tittle -->
                                <div class="section-tittle mb-50">
                                    <span>Get a Qote For Free</span>
                                    <h2>Request a Free Quote</h2>
                                    <p>Brook presents your services with flexible, convenient and cdpose layouts. You can select your favorite layouts & elements for.</p>
                                </div>
                            </div>
                        </div>
                        <!-- form -->
                        <form action="login.php" method="post" class="contact-form">
                            <div class="row ">
                                
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-form">
                                        <input type="Email" name="email" placeholder="Enter your Email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-form">
                                        <input type="Password" name="password" placeholder="Enter your Password">
                                    </div>
                                </div>
                              
                              
                               
                              
                               
                                <!-- Button -->
                                <div class="col-lg-12">
                                    <button name="submit" type="submit" class="submit-btn">login</button>
                                </div>
                            </div>
                        </form>	
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-form end -->
<?php require "footer/footer.php"; ?>