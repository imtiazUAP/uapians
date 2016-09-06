<?php
            session_start();
            error_reporting(0);
            include("dbconnect.php");
            include_once("page.inc.php");

            $b = $_SESSION['username'];
            $userrole = mysql_query("select * from userinfo where username='{$b}'");
            $userdata = mysql_fetch_assoc($userrole);

          if (empty($_SESSION['username'])) {
?>

            <script language="JavaScript">
                window.location="index.php";
            </script>
              <?php
                 }
                 else {
              ?>
<html>
<head>
    <?php
    include("header.php");
    ?>

</head>




      <body>

                <div id="grad1">
                    <div class="bodydiv">
                     <?php
                        include("logo.php");
                     ?>





                     <div class="realbody" style="min-height:2300px">

                     <?php

                            $strquery="SELECT SPortrait,username FROM s_info INNER JOIN userinfo ON s_info.SID=userinfo.SID WHERE username='{$b}'";
                            $results=mysql_query($strquery);
                            $num=mysql_numrows($results);

                            $SPortrait=mysql_result($results,$i,"SPortrait");
                            $username=mysql_result($results,$i,"username");
                     ?>

                      <?php
                             include("menu.php");
                      ?>



          <div id="content">s
          <div id="colOne">
                  <?php
                      include("sidebar.php");
                  ?>
          </div>

<div style="font-size:24px; font-weight:bold; padding:200">Done!!! ThankYou......
</div>

</div>
</div>

                        <div class="footer">
                            <?php
                                include("footer.php");
                            ?>
                        </div>
</body>
</html>
    <?php
}?>