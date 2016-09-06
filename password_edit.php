<?php
include('dbconnect.php');
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
        <form id="form1" name="form1" method="get" action="password_update.php">
            <table style="padding:30px">
                <tr>
                    <td>Your username:</td>
                    <td><?php echo $row["username"]; ?></td>
                </tr>
                <tr>
                    <td>Type Your New Password:</td>
                    <td><input name="new_password" type="password" id="new_password" placeholder="Type new password"/></td>
                </tr>
            </table>
            <input name="SID" type="hidden" id="SID" value=" <?php echo $row["SID"]; ?>"/>

            <p>
                <label>
                    <input type="submit" name="Submit" value="Update"/>
                    <a href="#" onClick="tb_remove();">Close</a>
                </label>
            </p>
        </form>
    </body>
</html>