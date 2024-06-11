<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
?>
<?php
$b = $_SESSION['username'];
//$c=$_SESSION['userid'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
//echo $userdata['admin'];
$SID = $userdata['SID'];
if (empty($_SESSION['username'])) {
    ?>
    <script language="JavaScript">
        window.location = "index.php";
    </script><?php } else { ?>
    <html>

    <head>
        <?php
        include ("header.php");
        ?>
    </head>

    <body>
        <div id="canvas">
            <div class="body_wrapper">
                <?php include ("logo.php"); ?>
                <div class="body" style="min-height:2300px">
                    <?php include ("menu.php"); ?>
                    <div id="content_wrapper">
                        <div id="sidebar">
                            <?php
                            include ("sidebar.php");
                            ?>
                        </div>
                        <div id="content">
                            Reference Saved!
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <?php include ("footer.php");
                    ?>
                </div>
    </body>

    </html>
    <?php
} ?>