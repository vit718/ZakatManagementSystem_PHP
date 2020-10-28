<?php
include "header.php";
include "connection.php";
if (!isset($_SESSION["receiver"])) {
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
<br>
<br>
<br>
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
                                <h2>Donor Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
        <?php

            

                $res=mysqli_query($link, "SELECT CONCAT(U.First_Name, ' ', U.Last_Name) AS name, D.Amount AS amount, D.Payment_Date AS Payment_Date, U.Email AS email, U.Contact AS contact, U.City AS city, U.Country AS country FROM donated_zakat AS D JOIN user AS U ON D.User_ID = U.ID JOIN post AS P ON D.Post_ID = P.ID WHERE U.Type LIKE 'Giver' AND D.Post_ID IS NOT NULL AND P.User_ID = (SELECT ID FROM user WHERE User_Name LIKE '$_SESSION[receiver]')");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Donor Name"; echo "</th>";
                                echo "<th>"; echo "Amount"; echo "</th>";
                                echo "<th>"; echo "Payment Date"; echo "</th>";
                                echo "<th>"; echo "Email"; echo "</th>";
                                echo "<th>"; echo "Contact"; echo "</th>";
                                echo "<th>"; echo "City"; echo "</th>";
                                echo "<th>"; echo "Country"; echo "</th>";
                                echo "</tr>";
                                
                                while ($row=mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo "<td>"; echo $row["name"]; echo "</td>";
                                echo "<td>"; echo $row["amount"]; echo "</td>";
                                echo "<td>"; echo $row["Payment_Date"]; echo "</td>";
                                echo "<td>"; echo $row["email"]; echo "</td>";
                                echo "<td>"; echo $row["contact"]; echo "</td>";
                                echo "<td>"; echo $row["city"]; echo "</td>";
                                echo "<td>"; echo $row["country"]; echo "</td>";
                                echo "</tr>";
                                }
                                
                                echo "</table>";
            

            ?>                
            </div>
            </div>
            </div>
            </div>

<?php

include "footer.php";

?>