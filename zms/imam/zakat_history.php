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

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Zakat ledger</h3>
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
                                <h2>Total Assets: </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                                <?php


                                $res2=mysqli_query($link, "SELECT ROUND(Gold_Silver, 0) AS G, ROUND(Home_Amount, 0) AS H, ROUND(Bank_Amount, 0) AS B, ROUND(Shares_Amount, 0) AS S, ROUND(Merchandise_Amount, 0) AS M, ROUND(Property_Amount, 0) AS P, ROUND(Other_Amount, 0) AS O, Update_Date FROM assets_liabilities WHERE User_ID LIKE (SELECT ID FROM user WHERE User_Name LIKE '$_SESSION[imam]') GROUP BY Update_Date, Gold_Silver, Merchandise_Amount, Property_Amount");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Gold Silver"; echo "</th>";
                                echo "<th>"; echo "Home Amount"; echo "</th>";
                                echo "<th>"; echo "Bank Amount"; echo "</th>";
                                echo "<th>"; echo "Shares Amount"; echo "</th>";
                                echo "<th>"; echo "Merchandise Amount"; echo "</th>";
                                echo "<th>"; echo "Property Amount"; echo "</th>";
                                echo "<th>"; echo "Other Amount"; echo "</th>";
                                echo "<th>"; echo "Total Assets"; echo "</th>";
                                echo "<th>"; echo "Update Date"; echo "</th>";
                                echo "</tr>";
                                
                                while ($row=mysqli_fetch_array($res2)) {
                                $Total1 = $row["G"] + $row["H"] + $row["B"] + $row["S"] + $row["M"] + $row["P"] + $row["O"];
                                echo "<tr>";
                                echo "<td>"; echo $row["G"]; echo "</td>";
                                echo "<td>"; echo $row["H"]; echo "</td>";
                                echo "<td>"; echo $row["B"]; echo "</td>";
                                echo "<td>"; echo $row["S"]; echo "</td>";
                                echo "<td>"; echo $row["M"]; echo "</td>";
                                echo "<td>"; echo $row["P"]; echo "</td>";
                                echo "<td>"; echo $row["O"]; echo "</td>";
                                echo "<td>"; echo $Total1; echo "</td>";
                                echo "<td>"; echo $row["Update_Date"]; echo "</td>";
                                echo "</tr>";
                                }
                                
                                echo "</table>";
                            ?>
                            <div class="x_title">
                                <h2>Due Zakat: </h2>

                                <div class="clearfix"></div>
                            </div>
                            <?php

                                $res1=mysqli_query($link, "SELECT ROUND(Gold_Silver * .025, 0) AS G, ROUND(Home_Amount * .025, 0) AS H, ROUND(Bank_Amount * .025, 0) AS B, ROUND(Shares_Amount * .025, 0) AS S, ROUND(Merchandise_Amount * .025, 0) AS M, ROUND(Property_Amount * .025, 0) AS P, ROUND(Other_Amount * .025, 0) AS O, Update_Date FROM assets_liabilities WHERE User_ID LIKE (SELECT ID FROM user WHERE User_Name LIKE '$_SESSION[imam]') GROUP BY Update_Date, Gold_Silver, Merchandise_Amount, Property_Amount");

                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Gold Silver"; echo "</th>";
                                echo "<th>"; echo "Home Amount"; echo "</th>";
                                echo "<th>"; echo "Bank Amount"; echo "</th>";
                                echo "<th>"; echo "Shares Amount"; echo "</th>";
                                echo "<th>"; echo "Merchandise Amount"; echo "</th>";
                                echo "<th>"; echo "Property Amount"; echo "</th>";
                                echo "<th>"; echo "Other Amount"; echo "</th>";
                                echo "<th>"; echo "Total Zakat"; echo "</th>";
                                echo "<th>"; echo "Update Date"; echo "</th>";
                                echo "</tr>";

                                while ($row=mysqli_fetch_array($res1)) {
                                $Total = $row["G"] + $row["H"] + $row["B"] + $row["S"] + $row["M"] + $row["P"] + $row["O"];
                                echo "<tr>";
                                echo "<td>"; echo $row["G"]; echo "</td>";
                                echo "<td>"; echo $row["H"]; echo "</td>";
                                echo "<td>"; echo $row["B"]; echo "</td>";
                                echo "<td>"; echo $row["S"]; echo "</td>";
                                echo "<td>"; echo $row["M"]; echo "</td>";
                                echo "<td>"; echo $row["P"]; echo "</td>";
                                echo "<td>"; echo $row["O"]; echo "</td>";
                                echo "<td>"; echo $Total; echo "</td>";
                                echo "<td>"; echo $row["Update_Date"]; echo "</td>";
                                echo "</tr>";
                                }
                                echo "</table>";
                                

                                ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php

include "footer.php";

?>