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

include "format.php";
?>

<?php
$fm = new Format();
?>
<style type="text/css">

div.ax {
 padding: 70px;
  border: 1px solid #4CAF50;
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
                                <h2>Read Zakat Application</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
<div class="x_content" style="background-color: white;">
    <div class="contentsection contemplete clear">
        <div class="maincontent clear">

            <?php

            $res=mysqli_query($link, "SELECT P.ID AS pid, U.User_Name AS name, P.Amount AS Amount, P.Title AS Title, P.Content AS Content, P.Upload_Date AS Upload_Date, P.ID AS PID FROM user AS U JOIN post AS P ON U.ID = P.User_ID WHERE P.status = -1 ORDER BY P.ID DESC");
                
              if ($res) {
                while ($result = $res->fetch_assoc()) {
            $pID = $result["pid"];
            $res1=mysqli_query($link, "SELECT SUM(Amount) AS Sump FROM donated_zakat WHERE Post_ID LIKE $pID");
            while ($result1 = $res1->fetch_assoc()) {
            ?>
            <div class="ax">      
            <div class="samepost clear">
                <h3><?php echo "Expected Amount: "; echo $result['Amount']; echo " &#2547;"; ?></h3>
                <h3><?php echo "Donated Amount: "; echo $result1['Sump']; echo " &#2547;"; ?></h3>
                <h2><a style="font-size: 40px; color: blue" href="post.php?id=<?php echo $result['pid']; ?>"><?php echo $result['Title']; ?></a></h2>

                <h4><?php echo $fm->formatDate($result['Upload_Date']); ?>, By <a style="color: green" href="direct_donation.php"><?php echo $result['name']; ?></a></h4>
                <?php echo $fm->textShorten($result['Content']); ?>
                
                <div class="readmore clear">
                    <a style="color: blue" href="post.php?id=<?php echo $result['pid']; ?>">Read More</a>
                </div>
            </div>
    </div>

<?php } } ?>
<?php } else { header("Location:aa.php"); } ?>

        </div>
    </div>
</div>
       

                                <!-- /page content -->

<?php

include "footer.php";

?>