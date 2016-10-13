<?php
session_start();
error_reporting(0);
$b = $_SESSION['username'];
include("dbconnect.php");
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
                include("menu.php");
                ?>
                    <div id="content">
                        <div id="colOne"><?php
                            include("sidebar.php");
                            ?>
                        </div>
                       <?php if ($isLoggedIn && $authentication->isOwner($userdata['SID'])){ ?>
                    <div id="margin_figure">
                        <form action="blog_save.php" method="post">
                            <div>
                                <input value="<?php echo $userdata['SID'];?>" name="SID" type="hidden"/>
                                <br>
                                <div style="font-weight:bold; color:#FFFFFF;">Write you blog:</div>
                                <textarea placeholder="Write your blog here" name="Blog" cols="80" rows="15"></textarea><br>
                            </div>
                            <br>
                            <br>
                            <div align="right" style="padding-right:165px">
                                <button name="login" type="Submit" class="button button_blue">Save & Post
                                </button>
                            </div>
                        </form>
                </div>
                       <?php }else {
                           include("permission_error.php");
                       } ?>
            </div>
        </div>
        <div class="footer">
            <?php include("footer.php");
            ?>
        </div>
    </body>
</html>