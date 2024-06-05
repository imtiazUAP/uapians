<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
?>
<html>
<?php
$strquery = "SELECT * from sign_up where SReg= '" . $_GET["SReg"] . "' ";
$results = mysql_query($strquery);
$row = mysql_fetch_array($results);
?>

<head>
    <?php include ("header.php"); ?>
</head>

<body>
    <form id="form1" name="form1" method="get" action="Review_Update.php">
        <table style="color: black">
            <tr>
                <td> Name: </td>
                <td><input name="SName" type="text" id="SName" value="<?php echo $row["SName"]; ?>" /></td>
            </tr>
            <tr>
                <td>Registration no:</td>
                <td><input name="SReg" type="text" id="SReg" value="<?php echo $row["SReg"]; ?>" /></td>
            </tr>
            <tr>
                <td>District</td>
                <td><select name="district_id" id="district_id" selected="">
                        <?php
                        $query = "SELECT DISTINCT district_id,district_name FROM districts ORDER BY district_id";
                        $rs = mysql_query($query) or die('Error submitting');
                        while ($rows = mysql_fetch_assoc($rs)) {
                            if ($row["district_id"] == $rows["district_id"]) {
                                $selected = 'selected="selected"';
                            } else {
                                $selected = '';
                            }
                            print ("<option value=\"" . $rows["district_id"] . "\" " . $selected . "  >" . $rows["district_name"] . "</option>");
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td> <input name="SE_Mail" type="text" id="SE_Mail" value="<?php echo $row["SE_Mail"]; ?>" /> </td>
            </tr>
            <input name="SPortrait" type="hidden" id="SPortrait" value="<?php echo $row["SPortrait"]; ?>" />
            <tr>
                <td>Semester</td>
                <td> <select name="SMID" id="SMID" selected="">
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
                <td>Blood Group</td>
                <td><select name="Blood_Group_ID" id="Blood_Group_ID" selected="">
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
                <td>Donor:</td>
                <td><select name="donor_value" id="donor_value" selected="">
                        <?php
                        $query = "SELECT DISTINCT donor_value,Blood_Donor FROM blood_donor_yes_no ORDER BY donor_value";
                        $rs = mysql_query($query) or die('Error submitting');
                        while ($rows = mysql_fetch_assoc($rs)) {
                            if ($row["donor_value"] == $rows["donor_value"]) {
                                $selected = 'selected="selected"';
                            } else {
                                $selected = '';
                            }
                            print ("<option value=\"" . $rows["donor_value"] . "\" " . $selected . "  >" . $rows["Blood_Donor"] . "</option>");
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td>User Name:</td>
                <td> <input type"text" name="username" id="SPortrait" value="<?php echo $row["username"]; ?>" /></td>
            </tr>
            <tr>
                <td> <input type="hidden" name="password" id="SPortrait" value="<?php echo $row["password"]; ?>" /></td>
            </tr>
            <tr>
                <td>SID:</td>
                <td> <input type="text" name="SID" id="SPortrait" value="<?php echo $row["SID"]; ?>" /> </td>
            </tr>
        </table>
        <p>
            <label><input type="submit" name="Submit" value="Update" /> <a href="#"
                    onClick="tb_remove();">Close</a></label>
        </p>
    </form>
</body>

</html>