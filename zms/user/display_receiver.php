<?php
include "header.php";
include "connection.php";
if (!isset($_SESSION["user"])) {
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
                        <h3>Receiver List</h3>
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
                                <h2>Details</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                                <?php
                                $res=mysqli_query($link, "SELECT CONCAT(First_Name, ' ', Last_Name) AS Name, ROUND(DATEDIFF(CURDATE(), Date_of_Birth) / 365, 0) AS Age, Email, Street_Address, City, Country FROM user WHERE Type LIKE 'Receiver';");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Name"; echo "</th>";
                                echo "<th>"; echo "Age"; echo "</th>";
                                echo "<th>"; echo "Email"; echo "</th>";
                                echo "<th>"; echo "Street Address"; echo "</th>";
                                echo "<th>"; echo "City"; echo "</th>";
                                echo "<th>"; echo "Country"; echo "</th>";
                                echo "</tr>";
                                
                                while ($row=mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo "<td>"; echo $row["Name"]; echo "</td>";
                                echo "<td>"; echo $row["Age"]; echo "</td>";
                                echo "<td>"; echo $row["Email"]; echo "</td>";
                                echo "<td>"; echo $row["Street_Address"]; echo "</td>";
                                echo "<td>"; echo $row["City"]; echo "</td>";
                                echo "<td>"; echo $row["Country"]; echo "</td>";
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