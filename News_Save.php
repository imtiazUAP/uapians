<?php
include ("dbconnect.php");
$sql = "Insert into news_info(News_Hints,News_Link)
values
('$_POST[News_Hints]','$_POST[News_Link]')";
if (!mysql_query($sql)) {
	die('Error:' . mysql_error());
}
header('location: http://www.uapians.net/News_Insert.php ');
mysql_close($con)
?>