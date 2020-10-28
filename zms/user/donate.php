<?php
include "header.php";
include "connection.php";
if (!isset($_SESSION["user"])) {
  ?>
  <script type="text/javascript">
    window.location="../login.php";
  </script>
  <?php
}
?>

<style>

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type=email] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type=password] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type=submit] {	
  width: 50%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  background-color: darkcyan;
  color: white;
}
</style>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h1></h1>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2></h2>
                <div class="row">
  <div class="col-75">
    <div class="container">
      <form name="form1" action="donate.php" method="post">
     
        <div class="row">
          <div class="col-50">
            <h3>Enter Your Information</h3><br>

            <div class="col-lg-4  col-lg-push-0">
            <label for="username"><i class="fa fa-user"></i> Username</label>
            <input type="text" id="username" name="username" placeholder="Username" required="">
            </div>

            <div class="col-lg-4  col-lg-push-0">
            <label for="pass"><i class="fa fa-password"></i> Password</label>
            <input type="password" id="pass" name="pass" placeholder="" required="">
            </div>
            
            <div class="col-lg-4  col-lg-push-0">
            <label for="amount"><i class="fa fa-amount"></i> Amount</label>
            <input type="text" id="amount" name="amount" placeholder="value (&#2547;)" required="">
            </div>
            <br>
            <br>
            <div class="col-lg-12  col-lg-push-0">
            <textarea style="font-size: 30px;" cols="30" rows="3" name="content" placeholder="Comment" class="form-control"></textarea>
            </div>

            <div class="col-lg-4  col-lg-push-0">
              <br>
              <br>
            <label for="submit"><i class="fa fa-submit"></i></label>
                  <input class="btn btn-default submit " type="submit" name="submit1" value="Donate">
            </div>
      </form>
    </div>
  </div>
 
</div>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                            </div>
                        </div>
                    </div>
        <!-- /page content -->
        <?php

            if (isset($_POST["submit1"]))
            {

                
                $sql = mysqli_query($link, "INSERT INTO donated_zakat VALUES('', '$_POST[amount]', CURDATE(), (SELECT ID FROM user WHERE User_Name LIKE '$_POST[username]' AND Type LIKE 'Giver'), null, null, '$_POST[content]')");
                
                if ($sql === TRUE) {

                  echo "<script>window.alert('Donation Successful!')</script>";                
                } else {
                echo "<script>window.alert('Something went wrong!')</script>";
              }
            }

            ?>

<?php

include "footer.php";

?>