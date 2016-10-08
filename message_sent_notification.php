<?php
session_start();
error_reporting(0);
include("dbconnect.php");
include_once("page.inc.php");

$b = $_SESSION['username'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);

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

        <div class="realbody">

            <?php

            $strquery = "SELECT SPortrait,username FROM s_info INNER JOIN userinfo ON s_info.SID=userinfo.SID WHERE username='{$b}'";
            $results = mysql_query($strquery);
            $num = mysql_numrows($results);

            $SPortrait = mysql_result($results, $i, "SPortrait");
            $username = mysql_result($results, $i, "username");
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
                <?php
                if ($isLoggedIn) {
                ?>
                <div
                    style="color: #ffffff; font-size:24px; font-weight:bold; padding-left:270; padding-top: 100px; text-align: center">
                    Message sent, Admin will review your message & will take further action. ThankYou......
                </div>

    <?php
    } else {
        include("permission_error.php");
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