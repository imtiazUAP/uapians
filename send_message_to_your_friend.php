<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
include_once ("page.inc.php");
?>
<?php
$b = $_SESSION['username'];
//$c=$_SESSION['userid'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
//echo $userdata['admin'];
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
        <div id="background_canvas">
            <div class="body_wrapper">
                <?php include ("logo.php"); ?>
                <div class="content_wrapper" style="min-height:2300px">
                    <?php include ("menu.php"); ?>
                    <div id="content">
                        <div id="colOne">
                            <?php
                            include ("sidebar.php");
                            ?>
                        </div>
                        <form action="Message_Save_to_your_friend.php" method="post">
                            <div>
                                <br />
                                <input value="<?php echo $userdata['SID']; ?>" name="SID" type="hidden" />
                                <div style="font-weight:bold; color:#FFFFFF;">Your Friends Registration No:</div>
                                <input type="text" name="Receiver_Reg" />
                                <br>
                                <br>
                                <div style="font-weight:bold; color:#FFFFFF;">Subject:</div>
                                <input type="text" name="Subject" />
                                <br>
                                <br>
                                <div style="font-weight:bold; color:#FFFFFF;">Message:</div>
                                <textarea name="Message" placeholder="Type your message here..." cols="80"
                                    rows="15"></textarea>
                                <br>
                            </div>
                            <br><br>
                            <div align="right" style="padding-right:165px">
                                <input type="Submit" />
                            </div>
                        </form>
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