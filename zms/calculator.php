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
          <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
          <li class="nav-item active"><a href="calculator.php" style="color: black;" class="nav-link">Calculator</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

<div style="background-color: orange;" class="jumbotron text-center">
  <br>
  <br>
  <h1>Zakat Calculator</h1>
</div>

<div class="container">
    <div class="col-sm-8">
      <script type="text/javascript">// <![CDATA[
    /*<![CDATA[*/// 
    var amt_home;
    var amt_bank;
    var amt_shares;
    var amt_merchandise;
    var amt_gold;
    var amt_property;
    var amt_other;
    var amt_debts;
    var amt_expenses;
    var amt_nisab;
    var amt_zakah1;
    var amt_zakah2;
    var amt_total;
    function getIntValue(field) {
        if (isNaN(field.value)) {
            field.value = "0";
            return 0;
        }
        else if (field.value == "") {
            field.value = "0";
            return 0;
        }
        else {
            return parseFloat(field.value);
        }
    }
    function roundTwoDecimal(field) {
        var valueToRound
        valueToRound = field.value
        var t
        var s = new String(Math.round(valueToRound * 100))
        while (s.length < 3)
            s = '0' + s
        field.value = s.substr(0, t = (s.length - 2)) + '.' + s.substr(t, 2)
    }
    function removeZero(field) {
        if (field.value == "0.00") {
            field.value = "";
            return
        }
    }
    function calcAmt(frm) {
        amt_home = getIntValue(document.getElementById("amount_home"));
        amt_bank = getIntValue(document.getElementById("amount_bank"));
        amt_shares = getIntValue(document.getElementById("amount_shares"));
        amt_merchandise = getIntValue(document.getElementById("amount_merchandise"));
        amt_gold = getIntValue(document.getElementById("amount_gold"));
        amt_property = getIntValue(document.getElementById("amount_property"));
        amt_other = getIntValue(document.getElementById("amount_other"));
        amt_debts = getIntValue(document.getElementById("amount_debts"));
        amt_expenses = getIntValue(document.getElementById("amount_expenses"));
        amt_nisab = getIntValue(document.getElementById("amount_nisab"));
        document.getElementById("amount_zakah1").value = amt_home + amt_bank + amt_shares + amt_merchandise + amt_gold + amt_property + amt_other;
        if ((document.getElementById("amount_zakah1").value - amt_debts - amt_expenses - amt_nisab) > 0) {
            document.getElementById("amount_zakah2").value = Math.round((document.getElementById("amount_zakah1").value - amt_debts - amt_expenses) * 100) / 100;
        } else {
            document.getElementById("amount_zakah2").value = "0";
        }
        if (document.getElementById("amount_zakah2").value > 0) {
            document.getElementById("zakahCalculated").value = Math.round(document.getElementById("amount_zakah2").value * .025 * 100) / 100;
        } else {
            document.getElementById("zakahCalculated").value = "0";
        }
        roundTwoDecimal(document.getElementById("amount_home"));
        roundTwoDecimal(document.getElementById("amount_bank"));
        roundTwoDecimal(document.getElementById("amount_shares"));
        roundTwoDecimal(document.getElementById("amount_merchandise"));
        roundTwoDecimal(document.getElementById("amount_gold"));
        roundTwoDecimal(document.getElementById("amount_property"));
        roundTwoDecimal(document.getElementById("amount_other"));
        roundTwoDecimal(document.getElementById("amount_debts"));
        roundTwoDecimal(document.getElementById("amount_expenses"));
        roundTwoDecimal(document.getElementById("amount_zakah1"));
        roundTwoDecimal(document.getElementById("amount_zakah2"));
        roundTwoDecimal(document.getElementById("zakahCalculated"));
        removeZero(document.getElementById("amount_home"));
        removeZero(document.getElementById("amount_bank"));
        removeZero(document.getElementById("amount_shares"));
        removeZero(document.getElementById("amount_merchandise"));
        removeZero(document.getElementById("amount_gold"));
        removeZero(document.getElementById("amount_property"));
        removeZero(document.getElementById("amount_other"));
        removeZero(document.getElementById("amount_debts"));
        removeZero(document.getElementById("amount_expenses"));
    }
// ]]&gt;/*]]>*/</script>

                <form id="Form1" class="form-horizontal form-zakat" action="" method="post" name="Form1">
                    <div class="form-group">
                        <div class="col-sm-12"><h4>Gold and Silver</h4></div>
                        <label for="gold" class="col-sm-6 control-label">
                            <p>Value of Gold & Silver you possess</p>
                        </label>
                        <div class="col-sm-6">
                            <input id="amount_gold" class="form-control" name="amount_gold"  type="text" placeholder="value (&#2547;)" onchange="calcAmt(this.form)"/>                            
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-12"><h4>Money</h4></div>
                        <label for="gold" class="col-sm-6 control-label">
                            <p>Cash at Home & Bank Accounts</p>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="amount_home" name="amount_home" placeholder="value (&#2547;)" onchange="calcAmt(this.form)">                          
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gold" class="col-sm-6 control-label">
                            <p>Other Savings</p>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="amount_bank" name="amount_bank" placeholder="value (&#2547;)" onchange="calcAmt(this.form)">                          
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gold" class="col-sm-6 control-label">
                            <p>Investment & Share Values</p>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="amount_shares" name="amount_shares" placeholder="value (&#2547;)" onchange="calcAmt(this.form)">                          
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gold" class="col-sm-6 control-label">
                            <p>Money owed to you</p>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="amount_merchandise" name="amount_merchandise" placeholder="value (&#2547;)" onchange="calcAmt(this.form)">                          
                        </div>
                    </div>                      
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-12"><h4>Business Assets</h4></div>
                        <label for="gold" class="col-sm-6 control-label">
                            <p>Stock Value</p>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="amount_property" name="amount_property" placeholder="value (&#2547;)"  onchange="calcAmt(this.form)">                         
                        </div>
                    </div>                      
                    <hr>

                    <div style="display:none"><input class="form-control" id="amount_other" type="text" name="amount_other" size="12" onchange="calcAmt(this.form)" /></div>
                    <div style="display:none"><input class="form-control" id="amount_zakah1" type="text" name="amount_zakah1" readonly="readonly" size="12" value="0" onchange="calcAmt(this.form)" /></div>
                    <div class="form-group">
                        <div class="col-sm-12"><h4>Short Term Liabilities</h4></div>
                        <label for="gold" class="col-sm-6 control-label">
                            <p>Money You Owe</p>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="amount_debts" name="amount_debts" placeholder="value (&#2547;)" onchange="calcAmt(this.form)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gold" class="col-sm-6 control-label">
                            <p>Other Outgoings Due</p>
                        </label>
                        <div class="col-sm-6">                        
                            <input type="text" class="form-control" id="amount_expenses" name="amount_expenses" placeholder="value (&#2547;)" onchange="calcAmt(this.form)">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="gold" class="col-sm-6 control-label">
                            <h4>Net Assets</h4>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="amount_zakah2" name="amount_zakah2" placeholder="0" onchange="calcAmt(this.form)">                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gold" class="col-sm-6 control-label">
                            <h4>Nisab Threshold:</h4>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="amount_nisab" name="amount_nisab" value="239.43" readonly="readonly">                            
                        </div>
                    </div>
                    <hr>                      
                    <div class="form-group">
                        <label for="gold" class="col-sm-6 control-label">
                            <h4 class="total">TOTAL AMOUNT LIABLE FOR ZAKAT = </h4>
                        </label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" id="zakahCalculated" readonly="readonly" placeholder="0.0" name="amount">
                        </div>
                    </div>
                </form>
            </div>

            </div> <!--/row-->
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