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

input[type=text] {
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

<br>
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
 
        <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>My Zakat</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
        <?php
                
                $res=mysqli_query($link, "SELECT Name, Age, Email, ROUND(g+h+b+s+m+p+o, 0) AS Total_Zakat FROM (SELECT CONCAT(U.First_Name, ' ', U.Last_Name) AS Name, ROUND(DATEDIFF(CURDATE(), Date_of_Birth) / 365, 0) AS Age, Email AS Email, SUM(Gold_Silver) * .025 AS g, SUM(Home_Amount) * .025 AS h, SUM(Bank_Amount) * .025 AS b, SUM(Shares_Amount) * .025 AS s, SUM(Merchandise_Amount) * .025 AS m, SUM(Property_Amount) * .025 AS p, SUM(Other_Amount) * .025 AS o FROM assets_liabilities  AS A JOIN user AS U ON U.ID = A.User_ID WHERE U.User_Name LIKE '$_SESSION[user]') AS J");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Name"; echo "</th>";
                                echo "<th>"; echo "Age"; echo "</th>";
                                echo "<th>"; echo "Email"; echo "</th>";
                                echo "<th>"; echo "Total Zakat"; echo "</th>";
                                echo "</tr>";
                                
                                while ($row=mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo "<td>"; echo $row["Name"]; echo "</td>";
                                echo "<td>"; echo $row["Age"]; echo "</td>";
                                echo "<td>"; echo $row["Email"]; echo "</td>";
                                echo "<td>"; echo $row["Total_Zakat"]; echo "</td>";
                                echo "</tr>";
                                }
                                
                                echo "</table>";
            

            ?>
            <form id="Form1" class="form-horizontal form-zakat" action="direct_donation.php" method="post" name="Form1">
            <div class="form-group">
                        <div class="col-sm-offset-10 col-sm-0">
                            <input name="add_to_cart" type="hidden" value="1" />
                            <input name="product" type="hidden" value="2" /></td>
                            <button name="submit" type="submit" class="btn btn-danger btn-lg">Manual Donation</button><br>
                        </div>
            </div>
            </form>
            <form id="Form1" class="form-horizontal form-zakat" action="donate.php" method="post" name="Form1">
            <div class="form-group">
                        <div class="col-sm-offset-10 col-sm-0">
                            <input name="add_to_cart" type="hidden" value="1" />
                            <input name="product" type="hidden" value="2" /></td>
                            <button name="submit" type="submit" class="btn btn-danger btn-lg">Direct Donation</button>
                        </div>
            </div>
            </form>
                
            </div>
            </div>
            </div>
            </div>

<?php

include "footer.php";

?>