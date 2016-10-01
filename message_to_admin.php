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
            include("menu.php");
            ?>
            <div id="wowslider-container1" style="height:200px">
                <?php
                include("slider1.php");
                ?>
            </div>
            <div id="content">
                <div id="colOne">
                    <?php
                    include("sidebar.php");
                    ?>
                </div>
                <div style="padding-left: 350px">
                <?php
                if ($isLoggedIn) {
                ?>
                    <form action="message_save.php" method="post">
                        <div>
                            <br/>
                            <input value="<?php echo $userdata['SID']; ?>" name="SID" type="hidden"/>
                            <br>
                            <br>

                            <div style="font-weight:bold; color:#FFFFFF;">Subject:</div>
                            <input type="text" name="Subject"/>
                            <br>
                            <br>

                            <div style="font-weight:bold; color:#FFFFFF;">Message:</div>
                            <textarea placeholder="Type your message here..." name="Message" cols="80" rows="15"></textarea><br>
                        </div>
                        <br><br>

                        <div align="right" style="padding-right:165px">
                            <button name="login" type="Submit" class="button button_blue">Send Message
                            </button>
                        </div>
                    </form>

<?php }else {
    include("permission_error.php");
}
?>
    </div>
</div>
        </div>
<div class="footer">
    <?php include("footer.php");
    ?>
</div>
</body>
</html>