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
          <li class="nav-item"><a href="registration.php" class="nav-link">Sign Up</a></li>
          <li class="nav-item active"><a href="login.php" style="color: black;" class="nav-link">Login</a></li>
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
          <h3 class="mb-3"></h3>
          <form name="form1" action="" method="post">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Username" name="username" required="">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="password" required="">
            </div>
            <div class="form-group">
              <input type="submit" value="Login" name="submit1" class="btn btn-white py-3 px-5">
            </div>
          </form>


<?php

if(isset($_POST["submit1"]))
{
    $count=0;
    $count1=0;
    $count2=0;
    $count3=0;
    $res=mysqli_query($link, "SELECT * FROM User WHERE User_Name = '$_POST[username]' AND Password = '$_POST[password]' AND Type LIKE 'Giver'");

    $res1=mysqli_query($link, "SELECT * FROM User WHERE User_Name = '$_POST[username]' AND Password = '$_POST[password]' AND Type LIKE 'Receiver'");

    $res2=mysqli_query($link, "SELECT * FROM User WHERE User_Name = '$_POST[username]' AND Password = '$_POST[password]' AND Type LIKE 'Imam'");

    $res3=mysqli_query($link, "SELECT * FROM User WHERE User_Name = '$_POST[username]' AND Password = '$_POST[password]' AND Type = 'Admin'");
    
    $count=mysqli_num_rows($res);
    $count1=mysqli_num_rows($res1);
    $count2=mysqli_num_rows($res2);
    $count3=mysqli_num_rows($res3);

    if($count > 0){
        session_start();
        $_SESSION["user"] = $_POST["username"];
        ?>
        <script type="text/javascript">
            window.location="user/profile.php";
        </script>

        <?php
    } if($count1 > 0) {
        session_start();
        $_SESSION["receiver"] = $_POST["username"];
        ?>
        <script type="text/javascript">
            window.location="receiver/profile.php";
        </script>

        <?php
    } if($count2 > 0) {
        session_start();
        $_SESSION["imam"] = $_POST["username"];
        ?>
        <script type="text/javascript">
            window.location="imam/profile.php";
        </script>

        <?php
    } if($count3 > 0) {
        session_start();
        $_SESSION["admin"] = $_POST["username"];
        ?>
        <script type="text/javascript">
            window.location="admin/profile.php";
        </script>

        <?php
    } else {
        ?>
        <div class="alert alert-danger col-lg-6 col-lg-push-3">
            <strong style="color:red;">Invalid</strong> Username Or Password.
        </div>
        <?php
    }
}

?>

        </div>          
        </div>
      </div>
    </section>

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