<?php
include("dbconnect.php");
$sql = "Insert into c_info(CCode,CName)
values
('$_POST[CCode]','$_POST[CName]')";
if (!mysql_query($sql)) {
    die('Error:' . mysql_error());
}
header('location: https://localhost/uapians/course_insert.php ');
?>