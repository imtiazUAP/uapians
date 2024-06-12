<?php
include ('dbconnect.php');
error_reporting(1);
?>
<html>

<head>
    <?php include ("header.php"); ?>
</head>

<body>
    <?php
    $a = mysql_query($sql = "INSERT INTO s_info(SID, SPortrait, SName, SReg, district_id, email, SMID, Blood_Group_ID, donor_value) VALUES('" . $_REQUEST['SID'] . "', '" . $_REQUEST['SPortrait'] . "', '" . $_REQUEST['SName'] . "', '" . $_REQUEST['SReg'] . "', '" . $_REQUEST['district_id'] . "', '" . $_REQUEST['email'] . "', '" . $_REQUEST['SMID'] . "', '" . $_REQUEST['Blood_Group_ID'] . "', '" . $_REQUEST['donor_value'] . "')");
    $password = $_REQUEST['password'];
    mysql_query($sql = "INSERT INTO userinfo (email,password,Reg,SID,email) VALUES ('" . $_REQUEST['email'] . "','" . md5($password) . "','" . $_REQUEST['SReg'] . "','" . $_REQUEST['SID'] . "','" . $_REQUEST['email'] . "')");
    $email = $_REQUEST['email'];
    $email = $_REQUEST['email'];
    $pasword = $_REQUEST['password'];
    $from = "info@uapians.net"; // sender
    $subject = "Profile Activated";
    $message = "Your Profile is Activated at http://www.uapians.net please log in to continue.... email:$email   Password:$pasword  Thank You!!!";
    // message lines should not exceed 70 characters (PHP rule), so wrap it
    $message = wordwrap($message, 70);
    // send mail
    mail("$email", $subject, $message, "From: $from\n");
    ?>
    <div align="center">
        <label style="color: #000000"> <?php echo "This Profile is activated!  Message Sent!!! Thank you"; ?></label>
        <label>
            <br>
            <br>
            <a href="#" onClick="tb_remove();">Close</a>
        </label>
    </div>
</body>

</html>