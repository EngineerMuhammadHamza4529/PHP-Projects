<?php
session_start();
include "connection.php";
?>
<?php
if(isset($_POST["del_btn"])){
$cart_id = $_POST['cart_id'];
$delete_query = "DELETE FROM `cart` WHERE id='$cart_id'";

$result = mysqli_query($cn, $delete_query);







}
if (isset($_POST["updateCart"])) {

  $quantity = $_POST['quantity'];
  $prd_id = $_POST['prd_id'];
  $user_id = $_POST['user_id'];


  $query = "UPDATE `cart` SET `quantity` = '$quantity' WHERE `prd_id` = '$prd_id' AND `user_id` = '$user_id'";

  // Execute the query
  $result = mysqli_query($cn, $query);

  if ($result) {
    echo "Update successful!";
  } else {
    echo "Error updating record: " . mysqli_error($cn);
  }



}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daily Shop | Cart Page</title>

  <!-- Font awesome -->
  <link href="css/font-awesome.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <!-- SmartMenus jQuery Bootstrap Addon CSS -->
  <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
  <!-- Product view slider -->
  <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">
  <!-- slick slider -->
  <link rel="stylesheet" type="text/css" href="css/slick.css">
  <!-- price picker slider -->
  <link rel="stylesheet" type="text/css" href="css/nouislider.css">
  <!-- Theme color -->
  <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
  <!-- Top Slider CSS -->
  <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

  <!-- Main style sheet -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Google Font -->
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

  <!-- wpf loader Two -->

  <!-- / wpf loader Two -->
  <!-- SCROLL TOP BUTTON -->
  <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <?php include "header.php"; ?>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <?php include "navbar.php"; ?>
      </div>
    </div>
    </div>
  </section>
  <!-- / menu -->

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="./pic/slider/cart-banner.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
      <div class="container">
        <div class="aa-catg-head-banner-content">
          <h2>Cart Page</h2>
          <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Cart</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- / catg header banner section -->

  <!-- Cart view section -->
  <section id="cart-view">

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cart-view-area">
            <div class="cart-view-table">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th></th>
                      <!-- <th></th> -->
                      <th>Product</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th>Update Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include "connection.php";
                      $a = mysqli_query($cn, "SELECT tbl_product.prd_id, tbl_product.prd_name,tbl_product.prd_price, cart.quantity, cart.id FROM tbl_product INNER JOIN cart ON cart.prd_id=tbl_product.prd_id where cart.user_id='" . $_SESSION['user'] . "'");
                      $cnt = 0;
                      $totalAmount = null;
                      // $prod_id_collection
                      while ($r = mysqli_fetch_array($a)) {
                        $cnt++;
                        ?>
                          <form action="cart.php" method='post'>
                        <tr>
                          <td><button name="del_btn" class="remove" >
                              <fa class="fa fa-close"></fa>
                  
                      </button>
                      <input type="hidden" name ="cart_id" value ="<?php echo $r["id"] ?>">
                    </td>
                          <!-- <td><a href="#"><img src="img/man/polo-shirt-1.png" alt="img"></a></td> -->
                          <td><a class="aa-cart-title" href="#">
                              <?php echo $r['prd_name'] ?>
                            </a></td>
                          <td>
                            <?php 
                            echo $r['prd_price'] . ' * ' . '('.$r['quantity'].')';

                            ?>
                          </td>
                          <td><input class="aa-cart-quantity" type="number" value="1" name='quantity'></td>
                          <td>
                            <?php 
                            echo $r['prd_price'] * $r['quantity'];
                            $eachAmount = $r['prd_price'] * $r['quantity'];
                            $totalAmount += $eachAmount;
                             ?>
                          </td>
                     
                        
                              <input type="hidden" name="prd_id" value="<?php echo $r['prd_id']; ?>">
                              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']; ?>">
                              
                              <td colspan="6" class="aa-cart-view-bottom">
                          
                            
                            <input class="aa-cart-view-btn" type="submit" name="updateCart" value="Update Cart">
                          </td>
                        </tr>
                      </form>
                        
                        <?php } ?>
                        <tr>
                          <!-- <td colspan="6" class="aa-cart-view-bottom">
                          
                            
                            <input class="aa-cart-view-btn" type="submit" name="updateCart" value="Update Cart">
                          </td> -->
                        </tr>
                    </tbody>
                  </table>
                </div>
              <!-- Cart Total view -->
              <div class="cart-view-total">
                <h4>Cart Totals</h4>
                <table class="aa-totals-table">
                  <tbody>
                    <tr>
                      <th>Subtotal</th>
                      <td>$<?php echo $totalAmount;
                      $_SESSION['totalAmount'] = $totalAmount;
                      ?></td>
                    </tr>
                    <tr>
                      <th>Delivery Charges</th>
                      <td>$50</td>
                    </tr>
                    <tr>
                      <th>Total</th>
                      <td>$<?php echo $totalAmount + 50; ?></td>
                    </tr>
                  </tbody>

                </table>
                
                  <a class="aa-cart-view-btn" href="checkout.php">Proceed To Checkout</a>
          
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- / Cart view section -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

  <!-- footer -->
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-footer-top-area">
              <div class="row">
                <div class="col-md-3 col-sm-6">
                  <div class="aa-footer-widget">
                    <h3>Main Menu</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Home</a></li>
                      <li><a href="#">Our Services</a></li>
                      <li><a href="#">Our Products</a></li>
                      <li><a href="#">About Us</a></li>
                      <li><a href="#">Contact Us</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="aa-footer-widget">
                    <div class="aa-footer-widget">
                      <h3>Knowledge Base</h3>
                      <ul class="aa-footer-nav">
                        <li><a href="#">Delivery</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Discount</a></li>
                        <li><a href="#">Special Offer</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="aa-footer-widget">
                    <div class="aa-footer-widget">
                      <h3>Useful Links</h3>
                      <ul class="aa-footer-nav">
                        <li><a href="#">Site Map</a></li>
                        <li><a href="#">Search</a></li>
                        <li><a href="#">Advanced Search</a></li>
                        <li><a href="#">Suppliers</a></li>
                        <li><a href="#">FAQ</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="aa-footer-widget">
                    <div class="aa-footer-widget">
                      <h3>Contact Us</h3>
                      <address>
                        <p> 25 Astor Pl, NY 10003, USA</p>
                        <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                        <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                      </address>
                      <div class="aa-footer-social">
                        <a href="#"><span class="fa fa-facebook"></span></a>
                        <a href="#"><span class="fa fa-twitter"></span></a>
                        <a href="#"><span class="fa fa-google-plus"></span></a>
                        <a href="#"><span class="fa fa-youtube"></span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-footer-bottom-area">
              <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
              <div class="aa-footer-payment">
                <span class="fa fa-cc-mastercard"></span>
                <span class="fa fa-cc-visa"></span>
                <span class="fa fa-paypal"></span>
                <span class="fa fa-cc-discover"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->
  <!-- Login Modal -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="">
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password">
            <button class="aa-browse-btn" type="submit">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="account.html">Register now!</a>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>



  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script>

</body>

</html>
<?php
session_start();
if (isset($_POST["btn_submit1"])) {
  include "connection.php";
  $a = "INSERT INTO tbl_order(`user_id`,prd_id,quantity,inv) select `user_id`,prd_id,quantity,`rand` from cart where `rand`='" . $_SESSION['ab'] . "'";
  mysqli_query($cn, $a);
  echo "<script>alert('Done...!')</script>";


}







?>