<?php
include('dbconnect.php');
error_reporting(0);
include("classes/Authentication.php");
$strquery = "SELECT SID,userid,username,password from userinfo where SID= '" . $_GET["SID"] . "' ";
$results = mysql_query($strquery);
$row = mysql_fetch_array($results);
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
        <form id="form1" name="form1" method="get" action="password_update.php">
            <table style="padding:30px">
                <tr>
                    <td><label style="color: black">Your username:</label></td>
                    <td><label style="color: black"><?php echo $row["username"]; ?></label></td>
                </tr>
                <tr>
                    <td><label style="color: black">Type Your New Password:</label></td>
                    <td><input name="new_password" type="password" id="new_password" placeholder="Type new password"/></td>
                </tr>
            </table>
            <input name="SID" type="hidden" id="SID" value=" <?php echo $row["SID"]; ?>"/>

            <div align="right"; style="padding-right:25">
                <button name="login" type="Submit" class="button button_blue">Update Password
                </button>
            </div>
        </form>
        <button class="button button_red" onClick="tb_remove()"> Cancel </button>
    <?php }else {
        include("permission_error.php");
    }
    ?>
    </body>
</html>