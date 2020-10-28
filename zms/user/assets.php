<?php
include "connection.php";
if (!isset($_SESSION["user"])) {
  ?>
  <script type="text/javascript">
    window.location="../login.php";
  </script>
  <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update your Assets</title>
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


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="" method="post">

                    <div style="color: white" class="separator">
                        <h1>Enter Your New Assets</h1>

                    <div>
                        <input type="text" class="form-control" placeholder="Username" name="username" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Value of Gold & Silver (&#2547;)" name="gold"/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Cash at Home (&#2547;)" name="cash"/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Bank Accounts (&#2547;)" name="bank"/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Share Values (&#2547;)" name="share"/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Value of Merchandise (&#2547;)" name="merchandise"/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Value of Property (&#2547;)" name="property"/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Other Value (&#2547;)" name="other"/>
                    </div>
                    
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit " type="submit" name="submit1" value="Update">
                    </div>

                </form>
            </section>

            <?php

            if (isset($_POST["submit1"]))
            {

                $sql = mysqli_query($link, "INSERT INTO assets_liabilities VALUES('', '$_POST[gold]', '$_POST[cash]', '$_POST[bank]', '$_POST[share]', '$_POST[merchandise]', '$_POST[property]', '$_POST[other]', (SELECT ID FROM user WHERE User_Name LIKE '$_POST[username]' AND Password LIKE '$_POST[password]'), CURDATE())");
                if ($sql === TRUE) {

                    echo "<script>window.alert('Assets Update Successful!')</script>";                
                } else {
                    echo "<script>window.alert('Something went wrong!')</script>";
                }      
            }
            ?>

    </div>


</body>
</html>
