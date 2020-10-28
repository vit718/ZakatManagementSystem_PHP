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
<style type="text/css">
    input[type=submit] {    
  width: 50%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  background-color: darkcyan;
  color: white;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

</style>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Thank You</h3>
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

        <section class="login_content">
        <form name="form1" action="your_zakat.php" method="post">
                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h1>Thank you very much!</h1>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <br>
                            <p>
                                Hi,<br>
                            </p>
                            <p>Thank you very much for your help and support; I really appreciate it! Your donations are the only source of income covering the costs of this project. Please use the Donate button below, your contribution is very welcome.</p>
                            <br>
          <div class="col-lg-3  col-lg-push-10">
            <label for="submit"><i class="fa fa-submit"></i></label>
                  <input class="btn btn-default submit" type="submit" name="submit1" value="OK">
            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
        <!-- /page content -->

<?php

include "footer.php";

?>