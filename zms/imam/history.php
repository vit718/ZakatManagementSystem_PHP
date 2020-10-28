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
              $rem = 0;
              $res3=mysqli_query($link, "SELECT SUM(Amount) AS TZ FROM donated_zakat WHERE User_ID LIKE (SELECT ID FROM user WHERE User_Name LIKE '$_SESSION[imam]')");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Due Zakat"; echo "</th>";
                                echo "<th>"; echo "Donated Zakat"; echo "</th>";
                                echo "<th>"; echo "Remaining Zakat"; echo "</th>";
                                echo "</tr>";
                                
                                while ($row=mysqli_fetch_array($res3)) {
                                  $res4=mysqli_query($link, "SELECT ROUND(g+h+b+s+m+p+o, 0) AS Total_Zakat FROM (SELECT SUM(Gold_Silver) * .025 AS g, SUM(Home_Amount) * .025 AS h, SUM(Bank_Amount) * .025 AS b, SUM(Shares_Amount) * .025 AS s, SUM(Merchandise_Amount) * .025 AS m, SUM(Property_Amount) * .025 AS p, SUM(Other_Amount) * .025 AS o FROM assets_liabilities  AS A JOIN user AS U ON U.ID = A.User_ID WHERE U.User_Name LIKE '$_SESSION[imam]') AS J");
                                while ($row1=mysqli_fetch_array($res4)) {
                                $rem = $row1["Total_Zakat"] - $row["TZ"];
                                echo "<tr>";
                                echo "<td>"; echo $row1["Total_Zakat"]; echo "</td>";
                                echo "<td>"; echo $row["TZ"]; echo "</td>";
                                echo "<td>"; echo $rem; echo "</td>";
                                
                                echo "</tr>";
                                }
                                }
                                echo "</table>";


                $res=mysqli_query($link, "SELECT P.Title AS T, D.Amount AS A, D.Payment_Date AS P, CONCAT(U.First_Name, ' ', U.Last_Name) AS Name, U.Email AS E, U.Contact AS CN, CONCAT(U.Street_Address, ', ', U.City, ', ', U.Country) AS address FROM donated_zakat AS D JOIN post AS P ON P.ID = D.Post_ID JOIN user AS U ON P.User_ID = U.ID JOIN user AS U1 ON D.User_ID = U1.ID WHERE U1.User_Name LIKE '$_SESSION[imam]'");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Post Title"; echo "</th>";
                                echo "<th>"; echo "Donated Amount"; echo "</th>";
                                echo "<th>"; echo "Payment Date"; echo "</th>";
                                echo "<th>"; echo "Name"; echo "</th>";
                                echo "<th>"; echo "Email"; echo "</th>";
                                echo "<th>"; echo "Contact"; echo "</th>";
                                echo "<th>"; echo "address"; echo "</th>";
                                echo "</tr>";
                                
                                while ($row=mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo "<td>"; echo $row["T"]; echo "</td>";
                                echo "<td>"; echo $row["A"]; echo "</td>";
                                echo "<td>"; echo $row["P"]; echo "</td>";
                                echo "<td>"; echo $row["Name"]; echo "</td>";
                                echo "<td>"; echo $row["E"]; echo "</td>";
                                echo "<td>"; echo $row["CN"]; echo "</td>";
                                echo "<td>"; echo $row["address"]; echo "</td>";
                                
                                echo "</tr>";
                                }
                                
                                echo "</table>";

                $res1=mysqli_query($link, "SELECT D.Amount AS A, D.Payment_Date AS P, M.Name AS Name, M.Email AS E, M.Contact AS CN, CONCAT(M.Street_Address, ', ', M.City, ', ', M.Country) AS address FROM donated_zakat AS D JOIN mosques_charity_foundation AS M ON D.Foundation_ID = M.ID JOIN user AS U ON U.ID = D.User_ID WHERE U.User_Name LIKE '$_SESSION[imam]'");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Post Title"; echo "</th>";
                                echo "<th>"; echo "Donated Amount"; echo "</th>";
                                echo "<th>"; echo "Payment Date"; echo "</th>";
                                echo "<th>"; echo "Name"; echo "</th>";
                                echo "<th>"; echo "Email"; echo "</th>";
                                echo "<th>"; echo "Contact"; echo "</th>";
                                echo "<th>"; echo "address"; echo "</th>";
                                echo "</tr>";
                                
                                while ($row=mysqli_fetch_array($res1)) {
                                echo "<tr>";
                                echo "<td>"; echo ""; echo "</td>";
                                echo "<td>"; echo $row["A"]; echo "</td>";
                                echo "<td>"; echo $row["P"]; echo "</td>";
                                echo "<td>"; echo $row["Name"]; echo "</td>";
                                echo "<td>"; echo $row["E"]; echo "</td>";
                                echo "<td>"; echo $row["CN"]; echo "</td>";
                                echo "<td>"; echo $row["address"]; echo "</td>";
                                echo "</tr>";
                                }
                                
                                echo "</table>";

                $res2=mysqli_query($link, "SELECT D.Amount AS A, D.Payment_Date AS P FROM donated_zakat AS D JOIN user AS U ON D.User_ID = U.ID WHERE D.Post_ID IS NULL AND D.Foundation_ID IS NULL AND U.User_Name LIKE '$_SESSION[imam]'");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Post Title"; echo "</th>";
                                echo "<th>"; echo "Donated Amount"; echo "</th>";
                                echo "<th>"; echo "Payment Date"; echo "</th>";
                                echo "<th>"; echo "Name"; echo "</th>";
                                echo "<th>"; echo "Email"; echo "</th>";
                                echo "<th>"; echo "Contact"; echo "</th>";
                                echo "<th>"; echo "address"; echo "</th>";
                                echo "</tr>";
                                
                                while ($row=mysqli_fetch_array($res2)) {
                                echo "<tr>";
                                echo "<td>"; echo ""; echo "</td>";
                                echo "<td>"; echo $row["A"]; echo "</td>";
                                echo "<td>"; echo $row["P"]; echo "</td>";
                                echo "<td>"; echo ""; echo "</td>";
                                echo "<td>"; echo ""; echo "</td>";
                                echo "<td>"; echo ""; echo "</td>";
                                echo "<td>"; echo ""; echo "</td>";                                
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