<?php
session_start();
error_reporting(0);
include("dbconnect.php");
$b = $_SESSION['username'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
$SID = $userdata['SID'];
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
                    <div id="margin_figure">
                        <h1 style="color:White;"> Tutorial Saved! </h1>
                    </div>
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





















