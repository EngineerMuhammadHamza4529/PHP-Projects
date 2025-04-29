<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Online Lawyers Application</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
   <?php include 'links.php';
   include '../admin/db.php';
   ?>
  </head>
  <body>
  <?php
session_start();
if(isset($_SESSION['uId'])){?>
   
   <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Online <span>Lawyers Application</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Lawyers
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
        $query = "SELECT user_id, username FROM registration WHERE role_id = 2"; // Fetch user_id and username of lawyers
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Escape output to prevent XSS
                $user_id = htmlspecialchars($row['user_id'], ENT_QUOTES, 'UTF-8');
                $username = htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8');

                // Check if user is logged in
                if (isset($_SESSION['uId']) && !empty($_SESSION['uId'])) {
                    echo '<li><a class="dropdown-item" href="profiles.php?user_id=' . $user_id . '">' . $username . '</a></li>';
                } else {
                    // Show login link if not logged in
                    echo '<li><a class="dropdown-item" href="login.php">Login to View ' . $username . '\'s Profile</a></li>';
                }
            }
        } else {
            echo '<li><a class="dropdown-item" href="#">No lawyers available</a></li>';
        }
        ?>
    </ul>
</li>
	          <li class="nav-item active"><a href="services.php" class="nav-link">Our Services</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			  <div class="nav-item dropdown">
         <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
        <span class="d-none d-lg-inline-flex"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
    </a>
    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
    <a href="my_appointment.php" class="dropdown-item">My Appointment</a>
	<a href="user_profile.php" class="dropdown-item">My Profile</a>
        <a href="logout.php" class="dropdown-item">LogOut</a>
    </div>  
</div>
	        </ul>
	      </div>
	    </div>
	  </nav>


<?php } else{?>
	  <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Online <span>Lawyers Application</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Lawyers
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
        $query = "SELECT user_id, username FROM registration WHERE role_id = 2"; // Fetch user_id and username of lawyers
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Escape output to prevent XSS
                $user_id = htmlspecialchars($row['user_id'], ENT_QUOTES, 'UTF-8');
                $username = htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8');

                // Check if user is logged in
                if (isset($_SESSION['uId']) && !empty($_SESSION['uId'])) {
                    echo '<li><a class="dropdown-item" href="profiles.php?user_id=' . $user_id . '">' . $username . '</a></li>';
                } else {
                    // Show login link if not logged in
                    echo '<li><a class="dropdown-item" href="login.php">Login to View ' . $username . '\'s Profile</a></li>';
                }
            }
        } else {
            echo '<li><a class="dropdown-item" href="#">No lawyers available</a></li>';
        }
        ?>
    </ul>
</li>
	          <li class="nav-item active"><a href="services.php" class="nav-link">Our Services</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	          <li class="nav-item "><a href="login.php" class="nav-link text-danger"><b>Login </b></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <?php }?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Services</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>services <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
   	
   	<section class="ftco-section">
    	<div class="container">
        <div class="row d-flex justify-content-center">
        	<div class="col-md-3 text-center">
        		<div class="practice-area ftco-animate">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-family"></span>
        			</div>
        			<h3><a href="familylaw.php">Family Law</a></h3>
        			<p>A family lawyer manages legal issues related to family matters.</p>
        			<a href="familylaw.php" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
        		</div>
        	</div>
        	<div class="col-md-3 text-center">
        		<div class="practice-area ftco-animate">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-auction"></span>
        			</div>
        			<h3><a href="bus.php">Business Law</a></h3>
        			<p>Business law governs business operations and transactions.</p>
        			<a href="bus.php" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
        		</div>
        	</div>
        	<div class="col-md-3 text-center">
        		<div class="practice-area ftco-animate">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-shield"></span>
        			</div>
        			<h3><a href="ins.php">Insurance Law</a></h3>
        			<p>Insurance law governs the terms and enforcement of insurance policies.</p>
        			<a href="ins.php" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
        		</div>
        	</div>
        	<div class="col-md-3 text-center">
        		<div class="practice-area ftco-animate">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-handcuffs"></span>
        			</div>
        			<h3><a href="crim.php">Criminal Law</a></h3>
        			<p>A criminal lawyer defends clients accused of crimes and offenses.</p>
        			<a href="crim.php" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
        		</div>
        	</div>
        	<div class="col-md-3 text-center">
        		<div class="practice-area ftco-animate">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-house"></span>
        			</div>
        			<h3><a href="prop.php">Property Law</a></h3>
        			<p>Property law governs the ownership, use, and transfer of real and personal property.</p>
        			<a href="prop.php" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
        		</div>
        	</div>
        	<div class="col-md-3 text-center">
        		<div class="practice-area ftco-animate">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-employee"></span>
        			</div>
        			<h3><a href="emp.php">Employment Law</a></h3>
        			<p>Employment law governs the rights and obligations between employers and employees.</p>
        			<a href="emp.php" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
        		</div>
        	</div>
        
        	<div class="col-md-3 text-center">
        		<div class="practice-area ftco-animate">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-money"></span>
        			</div>
        			<h3><a href="fin.php">Financial Law</a></h3>
        			<p>Financial law governs financial markets, transactions, institutions, and compliance rules.</p>
        			<a href="fin.php" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
        		</div>
        	</div>
        	<div class="col-md-3 text-center">
        		<div class="practice-area ftco-animate">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-medicine"></span>
        			</div>
        			<h3><a href="drug.php">Drug Offenses</a></h3>
        			<p>Drug offenses include illegal possession, distribution, or sale of drugs.</p>
        			<a href="drug.php" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
        		</div>
        	</div>
        	<div class="col-md-3 text-center">
        		<div class="practice-area ftco-animate">
        			<div class="icon d-flex justify-content-center align-items-center">
        				<span class="flaticon-handcuffs"></span>
        			</div>
        			<h3><a href="sexu.php">Sexual Offenses</a></h3>
        			<p>Sexual offenses involve illegal acts of a sexual nature against another person.</p>
        			<a href="sexu.php" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
        		</div>
        	</div>
        </div>
    	</div>
    </section>


    
<?php include 'footer.php' ?>