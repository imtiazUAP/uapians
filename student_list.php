<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
    include_once("page.inc.php");
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
            <div id="wowslider-container1" style="height:200px">
                <?php include("slider1.php");
                ?>
            </div>
            <div id="content">
                <div id="colOne">
                    <?php
                    include("sidebar.php");
                    ?>
                </div>
                <div>
                    <div style="padding-top:40">
                        <form>
                            <?php
                            if (($userdata[admin] == '1')) {
                            ?>
                                <a href="student_insert.php?keepThis=true&TB_iframe=true&height=600&width=350&modal=true"
                                   title="New Student" class="thickbox">Create New Student</a>
                            <?php
                            }
                            ?>
                            <?php
                            if (($userdata[admin] == '1')) {
                                ?>

                                <a href="Sign_Up_List.php">On Waiting Student</a>
                            <?php
                            }
                            ?>
                            <table class="hoverTable" border="1" align="center" width="800">
                                <tr align="center">
                                    <td bgcolor="588C73" width="120"> Registration Number</td>
                                    <td bgcolor="588C73" width="200">Name of Student</td>
                                    <td bgcolor="588C73" width="100px"> Portrait</td>
                                    <td bgcolor="588C73" width="200"> Semester</td>

                                    <?php
                                    if (($userdata[admin] == '1')) {
                                        ?>
                                        <td bgcolor="#006699"> Results</td>
                                        <td bgcolor="#006699" width="100"> Admin|Panel</td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <?php
                                    $strquery = "SELECT S.*, M.SMName FROM s_info S, sm_info M WHERE S.SMID=M.SMID ORDER BY S.SReg DESC";
                                    $results = mysql_query($strquery);
                                    $num = mysql_numrows($results);
                                    $SID = mysql_result($results, $i, "SID");
                                    $f2 = mysql_result($results, $i, "SName");
                                    $f3 = mysql_result($results, $i, "SReg");
                                    $f12 = mysql_result($results, $i, "SPortrait");
                                    $SMName = mysql_result($results, $i, "SMName");
                                    $sql = "SELECT S.*, M.SMName FROM s_info S, sm_info M WHERE S.SMID=M.SMID ORDER BY S.SReg DESC";
                                    $result = @mysql_query($sql);
                                    $total_records = @mysql_num_rows($result);
                                    $record_per_page = 13;
                                    $scroll = 4;
                                    $page = new Page(); ///creating new instance of Class Page
                                    $page->set_page_data($_SERVER['PHP_SELF'], $_GET["SMID"], $total_records, $record_per_page, $scroll, true, true, true);
                                    $result = @mysql_query($page->get_limit_query($sql));
                                    while ($data = mysql_fetch_assoc($result)) {
                                ?>
                                    <tr align="center" class="tablerow" onclick="document.location = 'profile_list.php?SID=<?= $data['SID'] ?>';">
                                        <td width="120"><?= $data['SReg'] ?></td>
                                        <td width="200"><a href='profile_list.php? SID=<?= $data['SID'] ?>'><?= $data['SName'] ?></a>
                                        </td>
                                        <td width="100"><a href='profile_list.php? SID=<?= $data['SID'] ?>'><img
                                                    src=<?= $data['SPortrait'] ?> echo style="height:100px;"></a>
                                        </td>
                                        <td width="200"><?= $data['SMName'] ?></td>
                                        <?php
                                        if (($userdata[admin] == '1')) {
                                            ?>
                                            <td><a href='single_mark_list.php? SID=<?= $data['SID'] ?>'>
                                                    Results </a></td>
                                            <td width="100">
                                                <a href='student_edit.php?SID=<?= $data['SID'] ?>&keepThis=true&TB_iframe=true&height=600&width=350&do=edit&modal=true'
                                                   class='thickbox'> edit </a> | <a
                                                    href='student_delete.php?SID=<?= $data['SID'] ?>'> delete </a>
                                            </td>
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
            </div>
        </div>
        <div class="footer">
            <div class="footer">
                <?php include("footer.php");
                ?>
            </div>
        </div>
</body>
</html>
<?php
}?>