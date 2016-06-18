<?php
$con=mysql_connect("localhost","root","");
if(!$con)
{
	die('Could Not Connect:'.mysql_error());
	}
mysql_select_db("mylab",$con);
$sql="Insert into c_info(CCode,CName)
values
('$_POST[CCode]','$_POST[CName]')";
if(!mysql_query($sql,$con))
{
	die('Error:'.mysql_error());
}
header ('location: https://localhost/mylab/Course_Insert.php '); 
mysql_close($con)
?>