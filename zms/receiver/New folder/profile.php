<?php

include "header.php";
include "connection.php";
if (!isset($_SESSION["receiver"])) {
  ?>
  <script type="text/javascript">
    window.location="login.php";
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
                        <h3>Fundraisers</h3>
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
                                <h2>Create Post</h2>



                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                                <form name="form1" class="col-lg-12" action="" method="post" enctype="multipart/form-data">
                                    <table class="table table-bordered">

                                        <tr>
                                        <tr>
                                            <td>
                                        <label for="amount"><i class="fa fa-amount"></i>Needed Amount </label>
                                        <input type="text1" id="amount" name="amount" placeholder="value (&#2547;)" required="">
                                           </td>
                                        </tr>
                                        <tr>

                                        <tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="title" placeholder="Title">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Content
                                            <textarea style="font-size: 30px;" name="content" class="form-control">
                                                
                                            </textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="submit" name="submit1" value="Post">
                                            </td>
                                        </tr>
                                    </table>
                                </form>


                                <div class="headersection templete clear">

    </div>
<div class="x_content">
    <div class="contentsection contemplete clear">
        <div class="maincontent clear">

            <?php

            $res=mysqli_query($link, "SELECT U.User_Name AS name, P.ID AS pid, P.Title AS Title, P.Amount AS Amount, P.Content AS Content, P.Upload_Date AS Upload_Date FROM user AS U JOIN post AS P ON U.ID = P.User_ID ORDER BY P.ID DESC");
                
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
                <h4><?php echo $fm->formatDate($result['Upload_Date']); ?>, By <a style="color: green" href=""><?php echo $result['name']; ?></a></h4>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


        <?php

            if (isset($_POST["submit1"]))
            {
               $sql = mysqli_query($link, "INSERT INTO post VALUES('','$_POST[title]','$_POST[content]', CURDATE(), '$_POST[amount]', (SELECT ID FROM user WHERE User_Name LIKE '$_SESSION[receiver]'))") or die(mysqli_error($link));
                if ($sql === TRUE) {
                echo "<script>window.alert('Post Successful!')</script>";
                ?>
        <script type="text/javascript">
            window.location="profile.php";
        </script>

        <?php
                
                } else {
                    echo "<script>window.alert('Something went wrong!')</script>";
                }
            }
            ?>




<?php

include "footer.php";

?>
