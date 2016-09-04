<?php
session_start();
error_reporting(0);
include_once("page.inc.php");
include("dbconnect.php");
$b = $_SESSION['username'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
if (empty($_SESSION['username'])) {
    ?>
    <script language="JavaScript">
        window.location = "index.php";
    </script><?php
} else {
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
            <?php include("logo.php"); ?>
                    <div class="realbody">
                    <?php
                    include("menu.php");
                    ?>
                        <div id="content">
                            <div id="colOne">
                                <div class="box">
                                <br>
                                <br>
                                <a href="index.php" style="text-decoration:none;font-size:24px; font-weight:bold"><span>Logout</span></a>
                                <div>
                                    <form>
                                        <input type="text" size="29" placeholder="Search for any page" onKeyUp="showResult(this.value)">
                                        <div id="livesearch"></div>
                                    </form>
                                </div>
                                <br>
                                <div id="paragraph_head">
                                    <h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Admin Controls</h3>
                                </div>
                                <ul class="bottom">
                                    <?php
                                    if (($userdata[admin] == '1')) {
                                    ?>
                                        <li><a href='php_sendmail_upload1.php'>Send Email</a></li>
                                        <li><a href='Admin_Control.php'>Students Signup Confirmation </a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        <br>
                        <br>
                        <div class="box">
                        <div id="paragraph_head">
                            <h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Clubs & Social Works</h3>
                        </div>
                        <ul class="bottom">
                            <?php
                            if (($userdata[admin] == '1')) {
                            ?>
                            <li><a href='php_sendmail_upload1.php'>Send Email</a></li>
                            <?php
                            }
                            ?>
                            <li><a href="upload_video_tutorial.php">Add Video Tutorial</a></li>
                            <li><a href="galary.php">Gallery</a></li>
                            <li><a href="Blood_List_All.php">Blood Bank</a></li>
                            <li><a href="Programing_Contest_Club.php">Programming Contest Club</a></li>
                            <li><a href="Research_Publication_Club.php">Research and Publication Club</a></li>
                            <li><a href="Sports_Club.php">Sports Club</a></li>
                            <li><a href="Software_Hardware_Club.php">Software and Hardware Club</a></li>
                            <li><a href="Cultural_Debating_Club.php">Cultural and Debating Club</a></li>
                            <li><a href="Web_Club.php">Web Club</a></li>
                        </ul>
                    </div>
                    <br>
                    <br>

                    <div class="fb-like-box" data-href="https://www.facebook.com/pages/UAPIANSNet/1452237808341753?ref=hl" data-width="238" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true">

                    </div>
                </div>
                <div>
                    <div style="padding-top:40">
                        <form>
                            <?php
                            if (($userdata[admin] == '1')) {
                            ?>
                                <a href="Student_Insert.php?keepThis=true&TB_iframe=true&height=600&width=350&modal=true" title="New Student" class="thickbox">Create New Student</a>
                            <?php
                            }
                                $strquery = "SELECT S.*, M.SMName FROM sign_up S, sm_info M WHERE S.SMID=M.SMID ORDER BY S.SReg";
                                $results = mysql_query($strquery);
                                $num = mysql_numrows($results);
                                $SID = mysql_result($results, $i, "SID");
                                $f2 = mysql_result($results, $i, "SName");
                                $f3 = mysql_result($results, $i, "SReg");
                                $f12 = mysql_result($results, $i, "SPortrait");
                                $SMName = mysql_result($results, $i, "SMName");

                                $sql = "SELECT S.*, M.SMName FROM sign_up S, sm_info M WHERE S.SMID=M.SMID ORDER BY S.SReg";
                                $result = @mysql_query($sql);
                                $total_records = @mysql_num_rows($result);
                                $record_per_page = 13;
                                $scroll = 4;
                                $page = new Page(); ///creating new instance of Class Page
                                $page->set_page_data($_SERVER['PHP_SELF'], $_GET["SMID"], $total_records, $record_per_page, $scroll, true, true, true);
                                $result = @mysql_query($page->get_limit_query($sql));
                            ?>
                                <table border="1" align="center" width="800">
                                    <tr align="center">
                                        <td bgcolor="588C73" width="120"> Registration Number</td>
                                        <td bgcolor="588C73" width="200">Name of Student</td>
                                        <td bgcolor="588C73" width="100px"> Portrait</td>
                                        <td bgcolor="588C73" width="200"> Semester</td>
                                        <td bgcolor="#006699" width="100"> Admin|Panel</td>
                                    </tr>
                                    <?php
                                        while ($data = mysql_fetch_assoc($result)) {
                                    ?>
                                    <tr align="center">
                                        <td width="120"><?= $data['SReg'] ?></td>
                                        <td width="200"><?= $data['SName'] ?></td>
                                        <td width="100"><img src=<?= $data['SPortrait'] ?> echo style="height:100px;"></td>
                                        <td width="200"><?= $data['SMName'] ?></td>
                                        <?php
                                        if (($userdata[admin] == '1')) {
                                        ?>
                                        <td width="100"><a href='Sign_Up_Review.php?SReg=<?= $data['SReg'] ?>&keepThis=true&TB_iframe=true&height=300&width=350&do=edit&modal=true' class='thickbox'> Review</a> | <a href='Sign_Up_Review_Delete.php?SReg=<?= $data['SReg'] ?>'> delete </a></td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                                    <?php
                                    }
                                    echo $page->get_page_nav();
                                    ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php include("footer.php");
            ?>
        </div>
    </body>
</html>