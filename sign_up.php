<?php
 session_start();
 error_reporting(0);
 include("dbconnect.php");
?>
<html>
    <head>
        <?php include("header.php");?>
    </head>

    <body>
    <div id="grad1">
    <div class="bodydiv" align="center">
        <?php include("logo_for_index.php"); ?>
    <div class="realbody">

    <?php include("menu_for_index.php");?>

    <div id="wowslider-container1" style="height:200px">
        <?php include("slider1.php");?>
    </div>

        <div id="content">
        <div id="colOne" align="left">
            <?php include("sidebar_for_index.php");?>
        </div>

        <br>
        <br>
        <br>
        <div style="font-size:24px; font-weight:bold; color:#FFFFFF">Sign Up</div>
        <div style="font-size:18px">
            <p>After successful registration a email will be sent to your valid email account with username and password. Use that user name and password to log in... </p>
        </div>
        <br>
        <br>
        <div align="center">
            <form action="sign_up_save.php" method="post" enctype="multipart/form-data">
            <table align="center">
        <p>
        <tr>
            <td><label for="name" class="signup_field" data-icon="u">Your Registration: </label></td>
            <td><input id="lastnamesignup" name="reg" required="required" type="text" placeholder="11201099" /></td>
        </tr>
        </p>

        <p>
        <tr>
            <td><label for="name" class="signup_field" data-icon="u">Your Name: </label></td>
            <td><input id="lastnamesignup" name="name" required="required" type="text" placeholder="Example Uddin" /></td>
        </tr>
        </p>

        <tr>
            <td>Semester: </td>
            <td><select name="SMID" id="SMID">
                <?php
                $query="SELECT DISTINCT SMID,SMName FROM sm_info ORDER BY SMID";
                $rs = mysql_query($query) or die ('Error submitting');
                while ($row = mysql_fetch_assoc($rs)) {
                    print("<option value=\"" . $row["SMID"] . "\">" . $row["SMName"] . "</option>");
                }
                ?>
            </td>
        </tr>

        <tr>
            <td>Blood Group: </td>
            <td><select name="Blood_Group_ID" id="Blood_Group_ID">
                <?php
                $query="SELECT DISTINCT Blood_Group_ID, Blood_Group_Name FROM blood_group_info ORDER BY Blood_Group_ID";
                $rs = mysql_query($query) or die ('Error submitting');
                while ($row = mysql_fetch_assoc($rs)) {
                    print("<option value=\"" . $row["Blood_Group_ID"] . "\">" . $row["Blood_Group_Name"] . "</option>");
                }
                ?>
            </td>
        </tr>

        <tr>
            <td>Blood Donor: </td>
            <td><select name="donor_value" id="donor_value">
                <?php
                $query="SELECT DISTINCT donor_value,Blood_Donor FROM blood_donor_yes_no ORDER BY donor_value";
                $rs = mysql_query($query) or die ('Error submitting');
                while ($row = mysql_fetch_assoc($rs)) {
                    print("<option value=\"" . $row["donor_value"] . "\">" . $row["Blood_Donor"] . "</option>");
                }
                ?>
            </td>
        </tr>


        <tr>
        <td>Home City: </td>
            <td><select name="district_id" id="district_id">
            <?php
            $query="SELECT DISTINCT district_id,district_name FROM districts ORDER BY district_id";
            $rs = mysql_query($query) or die ('Error submitting');
            while ($row = mysql_fetch_assoc($rs)) {
                print("<option value=\"" . $row["district_id"] . "\">" . $row["district_name"] . "</option>");
            }
            ?>
            </td>
        </tr>

        <p>
        <tr>
            <td><label for="email" class="signup_field" data-icon="u">Your E Mail:</label> </td>
            <td><input id="lastnamesignup" name="email" required="required" type="text" placeholder="example@yahoo.com" /></td>
        </tr>
        </p>


        <p>
        <tr>
             <td><label for="Portrait" class="signup_field" data-icon="u">Upload Photo:</label></td>
             <td><input id="file" name="file" required="required" type="file" placeholder="required" /></td>
        </tr>
        </p>

        <p>
        <tr>
            <td><label for="Portrait" class="signup_field" data-icon="u">User Name:</label></td>
            <td><input id="file" name="username" required="required" type="text" placeholder="your desired username" /></td>
        </tr>
        </p>

        <p>
        <tr>
             <td><label for="Portrait" class="signup_field" data-icon="u">Password:</label></td>
             <td><input id="file" name="password" required="required" type="password" placeholder="your desired password" /></td>
        </tr>
        </p>

    </table>
    <br>
    <br>

        <p class="signin_button"><input type="Submit" value="Register"/></p>
    </form>
    </div>
    </div>
    </div>
            <div class="footer">
                <?php include("footer.php");?>
            </div>

    </body>
</html>