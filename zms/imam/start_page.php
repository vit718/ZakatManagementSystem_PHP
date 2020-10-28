<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zakat Calculator</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">

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
        <li><a href="assets.php">Update Assets</a></li>
      </ul>
    </div>
  </div>
</nav>
<body style="background:url('images/img5.jpg') no-repeat; background-position: center; background-size: cover;">
      <style>
      body {
        color: white;
      }
      </style>
</head>

<body>

<div style="background-color: black" class="jumbotron text-center">
  <h1>Zakat</h1>
  <p>The third pillar of islam!</p> 
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

<h3>Assets & Liabilities</h3>
                <form id="Form1" class="form-horizontal form-zakat" action="donate.php" method="post" name="Form1">
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

                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-6">
                            <input name="add_to_cart" type="hidden" value="1" />
                            <input name="product" type="hidden" value="2" /></td>
                            <button name="submit" type="submit" class="btn btn-danger btn-lg">Donate Now</button>
                        </div>
                    </div>
                     
                </form>
            </div>

            </div> <!--/row-->
    </div>
</section>

</body>
</html>
