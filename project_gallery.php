<?php
session_start();
error_reporting(0);
include("dbconnect.php");
$b = $_SESSION['username'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
if (empty($_SESSION['username'])) {
?>
    <script language="JavaScript">
        window.location="index.php";
    </script>
<?php
} else {
?>
<html>
    <head>
        <?php
        include("header.php");
        ?>
        <style>
            img {
                opacity: 0.9;
                filter: alpha(opacity=40); /* For IE8 and earlier */
            }

            img:hover {
                opacity: 1.0;
                filter: alpha(opacity=100); /* For IE8 and earlier */
            }
        </style>
    </head>
    <body>
        <div id="grad1">
            <div class="bodydiv">
                <?php
                include("logo.php");
                ?>
                <div class="realbody" style="min-height:2300px">
                    <?php
                    include("menu.php");
                    ?>
                <div id="content">
                    <div id="colOne">
                        <?php
                        include("sidebar.php");
                        ?>
                    </div>
                    <div>
                        <hr>
                        <h1> Project Gallery </h1>
                        <br>
                        <hr>
                        <br>
                        <p> Here we will provide you with exe file , apk or sometimes with the source code so that it will come
                            helpful for you from the previous project of the seniors . </p>
                        <br>
                        <p> There is also some project ideas by wihch you can work with
                    </div>
                    <hr>
                    <br>

                    <div id="margin_figure">
                        <table>
                            <tr>
                                <td><a href="projects.php?language_id=1"><img border="0" alt="W3Schools" src="images/c.jpg" width="265" height="160"></a></td>
                                <td><a href="projects.php?language_id=2"><img border="0" alt="W3Schools" src="images/c++.jpg" width="265" height="160"></a></td>
                                <td><a href="projects.php?language_id=3"><img border="0" alt="W3Schools" src="images/java.jpg" width="265" height="160"></a></td>
                            </tr>
                                <tr>
                                <td><a href="projects.php?language_id=4"><img border="0" alt="W3Schools" src="images/android.jpg" width="265" height="160"></a></td>
                                <td><a href="projects.php?language_id=5"><img border="0" alt="W3Schools" src="images/csharp.jpg" width="265" height="160"></a></td>
                                <td><a href="projects.php?language_id=6"><img border="0" alt="W3Schools" src="images/assembly.jpg" width="265" height="160"></a></td>
                            </tr>
                            <tr>
                                <td><a href="projects.php?language_id=7"><img border="0" alt="W3Schools" src="images/webapps.jpg" width="265" height="160"></a></td>
                                <td><a href="projects.php?language_id=8"><img border="0" alt="W3Schools" src="images/python.jpg" width="265" height="160"></a></td>
                                <td><a href="projects.php?language_id=9"><img border="0" alt="W3Schools" src="images/database.jpg" width="265" height="160"></a></td>
                            </tr>
                            <tr>
                                <td> <a href="projects.php?language_id=10"><img border="0" alt="W3Schools" src="images/php.jpg" width="265" height="160"></a></td>
                                <td><a href="projects.php?language_id=11"><img border="0" alt="W3Schools" src="images/graphics.jpg" width="265" height="160"></a></td>
                                <td><a href="projects.php?language_id=12"><img border="0" alt="W3Schools" src="images/wordpress.jpg" width="265" height="160"></a></td>
                            </tr>
                        </table>
                    </div>
               </div>
            </div>
            <div class="footer">
                <?php
                include("footer.php");
                ?>
            </div>
        </div>
    </body>
</html>
<?php
}
?>