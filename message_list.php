<?php
session_start();
error_reporting(0);
include("dbconnect.php");
include_once("page.inc.php");

$b = $_SESSION['username'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
$Reg = $userdata['Reg'];
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
        <?php include("logo.php"); ?>
        <div class="realbody">

            <?php
            include("menu.php");
            ?>
            <div id="colOne">
                <?php
                include("sidebar.php");
                ?>
            </div>
            <?php
            if ($isLoggedIn) {
                ?>

                <?php

                $strquery = "SELECT Message,SUBJECT,SName,SReg FROM messages INNER JOIN s_info ON messages.SID=s_info.SID WHERE Receiver_Reg='" . $Reg . "'";
                $results = mysql_query($strquery);
                $num = mysql_numrows($results);
                if($num > 0){
                $i = 0;
                while ($i < $num) {
                    $Message = mysql_result($results, $i, "Message");
                    $Subject = mysql_result($results, $i, "Subject");
                    $SName = mysql_result($results, $i, "SName");
                    $SReg = mysql_result($results, $i, "SReg");
                    ?>

                    <div style="padding-bottom:50px; padding-left:270px; color:#FFFFFF">
                        <div style="padding:10px">Registration No:<?php echo $SReg; ?> </div>
                        <div style="padding-left:10px"> Name: <?php echo $SName; ?></div>
                        <div style="width:500px;padding:10px;margin:0px; font-size:16px; font-weight:bold">
                            Subject:<?php echo $Subject; ?> </div>
                        <br>

                        <div style="width:500px;padding:10px;border:1px solid white;margin:0px; font-size:16px">
                            Message: <?php echo $Message; ?></div>
                    </div>
                    <?php

                    $i++;
                }
                } else {
                    ?>
                    <div style="font-weight: bold;">
                        </br></br></br></br><p style="text-align:center">You have no message..... stay connected!</p>
                    </div>
                <?php
                }
                ?>
            <?php
            } else {
                include("permission_error.php");
            }
            ?>
        </div>

        <div class="footer">
            <?php
            include("footer.php");
            ?>
        </div>

</body>
</html>