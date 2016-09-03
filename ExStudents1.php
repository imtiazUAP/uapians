<?php
session_start();
include('dbconnect.php'); ?>
<?php
$b = $_SESSION['username'];

$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);

if (empty($_SESSION['username'])) {
?>
    <script language="JavaScript">
        window.location="index.php";
    </script>
    <?php } else { ?>

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
        <div class="realbody" style="min-height:2000px">
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
                                <?php
                                if (($userdata[admin] == '1')) {
                                ?>
                                    <a href="Student_Insert.php?keepThis=true&TB_iframe=true&height=350&width=280&modal=true" title="New Student" class="thickbox">Create New Student</a>
                                <?php
                                }
                                ?>
                            </div>
                            <table class="hoverTable" border="1" align="center" width="800">
                                <tr align="center">
                                    <td bgcolor="588C73" width="120"> Registration Number</td>
                                    <td bgcolor="588C73" width="200">Name of Student</td>
                                    <td bgcolor="588C73" width="100px"> Portrait</td>
                                    <td bgcolor="588C73"> Semester</td>
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
                                $strquery = "SELECT SID,SName,SReg,SPortrait,SMName FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE s_info.SMID='9' order by SReg";
                                $results = mysql_query($strquery);
                                $num = mysql_numrows($results);

                                $i = 0;
                                while ($i < $num) {
                                    $SID = mysql_result($results, $i, "SID");
                                    $f2 = mysql_result($results, $i, "SName");
                                    $f3 = mysql_result($results, $i, "SReg");
                                    $f12 = mysql_result($results, $i, "SPortrait");
                                    $semester = mysql_result($results, $i, "SMName");
                                    ?>
                                <tr align="center" class="tablerow">
                                    <td width="120"><?php echo $f3; ?></td>
                                    <td><?php echo " <a href='Profile_List.php? SID=" . $SID . "'>$f2</a>" ?></td>
                                    <td width="100"><a href='Profile_List.php? SID=<?= $SID ?>'><img src=<?= $f12 ?> echo style="height:100px;"></a></td>
                                    <td width="120"><?php echo $semester; ?></td>
                                    <?php
                                    if (($userdata[admin] == '1')) {
                                    ?>
                                        <td><?php echo " <a href='Single_Mark_List.php? SID=" . $SID . "'> Results </a>" ?></td>
                                        <td width="100"><?php echo " <a href='Student_Edit.php?SID=" . $SID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true'     	class='thickbox' title='Edit Student - " . $f2 . "'> edit </a> "; ?> | <?php echo " <a href='Student_Delete.php?SID=" . $SID . "'> delete </a> "; ?></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <?php
                                $i++;
                                }
                                ?>
                            </table>
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
<?php
}
?>