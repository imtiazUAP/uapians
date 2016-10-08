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
        <?php include("header.php"); ?>
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
                        $strquery = "SELECT
                                      project.project_id,
                                      project.SID,
                                      project.language_id,
                                      project.project_name,
                                      project.project_screenshot,
                                      project_link,
                                      source_code_link,
                                      cat_name,
                                      username,
                                      admin,
                                      platform_name
                                    FROM project
                                      INNER JOIN project_category_table
                                        ON project.project_cat_id = project_category_table.cat_id
                                      INNER JOIN userinfo
                                        ON project.SID = userinfo.SID
                                      INNER JOIN platform_table
                                        ON project.platform_id = platform_table.platform_id
                                    WHERE project.language_id = '" . $_GET["language_id"] . "'";
                        $results = mysql_query($strquery);
                        $num = mysql_numrows($results);

                        if ($num > 0) {
                            $i = 0;
                            while ($i < $num) {
                                $projectId = mysql_result($results, $i, "project_id");
                                $project_name = mysql_result($results, $i, "project_name");
                                $platform_id = mysql_result($results, $i, "platform_name");
                                $project_cat_id = mysql_result($results, $i, "cat_name");
                                $languageId = mysql_result($results, $i, "language_id");
                                $SName = mysql_result($results, $i, "username");
                                $userGroup = mysql_result($results, $i, "admin");
                                $SID = mysql_result($results, $i, "SID");
                                $project_link = mysql_result($results, $i, "project_link");
                                $source_code_link = mysql_result($results, $i, "source_code_link");
                                $project_screenshot = mysql_result($results, $i, "project_screenshot");
                                ?>

                                <div style="padding:10px; float: left;">
                                    <table style="width:250px; border: 1px solid;">
                                        <tr style="height:20px">
                                            <td style="color: #F44336" colspan=2 align="center"><?php echo $project_name; ?></td>
                                        </tr>
                                        <tr style="height:100px">
                                            <td colspan=2 align="center">
                                                <a target="_blank" href='<?php echo $project_link; ?>'><span><img style="width:300px; height:200px; border:1px solid white; vertical-align:middle" src="<?php echo $project_screenshot; ?>"<span> Click here for Demo</span></a>
                                            </td>
                                        </tr>
                                        <tr style="height:20px">
                                            <td colspan=2 align="center">
                                                <a target="_blank" style="color: #50B9E8" href='<?php echo $source_code_link ? $source_code_link : '#' ?>'><span><span><?php echo $source_code_link ? 'Download Source Code' : 'No source code'; ?> </span></a>
                                            </td>
                                        </tr>
                                        <tr style="height:20px; color: #55AA45">
                                            <td align="center"><a target="_blank" style="color: #55AA45" href='<?php if($userGroup==4 || $userGroup==5){ ?>employee_profile.php<?php }else {?>student_profile.php<?php } ?>?SID=<?php echo ($SID == 9999) ? '29' : $SID; ?>'>Uploaded by: <?= $SName ?> as <?php echo $project_cat_id; ?></a></td>
                                        </tr>
                                <?php if($isLoggedIn && $isAdmin){ ?>
                                        <tr style="height:20px; color: #55AA45">
                                            <td align="center"><a style="color: #ff0000" href='projects_delete.php?project_id=<?php echo $projectId; ?>&&language_id=<?php echo $languageId; ?>'>Delete</a></td>
                                        </tr>
                                    <?php } ?>
                                    </table>
                                </div>
                                <?php
                                $i++;
                            }
                        } else {
                            ?>
                            <div style="font-weight: bold;">
                                </br></br></br></br><p style="text-align:center">No projects are added for this category
                                    yet. Stay connected, it will be added...</p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="footer">
                    <?php include("footer.php"); ?>
                </div>
    </body>
</html>


