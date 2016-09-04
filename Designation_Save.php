<?php
$con = mysql_connect("localhost", "root", "");
if (!$con) {
    die('Could Not Connect:' . mysql_error());
}
mysql_select_db("mylab", $con);
$sql = "Insert into d_info(DName)
values
('$_POST[DName]')";
if (!mysql_query($sql, $con)) {
    die('Error:' . mysql_error());
}
header('location: https://localhost/mylab/Designation_Insert.php ');
mysql_close($con)
?>