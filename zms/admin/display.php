<?php
session_start();
if (!isset($_SESSION["foundation"])) {
  ?>
  <script type="text/javascript">
    window.location="signin.php";
  </script>
  <?php
}
include "header.php";
include "connection.php";

?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>History</h3>
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
                                <h2>Donor Information</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                                <?php
                                $res=mysqli_query($link, "SELECT D.Amount AS A, D.Payment_Date AS P, CONCAT(U.First_Name, ' ', U.Last_Name) AS Name, U.Email AS E, U.Contact AS C, CONCAT(U.Street_Address, ', ', U.City, ', ', U.Country) AS address FROM donated_zakat AS D JOIN user AS U ON D.User_ID = U.ID WHERE D.Foundation_ID LIKE (SELECT ID FROM mosques_charity_foundation WHERE Name LIKE '$_SESSION[foundation]')");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Donated Amount"; echo "</th>";
                                echo "<th>"; echo "Payment Date"; echo "</th>";
                                echo "<th>"; echo "Name"; echo "</th>";
                                echo "<th>"; echo "Email"; echo "</th>";
                                echo "<th>"; echo "Contact"; echo "</th>";
                                echo "<th>"; echo "address"; echo "</th>";
                                echo "</tr>";
                                
                                while ($row=mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo "<td>"; echo $row["A"]; echo "</td>";
                                echo "<td>"; echo $row["P"]; echo "</td>";
                                echo "<td>"; echo $row["Name"]; echo "</td>";
                                echo "<td>"; echo $row["E"]; echo "</td>";
                                echo "<td>"; echo $row["C"]; echo "</td>";
                                echo "<td>"; echo $row["address"]; echo "</td>";
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