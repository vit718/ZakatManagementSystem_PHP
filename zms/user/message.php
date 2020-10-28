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

mysqli_query($link, "UPDATE messages SET red = 'y' WHERE dusername LIKE '$_SESSION[user]'");

?>

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
                                <h2>Ask an Imam?</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                <form name="form1" class="col-lg-12" action="message.php" method="post" enctype="multipart/form-data">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <select class="form-control" name="dusername">
                                                    <?php
                                                    $res=mysqli_query($link, "SELECT * FROM user WHERE Type LIKE 'Imam'");
                                                    while ($row=mysqli_fetch_array($res)) {
                                                      ?><option value="<?php echo $row["User_Name"]; ?>">
                                                        <?php echo $row["User_Name"]; ?>
                                                      </option><?php  
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="title" placeholder="Title">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>message
                                            <textarea style="font-size: 30px;" name="message" class="form-control">
                                                
                                            </textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="submit" name="submit1" value="Send">
                                            </td>
                                        </tr>
                                    </table>
                                </form>




<table class="table table-bordered">
    <tr>
    <th>Messages</th>
    </tr>
</table> 
    </div>
       

                                <!-- /page content -->
        <?php
        $res=mysqli_query($link, "SELECT * FROM messages AS M JOIN user AS U ON U.ID = M.User_ID WHERE susername LIKE '$_SESSION[user]' OR dusername LIKE '$_SESSION[user]' ORDER BY M.ID DESC");

            while ($row=mysqli_fetch_array($res)) {

                $fullname = $row["First_Name"] . " " . $row["Last_Name"];
                                echo "<tr>";
                                echo "<td>"; echo "Name: "; echo $fullname; echo "</td><br>";
                                echo "<td>"; echo "Title: "; echo $row["title"]; echo "</td><br>";
                                echo "<td>"; echo "Message: "; echo $row["msg"]; echo "</td><br><br>";
                                echo "</tr>";
                                }
?>


        <?php

            if (isset($_POST["submit1"]))
            {

                
                $sql = mysqli_query($link, "INSERT INTO messages VALUES('', '$_SESSION[user]', '$_POST[dusername]', '$_POST[title]', '$_POST[message]', 'n', (SELECT ID FROM user WHERE User_Name LIKE '$_SESSION[user]'))") or die(mysqli_error($link));
                
                if ($sql === TRUE) {

         echo "<script>window.alert('message send!')</script>";
        ?>
        <script type="text/javascript">
            window.location="message.php";
        </script>

        <?php                
                } else {
                echo "<script>window.alert('Something went wrong!')</script>";
              }
            }

            ?>


<center>
    <div style="padding:10px;max-width:800px;">
    <h3>Search Q & A (Ask the Imam)</h3>

    <FORM name="qa" ACTION="" METHOD="get" onSubmit="ServeSearchWord(window.document.qa.Topic.value)">

     <input type="hidden" name="-op" value="eq"> 
     <input type="hidden" name="-db" value="services">
     <input type="hidden" name="-lay" value="Ask">
     <input type="hidden" name="Answer_flag" value="X">
     <input type="hidden" name="-format" value="resultTopics.asp">
     <input type="hidden" name="-Error" value="resultTopics.asp">
     <input type="hidden" name="-Sortfield" value="Answer_Date">
     <input type="hidden" name="-Sortorder" value="Descending">
     <input type="hidden" name="-Max" value="50">
     <input type="hidden" name="-op" value="eq">
     <input type="hidden" name="Adminfilter" value="2">


          <table BORDER="0" CELLSPACING="0">        
            <tr>
              <td width="100%">
              <font face="Verdana,Arial" color="#000000" size="2">
            <input type="hidden" name="-op" value="cn">
            <input TYPE="text" NAME="Topic" VALUE SIZE="29" tabindex="1">
              </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>           
              <td width="100%" align="center">
                  <input TYPE="submit" NAME="-find" VALUE="Search" tabindex="2">
                  <input TYPE="reset" VALUE="Clear" tabindex="3">
              </td>
            </tr>
          </table>

    </form>

    </div>

</center>

<p align="center" style="font-size:18px;font-weight:500;">
Topics Starting With:
<a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=A&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find"><br>
    A</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=B&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">B</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=C&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">C</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=D&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">D</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=E&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">E</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=F&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">F</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=G&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">G</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=H&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">H</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=I&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">I</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=J&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">J</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=K&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">K</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=L&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">L</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=M&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">M</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=N&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">N</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=O&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">O</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=P&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">P</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=Q&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">Q</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=R&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">R</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=S&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">S</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=T&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">T</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=U&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">U</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=V&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">V</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=W&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">W</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-error=error.shtml&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=X&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">X</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=Y&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">Y</a>
    | <a href="action.lasso.asp?-db=Services&amp;-lay=Ask&amp;-error=error.shtml&amp;-max=50&amp;-format=resultTopics.asp&amp;-op=bw&amp;Topic=Z&amp;-op=eq&amp;Answer_flag=X&-op=eq&Adminfilter=2&amp;-Sortfield=Topic&amp;-find">Z</a>

</p>



<!-- Start of Islam Chat code -->
<script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.license = 7499411;
window.__lc.chat_between_groups = false;
(function() {
var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
<!-- End of Islam Chat code -->

<hr>
<center>
<div style="max-width:1100px;">

 <table border=0 cellPadding=0 cellSpacing=0 width=100%>
        <tbody>
        <tr>
          <td vAlign=top width="100%">
           <p align="center" style="display:none;">
                <a href="userask.asp"><strong><font color="#000000">Ask a Question</font></strong></a>
                <br>
                Displaying Questions <b><font color="#FF0000">1</font></b> through <b><font color="#FF0000">50</font></b>
                of <b><font color="#FF0000">272</font></b>  Questions found. </font>
           </p>

            <div align="center">
                <center>
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                  <tr>
                    <td valign="top" width="189" align="center"><font face="Arial" size="1"></font></td>
                    <td valign="top" width="189" align="center"><font face="Arial" size="1"><input type=button value='Next Page' onClick="window.location='/qa/action.lasso.asp?PageCurrent=2&-db=Services&-lay=Ask&-error=error.shtml&-max=50&-format=resultTopics.asp&-op=bw&Topic=A&-op=eq&Answer_flag=X&-op=eq&Adminfilter=2&-Sortfield=Topic&-find'"> </font></td>
                  </tr>
                </table>
                </center>
</div>

            <div style="padding-left:40px;padding-right:40px;">

            <table border="0" cellspacing="1" cellpadding="0" width="100%">
              <tr>
                <td align="left" valign="top"><b>Topic: </b>
                    <b><font color="#FF0000"> A</font></b>
                </td>
              </tr>

              <tr>
                <td align="left" valign="top">
                <p align="center">
                    
                </td>
              </tr>

              <tr>
                <td align="left" valign="top" bgcolor="#ffffff">

                     <a href="javascript:popup1('http://www.islamicity.org/qa/action.lasso.asp?-db=services&-lay=Ask&-op=eq&number=4232&-format=detailpop.shtml&-find','500','473')">
                    

                    <font color="#800080"><b>Abdul Qadir Al-Jilani: </b></font> <font color="#800080">(Q:4232)</font> <font color="green"> <Span CLASS=INDENTSOME>Would you please give us a short biography of Abdul Qadir Al-Jilani and his contribution to Islam. In our country, people believe that he memorized the Qur'an when he was still a fetus. Is this true? ...</span></font>
                    </a><br>&nbsp;<br>

               </td>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>

              <tr>
                <td align="left" valign="top" bgcolor="#ffffff">

                     <a href="javascript:popup1('http://www.islamicity.org/qa/action.lasso.asp?-db=services&-lay=Ask&-op=eq&number=1047&-format=detailpop.shtml&-find','500','473')">
                    

                    <font color="#800080"><b>Abiding by the rules of Islam & Punishment: </b></font> <font color="#800080">(Q:1047)</font> <font color="green"> <Span CLASS=INDENTSOME>As-salamu alaykum.
Are the hardships that Muslims suffer in places like 
Albania, Bosnia, etc. a test or a punishment for them?
Or Allahu Alam?
From what is shown on TV, for example one can see th...</span></font>
                    </a><br>&nbsp;<br>

               </td>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>

              <tr>
                <td align="left" valign="top" bgcolor="#ffffff">

                     <a href="javascript:popup1('http://www.islamicity.org/qa/action.lasso.asp?-db=services&-lay=Ask&-op=eq&number=35353&-format=detailpop.shtml&-find','500','473')">
                    

                    <font color="#800080"><b>Ablition: </b></font> <font color="#800080">(Q:35353)</font> <font color="green"> <Span CLASS=INDENTSOME>Assalaamalaikum,

Is it allowed to make ablution for prayer without wearing clothes mean to say can we make ablution for prayer in half pant & baniyain.

Please reply.

</span></font>
                    </a><br>&nbsp;<br>

               </td>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>

              <tr>
                <td align="left" valign="top" bgcolor="#ffffff">

                     <a href="javascript:popup1('http://www.islamicity.org/qa/action.lasso.asp?-db=services&-lay=Ask&-op=eq&number=34562&-format=detailpop.shtml&-find','500','473')">
                    

                    <font color="#800080"><b>Ablution (Wudu) and nail polish: </b></font> <font color="#800080">(Q:34562)</font> <font color="green"> <Span CLASS=INDENTSOME>is it haram to wear nail polish</span></font>
                    </a><br>&nbsp;<br>

               </td>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>


                <td align="left" valign="top" bgcolor="#ffffff">

                     <a href="javascript:popup1('http://www.islamicity.org/qa/action.lasso.asp?-db=services&-lay=Ask&-op=eq&number=5582&-format=detailpop.shtml&-find','500','473')">
                    

                    <font color="#800080"><b>Ablution: </b></font> <font color="#800080">(Q:5582)</font> <font color="green"> <Span CLASS=INDENTSOME>assalamualaikum, can you tell me the exact steps of abulution ( wiping the head, does one has to bring the hands back to fore head, and wiping the neck) .Please , i want the information related to the...</span></font>
                    </a><br>&nbsp;<br>

               </td>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>

              <tr>
                <td align="left" valign="top" bgcolor="#ffffff">

                     <a href="javascript:popup1('http://www.islamicity.org/qa/action.lasso.asp?-db=services&-lay=Ask&-op=eq&number=6502&-format=detailpop.shtml&-find','500','473')">
                    

                    <font color="#800080"><b>Ablution: </b></font> <font color="#800080">(Q:6502)</font> <font color="green"> <Span CLASS=INDENTSOME>salaam
i am not quite sure about this could you please answer this question for me, Do you NEED to have wadu if want to count the tasbi( to do dhikir) at any time of the day please let me know i will...</span></font>
                    </a><br>&nbsp;<br>

               </td>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>

              <tr>
                <td align="left" valign="top" bgcolor="#ffffff">

                     <a href="javascript:popup1('http://www.islamicity.org/qa/action.lasso.asp?-db=services&-lay=Ask&-op=eq&number=6398&-format=detailpop.shtml&-find','500','473')">
                    

                    <font color="#800080"><b>Ablution: </b></font> <font color="#800080">(Q:6398)</font> <font color="green"> <Span CLASS=INDENTSOME>please let me know how to tawaza.clean before praying</span></font>
                    </a><br>&nbsp;<br>

               </td>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>

                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>

              <tr>
                <td align="left" valign="top" bgcolor="#ffffff">

                     <a href="javascript:popup1('http://www.islamicity.org/qa/action.lasso.asp?-db=services&-lay=Ask&-op=eq&number=4235&-format=detailpop.shtml&-find','500','473')">
                    

                    <font color="#800080"><b>Ablution: Nail polish</b></font> <font color="#800080">(Q:4235)</font> <font color="green"> <Span CLASS=INDENTSOME>It is said that ablution is not valid if a woman wears nail-polish. At the same time, it is said that ablution is valid if one wipes over one's stockings, instead of washing one's feet. If I apply my ...</span></font>
                    </a><br>&nbsp;<br>

               </td>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>

              <tr>
                <td align="left" valign="top" bgcolor="#ffffff">

                     <a href="javascript:popup1('http://www.islamicity.org/qa/action.lasso.asp?-db=services&-lay=Ask&-op=eq&number=4242&-format=detailpop.shtml&-find','500','473')">
                    

                    <font color="#800080"><b>Ablution: the concept behind it</b></font> <font color="#800080">(Q:4242)</font> <font color="green"> <Span CLASS=INDENTSOME>Ablution: the concept behind it 
</span></font>
                    </a><br>&nbsp;<br>

               </td>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>

              <tr>
                <td align="left" valign="top" bgcolor="#ffffff">

                     <a href="javascript:popup1('http://www.islamicity.org/qa/action.lasso.asp?-db=services&-lay=Ask&-op=eq&number=4243&-format=detailpop.shtml&-find','500','473')">
                    

                    <font color="#800080"><b>Ablution: the concept behind it</b></font> <font color="#800080">(Q:4243)</font> <font color="green"> <Span CLASS=INDENTSOME>Ablution: the concept behind it

</span></font>
                    </a><br>&nbsp;<br>

               </td>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>

              <tr>
                <td align="left" valign="top" bgcolor="#ffffff">

                     <a href="javascript:popup1('http://www.islamicity.org/qa/action.lasso.asp?-db=services&-lay=Ask&-op=eq&number=4244&-format=detailpop.shtml&-find','500','473')">
                    

                    <font color="#800080"><b>Ablution: the concept behind it</b></font> <font color="#800080">(Q:4244)</font> <font color="green"> <Span CLASS=INDENTSOME>Ablution: the concept behind it </span></font>
                    </a><br>&nbsp;<br>

               </td>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>

              <tr>
                <td align="left" valign="top" bgcolor="#ffffff">

                     <a href="javascript:popup1('http://www.islamicity.org/qa/action.lasso.asp?-db=services&-lay=Ask&-op=eq&number=4245&-format=detailpop.shtml&-find','500','473')">
                    

                    <font color="#800080"><b>Ablution: Undressed after ablution</b></font> <font color="#800080">(Q:4245)</font> <font color="green"> <Span CLASS=INDENTSOME>If one happens to undress, does he need to do his ablution again? </span></font>
                    </a><br>&nbsp;<br>

               </td>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>

              <tr>
                <td align="left" valign="top" bgcolor="#ffffff">

                     <a href="javascript:popup1('http://www.islamicity.org/qa/action.lasso.asp?-db=services&-lay=Ask&-op=eq&number=4234&-format=detailpop.shtml&-find','500','473')">
                    

                    <font color="#800080"><b>Ablution: what invalidates it & Certain misgivings.
</b></font> <font color="#800080">(Q:4234)</font> <font color="green"> <Span CLASS=INDENTSOME>By how many ways is ablution invalidated? Does touching a non-Muslim or touching a woman intentionally invalidate ablution? </span></font>
                    </a><br>&nbsp;<br>

               </td>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>

              <tr>
                <td align="left" valign="top" bgcolor="#ffffff">

                     <a href="javascript:popup1('http://www.islamicity.org/qa/action.lasso.asp?-db=services&-lay=Ask&-op=eq&number=2252&-format=detailpop.shtml&-find','500','473')">
                    

                    <font color="#800080"><b>Abortion - Euthanasia - Animals: </b></font> <font color="#800080">(Q:2252)</font> <font color="green"> <Span CLASS=INDENTSOME>I'm doing a research project on the Islamic culture, and I'd like to know what your positions
are on a)abortion b)euthanasia c)animals.
Please reply as soon as possible. Thankyou.
Cindy</span></font>
                    </a><br>&nbsp;<br>

               </td>
                <td valign="top" width="0" bgcolor="#ffffff"><font face="Verdana,Arial" size="2" color="#000000"><span style="display:none";">X</span></font></td>
              </tr>

              <tr>
                <td align="left" valign="top">
                    
                </td>
              </tr>






<?php

include "footer.php";

?>