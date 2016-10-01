<?php
error_reporting(0);
include('dbconnect.php');
include("classes/Authentication.php");
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
        <?php
        $newpassword = $_GET['new_password'];
        $strquery = "UPDATE userinfo SET password='" . md5($newpassword) . "' where SID='" . $_GET['SID'] . "' ";
        $results = mysql_query($strquery);
        ?>
        <div align="center">
            <label style="color: #000000; font-size:14px;">OK! <span style="color:#0000ff">Your password is updated</span>
                Please <span style="color:red">log out</span> & log in with your new password</label>
        </div>
        </body>br>
        <div align="center">
            <button class="button button_blue" onclick="window.open('Log_Out.php','_top')"> Log Out
            </button>
            <button class="button button_red" onClick="tb_remove()"> Close </button>
        </div>
    <?php }else {
        include("permission_error.php");
    }
    ?>
    </body>
</html>