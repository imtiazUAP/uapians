<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
    include_once("page.inc.php");

            $b=$_SESSION['username'];
            $userrole = mysql_query("select * from userinfo where username='{$b}'");
            $userdata = mysql_fetch_assoc($userrole);
            //echo $userdata['admin'];




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
<div>
<head>
    <?php
    include("header.php");
    ?>
</div>
</head>

<body>
	<div id="grad1">
	<div class="bodydiv">
    <div class="realbody">
			<?php


                    $strquery="SELECT SPortrait,username FROM s_info INNER JOIN userinfo ON s_info.SID=userinfo.SID WHERE username='{$b}'";
                    $results=mysql_query($strquery);
                    $num=mysql_numrows($results);

                    $SPortrait=mysql_result($results,$i,"SPortrait");
                    $username=mysql_result($results,$i,"username");
            ?>



        <?php
            include("logo.php");
        ?>

        <div class="realbody" style="min-height:2300px">

         <?php
            include("menu.php");
         ?>

        </div>

  <form>
               <?php

                        $strquery="SELECT Message_Id, Message,SUBJECT,SName,SReg FROM messages_for_admin INNER JOIN s_info ON messages_for_admin.SID=s_info.SID";
                        $results=mysql_query($strquery);
                        $num=mysql_numrows($results);

                        $i=0;
                        while ($i< $num)
                        {
                        $Message_Id=mysql_result($results,$i,"Message_Id");
                        $Message=mysql_result($results,$i,"Message");
                        $Subject=mysql_result($results,$i,"Subject");
                        $SName=mysql_result($results,$i,"SName");
                        $SReg=mysql_result($results,$i,"SReg");
               ?>

            <div style="padding-bottom:50px; padding-left:100px; color:#FFFFFF">
            <div style="padding:10px">Registration No:<?php echo $SReg ; ?> </div>
            <div style="padding-left:10px"> Name: <?php echo $SName; ?></div>

            <div style="width:500px;padding:10px;margin:0px; font-size:16px; font-weight:bold"> Subject:<?php echo $Subject ; ?> </div>
            <br>
            <div style="width:500px;padding:10px;border:1px solid white;margin:0px; font-size:16px">Message: <?php echo $Message ; ?></div>



					<?php 
					    if (($userdata[admin] == '1')) {
					?>

                <td>
                    <?php
                        echo " <a href='Message_Delete.php?Message_Id=" . $Message_Id. "'> delete </a> ";
                    ?>
                </td>
					<?php
					     }
	 				?>
</div>

          <?php
               $i++;
               }
          ?>

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
        }
    ?>