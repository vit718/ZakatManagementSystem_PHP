<?php

include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <title>Zakat Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
    <body style="background:url('images/img5.jpg') no-repeat; background-position: center; background-size: cover;">
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
        <li><a href="registration.php">Sing Up</a></li>
        <li><a href="start_page.php">Zakat Calculator</a></li>
      </ul>
    </div>
  </div>
</nav>
</head>

<br>

<div style="background-color: black" class="col-lg-12 text-center">
    <h1 style="font-family:Lucida Console">Zakat</h1>
</div>

<br><br>
<br><br>
<br><br>

<body class="login">
<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            

            <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="submit1" value="Login">
                <a style="color: white" class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div style="color: white" class="separator">
                <p class="change_link">New to site?
                    <a style="color: white" href="registration.php"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br/>


            </div>
        </form>
    </section>
</div>

<?php

if(isset($_POST["submit1"]))
{
    $count=0;
    $res=mysqli_query($link, "SELECT * FROM User WHERE User_Name = '$_POST[username]' AND Password = '$_POST[password]' AND Type = 'Receiver'");
    $count=mysqli_num_rows($res);

    if ($count==0) {
        ?>
        <div class="alert alert-danger col-lg-6 col-lg-push-3">
            <strong style="color:white">Invalid</strong> Username Or Password.
        </div>
        <?php
    } else {
        session_start();
        $_SESSION["receiver"] = $_POST["username"];
        ?>
        <script type="text/javascript">
            window.location="profile.php";
        </script>

        <?php
    } 
}

?>

</body>
</html>
