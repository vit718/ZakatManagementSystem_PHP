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
<style type="text/css">

div.ax {
 padding: 70px;
  border: 1px solid #4CAF50;
}
</style>
<br>
<br>
<br>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="page-title">
                    <div class="title_left">
 <h3>Application Process</h3>



<ol><li>We receive your application online.</li><li>Your assigned caseworker will contact you back within 10 business days to discuss your application, request missing documents, or provide you with a decision by the Zakat Panel.</li><li>If you are approved by the Zakat Panel, you will receive your assistance within 1-5 business days.</li></ol>
</div>                       
                    </div>
                </div>
                            <div class="x_title">
                                <h2>Apply for Zakat</h2>



                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                                <form name="form1" class="col-lg-12" action="" method="post" enctype="multipart/form-data">
                                    <table class="table table-bordered">

                                        <tr>
                                        <tr>
                                            <td>
                                        
                                        <!-- <label for="amount"><i class="fa fa-amount"></i></label> -->
                                        <div class="form-group">
                                        <input type="text1" id="amount" class="col-lg-4" name="amount" placeholder="Needed Amount (&#2547;)" required="">
                                        </div>
                                           </td>
                                        </tr>
                                        <tr>

                                        <tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                <input type="text" class="form-control" name="title" placeholder="Title">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <textarea style="font-size: 30px;" cols="30" rows="3" name="content" placeholder="Description of Need" class="form-control"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <textarea style="font-size: 30px;" cols="30" rows="3" name="fn" placeholder="FINANCIAL INFORMATION" class="form-control"></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                        <h3>ATTACH SUPPORTING DOCUMENTS</h3>
                                        <label class="wpforms-field-label" for="wpforms-1411-field_150">Name of Document</label><input type="text" id="wpforms-1411-field_150" class="wpforms-field-large" name="wpforms[fields][150]" ></div><div id="wpforms-1411-field_151-container" class="wpforms-field wpforms-field-file-upload wpforms-one-third" data-field-id="151"><label class="wpforms-field-label" for="wpforms-1411-field_151">File Upload</label><input type="file" id="wpforms-1411-field_151" data-rule-extension="jpg,jpeg,jpe,gif,png,bmp,tiff,tif,ico,asf,asx,wmv,wmx,wm,avi,divx,mov,qt,mpeg,mpg,mpe,mp4,m4v,ogv,webm,mkv,3gp,3gpp,3g2,3gp2,txt,asc,c,cc,h,srt,csv,tsv,ics,rtx,css,vtt,mp3,m4a,m4b,aac,ra,ram,wav,ogg,oga,flac,mid,midi,wma,wax,mka,rtf,pdf,class,tar,zip,gz,gzip,rar,7z,psd,xcf,doc,pot,pps,ppt,wri,xla,xls,xlt,xlw,mpp,docx,docm,dotx,dotm,xlsx,xlsm,xlsb,xltx,xltm,xlam,pptx,pptm,ppsx,ppsm,potx,potm,ppam,sldx,sldm,onetoc,onetoc2,onepkg,oxps,xps,odt,odp,ods,odg,odc,odb,odf,wp,wpd,key,numbers,pages" data-rule-maxsize="134217728" name="wpforms_1411_151" ></div>
                                        </td>
                                        </tr>


                                            <td>
                                                <input class="btn btn-white py-3 px-5" style="background-color: green; color: white;" type="submit" name="submit1" value="Apply">
                                            </td>
                                        </tr>
                                    </table>
                                </form>


                                <div class="headersection templete clear">

    </div>
<div class="x_content">
    <h2>My Zakat Application</h2>
    <div class="contentsection contemplete clear">
        <div class="maincontent clear">

            <?php

            $res=mysqli_query($link, "SELECT U.User_Name AS name, P.ID AS pid, P.Title AS Title, P.Amount AS Amount, P.Content AS Content, P.Upload_Date AS Upload_Date, P.status AS status FROM user AS U JOIN post AS P ON U.ID = P.User_ID WHERE P.User_ID = (SELECT ID FROM user WHERE User_Name LIKE '$_SESSION[receiver]') ORDER BY P.ID DESC");
                
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
                <h3><?php echo "Status: "; if ($result['status'] == 1) {
                    echo "Accepted";
                } elseif ($result['status'] == -1) {
                    echo "Processing";
                } else { echo "Rejected";} ?></h3>
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

        <!-- /page content -->


        <?php

            if (isset($_POST["submit1"]))
            {
               $sql = mysqli_query($link, "INSERT INTO post VALUES('','$_POST[title]','$_POST[content]', CURDATE(), '$_POST[amount]', (SELECT ID FROM user WHERE User_Name LIKE '$_SESSION[receiver]'), '-1')") or die(mysqli_error($link));
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
