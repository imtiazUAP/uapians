<?php
error_reporting(0);
include('dbconnect.php');
include("classes/Authentication.php");
?>
<html>
<head>
    <?php include("header.php"); ?>
</head>
<body>
<?php
if ($isLoggedIn) {
?>
<?php
    $a = mysql_query($sql = "INSERT INTO s_info(SID, SPortrait, SName, SReg, SHouse, district_id, SE_Mail, SMID, Blood_Group_ID, donor_value) VALUES('" . $_REQUEST['SID'] . "', '" . $_REQUEST['SPortrait'] . "', '" . $_REQUEST['SName'] . "', '" . $_REQUEST['SReg'] . "', '" . $_REQUEST['SHouse'] . "', '" . $_REQUEST['district_id'] . "', '" . $_REQUEST['SE_Mail'] . "', '" . $_REQUEST['SMID'] . "', '" . $_REQUEST['Blood_Group_ID'] . "', '" . $_REQUEST['donor_value'] . "')");
    $password = $_REQUEST['password'];
    $b =mysql_query($sql = "INSERT INTO userinfo (username,password,Reg,SID,SE_Mail) VALUES ('" . $_REQUEST['username'] . "','".md5($password)."','" . $_REQUEST['SReg'] . "','" . $_REQUEST['SID'] . "','" . $_REQUEST['SE_Mail'] . "')");
    if($a && $b){
        $strquery = "DELETE from sign_up where SReg = '" . $_GET['SReg'] . "'";
        $results = mysql_query($strquery);
    }
    $email = $_REQUEST['SE_Mail'];
    $username = $_REQUEST['username'];
    $pasword = $_REQUEST['password'];
    $from = "info@uapians.net"; // sender
    $subject = "Profile Activated";
    $message = "Your Profile is Activated at http://www.uapians.net please log in to continue.... Username:$username   Password:$pasword  Thank You!!!";
    $message = wordwrap($message, 70);
    mail("$email", $subject, $message, "From: $from\n");
    $sid = $_REQUEST["SID"];

?>
<div align="center">
    <label style="color: #000000"> <?php echo "This Profile is activated!  Message Sent!!! Thank you"; ?></label>
    <button class="button button_red" onClick="tb_remove()"> Cancel </button>
</div>
<?php }else {
    include("permission_error.php");
}
?>
</body>
</html>