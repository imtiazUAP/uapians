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
        window.location = "index.php";
    </script>
<?php } else {
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
                    <div id="margin_figure">
                        <table>
                            <tr>
                                <td>
                                    <a href="tutorials.php?vtid=1"><img border="0" alt="W3Schools" src="images/videodefaultimage.jpg" width="265" height="160">
                                    </a>
                                </td>
                                <td>
                                    <a href="tutorials.php?vtid=2"><img border="0" alt="W3Schools" src="images/c.jpg" width="265" height="160">
                                    </a>
                                </td>
                                <td>
                                    <a href="tutorials.php?vtid=3"><img border="0" alt="W3Schools" src="images/c++.jpg" width="265" height="160">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="tutorials.php?vtid=4"><img border="0" alt="W3Schools" src="images/csharp.jpg" width="265"  height="160">
                                    </a>
                                </td>
                                <td>
                                    <a href="tutorials.php?vtid=5"><img border="0" alt="W3Schools"src="images/android.jpg" width="265" height="160">
                                    </a>
                                </td>
                                <td>
                                    <a href="tutorials.php?vtid=6"><img border="0" alt="W3Schools" src="images/assembly.jpg" width="265" height="160">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="tutorials.php?vtid=7"><img border="0" alt="W3Schools" src="images/webapps.jpg" width="265" height="160">
                                    </a>
                                </td>
                                <td>
                                    <a href="tutorials.php?vtid=8"><img border="0" alt="W3Schools" src="images/python.jpg" width="265" height="160">
                                    </a>
                                </td>
                                <td>
                                    <a href="tutorials.php?vtid=9"><img border="0" alt="W3Schools" src="images/database.jpg" width="265" height="160">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="tutorials.php?vtid=10"><img border="0" alt="W3Schools" src="images/php.jpg" width="265" height="160">
                                    </a>
                                </td>
                                <td>
                                    <a href="tutorials.php?vtid=11"><img border="0" alt="W3Schools" src="images/graphics.jpg" width="265" height="160">
                                    </a>
                                </td>
                                <td>
                                    <a href="tutorials.php?vtid=12"><img border="0" alt="W3Schools" src="images/wordpress.jpg" width="265" height="160">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="tutorials.php?vtid=13"><img border="0" alt="W3Schools" src="images/php.jpg" width="265" height="160">
                                    </a>
                                </td>
                                <td>
                                    <a href="tutorials.php?vtid=14"><img border="0" alt="W3Schools" src="images/graphics.jpg" width="265" height="160">
                                    </a>
                                </td>
                                <td>
                                    <a href="tutorials.php?vtid=15"><img border="0" alt="W3Schools" src="images/wordpress.jpg" width="265" height="160">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="tutorials.php?vtid=16"><img border="0" alt="W3Schools" src="images/php.jpg" width="265" height="160">
                                    </a>
                                </td>
                                <td>
                                    <a href="tutorials.php?vtid=17"><img border="0" alt="W3Schools"
                                                                              src="images/graphics.jpg" width="265"
                                                                              height="160">
                                    </a>
                                </td>

                                <td>
                                    <a href="tutorials.php?vtid=18"><img border="0" alt="W3Schools"
                                                                              src="images/wordpress.jpg" width="265"
                                                                              height="160">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="tutorials.php?vtid=19"><img border="0" alt="W3Schools"
                                                                              src="images/php.jpg" width="265"
                                                                              height="160">
                                    </a>
                                </td>

                                <td>
                                    <a href="tutorials.php?vtid=20"><img border="0" alt="W3Schools"
                                                                              src="images/graphics.jpg" width="265"
                                                                              height="160">
                                    </a>
                                </td>

                                <td>
                                    <a href="tutorials.php?vtid=21"><img border="0" alt="W3Schools"
                                                                              src="images/wordpress.jpg" width="265"
                                                                              height="160">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="tutorials.php?vtid=22"><img border="0" alt="W3Schools"
                                                                              src="images/php.jpg" width="265"
                                                                              height="160">
                                    </a>
                                </td>

                                <td>
                                    <a href="tutorials.php?vtid=23"><img border="0" alt="W3Schools"
                                                                              src="images/graphics.jpg" width="265"
                                                                              height="160">
                                    </a>
                                </td>

                                <td>
                                    <a href="tutorials.php?vtid=24"><img border="0" alt="W3Schools"
                                                                              src="images/wordpress.jpg" width="265"
                                                                              height="160">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="tutorials.php?vtid=25"><img border="0" alt="W3Schools"
                                                                              src="images/php.jpg" width="265"
                                                                              height="160">
                                    </a>
                                </td>

                                <td>
                                    <a href="tutorials.php?vtid=26"><img border="0" alt="W3Schools"
                                                                              src="images/graphics.jpg" width="265"
                                                                              height="160">
                                    </a>
                                </td>

                                <td>
                                    <a href="tutorials.php?vtid=27"><img border="0" alt="W3Schools"
                                                                              src="images/videodefaultimage.jpg"
                                                                              width="265" height="160">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
       </body>
      </div>
     </div>
    <div class="footer">
        <?php include("footer.php");
        ?>
    </div>
    </div>
    </body>
    </html>
<?php
}?>