<?php
session_start();
error_reporting(0);
include_once("page.inc.php");
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
                                <?php
                                include("sidebar.php");
                                ?>
                            </div>
                            <?php if ($isLoggedIn && $isAdmin){ ?>
                <div>
                    <div style="padding-top:40">
                        <form>
                            <?php
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
                                        <td width="100"><img src=<?= $data['SPortrait'] ?> echo style="height:100px; border-radius:5px;"></td>
                                        <td width="200"><?= $data['SMName'] ?></td>
                                        <?php
                                        if ($isLoggedIn && $isAdmin) {
                                        ?>
                                        <td width="100"><a style="color: #000000" href='sign_up_review.php?SReg=<?= $data['SReg'] ?>&keepThis=true&TB_iframe=true&height=300&width=300&do=edit&modal=true' class='thickbox button button_green'> Review</a> <a class='button button_red' style="color: #000000" href='sign_up_review_delete.php?SReg=<?= $data['SReg'] ?>'> delete </a></td>
                                        <?php
                                        }
                                        ?>
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
                    <?php }else {
                        include("permission_error.php");
                    } ?>

            </div>
        </div>
        <div class="footer">
            <?php include("footer.php");
            ?>
        </div>
    </body>
</html>