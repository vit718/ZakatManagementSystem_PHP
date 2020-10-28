<?php
include "header.php";
include "connection.php";
if (!isset($_SESSION["admin"])) {
  ?>
  <script type="text/javascript">
    window.location="../login.php";
  </script>
  <?php
}


?>

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
                                <h2>Donated to Post: </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                

<?php

                $res=mysqli_query($link, "SELECT P.Title AS T, D.Amount AS A, D.Payment_Date AS P, CONCAT(U.First_Name, ' ', U.Last_Name) AS Name, U.Email AS E, U.Contact AS CN, CONCAT(U.Street_Address, ', ', U.City, ', ', U.Country) AS address FROM donated_zakat AS D JOIN post AS P ON P.ID = D.Post_ID JOIN user AS U ON P.User_ID = U.ID JOIN user AS U1 ON D.User_ID = U1.ID");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Post Title"; echo "</th>";
                                echo "<th>"; echo "Amount"; echo "</th>";
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

?>
<div class="x_title">
<h2>Donated to Mosques, Charity, Foundation: </h2>
<div class="clearfix"></div>
</div>
<?php

                $res1=mysqli_query($link, "SELECT D.Amount AS A, D.Payment_Date AS P, M.Name AS Name, M.Email AS E, M.Contact AS CN, CONCAT(M.Street_Address, ', ', M.City, ', ', M.Country) AS address FROM donated_zakat AS D JOIN mosques_charity_foundation AS M ON D.Foundation_ID = M.ID JOIN user AS U ON U.ID = D.User_ID");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Amount"; echo "</th>";
                                echo "<th>"; echo "Payment Date"; echo "</th>";
                                echo "<th>"; echo "Name"; echo "</th>";
                                echo "<th>"; echo "Email"; echo "</th>";
                                echo "<th>"; echo "Contact"; echo "</th>";
                                echo "<th>"; echo "address"; echo "</th>";
                                echo "</tr>";
                                
                                while ($row=mysqli_fetch_array($res1)) {
                                echo "<tr>";
                                echo "<td>"; echo $row["A"]; echo "</td>";
                                echo "<td>"; echo $row["P"]; echo "</td>";
                                echo "<td>"; echo $row["Name"]; echo "</td>";
                                echo "<td>"; echo $row["E"]; echo "</td>";
                                echo "<td>"; echo $row["CN"]; echo "</td>";
                                echo "<td>"; echo $row["address"]; echo "</td>";
                                echo "</tr>";
                                }
                                
                                echo "</table>";

?>
<div class="x_title">
<h2>Donated to Local Area: </h2>
<div class="clearfix"></div>
</div>
<?php


                $res2=mysqli_query($link, "SELECT D.Amount AS A, D.Payment_Date AS P, D.comment AS C FROM donated_zakat AS D JOIN user AS U ON D.User_ID = U.ID WHERE D.Post_ID IS NULL AND D.Foundation_ID IS NULL");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Amount"; echo "</th>";
                                echo "<th>"; echo "Payment Date"; echo "</th>";
                                echo "<th>"; echo "Comment"; echo "</th>";
                                echo "</tr>";
                                
                                while ($row=mysqli_fetch_array($res2)) {
                                echo "<tr>";
                                echo "<td>"; echo $row["A"]; echo "</td>";
                                echo "<td>"; echo $row["P"]; echo "</td>";
                                echo "<td>"; echo $row["C"]; echo "</td>";                                
                                echo "</tr>";
                                }
                                
                                echo "</table>";

            ?>                


                            </div>
                        </div>
                    </div>

        <!-- /page content -->

<?php

include "footer.php";

?>