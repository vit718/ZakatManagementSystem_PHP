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
<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
	header("Location:aa.php"); 
} else {
	$id = $_GET['id'];
}
?>

<style type="text/css">

div.ax {
 padding: 70px;
  border: 1px solid #4CAF50;
}
div.ax1 {
}

#amount { 
    width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  background-color: yellow;
}
#submit2 { 
    width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  background-color: dodgerblue;
}

</style>

<!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>
<!-- 
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Full Zakat Application</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

    <div class="contentsection contemplete clear">
		<div class="maincontent clear">
            <div class="ax">
			<div class="about">
				<?php
				$res1=mysqli_query($link, "SELECT U.ID AS ID, U.User_Name AS name, P.Amount AS Amount, P.Title AS Title, P.Content AS Content, p.Upload_Date AS Upload_Date FROM user AS U JOIN post AS P ON U.ID = P.User_ID WHERE P.ID = $id");
        
				if ($res1) {
        while ($result = $res1->fetch_assoc()) {
            $res=mysqli_query($link, "SELECT SUM(Amount) AS Sump FROM donated_zakat WHERE Post_ID LIKE $id");
            while ($result1 = $res->fetch_assoc()) {
              $Need = $result["Amount"];
              $totald = $result1["Sump"];
				?>
        <h3><?php echo "Expected Amount: "; echo $result['Amount']; echo " &#2547;"; ?></h3>
        <h3><?php echo "Donated Amount: "; echo $result1['Sump']; echo " &#2547;"; ?></h3>
				<h2 style="font-size: 40px;"><?php echo $result['Title']; ?></h2>
				<h4><?php echo $fm->formatDate($result['Upload_Date']); ?>, By <a href="direct_donation.php"><?php echo $result['name']; ?></a>
				<p>
					 <?php echo $result['Content']; ?>
					 
				</p>
				
	</div>
</div>

    <div class="container">
      <form name="form1" action="" method="post">

            <div class="col-lg-3  col-lg-push-0">
            <label for="submit"><i class="fa fa-submit"></i></label>
                  <input id="submit2" class="btn btn-default submit " type="submit" name="submit2" value="Accept">
            </div>

            <div class="col-lg-3  col-lg-push-5">
            <label for="submit"><i class="fa fa-submit"></i></label>
                  <input style="background-color: red;" id="submit2" class="btn btn-default submit " type="submit" name="submit3" value="Reject">
            </div>
      </form>
  </div>


<?php } } ?>
<?php } else { header("Location:aa.php");  } ?>

<div class="ax1">
<?php
$res=mysqli_query($link, "SELECT * FROM comments WHERE Post_ID = '$id'");

            while ($row=mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo "<td>"; echo $row["Name"]; echo ": "; echo "</td><br>";
                                echo "<td>"; echo $row["Conmment"]; echo "</td><br>"; echo "</td><br>";
                                echo "</tr>";
                                }
?>
</div>
<br>
<br>
<div>
<form action="" method="post">
                        <textarea name="comment" cols="50" rows="2"></textarea>
                        <input type="submit" name="submit1" value="comment">
 </form>

	</div>                   <!-- /page content -->

        <?php

            if (isset($_POST["submit1"]))
            {
                
               $sql = mysqli_query($link, "INSERT INTO comments VALUES('', '$_SESSION[user]', '$_POST[comment]', '$id')");
                if ($sql === TRUE) {

                    echo "<script>window.alert('Successful!')</script>";        
                } else {
                    echo "<script>window.alert('Something went wrong!')</script>";
                }
            }

 ?>

<?php
            if (isset($_POST["submit2"]))
            {
              $sql1 = mysqli_query($link, "UPDATE post SET status = '1' WHERE ID = '$id'");
                if ($sql1 === TRUE) {

                    echo "<script>window.alert('Accepted!')</script>";        
                } else {
                    echo "<script>window.alert('Something went wrong!')</script>";
                }
          }
          if (isset($_POST["submit3"]))
            {
              $sql1 = mysqli_query($link, "UPDATE post SET status = '0' WHERE ID = '$id'");
                if ($sql1 === TRUE) {

                    echo "<script>window.alert('Rejected!')</script>";        
                } else {
                    echo "<script>window.alert('Something went wrong!')</script>";
                }
          }      
        
?>


<?php

include "footer.php";

?>