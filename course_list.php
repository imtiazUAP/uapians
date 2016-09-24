<?php
session_start();
error_reporting(0);
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
<?php
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
            <?php
            include("logo.php");
            ?>
	        <div class="realbody">
            <?php
            include("menu.php");
            ?>
            <div id="colOne">
                <?php
                include("sidebar.php");
                ?>
            </div>
                <form>
                <?php
                if (($userdata[admin] == '1')) {
                    ?>
                    <a href="course_insert.php?keepThis=true&TB_iframe=true&height=150&width=200&modal=true" title="New Course" class="thickbox">Create New Course</a>
                <?php
                }
                ?>
                <div id="margin_figure">
	                <div id="paragraph_head">
	                    <h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif;">1st year 1st semester</h1>
	                </div>
	
                    <table class="hoverTable" width="820" style="padding-bottom:40px;padding-left:40px;padding-right:40px">
                        <tr align="center">
                            <td width="50" height="50" bgcolor="588C73">Course Code</td>
                            <td width="150" bgcolor="588C73">Course Name</td>
                            <td width="150" bgcolor="588C73">References</td>
                            <td width="150" bgcolor="588C73">Semister</td>
                        </tr>
                        <?php
                        $strquery="SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='1'";
                        $results=mysql_query($strquery);
                        $num=mysql_numrows($results);

                        $i=0;
                        while ($i< $num)
                        {
                        $CID=mysql_result($results,$i,"CID");
                        $CCode=mysql_result($results,$i,"CCode");
                        $CName=mysql_result($results,$i,"CName");
                        $SMName=mysql_result($results,$i,"SMName");
                        ?>
                        <tr align="center">
                            <td height="40"><?php echo $CCode ; ?></td>
                            <td><?php echo $CName ; ?></td>
                            <td ><?php echo " <a href='reference_list.php? CCode=".$CCode."'>Reference Source</a>"?></td>
                            <td><?php echo $SMName ; ?></td>
                                <?php
                                if (($userdata[admin] == '1')) {
                                    ?>
                                    <td><?php echo " <a href='course_edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $CID . "'> edit </a> "; ?> | <?php echo " <a href='course_delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
                                <?php
                                }
                                ?>
                        </tr>
                        <?php
                        $i++;
                        }
                        ?>
                    </table>

                    <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
                        <h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">1st year 2nd semester</h1>
                    </div>

                <table class="hoverTable" width="820" style="padding-bottom:40px;padding-left:40px;padding-right:40px">
                    <?php
                    $strquery = "SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='2'";
                    $results = mysql_query($strquery);
                    $num = mysql_numrows($results);

                    $i = 0;
                    while ($i < $num) {
                        $CID = mysql_result($results, $i, "CID");
                        $CCode = mysql_result($results, $i, "CCode");
                        $CName = mysql_result($results, $i, "CName");
                        $SMName = mysql_result($results, $i, "SMName");
                    ?>
                    <tr align="center">
                        <td height="40"><?php echo $CCode; ?></td>
                        <td><?php echo $CName; ?></td>
                        <td><?php echo " <a href='reference_list.php? CCode=" . $CCode . "'>Reference Source</a>" ?></td>
                        <td><?php echo $SMName; ?></td>
                        <?php
                        if (($userdata[admin] == '1')) {
                            ?>
                            <td><?php echo " <a href='course_edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $CID . "'> edit </a> "; ?> | <?php echo " <a href='course_delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
                        <?php
                        }
                        ?>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                </table>

                <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
                    <h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">2nd year 1st semester</h1>
                </div>

                <table class="hoverTable" width="820" style="padding-bottom:40px;padding-left:40px;padding-right:40px">

                    <?php
                    $strquery = "SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='3'";
                    $results = mysql_query($strquery);
                    $num = mysql_numrows($results);

                    $i = 0;
                    while ($i < $num) {
                        $CID = mysql_result($results, $i, "CID");
                        $CCode = mysql_result($results, $i, "CCode");
                        $CName = mysql_result($results, $i, "CName");
                        $SMName = mysql_result($results, $i, "SMName");
                        ?>
                        <tr align="center">
                            <td height="40"><?php echo $CCode; ?></td>
                            <td><?php echo $CName; ?></td>
                            <td><?php echo " <a href='reference_list.php? CCode=" . $CCode . "'>Reference Source</a>" ?></td>
                            <td><?php echo $SMName; ?></td>
                            <?php
                            if (($userdata[admin] == '1')) {
                                ?>
                                <td><?php echo " <a href='course_edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $CID . "'> edit </a> "; ?> | <?php echo " <a href='course_delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    $i++;
                    }
                    ?>
                </table>

                <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
                    <h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">2nd year 2nd semester</h1>
                </div>

                <table class="hoverTable" width="820" style="padding-bottom:40px;padding-left:40px;padding-right:40px">
                    <?php
                    $strquery = "SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='4'";
                    $results = mysql_query($strquery);
                    $num = mysql_numrows($results);

                    $i = 0;
                    while ($i < $num) {
                        $CID = mysql_result($results, $i, "CID");
                        $CCode = mysql_result($results, $i, "CCode");
                        $CName = mysql_result($results, $i, "CName");
                        $SMName = mysql_result($results, $i, "SMName");
                        ?>
                        <tr align="center">
                            <td height="40"><?php echo $CCode; ?></td>
                            <td><?php echo $CName; ?></td>
                            <td><?php echo " <a href='reference_list.php? CCode=" . $CCode . "'>Reference Source</a>" ?></td>
                            <td><?php echo $SMName; ?></td>
                            <?php
                            if (($userdata[admin] == '1')) {
                                ?>
                                <td><?php echo " <a href='course_edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $CID . "'> edit </a> "; ?> | <?php echo " <a href='course_delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    $i++;
                    }
                    ?>
                </table>

                <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
                    <h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">3rd year 1st semester</h1>
                </div>

                <table class="hoverTable" width="820" style="padding-bottom:40px;padding-left:40px;padding-right:40px">
                    <?php
                    $strquery = "SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='5'";
                    $results = mysql_query($strquery);
                    $num = mysql_numrows($results);

                    $i = 0;
                    while ($i < $num) {
                        $CID = mysql_result($results, $i, "CID");
                        $CCode = mysql_result($results, $i, "CCode");
                        $CName = mysql_result($results, $i, "CName");
                        $SMName = mysql_result($results, $i, "SMName");
                        ?>
                        <tr align="center">
                            <td height="40"><?php echo $CCode; ?></td>
                            <td><?php echo $CName; ?></td>
                            <td><?php echo " <a href='reference_list.php? CCode=" . $CCode . "'>Reference Source</a>" ?></td>
                            <td><?php echo $SMName; ?></td>
                            <?php
                            if (($userdata[admin] == '1')) {
                                ?>

                                <td><?php echo " <a href='course_edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $CID . "'> edit </a> "; ?> | <?php echo " <a href='course_delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    $i++;
                    }
                    ?>
                </table>

                <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
                    <h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">3rd year 2nd semester</h1>
                </div>

                <table class="hoverTable" width="820" style="padding-bottom:40px;padding-left:40px;padding-right:40px">
                    <?php
                    $strquery = "SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='6'";
                    $results = mysql_query($strquery);
                    $num = mysql_numrows($results);

                    $i = 0;
                    while ($i < $num) {
                        $CID = mysql_result($results, $i, "CID");
                        $CCode = mysql_result($results, $i, "CCode");
                        $CName = mysql_result($results, $i, "CName");
                        $SMName = mysql_result($results, $i, "SMName");
                        ?>
                        <tr align="center">
                            <td height="40"><?php echo $CCode; ?></td>
                            <td><?php echo $CName; ?></td>
                            <td><?php echo " <a href='reference_list.php? CCode=" . $CCode . "'>Reference Source</a>" ?></td>
                            <td><?php echo $SMName; ?></td>
                            <?php
                            if (($userdata[admin] == '1')) {
                                ?>
                                <td><?php echo " <a href='course_edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $CID . "'> edit </a> "; ?> | <?php echo " <a href='course_delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    $i++;
                    }
                    ?>
                </table>

                <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
                    <h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">4th year 1st semester</h1>
                </div>

                <table class="hoverTable" width="820" style="padding-bottom:40px;padding-left:40px;padding-right:40px">
                    <?php
                    $strquery = "SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='7'";
                    $results = mysql_query($strquery);
                    $num = mysql_numrows($results);

                    $i = 0;
                    while ($i < $num) {
                        $CID = mysql_result($results, $i, "CID");
                        $CCode = mysql_result($results, $i, "CCode");
                        $CName = mysql_result($results, $i, "CName");
                        $SMName = mysql_result($results, $i, "SMName");
                        ?>
                        <tr align="center">
                            <td height="40"><?php echo $CCode; ?></td>
                            <td><?php echo $CName; ?></td>
                            <td><?php echo " <a href='reference_list.php? CCode=" . $CCode . "'>Reference Source</a>" ?></td>
                            <td><?php echo $SMName; ?></td>
                            <?php
                            if (($userdata[admin] == '1')) {
                                ?>

                                <td><?php echo " <a href='course_edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $CID . "'> edit </a> "; ?> | <?php echo " <a href='course_delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    $i++;
                    }
                    ?>
                </table>

                <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
                    <h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">4th year 2nd semester</h1>
                </div>

                <table class="hoverTable" width="820" style="padding-bottom:40px;padding-left:40px;padding-right:40px">
                    <?php
                    $strquery = "SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='8'";
                    $results = mysql_query($strquery);
                    $num = mysql_numrows($results);

                    $i = 0;
                    while ($i < $num) {
                        $CID = mysql_result($results, $i, "CID");
                        $CCode = mysql_result($results, $i, "CCode");
                        $CName = mysql_result($results, $i, "CName");
                        $SMName = mysql_result($results, $i, "SMName");
                        ?>
                        <tr align="center">
                            <td height="40"><?php echo $CCode; ?></td>
                            <td><?php echo $CName; ?></td>
                            <td><?php echo " <a href='reference_list.php? CCode=" . $CCode . "'>Reference Source</a>" ?></td>
                            <td><?php echo $SMName; ?></td>
                            <?php
                            if (($userdata[admin] == '1')) {
                                ?>
                                <td><?php echo " <a href='course_edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $CID . "'> edit </a> "; ?> | <?php echo " <a href='course_delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    $i++;
                    }
                    ?>
                </table>
		    </div>
            <div class="footer">
                <?php include("footer.php");
                ?>
            </div>
        </div>
    </body>
</html>
<?php
}
?>