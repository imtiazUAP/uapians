<?php
error_reporting(0);
session_start();
include("classes/Authentication.php");
include('dbconnect.php');
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
            <?php
            if ($isLoggedIn && $isAdmin) {
            ?>
            <a href="employee_insert.php?keepThis=true&TB_iframe=true&height=120&width=240&modal=true" title="New Employee" class="thickbox">Create New Employee</a>
            <table class="hoverTable" width="1100" border="1"
                   style=" padding-bottom:40px;padding-left:40px;padding-right:40px;">
                <tr align="center">
                    <td width="50" height="50" bgcolor="588C73">Employee Name</td>
                    <td width="150" bgcolor="588C73">Employee Designation</td>
                    <td width="150" bgcolor="588C73">Portrait</td>
                    <td width="150" bgcolor="588C73">Profiles</td>
                    <td width="150" bgcolor="#006699">Admin Panel</td>
                </tr>
                <?php
                }
                ?>
                <?php
                if (($userdata[admin] == '0')) {
                ?>
                <table class="hoverTable" width="1100" border="1"
                       style=" padding-bottom:40px;padding-left:40px;padding-right:40px;">
                    <tr align="center">
                        <td width="50" height="50" bgcolor="#006699">Employee Name</td>
                        <td width="150" bgcolor="#006699">Employee Designation</td>
                        <td width="150" bgcolor="#006699">Portrait</td>
                        <td width="150" bgcolor="#006699">Profiles</td>
                    </tr>
                    <?php
                    }
                    ?>
                    <?php

                    $strquery = "SELECT * from e_info order by EID";
                    $results = mysql_query($strquery);
                    $num = mysql_numrows($results);

                    $i = 0;
                    while ($i < $num) {
                        $EID = mysql_result($results, $i, "EID");
                        $SID = mysql_result($results, $i, "SID");
                        $EName = mysql_result($results, $i, "EName");
                        $EDesignation = mysql_result($results, $i, "EDesignation");
                        $Employee_Portrait = mysql_result($results, $i, "Employee_Portrait");
                        ?>
                        <tr align="center">
                            <td height="40"><?php echo $EName; ?></td>
                            <td><?php echo $EDesignation; ?></td>
                            <td width="100"><img src="<?php echo $Employee_Portrait; ?>" style="height:100px;"></td>
                            <td><?php echo " <a href='teacher_list.php? EID=" . $EID . "'> Profile </a>" ?></td>

                            <?php
                            if ($isLoggedIn && $isAdmin) {
                                ?>
                                <td align="center"><?php echo " <a href='employee_edit.php?SID=" . $EID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Employee - " . $EID . "'> Edit </a> "; ?>
                                    | <?php echo " <a href='employee_delete.php?SID=" . $SID . "'> Delete </a> "; ?></td>
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
        </div>

        <div class="footer">
            <?php
            include("footer.php");
            ?>
        </div>
    </body>
</html>