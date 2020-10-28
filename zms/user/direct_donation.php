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



<div class="container">
  <h3>Enter Your Information</h3>
  <form class="" role="">
    <fieldset>
      <legend>Payment</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-number">Card Number</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Debit/Credit Card Number">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-3">
              <select class="form-control col-sm-2" name="expiry-month" id="expiry-month">
                <option>Month</option>
                <option value="01">Jan (01)</option>
                <option value="02">Feb (02)</option>
                <option value="03">Mar (03)</option>
                <option value="04">Apr (04)</option>
                <option value="05">May (05)</option>
                <option value="06">June (06)</option>
                <option value="07">July (07)</option>
                <option value="08">Aug (08)</option>
                <option value="09">Sep (09)</option>
                <option value="10">Oct (10)</option>
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
            </div>
            <div class="col-xs-3">
              <select class="form-control" name="expiry-year">
                <option value="13">2013</option>
                <option value="14">2014</option>
                <option value="15">2015</option>
                <option value="16">2016</option>
                <option value="17">2017</option>
                <option value="18">2018</option>
                <option value="19">2019</option>
                <option value="20">2020</option>
                <option value="21">2021</option>
                <option value="22">2022</option>
                <option value="23">2023</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code">
        </div>
      </div>
<!--       <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="button" class="btn btn-success">Pay Now</button>
        </div>
      </div> -->
    </fieldset>
  </form>
</div>



  <div class="col-75">
    <div class="container">
      <form name="form1" action="direct_donation.php" method="post">
     
        <div class="row">
          <div class="col-50">
            <h3></h3><br>

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

            <div class="col-lg-4  col-lg-push-0" style="width:320px;">
              <label for="name"><i class="fa fa-name"></i></label>
             <select class="form-control" name="fname">
              <option value="">Foundation Name</option>
                    <?php
                      $res=mysqli_query($link, "SELECT * FROM mosques_charity_foundation");
                       while ($row=mysqli_fetch_array($res)) {
                       ?><option value="<?php echo $row["Name"]; ?>">
                       <?php echo $row["Name"]; ?>
                      </option><?php  
                      }
                      ?>
                      </select>
            </div>

            <div class="col-lg-5  col-lg-push-5">
              <br>
              <br>
            <label for="submit"><i class="fa fa-submit"></i></label>
                  <input class="btn btn-default submit " type="submit" name="submit1" value="Donate">
            </div>
      </form>
    </div>
  </div>
 
</div>
        <!-- /page content -->
        <?php

            if (isset($_POST["submit1"]))
            {
                $sql = mysqli_query($link, "INSERT INTO donated_zakat VALUES('', '$_POST[amount]', CURDATE(), (SELECT ID FROM user WHERE User_Name LIKE '$_POST[username]' AND Type LIKE 'Giver'), null, COALESCE(null, (SELECT ID FROM mosques_charity_foundation WHERE Name LIKE '$_POST[fname]')), null);");
                
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