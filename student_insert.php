<?php
session_start();
error_reporting(0);
include("dbconnect.php");
include("classes/Authentication.php");
include_once("page.inc.php");
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
<?php
if ($isLoggedIn) {
?>
<form action="student_save.php" method="post"
      enctype="multipart/form-data">
    <table>
        <tr>
            <td><label style="color: #000000">Registration No:</label></td>
            <td><input type="text" name="reg"/></td>
        </tr>

        <tr>
            <td><label style="color: #000000">Roll No:</label></td>
            <td><input type="text" name="roll"/></td>
        </tr>

        <tr>
            <td><label style="color: #000000">Name:</label></td>
            <td><input type"text" name="name"/></td>
        </tr>

        <tr>
            <td><label style="color: #000000">Semester</label></td>
            <td>
                <select name="SMID" id="SMID">
                    <?php
                    $query = "SELECT DISTINCT SMID,SMName FROM sm_info ORDER BY SMID";
                    $rs = mysql_query($query) or die ('Error submitting');
                    while ($row = mysql_fetch_assoc($rs)) {
                        print("<option value=\"" . $row["SMID"] . "\">" . $row["SMName"] . "</option>");
                    }
                    ?>
            </td>
        </tr>
        <tr>
            <td><label style="color: #000000">Date of Birth:</label></td>
            <td><input type="text" name="dob"/></td>
        </tr>
        <tr>
            <td><label style="color: #000000">Blood Group</label></td>
            <td>
                <select name="Blood_Group_ID" id="Blood_Group_ID">
                    <?php
                    $query = "SELECT DISTINCT Blood_Group_ID, Blood_Group_Name FROM blood_group_info ORDER BY Blood_Group_ID";
                    $rs = mysql_query($query) or die ('Error submitting');
                    while ($row = mysql_fetch_assoc($rs)) {
                        print("<option value=\"" . $row["Blood_Group_ID"] . "\">" . $row["Blood_Group_Name"] . "</option>");
                    }
                    ?>
            </td>
        </tr>

        <tr>
            <td><label style="color: #000000">Interested In:</label></td>
            <td><input type"text" name="Interested_In"/></td>
        </tr>

        <tr>
            <td><label style="color: #000000">Knows Programs:</label></td>
            <td><input type"text" name="Knows_Programs"/></td>
        </tr>

        <tr>
            <td><label style="color: #000000">Noted Activity:</label></td>
            <td><input type"text" name="Noted_Activity"/></td>
        </tr>

        <tr>
            <td><label style="color: #000000">Present Address:</label></td>
            <td><input type="text" name="house"/></td>
        </tr>

        <tr>
            <td><label style="color: #000000">District:</label></td>
            <td><input type"text" name="city"/></td>
        </tr>

        <tr>
            <td><label style="color: #000000">School:</label></td>
            <td><input type"text" name="School"/></td>
        </tr>
        <tr>
            <td><label style="color: #000000">College:</label></td>
            <td><input type"text" name="College"/></td>
        </tr>

        <tr>
            <td><label style="color: #000000">Working At:</label></td>
            <td><input type"text" name="Working_At"/></td>
        </tr>

        <tr>
            <td><label style="color: #000000">Email:</label></td>
            <td><input type"text" name="email"/></td>
        </tr>

        <tr>
            <td><label style="color: #000000">Phone Number:</label></td>
            <td><input type="text" name="contact"/></td>
        </tr>

        <tr>
            <td><label style="color: #000000">Profile Photo:</label></td>
            <td><input type="file" name="file" id="file"></td>
        </tr>

        <tr>
            <td><label style="color: #000000">Twitter Link:</label></td>
            <td><input type"text" name="Twitter_Link"/></td>
        </tr>

        <tr>
            <td><label style="color: #000000">Facebook Link:</label></td>
            <td><input type"text" name="FB_Link"/></td>
        </tr>

        <tr>
            <td><label style="color: #000000">Blog/Website:</label></td>
            <td><input type"text" name="Blog"/></td>
        </tr>
    </table>
    </select>
    <br><br>
    <input type="Submit"/>
    <a href="#" onClick="tb_remove();">Close</a>
</form>
<?php }else {
    include("permission_error.php");
}
?>
</body>
</html>