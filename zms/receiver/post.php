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
</style>
<br>
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
                                <h2>Full Zakat Application</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

    <div class="contentsection contemplete clear">
		<div class="maincontent clear">
            <div class="ax">
			<div class="about">
				<?php
				$res1=mysqli_query($link, "SELECT U.User_Name AS name, P.Title AS Title, P.Amount AS Amount, P.Content AS Content, p.Upload_Date AS Upload_Date FROM user AS U JOIN post AS P ON U.ID = P.User_ID WHERE P.ID = $id");
				if ($res1) {
                while ($result = $res1->fetch_assoc()) {
            $res=mysqli_query($link, "SELECT SUM(Amount) AS Sump FROM donated_zakat WHERE Post_ID LIKE $id");
            while ($result1 = $res->fetch_assoc()) {
				?>
                <h3><?php echo "Expected Amount: "; echo $result['Amount']; echo " &#2547;"; ?></h3>
                <h3><?php echo "Donated Amount: "; echo $result1['Sump']; echo " &#2547;"; ?></h3>
				<h2 style="font-size: 40px;"><?php echo $result['Title']; ?></h2>
				<h4><?php echo $fm->formatDate($result['Upload_Date']); ?>, By <a href=""><?php echo $result['name']; ?></a>
				<p>
					 <?php echo $result['Content']; ?>
					 
				</p>
				
	</div>
</div>
<?php } } ?>
<?php } else { header("Location:aa.php");  } ?>

<?php
$res=mysqli_query($link, "SELECT * FROM comments WHERE Post_ID = '$id'");

            while ($row=mysqli_fetch_array($res)) {

                                echo "<tr>";
                                echo "<td>"; echo $row["Name"]; echo ": "; echo "</td><br>";
                                echo "<td>"; echo $row["Conmment"]; echo "</td><br>"; echo "</td><br>";
                                echo "</tr>";
                                }
?>

<form action="" method="post">
                        <textarea name="comment" cols="50" rows="2"></textarea>
                        <input type="submit" name="submit1" value="comment">
 </form>

    </div>                   <!-- /page content -->

        <?php

            if (isset($_POST["submit1"]))
            {
                
               $sql = mysqli_query($link, "INSERT INTO comments VALUES('', '$_SESSION[receiver]', '$_POST[comment]', '$id')");
                if ($sql === TRUE) {

                    echo "<script>window.alert('Successful!')</script>";        
                } else {
                    echo "<script>window.alert('Something went wrong!')</script>";
                }
            }

 ?>

<?php

include "footer.php";

?>