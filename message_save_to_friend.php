<?php

$sql = "Insert into messages(SID,Receiver_Reg,Subject,Message)
values
('$_POST[SID]','$_POST[Receiver_Reg]','$_POST[Subject]','$_POST[Message]')";
if (!mysql_query($sql)) {
    die('Error:' . mysql_error());
}
header('location: https://localhost/uapians/message_sent_notification.php ');
?>