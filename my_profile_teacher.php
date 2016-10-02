<?php
session_start();
error_reporting(0);
include("dbconnect.php");
$b = $_SESSION['username'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
$SID = $_GET["SID"];
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
            <div class="realbody" style="min-height:2300px">
                <?php
                include("menu.php");
                ?>

                <?php
                $strquery = "SELECT * from e_info INNER JOIN userinfo ON e_info.SID=userinfo.SID  WHERE e_info.SID='" . $_GET["SID"] . "'";
                $results = mysql_query($strquery);
                $num = mysql_numrows($results);
                $SID = mysql_result($results, $i, "SID");
                $Employee_Name = mysql_result($results, $i, "EName");
                $Employee_Designation = mysql_result($results, $i, "EDesignation");
                $Employee_Contact = mysql_result($results, $i, "Employee_Contact");
                $Employee_Speech = mysql_result($results, $i, "Employee_Speech");
                $Employee_Qualification = mysql_result($results, $i, "Employee_Qualification");
                $Employee_Experience = mysql_result($results, $i, "Employee_Experience");
                $Employee_Role = mysql_result($results, $i, "Employee_Role");
                $Employee_Portrait = mysql_result($results, $i, "Employee_Portrait");
                ?>
                <?php if ($isLoggedIn && ($isFaculty && $authentication->isOwner($_GET["SID"])) || $isAdmin) { ?>
                <div align="center" style=" width:1100px; height:20px; color: #ffffff; font-size: 16px">
                <a style="background-color: #4285F4; background-size: 80px 60px;"
                   href='my_profile_teacher_edit.php?SID=<?= $SID ?>'>Edit My Profile </a>
                <a style="background-color: #ABDEE1;" href='upload_project.php?SID=<?= $SID ?>'>-Upload
                    Projects </a>
                <a style="background-color: #55AA45;" href='upload_material.php?SID=<?= $SID ?>'>-Upload Course
                    Materials </a>
                <a style="background-color: #50B9E8;" href='upload_tutorial.php?SID=<?= $SID ?>'>-Upload Video
                    Tutorials </a>
                <a style="background-color: #FF8E65;"
                   href='photo_update_employee.php?SID=<?= $SID ?>&keepThis=true&TB_iframe=true&height=260&width=450&do=edit&modal=true'
                   class='thickbox' title='Change Profile Photo -<?= $Name ?>'> -Change Profile Photo </a>
                <a style="background-color: #F1D158;"
                   href='password_edit.php?SID=<?= $SID ?>&keepThis=true&TB_iframe=true&height=200&width=400&do=edit&modal=true'
                   class='thickbox' title='Change Password -<?= $Name ?>'> -Change Password </a>
                </div>
                <?php } ?>
                <div id="margin_figure_profile">
                    <div align="center" style="padding-top:30px">
                        <img style="width:150px;padding:10px;border:5px solid white;margin:0px; font-size:18px"
                             src="<?php echo $Employee_Portrait; ?>"/>
                    </div>
                    <p align="center"
                       style="font:Arial, Helvetica, sans-serif; font-size:40px; color:#FFFFFF"><?php echo $Employee_Name; ?></P>

                    <p align="center"
                       style="padding-top:1px; color:#FFFFFF; font-size:18px"><?php echo $Employee_Designation; ?></P>

                    <p align="center"
                       style="padding-top:10px; color:#FFFFFF; font-size:16px"><?php echo $Employee_Contact; ?></P>

                    <p style="padding-top:10px; color:#FFFFFF; font-size:18px">Speech for the Students:<br></p>

                    <div>
                        <p style="width:900px;padding:10px;border:2px solid white;margin:0px; font-size:14px"><?php echo $Employee_Speech; ?></P>
                    </div>

                    <p style="padding-top:10px; color:#FFFFFF; font-size:18px">Academic Qualification:<br></p>

                    <div>
                        <p style="width:900px;padding:10px;border:2px solid white;margin:0px; font-size:14px"><?php echo $Employee_Qualification; ?></P>
                    </div>
                    <p style="padding-top:10px; color:#FFFFFF; font-size:18px">Teaching Experience:<br></p>

                    <div>
                        <p style="width:900px;padding:10px;border:2px solid white;margin:0px; font-size:14px"><?php echo $Employee_Experience; ?></P>
                    </div>


                    <p style="padding-top:10px; color:#FFFFFF; font-size:18px">Playing Role in UAP:<br></p>

                    <div style="padding-bottom:75px">
                        <p style="width:900px;padding:10px;border:2px solid white;margin:0px; font-size:14px"><?php echo $Employee_Role; ?></P>
                    </div>
        </div>
                </div>
            <div class="footer">
                <?php include("footer.php");
                ?>
            </div>
            </div>

    </body>
    </html>