<html xmlns="http://www.w3.org/1999/html">
<?php
    include('dbconnect.php');
    error_reporting(0);
    include("classes/Authentication.php");
    $strquery = "SELECT * from s_info where SID= '" . $_GET["SID"] . "' ";
    $results = mysql_query($strquery);
    $row = mysql_fetch_array($results);
?>
<head>
    <?php
    include("header.php");
    ?>
</head>
<body>
<?php
if ($isLoggedIn) {
?>
<form id="form1" name="form1" method="get" action="student_update.php">
    <table>
        <tr>
            <td><label style="color: #000000">Name:</label></td>
            <td><input name="SName" type="text" id="SName" value="<?php echo $row["SName"]; ?>"/></td>
        </tr>
        <tr>
            <td><label style="color: #000000">Registration No:</label></td>
            <td><input name="SReg" type="text" id="SReg" value="<?php echo $row["SReg"]; ?>"/></td>
        </tr>
        <tr>
            <td><label style="color: #000000">Present Address:</label></td>
            <td><input name="SHouse" type="text" id="SHouse" value="<?php echo $row["SHouse"]; ?>"/></td>
        </tr>
        <tr>
            <td><label style="color: #000000">District:</label></td>
            <td>
                <select name="district_id" id="district_id" selected="">
                    <?php
                    $query = "SELECT DISTINCT district_id,district_name FROM districts ORDER BY district_id";
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
            </td>
        </tr>
        <tr>
            <td><label style="color: #000000">Phone Number:</label></td>
            <td><input name="SPh_Number" type="text" id="SPh_Number" value="<?php echo $row["SPh_Number"]; ?>"/></td>
        </tr>
        <tr>
            <td><label style="color: #000000">Email:</label></td>
            <td><input name="SE_Mail" type="text" id="SE_Mail" value="<?php echo $row["SE_Mail"]; ?>"/></td>
        </tr>
        <tr>
            <td><label style="color: #000000">Date of Birth:</label></td>
            <td><input name="SB_of_Date" type="text" id="SB_of_Date" value="<?php echo $row["SB_of_Date"]; ?>"/></td>
        </tr>
        <input type="hidden" name="SPortrait" type="text" id="SPortrait" value="<?php echo $row["SPortrait"]; ?>"/>

        <tr>
            <td><label style="color: #000000">Semester</label></td>
            <td>
                <select name="SMID" id="SMID" selected="">
                    <?php
                    $query = "SELECT DISTINCT SMID,SMName FROM sm_info ORDER BY SMID";
                    $rs = mysql_query($query) or die ('Error submitting');
                    while ($rows = mysql_fetch_assoc($rs)) {
                        if ($row["SMID"] == $rows["SMID"]) {
                            $selected = 'selected="selected"';
                        } else {
                            $selected = '';
                        }
                        print("<option value=\"" . $rows["SMID"] . "\" " . $selected . "  >" . $rows["SMName"] . "</option>");
                    }
                    ?>

            </td>
        </tr>
        <tr>
            <td><label style="color: #000000">Blood Group</label></td>
            <td>
                <select name="Blood_Group_ID" id="Blood_Group_ID" selected="">
                    <?php
                    $query = "SELECT DISTINCT Blood_Group_ID,Blood_Group_Name FROM blood_group_info ORDER BY Blood_Group_ID";
                    $rs = mysql_query($query) or die ('Error submitting');
                    while ($rows = mysql_fetch_assoc($rs)) {
                        if ($row["Blood_Group_ID"] == $rows["Blood_Group_ID"]) {
                            $selected = 'selected="selected"';
                        } else {
                            $selected = '';
                        }
                        print("<option value=\"" . $rows["Blood_Group_ID"] . "\" " . $selected . "  >" . $rows["Blood_Group_Name"] . "</option>");
                    }
                    ?>

            </td>
        </tr>
        <tr>
            <td><label style="color: #000000">Blood Donor:</label></td>
            <td>
                <select name="donor_value" id="donor_value" selected="">
                    <?php
                    $query = "SELECT DISTINCT donor_value,Blood_Donor FROM blood_donor_yes_no ORDER BY donor_value";
                    $rs = mysql_query($query) or die ('Error submitting');
                    while ($rows = mysql_fetch_assoc($rs)) {
                        if ($row["donor_value"] == $rows["donor_value"]) {
                            $selected = 'selected="selected"';
                        } else {
                            $selected = '';
                        }
                        print("<option value=\"" . $rows["donor_value"] . "\" " . $selected . "  >" . $rows["Blood_Donor"] . "</option>");
                    }
                    ?>

            </td>
        </tr>
        <tr>
            <td><label style="color: #000000">Noted Activity:</label></td>
            <td><input type"text" name="Noted_Activity" id="SPortrait" value="<?php echo $row["Noted_Activity"]; ?>" />
            </td>
        </tr>

        <tr>
            <td><label style="color: #000000">School:</label></td>
            <td><input type"text" name="School" id="SPortrait" value="<?php echo $row["School"]; ?>" /></td>
        </tr>
        <tr>
            <td><label style="color: #000000">College:</label></td>
            <td><input type"text" name="College" id="SPortrait" value="<?php echo $row["College"]; ?>" /></td>
        </tr>
        <tr>
            <td><label style="color: #000000">Knows Programs:</label></td>
            <td><input type"text" name="Knows_Programs" id="SPortrait" value="<?php echo $row["Knows_Programs"]; ?>" />
            </td>
        </tr>
        <tr>
            <td><label style="color: #000000">Interested In:</label></td>
            <td><input type"text" name="Interested_In" id="SPortrait" value="<?php echo $row["Interested_In"]; ?>" />
            </td>
        </tr>
        <tr>
            <td><label style="color: #000000">Working At:</label></td>
            <td><input type"text" name="Working_At" id="SPortrait" value="<?php echo $row["Working_At"]; ?>" /></td>
        </tr>
        <tr>
            <td><label style="color: #000000">Facebook Link:</label></td>
            <td><input type"text" name="FB_Link" id="SPortrait" value="<?php echo $row["FB_Link"]; ?>" /></td>
        </tr>
        <tr>
            <td><label style="color: #000000">Twitter Link:</label></td>
            <td><input type"text" name="Twitter_Link" id="SPortrait" value="<?php echo $row["Twitter_Link"]; ?>" /></td>
        </tr>
        <tr>
            <td><label style="color: #000000">Blog/Website:</label></td>
            <td><input type"text" name="Blog" id="SPortrait" value="<?php echo $row["Blog"]; ?>" /></td>
        </tr>

    </table>
    <div style="text-align: right">
    <input name="SID" type="hidden" id="SID" value="<?php echo($row["SID"]);?>"/>
    <button name="login" type="Submit" class="button button_blue">Update</button>
    <button class="button button_red" onClick="tb_remove();">Close</button>
    </div>
</form>
<?php }else {
    include("permission_error.php");
}
?>
</body>
</html>