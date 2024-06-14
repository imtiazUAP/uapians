<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
$b = $_SESSION['email'];
$userrole = mysql_query("select * from userinfo where email='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
$SID = $userdata['SID'];
if (empty($_SESSION['email'])) {
    ?>
    <script language="JavaScript"> window.location = "index.php";</script><?php } else { ?>
    <html>

    <head>
        <?php include ("header.php"); ?>
    </head>

    <body>
        <div id="canvas">
            <div class="body_wrapper">
                <?php include ("logo.php"); ?>
                <div class="body" style="min-height:2300px">
                    <?php include ("menu.php"); ?>
                    <div id="content_wrapper">
                        <div id="sidebar">
                            <?php include ("sidebar.php"); ?>
                        </div>
                        <?php
                        $strquery = "SELECT * FROM video_tutorial WHERE video_tutorial_cat_id='" . $_GET["vtid"] . "'";
                        $results = mysql_query($strquery);
                        $num = mysql_numrows($results);

                    </div>
                </div>
                <div class="footer"> <?php include ("footer.php"); ?>
                </div>
    </body>

    </html>
<?php } ?>