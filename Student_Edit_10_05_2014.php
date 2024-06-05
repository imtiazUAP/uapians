<html>
<?php
include ("dbconnect.php");
$strquery = "SELECT * from s_info where SID= '" . $_GET["SID"] . "' ";
$results = mysql_query($strquery);
$row = mysql_fetch_array($results);
?>

<head>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/thickbox.js"></script>
    <link rel="stylesheet" href="assets/css/thickbox.css" type="text/css" media="screen" />
</head>

<body>
    <form id="form1" name="form1" method="get" action="Student_Update.php">
        <table>
            <tr>
                <td>SRoll:</td>
                <td><input name="SRoll" type="text" id="SRoll" value=" <?php echo $row["SRoll"]; ?>" /></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><input name="SName" type="text" id="SName" value=" <?php echo $row["SName"]; ?>" /></td>
            </tr>
            <tr>
                <td>Reg:</td>
                <td><input name="SReg" type="text" id="SReg" value=" <?php echo $row["SReg"]; ?>" /></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input name="SAge" type="text" id="SAge" value=" <?php echo $row["SAge"]; ?>" /></td>
            </tr>
            <tr>
                <td>House:</td>
                <td><input name="SHouse" type="text" id="SHouse" value=" <?php echo $row["SHouse"]; ?>" /></td>
            </tr>
            <tr>
                <td>Transport:</td>
                <td><input name="STransport" type="text" id="STransport" value=" <?php echo $row["STransport"]; ?>" />
                </td>
            </tr>
            <tr>
                <td>Quality:</td>
                <td><input name="SQuality" type="text" id="SQuality" value=" <?php echo $row["SQuality"]; ?>" /></td>
            </tr>
            <tr>
                <td>Home_City:</td>
                <td><input name="SHome_City" type="text" id="SHome_City" value=" <?php echo $row["SHome_City"]; ?>" />
                </td>
            </tr>
            <tr>
                <td>Ph_Number:</td>
                <td><input name="SPh_Number" type="text" id="SPh_Number" value=" <?php echo $row["SPh_Number"]; ?>" />
                </td>
            </tr>
            <tr>
                <td>E_Mail:</td>
                <td><input name="SE_Mail" type="text" id="SE_Mail" value=" <?php echo $row["SE_Mail"]; ?>" /></td>
            </tr>
            <tr>
                <td>B_of_Date:</td>
                <td><input name="SB_of_Date" type="text" id="SB_of_Date" value=" <?php echo $row["SB_of_Date"]; ?>" />
                </td>
            </tr>
            <tr>
                <td>Portrait:</td>
                <td><input name="SPortrait" type="text" id="SPortrait" value=" <?php echo $row["SPortrait"]; ?>" /></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>
                    <select name="SMID" id="SMID" selected="">
                        <?php
                        $query = "SELECT DISTINCT SMID,SMName FROM sm_info ORDER BY SMID";
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
                </td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>
                    <select name="Blood_Group_ID" id="Blood_Group_ID" selected="">
                        <?php
                        $query = "SELECT DISTINCT Blood_Group_ID,Blood_Group_Name FROM blood_group_info ORDER BY Blood_Group_ID";
                        $rs = mysql_query($query) or die('Error submitting');
                        while ($rows = mysql_fetch_assoc($rs)) {
                            if ($row["Blood_Group_ID"] == $rows["Blood_Group_ID"]) {
                                $selected = 'selected="selected"';
                            } else {
                                $selected = '';
                            }
                            print ("<option value=\"" . $rows["Blood_Group_ID"] . "\" " . $selected . "  >" . $rows["Blood_Group_Name"] . "</option>");
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td>Noted_Activity:</td>
                <td><input type"text" name="Noted_Activity" id="SPortrait"
                        value=" <?php echo $row["Noted_Activity"]; ?>" /></td>
            </tr>
            <tr>
                <td>School:</td>
                <td><input type"text" name="School" id="SPortrait" value=" <?php echo $row["School"]; ?>" /></td>
            </tr>
            <tr>
                <td>College:</td>
                <td><input type"text" name="College" id="SPortrait" value=" <?php echo $row["College"]; ?>" /></td>
            </tr>
            <tr>
                <td>Knows_Programs:</td>
                <td><input type"text" name="Knows_Programs" id="SPortrait"
                        value=" <?php echo $row["Knows_Programs"]; ?>" /></td>
            </tr>
            <tr>
                <td>Interested_In:</td>
                <td><input type"text" name="Interested_In" id="SPortrait"
                        value=" <?php echo $row["Interested_In"]; ?>" /></td>
            </tr>
            <tr>
                <td>Working_At:</td>
                <td><input type"text" name="Working_At" id="SPortrait" value=" <?php echo $row["Working_At"]; ?>" />
                </td>
            </tr>
            <tr>
                <td>FB_Link:</td>
                <td><input type"text" name="FB_Link" id="SPortrait" value=" <?php echo $row["FB_Link"]; ?>" /></td>
            </tr>
            <tr>
                <td>Twitter_Link:</td>
                <td><input type"text" name="Twitter_Link" id="SPortrait" value=" <?php echo $row["Twitter_Link"]; ?>" />
                </td>
            </tr>
            <tr>
                <td>Blog:</td>
                <td><input type"text" name="Blog" id="SPortrait" value=" <?php echo $row["Blog"]; ?>" /></td>
            </tr>
        </table>
        </select>
        <input name="SID" type="hidden" id="SID" value=" <?php echo $row["SID"]; ?>" />
        <p>
            <label>
                <input type="submit" name="Submit" value="Update" />
                <a href="#" onClick="tb_remove();">Close</a>
            </label>
        </p>
    </form>

</html>