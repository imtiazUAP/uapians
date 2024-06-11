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
$SID = $userdata['SID'];
$userrole2 = mysql_query("select * from e_info where SID='{$SID}'");
$userdata2 = mysql_fetch_assoc($userrole2);
$EID = $userdata2['EID'];
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
        <div id="canvas">
            <div class="body_wrapper">
                <?php include ("logo.php"); ?>
                <div class="body" style="min-height:2300px">
                    <?php include ("menu.php"); ?>
                    <!--////////////////////////////////-->
                    <br><br>
                    <form id="form1" name="form1" method="get" action="Reference_Save.php">
                        <div align="right" style="padding:20px; font-size:22px; font-weight:bold; color:#FFFFFF">Select
                            Course:<br>
                            <select name="CID" id="CID" selected="">
                                <?php
                                $query = "SELECT DISTINCT CID, CCode FROM c_info";
                                $rs = mysql_query($query) or die('Error submitting');
                                while ($rows = mysql_fetch_assoc($rs)) {
                                    if ($row["CID"] == $rows["CID"]) {
                                        $selected = 'selected="selected"';
                                    } else {
                                        $selected = '';
                                    }
                                    print ("<option value=\"" . $rows["CID"] . "\" " . $selected . "  >" . $rows["CCode"] . "</option>");
                                }
                                ?>
                            </select>
                        </div>
                        <div align="right" style="padding:20px; font-size:22px; font-weight:bold; color:#FFFFFF">Select
                            Semester:<br>
                            <select name="SMID" id="SMID" selected="">
                                <?php
                                $query = "SELECT DISTINCT SMID, SMName FROM sm_info";
                                $rs = mysql_query($query) or die('Error submitting');
                                while ($rows = mysql_fetch_assoc($rs)) {
                                    if ($row["SMID"] == $rows["SMID"]) {
                                        $selected = 'selected="selected"';
                                    } else {
                                        $selected = '';
                                    }
                                    print ("<option value=\"" . $rows["SMID"] . "\" " . $selected . "  >" . $rows["SMName"] . "</option>");
                                }
                                ?>
                            </select>
                        </div>
                        <div align="center">
                            <table>
                                <!--
 -->
                                <p>
                                    <tr>
                                        <td>
                                            <label for="email" class="signup_field" data-icon="u">Topic Details:</label>
                                        </td>
                                        <td>
                                            <textarea name="Detail" rows="2" cols="40"> </textarea>
                                        </td>
                                    </tr>
                                </p>
                                <p>
                                    <tr>
                                        <td>
                                            <label for="email" class="signup_field" data-icon="u">File Link:</label>
                                        </td>
                                        <td>
                                            <textarea name="Reference_Link" rows="2" cols="40"> </textarea>
                                        </td>
                                    </tr>
                                </p>
                                <input name="SID" type="hidden" id="SID" value="<?php echo $SID; ?>" />
                                <input name="EID" type="hidden" id="SID" value="<?php echo $EID; ?>" />
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <p>
                                            <label>
                                                <input type="submit" name="Submit" value="Submit" />
                                            </label>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                    </form>
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