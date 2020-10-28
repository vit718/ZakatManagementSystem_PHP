<?php

include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>

<head>
     <title>Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
    <body style="background-color: #D2B48C;">
</head>

<body class="login">

<div class="header">
  <a href="#default" class="logo">ZAKAT MANAGEMENT SYSTEM</a>
  <div class="header-right">
    <a class="active" href="registration.php">Sign Up</a>
    <a href="start_page.php">Zakat Calculator</a>
    <a href="#about">About Us</a>
  </div>
</div>
<br>
<div class="col-lg-12 text-center" style="color: black;">
    <h1>Login</h1>
</div>
<br>
<br>
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
    $res=mysqli_query($link, "SELECT * FROM User WHERE User_Name = '$_POST[username]' AND Password = '$_POST[password]' AND Type LIKE 'Giver'");
    $count=mysqli_num_rows($res);

    if ($count==0) {
        ?>
        <div class="alert alert-danger col-lg-6 col-lg-push-3">
            <strong style="color:white">Invalid</strong> Username Or Password.
        </div>
        <?php
    } else {
        session_start();
        $_SESSION["user"] = $_POST["username"];
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
