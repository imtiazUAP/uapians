<?php
include("dbconnect.php");
$sql="Insert into messages_for_admin(SID,Subject,Message)
values
('$_POST[SID]','$_POST[Subject]','$_POST[Message]')";
if(!mysql_query($sql))
{
	die('Error:'.mysql_error());
}
header ('location: http://uapians.net/Message_Sent_Notification.php ');
?>