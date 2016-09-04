<html>
<head>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/thickbox.js"></script>
    <link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen"/>
</head>
<body>
<form action="Student_Save.php" method="post"
      enctype="multipart/form-data">
    <table>
        <tr>
            <td>SReg:</td>
            <td><input type="text" name="reg"/></td>
        </tr>

        <tr>
            <td>SRoll:</td>
            <td><input type="text" name="roll"/></td>
        </tr>

        <tr>
            <td>SName:</td>
            <td><input type"text" name="name"/></td>
        </tr>

        <tr>
            <td>Semester</td>
            <td>
                <select name="SMID" id="SMID">
                    <?php
                    include("dbconnect.php");
                    $query = "SELECT DISTINCT SMID,SMName FROM sm_info ORDER BY SMID";
                    $rs = mysql_query($query) or die ('Error submitting');
                    while ($row = mysql_fetch_assoc($rs)) {
                        print("<option value=\"" . $row["SMID"] . "\">" . $row["SMName"] . "</option>");
                    }
                    ?>
            </td>
        </tr>
        <tr>
            <td>SB_of_Date:</td>
            <td><input type="text" name="dob"/></td>
        </tr>
        <tr>
            <td>Blood Group</td>
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
            <td>Interested_In:</td>
            <td><input type"text" name="Interested_In"/></td>
        </tr>

        <tr>
            <td>Knows_Programs:</td>
            <td><input type"text" name="Knows_Programs"/></td>
        </tr>

        <tr>
            <td>Noted_Activity:</td>
            <td><input type"text" name="Noted_Activity"/></td>
        </tr>

        <tr>
            <td>SHouse:</td>
            <td><input type="text" name="house"/></td>
        </tr>

        <tr>
            <td>SHome_City:</td>
            <td><input type"text" name="city"/></td>
        </tr>

        <tr>
            <td>School:</td>
            <td><input type"text" name="School"/></td>
        </tr>
        <tr>
            <td>College:</td>
            <td><input type"text" name="College"/></td>
        </tr>

        <tr>
            <td>Working_At:</td>
            <td><input type"text" name="Working_At"/></td>
        </tr>

        <tr>
            <td>SE_Mail:</td>
            <td><input type"text" name="email"/></td>
        </tr>

        <tr>
            <td>SPh_Number:</td>
            <td><input type="text" name="contact"/></td>
        </tr>

        <tr>
            <td>SPortrait:</td>
            <td><input type="file" name="file" id="file"></td>
        </tr>

        <tr>
            <td>Twitter_Link:</td>
            <td><input type"text" name="Twitter_Link"/></td>
        </tr>

        <tr>
            <td>FB_Link:</td>
            <td><input type"text" name="FB_Link"/></td>
        </tr>

        <tr>
            <td>Blog:</td>
            <td><input type"text" name="Blog"/></td>
        </tr>
    </table>
    </select>
    <br><br>
    <input type="Submit"/>
    <a href="#" onClick="tb_remove();">Close</a>
</form>
</body>
</html>