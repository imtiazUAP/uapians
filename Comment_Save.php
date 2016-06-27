<?php
include("dbconnect.php");
$sql="Insert into comments(SID,Blog_ID,Comment)
values
('$_POST[SID]','$_POST[Blog_ID]','$_POST[Comment]')";
if(!mysql_query($sql))
{
	die('Error:'.mysql_error());
}
header ('location: https://localhost/uapians/Blog_List.php ');
?>