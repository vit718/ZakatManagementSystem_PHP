<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create your Zakat Account</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
    <body style="background:url('images/img1.jpg') no-repeat; background-size:cover;">
    <style type="text/css">
        body {
            color: white;
        }
        input[type=submit] {
            background-color: darkseagreen;
            color: black;
        }
    </style>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                      
      </button>
      <a class="navbar-brand" href="#">Zakat</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="profile.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="start_page.php">Zakat Calculator</a></li>
        <li><a href="assets.php">Update Assets</a></li>
      </ul>
    </div>
  </div>
</nav>
</head>

<br>
<div style="background-color: black" class="col-lg-12 text-center">
    <h1 style="font-family:Lucida Console">Zakat</h1>
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="" method="post">
                    <h2>Create your Account</h2><br>

                    <div>
                        <input type="text" class="form-control" placeholder="First Name" name="firstname" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Last Name" name="lastname" required=""/>
                    </div>

                    <div>
                        <input type="text" class="form-control" placeholder="Username" name="username" required=""/>
                    </div>
                    <div>

                        <select class="form-control" id="Type" name="type" required="">
                            <option value="Giver">Giver</option>
                            <option value="Receiver">Receiver</option>
                            <option value="Imam">Imam</option>
                        </select><br>
                    </div>
                    <div>
                        <input type="date" class="form-control" placeholder="Date of Birth" name="dateofbirth" required=""/><br>
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" name="email" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Contact" name="contact" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Street Address" name="streetaddress" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="City" name="city" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Country" name="country" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
                    </div>
                    
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit " type="submit" name="submit1" value="Sign Up">
                    </div>

                </form>
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

    </div>


</body>
</html>
