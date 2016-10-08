<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
    $b = $_SESSION['username'];
    $userrole = mysql_query("select * from userinfo where username='{$b}'");
    $userdata = mysql_fetch_assoc($userrole);
?>
    <html>
    <head>
        <?php
        include("header.php");
        ?>
        <style>
            img {
                opacity: 1.0;
                filter: alpha(opacity=40); /* For IE8 and earlier */
            }
            img:hover {
                opacity: 0.8;
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
                    <div id="margin_figure">
                        <table>
                            <tr>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '1'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=1"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/html.png" width="265" height="160">
                                    </a>
                                    <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '2'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=2"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/html5.png" width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '3'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=3"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/css.png" width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '4'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=4"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/php.png" width="265"  height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '5'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=5"><img border="0" alt="W3Schools"src="images/system_images/tutorial_thumbnails/js.png" width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '6'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=6"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/jq.png" width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '7'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=7"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/word.png" width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '8'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=8"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/aja.png" width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '9'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=9"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/twitter.png" width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '10'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=10"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/joom.png" width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '11'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=11"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/photo.png" width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '12'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=12"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/illus.png" width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '13'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=13"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/seo.png" width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '14'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=14"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/csharp.png" width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '15'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=15"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/asp.png" width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '16'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=16"><img border="0" alt="W3Schools" src="images/system_images/tutorial_thumbnails/code.png" width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '17'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=17"><img border="0" alt="W3Schools"
                                                                              src="images/system_images/tutorial_thumbnails/cake.png" width="265"
                                                                              height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>

                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '18'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=18"><img border="0" alt="W3Schools"
                                                                              src="images/system_images/tutorial_thumbnails/mysql.png" width="265"
                                                                              height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '19'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=19"><img border="0" alt="W3Schools"
                                                                              src="images/system_images/tutorial_thumbnails/mssql.png" width="265"
                                                                              height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>

                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '20'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=20"><img border="0" alt="W3Schools"
                                                                              src="images/system_images/tutorial_thumbnails/c.png" width="265"
                                                                              height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>

                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '21'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=21"><img border="0" alt="W3Schools"
                                                                              src="images/system_images/tutorial_thumbnails/c++.png" width="265"
                                                                              height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '22'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=22"><img border="0" alt="W3Schools"
                                                                              src="images/system_images/tutorial_thumbnails/python.png" width="265"
                                                                              height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>

                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '23'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=23"><img border="0" alt="W3Schools"
                                                                              src="images/system_images/tutorial_thumbnails/java.png" width="265"
                                                                              height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>

                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '24'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=24"><img border="0" alt="W3Schools"
                                                                              src="images/system_images/tutorial_thumbnails/gra.png" width="265"
                                                                              height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '25'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=25"><img border="0" alt="W3Schools"
                                                                              src="images/system_images/tutorial_thumbnails/and.png" width="265"
                                                                              height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>

                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '26'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=26"><img border="0" alt="W3Schools"
                                                                              src="images/system_images/tutorial_thumbnails/odesk.png" width="265"
                                                                              height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
                                </td>

                                <td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(tutorial_id) AS total_tutorial FROM video_tutorial WHERE video_tutorial_cat_id = '27'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalTutorial = $userdata['total_tutorial'];
                                    ?>
                                    <figure>
                                    <a href="tutorials.php?vtid=27"><img border="0" alt="W3Schools"
                                                                              src="images/system_images/tutorial_thumbnails/others.jpg"
                                                                              width="265" height="160">
                                    </a>
                                        <figcaption>Total tutorial on it :<?php echo $totalTutorial; ?> </figcaption></figure>
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