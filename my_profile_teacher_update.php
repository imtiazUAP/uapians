<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
?>
<?php
$b = $_SESSION['username'];
//$c=$_SESSION['userid'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
//echo $userdata['admin'];
$SID = $userdata['SID'];
if (empty($_SESSION['username'])) {
    ?>
    <script language="JavaScript">
        window.location = "index.php";
    </script><?php } else { ?>
    <html>

    <head>
        <?php
        include ("header.php");
        ?>
    </head>

    <body>
        <div id="grad1">
            <div class="bodydiv">
                <?php include ("logo.php"); ?>
                <div class="realbody" style="min-height:2300px">
                    <?php include ("menu.php"); ?>
                    <div id="content">
                        <div id="colOne">
                            <?php
                            include ("sidebar.php");
                            ?>
                        </div>
                        <div id="margin_figure">
                            <?php
                            $strquery = "UPDATE e_info SET EName= '" . $_GET['ename'] . "', EDesignation= '" . $_GET['edesignation'] . "',Employee_Contact= '" . $_GET['employee_Contact'] . "',Employee_Speech= '" . $_GET['employee_Speech'] . "',Employee_Qualification= '" . $_GET['employee_Qualification'] . "',Employee_Experience= '" . $_GET['employee_Experience'] . "',Employee_Role= '" . $_GET['employee_Role'] . "',employee_email= '" . $_GET['employee_Email'] . "' where SID='{$SID}' ";
                            $results = mysql_query($strquery);
                            echo "<div align='center'>Your Profile Updated!!! Thank you</div>";
                            ?>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <?php include ("footer.php");
                    ?>
                </div>
    </body>

    </html>
    <?php
} ?>