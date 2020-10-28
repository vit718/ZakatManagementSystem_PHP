<?php

include "header.php";
include "connection.php";
if (!isset($_SESSION["imam"])) {
  ?>
  <script type="text/javascript">
    window.location="../login.php";
  </script>
  <?php
}

include "format.php";
?>
<?php
$fm = new Format();
?>
<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
  header("Location:aa.php"); 
} else {
  $id = $_GET['id'];
}
?>

<style type="text/css">

div.ax {
 padding: 70px;
  border: 1px solid #4CAF50;
}
div.ax1 {
}

#amount { 
    width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  background-color: yellow;
}
#submit2 { 
    width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  background-color: dodgerblue;
}

</style>

<!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Full Zakat Application</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

    <div class="contentsection contemplete clear">
    <div class="maincontent clear">
            <div class="ax">
      <div class="about">
        <?php
        $res1=mysqli_query($link, "SELECT U.ID AS ID, U.User_Name AS name, P.Amount AS Amount, P.Title AS Title, P.Content AS Content, p.Upload_Date AS Upload_Date FROM user AS U JOIN post AS P ON U.ID = P.User_ID WHERE P.ID = $id");
        if ($res1) {
        while ($result = $res1->fetch_assoc()) {
            $res=mysqli_query($link, "SELECT SUM(Amount) AS Sump FROM donated_zakat WHERE Post_ID LIKE $id");
            while ($result1 = $res->fetch_assoc()) {
              $Need = $result["Amount"];
              $totald = $result1["Sump"];
        ?>
        <h3><?php echo "Expected Amount: "; echo $result['Amount']; echo " &#2547;"; ?></h3>
        <h3><?php echo "Donated Amount: "; echo $result1['Sump']; echo " &#2547;"; ?></h3>
        <h2 style="font-size: 40px;"><?php echo $result['Title']; ?></h2>
        <h4><?php echo $fm->formatDate($result['Upload_Date']); ?>, By <a href="direct_donation.php"><?php echo $result['name']; ?></a>
        <p>
           <?php echo $result['Content']; ?>
           
        </p>
        
  </div>
</div>
<div class="container">
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

    <div class="container">
      <form name="form1" action="" method="post">
            
            <div class="col-lg-4  col-lg-push-0">
            <label for="amount"><i class="fa fa-amount"></i> Amount</label>
            <input type="text1" id="amount" name="amount" placeholder="value (&#2547;)" required="">
            </div>

            <div class="col-lg-4  col-lg-push-4">
            <label for="submit"><i class="fa fa-submit"></i></label>
                  <input id="submit2" class="btn btn-default submit " type="submit" name="submit2" value="Donate">
            </div>
      </form>
  </div>


<?php } } ?>
<?php } else { header("Location:aa.php");  } ?>

<div class="ax1">
<?php
$res=mysqli_query($link, "SELECT * FROM comments WHERE Post_ID = '$id'");

            while ($row=mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo "<td>"; echo $row["Name"]; echo ": "; echo "</td><br>";
                                echo "<td>"; echo $row["Conmment"]; echo "</td><br>"; echo "</td><br>";
                                echo "</tr>";
                                }
?>
</div>
<form action="" method="post">
                        <textarea name="comment" cols="50" rows="2"></textarea>
                        <input type="submit" name="submit1" value="comment">
 </form>

  </div>                   <!-- /page content -->

        <?php

            if (isset($_POST["submit1"]))
            {
                
               $sql = mysqli_query($link, "INSERT INTO comments VALUES('', '$_SESSION[imam]', '$_POST[comment]', '$id')");
                if ($sql === TRUE) {

                    echo "<script>window.alert('Successful!')</script>";        
                } else {
                    echo "<script>window.alert('Something went wrong!')</script>";
                }
            }

 ?>
        <?php
            if (isset($_POST["submit2"]))
            {
              $total1 = $_POST["amount"];
              $total = $total1 + $totald;
              $total2 = $Need - $total;
              $total3 = $Need - $totald;
              echo $total2;
              if ($total2 >= 0) {
                
               $sql = mysqli_query($link, "INSERT INTO donated_zakat VALUES ('', '$_POST[amount]', CURDATE(), (SELECT ID FROM user WHERE User_Name LIKE '$_SESSION[imam]' AND Type LIKE 'Imam'), '$id', null)");
                if ($sql === TRUE) {

                    echo "<script>window.alert('Donation Successful!')</script>";        
                } else {
                    echo "<script>window.alert('Something went wrong!')</script>";
                }
            } else {
                echo "<script>window.alert('Need to Donate $total3 ৳')</script>";
            }
        }

 ?>
<?php

include "footer.php";

?>