<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Online Lawyers Application </title>
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
   
   <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-dark" id="ftco-navbar">
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
        $query = "SELECT user_id, username FROM registration WHERE role_id = 2"; 
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
               
                $user_id = htmlspecialchars($row['user_id'], ENT_QUOTES, 'UTF-8');
                $username = htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8');

                
                if (isset($_SESSION['uId']) && !empty($_SESSION['uId'])) {
                    echo '<li><a class="dropdown-item" href="profiles.php?user_id=' . $user_id . '">' . $username . '</a></li>';
                } else {
                
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
	  <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-dark" id="ftco-navbar">
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
        $query = "SELECT user_id, username FROM registration WHERE role_id = 2"; 
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                
                $user_id = htmlspecialchars($row['user_id'], ENT_QUOTES, 'UTF-8');
                $username = htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8');

                
                if (isset($_SESSION['uId']) && !empty($_SESSION['uId'])) {
                    echo '<li><a class="dropdown-item" href="profiles.php?user_id=' . $user_id . '">' . $username . '</a></li>';
                } else {
                  
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


   
    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
          	<p>
              <img src="images/ins.jpg" alt="" class="img-fluid">
            </p>
            <h2 class="mb-3">What is Insurance Law?</h2>
<p>
Insurance law is the part of law practice concerning insurance, inclusive of insurance policies and claims. Insurance is a contract whereby, for a stipulated consideration, one party undertakes to compensate the other for loss on a specified subject by specified perils. The party agreeing to make the compensation is usually called the insurer or underwriter, the other the insured or assured, the agreed consideration, the premium, the written contract, a policy the events insured against risks of perils and the subject, right, or interest to be protected, the insurable interest.</p>
<p>A contract whereby one undertakes to indemnify another against loss, damage, or liability arising from an unknown or contingent event and is applicable only to some contingency or act to occur in future; An agreement by which one party for a consideration promises to pay money or its equivalent or to do an act valuable to other party upon destruction, loss, or injury of something in which other party has an interest.</p>
         <h2 class="mb-3 mt-5">How Can We Help !</h2>
            <p>Our Attorneys are always available to provide you justice!</p>
            <div class="row mt-5 pt-5">
		          <div class="col-md-12">
		            <h2 class="mb-4 font-weight-bold">Our Legal Advisors</h2>
		          </div>

            	<div class="col-lg-6">
        <?php
        
        $user_id = 20;
        $select = mysqli_query($conn, "SELECT * FROM registration WHERE user_id = $user_id AND role_id = 2") or die('Query failed: ' . mysqli_error($conn));
        
        if ($fetch = mysqli_fetch_array($select)) {
            echo '
            <div>
                <div class="boss">
                    <div class="wrapper">
                        <div class="card">
                            <img src="../admin/uploads-images/' . htmlspecialchars($fetch['lawyer_photograph']) . '" alt="">
                            <div class="info">
                                <h4 class="text-light">' . htmlspecialchars($fetch['username']) . '</h4>
                                <p>' . htmlspecialchars($fetch['category']) . '<br> ' . htmlspecialchars($fetch['address']) . '</p>';
            
          
            if (isset($_SESSION['uId']) && !empty($_SESSION['uId'])) {
                echo '<a href="profiles.php?user_id=' . htmlspecialchars($fetch['user_id']) . '"><button class="btn btn-primary">View Profile</button></a>';
            } else {
                echo '<a href="login.php"><button class="btn btn-secondary">Login to View Profile</button></a>';
            }
            echo '
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
        } else {
    
            echo '<div class="col-lg-3 col-sm-6 mt-5"><p>No lawyer found.</p></div>';
        }
        ?>
            
            </div>
          </div></div></div></section>     


   

    <?php include 'footer.php' ?>

    <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>

  
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>
<style>
        .button {
      margin-top:80%;
  margin-left:18%;
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

.button:active {
	transform: scale(0.95);
  text-decoration:none;
}

.button:focus {
	outline: none;

}

.button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}
  .button:hover{
    background-color:#93734C;

  }

.boss {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.wrapper {
  display: flex;
  width: 90%;
  justify-content: space-around;
}

.card {
  width: 300px;
  height: 420px;
  border-radius: 15px;
  padding: 1.5rem;
  background: white;
  position: relative;
  display: flex;
  align-items: flex-end;
  transition: 0.4s ease-out;
  box-shadow: 0px 7px 10px rgba(0, 0, 0, 0.5);
}
.card:hover {
  transform: translateY(20px);
}
.card:hover:before {
  opacity: 1;
}
.card:hover .info {
  opacity: 1;
  transform: translateY(0px);
}
.card:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  height: 100%;
  border-radius: 15px;
  background: rgba(0, 0, 0, 0.6);
  z-index: 2;
  transition: 0.5s;
  opacity: 0;
}
.card img {
  width: 100%;
  height: 100%;
  -o-object-fit: cover;
     object-fit: cover;
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 15px;
}
.card .info {
  position: relative;
  z-index: 3;
  color: white;
  opacity: 0;
  transform: translateY(30px);
  transition: 0.5s;
}
.card .info h4 {
  margin: 0px;
}
.card .info p {
  letter-spacing: 1px;
  font-size: 15px;
  margin-top: 8px;
}
.card .info button {
  padding: 0.6rem;
  outline: none;
  border: none;
  border-radius: 3px;
  background: white;
  color: black;
  font-weight: bold;
  cursor: pointer;
  transition: 0.4s ease;
}
.card .info button:hover {
  background: dodgerblue;
  color: white;
}


</style>