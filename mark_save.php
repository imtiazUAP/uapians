
<?php
$con=mysql_connect("localhost","root","");
if(!$con)
{
	die('Could Not Connect:'.mysql_error());
	}
mysql_select_db("uapians",$con);
$sql="Insert into m_info(SID,EID,CID,XID,Date,Mark,SEMID,Year)
values
('$_POST[SID1]','$_POST[EID]','$_POST[CID]','$_POST[XID]','$_POST[Date]','$_POST[Mark1]','$_POST[SEMID]','$_POST[Year]'),
('$_POST[SID2]','$_POST[EID]','$_POST[CID]','$_POST[XID]','$_POST[Date]','$_POST[Mark2]','$_POST[SEMID]','$_POST[Year]'),
('$_POST[SID3]','$_POST[EID]','$_POST[CID]','$_POST[XID]','$_POST[Date]','$_POST[Mark3]','$_POST[SEMID]','$_POST[Year]'),
('$_POST[SID4]','$_POST[EID]','$_POST[CID]','$_POST[XID]','$_POST[Date]','$_POST[Mark4]','$_POST[SEMID]','$_POST[Year]'),
('$_POST[SID5]','$_POST[EID]','$_POST[CID]','$_POST[XID]','$_POST[Date]','$_POST[Mark5]','$_POST[SEMID]','$_POST[Year]'),
('$_POST[SID6]','$_POST[EID]','$_POST[CID]','$_POST[XID]','$_POST[Date]','$_POST[Mark6]','$_POST[SEMID]','$_POST[Year]'),
('$_POST[SID7]','$_POST[EID]','$_POST[CID]','$_POST[XID]','$_POST[Date]','$_POST[Mark7]','$_POST[SEMID]','$_POST[Year]'),
('$_POST[SID8]','$_POST[EID]','$_POST[CID]','$_POST[XID]','$_POST[Date]','$_POST[Mark8]','$_POST[SEMID]','$_POST[Year]'),
('$_POST[SID9]','$_POST[EID]','$_POST[CID]','$_POST[XID]','$_POST[Date]','$_POST[Mark9]','$_POST[SEMID]','$_POST[Year]'),
('$_POST[SID10]','$_POST[EID]','$_POST[CID]','$_POST[XID]','$_POST[Date]','$_POST[Mark10]','$_POST[SEMID]','$_POST[Year]')";
if(!mysql_query($sql,$con))
{
	die('Error:'.mysql_error());
}
header ('location: https://localhost/uapians/mark_insert.php ');
mysql_close($con)
?>