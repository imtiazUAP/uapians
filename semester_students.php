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
                <div class="realbody" style="height:2000px">
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
                            <div style="padding-top:40">
                                <form>
                                    <div align="center">
                                        <?php if ($isLoggedIn && $isAdmin) { ?>
                                            <a href="student_insert.php?keepThis=true&TB_iframe=true&height=350&width=280&modal=true"
                                               title="New Student" class="thickbox">Create New Student
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <table class="hoverTable" border="1px" align="center" width="800">
                                        <tr align="center" bgcolor="588C73">
                                            <td width="120"> Registration Number</td>
                                            <td width="200">Name of Student</td>
                                            <td width="100px"> Portrait</td>
                                            <td > Semester</td>
                                            <?php
                                            if ($isLoggedIn && $isAdmin) {
                                                ?>
                                                <td
                                                    bgcolor="#006699"> Results
                                                </td>
                                                <td
                                                    bgcolor="#006699" width="100"> Admin|Panel
                                                </td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                        $sql = "SELECT SID,SName,SReg,SPortrait,SMName FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE s_info.SMID='" . $_GET["SMID"] . "' order by SReg";
                                        $result = @mysql_query($sql);
                                        $total_records = @mysql_num_rows($result);
                                        $record_per_page = 13;
                                        $scroll = 4;
                                        $page = new Page(); ///creating new instance of Class Page
                                        $page->set_page_data($_SERVER['PHP_SELF'], $_GET["SMID"], $total_records, $record_per_page, $scroll, true, true, true);
                                        $result = @mysql_query($page->get_limit_query($sql));
                                        while ($data = mysql_fetch_assoc($result)) {
                                            ?>
                                            <tr align="center" class="tablerow"  onclick="document.location = 'student_profile.php?SID=<?= $data['SID'] ?>';">
                                                <td width="120"><?= $data['SReg'] ?>
                                                </td>
                                                <td width="200">
                                                    <a
                                                        href='student_profile.php?SID=<?= $data['SID'] ?>'><?= $data['SName'] ?>
                                                    </a>
                                                </td>
                                                <td width="100">
                                                    <a href='student_profile.php?SID=<?= $data['SID'] ?>'><img src=<?php echo $data['SPortrait'] ? $data['SPortrait'] : 'images/14101071.jpg' ?> echo style="height:100px; border-radius:45px;">
                                                    </a>
                                                </td>
                                                <td
                                                    width="200">
                                                    <?= $data['SMName'] ?>
                                                </td>
                                                <?php
                                                if ($isLoggedIn && $isAdmin) {
                                                    ?>
                                                    <td>
                                                        <a
                                                            href='single_mark_list.php?SID=<?=
                                                            $data['SID']
                                                            ?>'>
                                                            Results
                                                        </a>
                                                    </td>
                                                    <td
                                                        width="100">
                                                        <a
                                                            href='student_edit.php?SID=<?= $data['SID'] ?>&keepThis=true&TB_iframe=true&height=300&width=350&do=edit&modal=true'
                                                            class='thickbox'> edit
                                                        </a> |
                                                        <a
                                                            href='student_delete.php?SID=<?=
                                                            $data['SID']
                                                            ?>'>
                                                            delete
                                                        </a>
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <div style="color: #ffffff; background-color: #000000; margin-left: 270px; margin-right: 30px; font-size: 18px">
                                    <?php
                                    echo $page->get_page_nav();
                                    ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <?php
                    include("footer.php");
                    ?>
                </div>
    </body>
    </html>