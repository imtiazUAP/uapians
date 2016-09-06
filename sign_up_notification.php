<?php
session_start();
error_reporting(0);
include("dbconnect.php");
?>
<html>
<head>
    <?php
    include("header.php");
    ?>
</head>
<body>
<div id="grad1">
    <div class="bodydiv" align="center">
        <?php
        include("logo_index.php");
        ?>
        <div class="realbody">
            <?php
            include("menu_index.php");
            ?>
            <div id="wowslider-container1" style="height:200px">
                <?php
                include("slider1.php");
                ?>
            </div>
            <div id="content">
                <div id="colOne" align="left">
                    <?php
                    include("sidebar_index.php");
                    ?>
                </div>
                <div id="margin_figure">
                    <div style="font-size:24px; font-weight:bold; padding:50; color:#FFFFFF">Your Registration is
                        Complete!!! Please wait for Admin Review (maximum 24 hour)
                        <br>
                        A confirmation a email will be sent to your valid email account with username and password. Use
                        that user name and password to log in...
                        <br>
                        ThankYou......
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php include("footer.php");
            ?>
        </div>

</body>
</html>