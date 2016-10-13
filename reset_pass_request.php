<?php
include("dbconnect.php");
$email = $_POST['email'];
$query = "SELECT userid FROM userinfo where SE_Mail='" . $email . "'";
$result = mysql_query($query);
$Results = mysql_fetch_array($result);
$id = $Results[userid];
if (count($id) >= 1) {
    $randomNumber = date("Y-m-d H:i:s");
    $encrypt = md5($randomNumber * 109 * 19 + $Results['userid']);
    $message = "Your password reset link send to your e-mail address.";
    $to = $email;
    $subject = "Forget Password";
    $from = 'emtiaj@yahoo.com';
    $body = 'Hi, <br/> <br/>Your Membership ID is ' . $Results['userid'] . ' <br><br>Click here to reset your password https://localhost/uapians/reset_pass.php?encrypt=' . $encrypt . '&action=reset   <br/> <br/>--<br>UAPians.Net Team<br>Solve your problems.';
    $headers = "From: " . strip_tags($from) . "\r\n";
    $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $query = "update userinfo set recovery='" . $encrypt . "' where userid='" . $Results['userid'] . "'";
    mysql_query($query);
    mail($to, $subject, $body, $headers);
    header('location:reset_pass.php?message=confirmation_mail');
} else {
    header('location:reset_pass.php?message=account_not_found');
}
?>