<?php
include "header.php";
include "connection.php";
if (!isset($_SESSION["user"])) {
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
                                <h2>Update Your Asset</h2>
 
        <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">


    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -80px;">
                <form name="form1" action="" method="post">

                    <div>
                    <input style="background-color: #ccffcc;" type="text" class="form-control" placeholder="Username" name="username" required=""/>
                    </div>
                    <div>
                    <input style="background-color: #ccffcc;" type="password" class="form-control" placeholder="Password" name="password" required=""/>
                    </div>
                    <div>
                    <input style="background-color: #ccffcc;" type="text" class="form-control" placeholder="Value of Gold & Silver (&#2547;)" name="gold"/>
                    </div>
                    <div>
                    <input style="background-color: #ccffcc;" type="text" class="form-control" placeholder="Cash at Home (&#2547;)" name="cash"/>
                    </div>
                    <div>
                    <input style="background-color: #ccffcc;" type="text" class="form-control" placeholder="Bank Accounts (&#2547;)" name="bank"/>
                    </div>
                    <div>
                    <input style="background-color: #ccffcc;" type="text" class="form-control" placeholder="Share Values (&#2547;)" name="share"/>
                    </div>
                    <div>
                    <input style="background-color: #ccffcc;" type="text" class="form-control" placeholder="Value of Merchandise (&#2547;)" name="merchandise"/>
                    </div>
                    <div>
                    <input style="background-color: #ccffcc;" type="text" class="form-control" placeholder="Value of Property (&#2547;)" name="property"/>
                    </div>
                    <div>
                    <input style="background-color: #ccffcc;" type="text" class="form-control" placeholder="Other Value (&#2547;)" name="other"/>
                    </div>
                    
                    <div class="col-lg-3  col-lg-push-3">
                        <input style="background-color: #4CAF50;" class="btn btn-default submit " type="submit" name="submit1" value="Update">
                    </div>

                </form>
            </section>

            <?php

            if (isset($_POST["submit1"]))
            {

                $sql = mysqli_query($link, "INSERT INTO assets_liabilities VALUES('', '$_POST[gold]', '$_POST[cash]', '$_POST[bank]', '$_POST[share]', '$_POST[merchandise]', '$_POST[property]', '$_POST[other]', (SELECT ID FROM user WHERE User_Name LIKE '$_POST[username]' AND Password LIKE '$_POST[password]'), CURDATE())");
                if ($sql === TRUE) {

                    echo "<script>window.alert('Assets Update Successful!')</script>";                
                } else {
                    echo "<script>window.alert('Something went wrong!')</script>";
                }      
            }
            ?>

    </div>


                
            </div>
            </div>
            </div>
            </div>
          </div>
        </div>


<?php

include "footer.php";

?>