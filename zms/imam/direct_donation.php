<?php

include "header.php";
include "connection.php";
if (!isset($_SESSION["imam"])) {
  ?>
  <script type="text/javascript">
    window.location="login.php";
  </script>
  <?php
}

?>

<style>
body {
  font-family: Arial;
  font-size: 13px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

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

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}



.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h1>Pay Zakat</h1>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
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
      <form name="form1" action="direct_donation.php" method="post">
     
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
            
            <div class="col-lg-4  col-lg-push-0" style="width:320px;">
              <label for="name"><i class="fa fa-name"></i></label>
             <select class="form-control" name="rname">
              <option value="">Receiver Name</option>
                    <?php
                      $res=mysqli_query($link, "SELECT * FROM user AS U JOIN post AS P ON U.ID = P.User_ID WHERE U.Type = 'Receiver'");
                       while ($row=mysqli_fetch_array($res)) {
                       ?><option value="<?php echo $row["User_Name"]; ?>">
                       <?php echo $row["User_Name"]; ?>
                      </option><?php  
                      }
                      ?>
                      </select>
            </div>
            <div class="col-lg-4  col-lg-push-0" style="width:320px;">
              <label for="name"><i class="fa fa-name"></i></label>
             <select class="form-control" name="fname">
              <option value="">Foundation Name</option>
                    <?php
                      $res=mysqli_query($link, "SELECT * FROM mosques_charity_foundation WHERE Type LIKE 'Foundation'");
                       while ($row=mysqli_fetch_array($res)) {
                       ?><option value="<?php echo $row["Name"]; ?>">
                       <?php echo $row["Name"]; ?>
                      </option><?php  
                      }
                      ?>
                      </select>
            </div>
            
            <div class="col-lg-4  col-lg-push-0">
            <label for="amount"><i class="fa fa-amount"></i> Amount</label>
            <input type="text" id="amount" name="amount" placeholder="value (&#2547;)" required="">
            </div>

            <div class="col-lg-4  col-lg-push-0">
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
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php

            if (isset($_POST["submit1"]))
            {
                $sql = mysqli_query($link, "INSERT INTO donated_zakat VALUES('', '$_POST[amount]', CURDATE(), (SELECT ID FROM user WHERE User_Name LIKE '$_POST[username]' AND Type LIKE 'Imam'), COALESCE(null, (SELECT ID FROM post WHERE User_ID = (SELECT ID FROM user WHERE User_Name LIKE '$_POST[rname]' AND Type LIKE 'Receiver'))), COALESCE(null, (SELECT ID FROM mosques_charity_foundation WHERE Name LIKE '$_POST[fname]')));");
                
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