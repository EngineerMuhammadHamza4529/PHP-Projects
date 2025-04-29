<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

?>


<?php include "config/config.php" ?>
<?php require "nav/nav.php"; ?>

<?php

$fetch_registered_user = "SELECT * FROM `user_login`";
$fetch_registered_prepare = $connection->prepare($fetch_registered_user);
$fetch_registered_prepare->execute();
$registered_user_data = $fetch_registered_prepare->fetchAll(PDO::FETCH_ASSOC);
print_r($registered_user_data);


$isEmailNotExist = false;






if (isset($_POST['submit'])) {
    $username = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $confirmpassword = $_POST['user_confirm_password'];


    if (empty($username) || empty($email) || empty($password) || empty($confirmpassword)) {
        echo "<script>alert('Kindly fill all the fields')</script>";
    } else {

        foreach ($registered_user_data as $user) {
            if ($email === $user['user_email']) {
                echo "<script>alert('your email is already taken')</script>";
                return;
            } else {
                $isEmailNotExist = true;

            }
        }
        if ($isEmailNotExist) {
            $randomOTP = rand(1111, 9999);
            //    echo $randomOTP;

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
                $mail->isSMTP(); //Send using SMTP
                $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
                $mail->SMTPAuth = true; //Enable SMTP authentication
                $mail->Username = 'syedazeemhah0987@gmail.com'; //SMTP username
                $mail->Password = 'rqtj eumv pqzh hgcd'; //SMTP password
                $mail->SMTPSecure = "tls"; //Enable implicit TLS encryption
                $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('syedazeemhah0987@gmail.com', 'Courier Management');
                $mail->addAddress($email, 'Courier Management'); //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                $mail->addReplyTo($email, 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true); //Set email format to HTML
                $mail->Subject = 'OTP for Registration of Courier Management System';
                $mail->Body = "To verify, please enter the verification code: <b>$randomOTP</b> <p>Kindly do not share your OTP with anyone else and once you are done with registration,</p>";
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }



            $_SESSION['username'] = $username;  
            $_SESSION['useremail'] = $email;
            $_SESSION['userpassword'] = $password;
            $_SESSION['userotp'] = $randomOTP;




        }
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
                                <p>Brook presents your services with flexible, convenient and cdpose layouts. You can
                                    select your favorite layouts & elements for.</p>
                            </div>
                        </div>
                    </div>
                    <!-- form -->
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="contact-form">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6">
                                <div class="input-form">
                                    <input type="text" name="user_name" placeholder="Enter your Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-form">
                                    <input type="Email" name="user_email" placeholder="Enter your Email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-form">
                                    <input type="Password" name="user_password" placeholder="Enter your Password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-form">
                                    <input type="Password" name="user_confirm_password"
                                        placeholder="Enter your Password">
                                </div>
                            </div>




                            <!-- Button -->
                            <div class="col-lg-12">
                                <button name="submit" type="submit" class="submit-btn">Signup</button>
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