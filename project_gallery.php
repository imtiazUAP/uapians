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
                        <h1 style="color: #ffffff"> Project Gallery </h1>
                        <hr>
                        <p> Here we will provide you with exe file , apk or sometimes with the source code so that it will come
                            helpful for you from the previous project of the seniors . </p>
                        <br>
                        <p> There is also some project ideas by wihch you can work with. Contact with admins to join uapians dev team.
                    </div>
                    <hr>

                    <div id="margin_figure">
                        <table>
                            <tr>
                                <?php
                                $data = mysql_query("SELECT COUNT(project_id) AS total_project FROM project WHERE project.language_id = '1'");
                                $userdata = mysql_fetch_assoc($data);
                                $totalProject = $userdata['total_project'];
                                ?>
                                <td><figure><a href="projects.php?language_id=1"><img border="0" alt="W3Schools" src="images/system_images/c.jpg" width="265" height="160"></a><figcaption>Total project on it :<?php echo $totalProject; ?> </figcaption></figure></td>
                                <?php
                                $data = mysql_query("SELECT COUNT(project_id) AS total_project FROM project WHERE project.language_id = '2'");
                                $userdata = mysql_fetch_assoc($data);
                                $totalProject = $userdata['total_project'];
                                ?>
                                <td><figure><a href="projects.php?language_id=2"><img border="0" alt="W3Schools" src="images/system_images/c++.jpg" width="265" height="160"></a><figcaption>Total project on it :<?php echo $totalProject; ?> </figcaption></figure></td>
                                <?php
                                $data = mysql_query("SELECT COUNT(project_id) AS total_project FROM project WHERE project.language_id = '3'");
                                $userdata = mysql_fetch_assoc($data);
                                $totalProject = $userdata['total_project'];
                                ?>
                                <td><figure><a href="projects.php?language_id=3"><img border="0" alt="W3Schools" src="images/system_images/java.jpg" width="265" height="160"></a><figcaption>Total project on it :<?php echo $totalProject; ?> </figcaption></figure></td>
                            </tr>
                                <tr>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(project_id) AS total_project FROM project WHERE project.language_id = '4'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalProject = $userdata['total_project'];
                                    ?>
                                <td><figure><a href="projects.php?language_id=4"><img border="0" alt="W3Schools" src="images/system_images/android.jpg" width="265" height="160"></a><figcaption>Total project on it :<?php echo $totalProject; ?> </figcaption></figure></td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(project_id) AS total_project FROM project WHERE project.language_id = '5'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalProject = $userdata['total_project'];
                                    ?>
                                <td><figure><a href="projects.php?language_id=5"><img border="0" alt="W3Schools" src="images/system_images/csharp.jpg" width="265" height="160"></a><figcaption>Total project on it :<?php echo $totalProject; ?> </figcaption></figure></td>
                                    <?php
                                    $data = mysql_query("SELECT COUNT(project_id) AS total_project FROM project WHERE project.language_id = '6'");
                                    $userdata = mysql_fetch_assoc($data);
                                    $totalProject = $userdata['total_project'];
                                    ?>
                                <td><figure><a href="projects.php?language_id=6"><img border="0" alt="W3Schools" src="images/system_images/assembly.jpg" width="265" height="160"></a><figcaption>Total project on it :<?php echo $totalProject; ?> </figcaption></figure></td>
                            </tr>
                            <tr>
                                <?php
                                $data = mysql_query("SELECT COUNT(project_id) AS total_project FROM project WHERE project.language_id = '7'");
                                $userdata = mysql_fetch_assoc($data);
                                $totalProject = $userdata['total_project'];
                                ?>
                                <td><figure><a href="projects.php?language_id=7"><img border="0" alt="W3Schools" src="images/system_images/webapps.jpg" width="265" height="160"></a><figcaption>Total project on it :<?php echo $totalProject; ?> </figcaption></figure></td>
                                <?php
                                $data = mysql_query("SELECT COUNT(project_id) AS total_project FROM project WHERE project.language_id = '8'");
                                $userdata = mysql_fetch_assoc($data);
                                $totalProject = $userdata['total_project'];
                                ?>
                                <td><figure><a href="projects.php?language_id=8"><img border="0" alt="W3Schools" src="images/system_images/python.jpg" width="265" height="160"></a><figcaption>Total project on it :<?php echo $totalProject; ?> </figcaption></figure></td>
                                <?php
                                $data = mysql_query("SELECT COUNT(project_id) AS total_project FROM project WHERE project.language_id = '9'");
                                $userdata = mysql_fetch_assoc($data);
                                $totalProject = $userdata['total_project'];
                                ?>
                                <td><figure><a href="projects.php?language_id=9"><img border="0" alt="W3Schools" src="images/system_images/database.jpg" width="265" height="160"></a><figcaption>Total project on it :<?php echo $totalProject; ?> </figcaption></figure></td>
                            </tr>
                            <tr>
                                <?php
                                $data = mysql_query("SELECT COUNT(project_id) AS total_project FROM project WHERE project.language_id = '10'");
                                $userdata = mysql_fetch_assoc($data);
                                $totalProject = $userdata['total_project'];
                                ?>
                                <td><figure><a href="projects.php?language_id=10"><img border="0" alt="W3Schools" src="images/system_images/php.jpg" width="265" height="160"></a><figcaption>Total project on it :<?php echo $totalProject; ?> </figcaption></figure></td>
                                <?php
                                $data = mysql_query("SELECT COUNT(project_id) AS total_project FROM project WHERE project.language_id = '11'");
                                $userdata = mysql_fetch_assoc($data);
                                $totalProject = $userdata['total_project'];
                                ?>
                                <td><figure><a href="projects.php?language_id=11"><img border="0" alt="W3Schools" src="images/system_images/graphics.jpg" width="265" height="160"></a><figcaption>Total project on it :<?php echo $totalProject; ?> </figcaption></figure></td>
                                <?php
                                $data = mysql_query("SELECT COUNT(project_id) AS total_project FROM project WHERE project.language_id = '12'");
                                $userdata = mysql_fetch_assoc($data);
                                $totalProject = $userdata['total_project'];
                                ?>
                                <td><figure><a href="projects.php?language_id=12"><img border="0" alt="W3Schools" src="images/system_images/wordpress.jpg" width="265" height="160"></a><figcaption>Total project on it :<?php echo $totalProject; ?> </figcaption></figure></td>
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