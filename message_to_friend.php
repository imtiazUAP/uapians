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
            <div id="content">
                <div id="colOne">
                    <?php
                    include("sidebar.php");
                    ?>
                </div>
                <?php
                if ($isLoggedIn) {
                ?>
                <form action="message_save_to_friend.php" method="post" style="padding-top: 50px; padding-left: 350px">
                    <div>
                        <br/>
                        <input value="
                        <?php
                        echo $userdata['SID'];
                        ?>" name="SID" type="hidden"/>
                        <div style="font-weight:bold; color:#FFFFFF;">Your Friends Registration No:</div>
                        <input type="text" name="Receiver_Reg"/>
                        <br>
                        <br>
                        <div style="font-weight:bold; color:#FFFFFF;">Subject:</div>
                        <input type="text" name="Subject"/>
                        <br>
                        <br>
                        <div style="font-weight:bold; color:#FFFFFF;">Message:</div>
                        <textarea name="Message" placeholder="Type your message here..." cols="80" rows="15"></textarea>
                        <br>
                    </div>
                    <br><br>

                    <div align="right" style="padding-right:165px">
                        <button class="button button_green" type="submit"> Send Message </button>
                    </div>
                </form>
                <?php }else {
                    include("permission_error.php");
                }
                ?>
        </div>
    </div>
    <div class="footer">
        <?php include("footer.php");
        ?>
    </div>
</body>
</html>