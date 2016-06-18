<?php

$sql="Insert into messages(SID,Receiver_Reg,Subject,Message)
values
('$_POST[SID]','$_POST[Receiver_Reg]','$_POST[Subject]','$_POST[Message]')";
if(!mysql_query($sql))
{
	die('Error:'.mysql_error());
}
header ('location: http://uapians.net/Message_Sent_Notification.php ');
?>