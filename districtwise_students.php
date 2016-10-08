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
                <div>
                    <div style="padding-top:40">
                        <form method="post">
                            <div align="left" style="padding-left:30px;">
                                <table>
                                    <tr>
                                        <td>Select Your District: </td>
                                        <td>
                                            <select name="district_id" id="district_id" selected="">
                                                <?php
                                                $query = "SELECT DISTINCT district_id, district_name FROM districts";
                                                $rs = mysql_query($query) or die ('Error submitting');
                                                while ($rows = mysql_fetch_assoc($rs)) {
                                                    if ($row["district_id"] == $rows["district_id"]) {
                                                        $selected = 'selected="selected"';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                    print("<option value=\"" . $rows["district_id"] . "\" " . $selected . "  >" . $rows["district_name"] . "</option>");
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <button name="login" type="Submit" class="button button_blue">Search</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <table class="hoverTable" border="1" align="center" width="800">
                                <tr align="center">
                                    <td bgcolor="588C73" width="120"> Registration Number</td>
                                    <td bgcolor="588C73" width="200">Name of Student</td>
                                    <td bgcolor="588C73" width="100px"> Portrait</td>
                                    <td bgcolor="588C73"> Semester</td>
                                    <td bgcolor="588C73"> District</td>
                                </tr>

                                <?php
                                $sql = "SELECT
                                              SID,
                                              SName,
                                              SReg,
                                              SPortrait,
                                              SMName,
                                              s_info.SMID,
                                              district_name,
                                              s_info.Batch_ID,
                                              batch_info.Batch_Name
                                            FROM s_info
                                              LEFT OUTER JOIN sm_info
                                                ON s_info.SMID = sm_info.SMID
                                              LEFT OUTER  JOIN districts
                                                ON s_info.district_id = districts.district_id
                                              LEFT OUTER  JOIN batch_info
                                                ON batch_info.Batch_ID = s_info.Batch_ID
                                            WHERE s_info.district_id = '$_POST[district_id]'
                                            ORDER BY SReg";
                                $result = @mysql_query($sql);
                                $total_records = @mysql_num_rows($result);
                                $record_per_page = 13;
                                $scroll = 4;
                                $page = new Page(); ///creating new instance of Class Page
                                $page->set_page_data($_SERVER['PHP_SELF'], $_GET["SMID"], $total_records, $record_per_page, $scroll, true, true, true);
                                $result = @mysql_query($page->get_limit_query($sql));
                                while ($data = mysql_fetch_assoc($result)) {
                                    ?>
                                    <tr align="center" class="tablerow">
                                        <td width="120"><?= $data['SReg'] ?></td>
                                        <td width="200"><a href='student_profile.php?SID=<?= $data['SID'] ?> ' target="_blank"><?= $data['SName'] ?></a> </td>
                                        <td width="100"><a href='student_profile.php?SID=<?= $data['SID'] ?>' target="_blank"><img src=<?= $data['SPortrait'] ?> echo style="height:100px; border-radius: 15px"></a></td>
                                        <td width="200"><?php echo ($data['SMID'] > 8) ? $data['Batch_Name'] : $data['SMName'] ?></td>
                                        <td width="200"><?= $data['district_name'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                            <?php
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