<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Zakat Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css1/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css1/animate.css">
    
    <link rel="stylesheet" href="css1/owl.carousel.min.css">
    <link rel="stylesheet" href="css1/owl.theme.default.min.css">
    <link rel="stylesheet" href="css1/magnific-popup.css">

    <link rel="stylesheet" href="css1/aos.css">

    <link rel="stylesheet" href="css1/ionicons.min.css">

    <link rel="stylesheet" href="css1/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css1/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css1/flaticon.css">
    <link rel="stylesheet" href="css1/icomoon.css">
    <link rel="stylesheet" href="css1/style.css">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">ZMS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">About Zakat</a></li>
          <li class="nav-item active"><a href="registration.php" style="color: black;" class="nav-link">Sign Up</a></li>
          <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
          <li class="nav-item"><a href="calculator.php" class="nav-link">Calculator</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    


    <section class="ftco-section-3 img" style="">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row d-md-flex">
    		<div class="col-md-6 volunteer pl-md-5 ftco-animate">
    			<h3 class="mb-3">Create your Account</h3>
    			<form action="" method="post">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="First Name" name="firstname" required="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Last Name" name="lastname" required="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Username" name="username" required="">
            </div>
            <div class="form-group">
              <input type="date" class="form-control" placeholder="Birthday" name="dateofbirth" required="">
            </div>
            <div class="form-group">
            <select class="form-control" required="" name="type">
            	<option value="Giver">Donor</option>
            	<option value="Receiver">Receiver</option>
            </select>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email" name="email" required="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Phone Number" name="contact" required="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Street Address" name="streetaddress" required="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="City" name="city" required="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Country" name="country" required="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="NID" name="">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="password" required="">
            </div>
            <div class="form-group">
              <input type="submit" value="Submit" name="submit1" class="btn btn-white py-3 px-5">
            </div>
          </form>
    		</div>    			
    		</div>
    	</div>
    </section>

            <?php

            if (isset($_POST["submit1"]))
            {
                
               $sql = mysqli_query($link, "INSERT INTO User VALUES('', '$_POST[firstname]', '$_POST[lastname]', '$_POST[username]', '$_POST[type]', '$_POST[dateofbirth]', '$_POST[email]', '$_POST[contact]', '$_POST[streetaddress]', '$_POST[city]', '$_POST[country]', '$_POST[password]')");
                if ($sql === TRUE) {

                    echo "<script>window.alert('Registration successful!')</script>";                
                } else {
                    echo "<script>window.alert('Something went wrong!')</script>";
                }
            }
            ?>
<?php
include "footer1.php";
?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js1/jquery.min.js"></script>
  <script src="js1/jquery-migrate-3.0.1.min.js"></script>
  <script src="js1/popper.min.js"></script>
  <script src="js1/bootstrap.min.js"></script>
  <script src="js1/jquery.easing.1.3.js"></script>
  <script src="js1/jquery.waypoints.min.js"></script>
  <script src="js1/jquery.stellar.min.js"></script>
  <script src="js1/owl.carousel.min.js"></script>
  <script src="js1/jquery.magnific-popup.min.js"></script>
  <script src="js1/aos.js"></script>
  <script src="js1/jquery.animateNumber.min.js"></script>
  <script src="js1/bootstrap-datepicker.js"></script>
  <script src="js1/jquery.timepicker.min.js"></script>
  <script src="js1/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js1/google-map.js"></script>
  <script src="js1/main.js"></script>
    
  </body>
</html>