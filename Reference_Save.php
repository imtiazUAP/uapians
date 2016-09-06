<?php include("dbconnect.php"); ?>
<?php
mysql_query($sql = "INSERT INTO reference_info (CID,EID,Reference_Link,SMID,Detail)VALUES ('" . $_REQUEST['CID'] . "','" . $_REQUEST['EID'] . "','" . $_REQUEST['Reference_Link'] . "','" . $_REQUEST['SMID'] . "','" . $_REQUEST['Detail'] . "')");
header('location: https://localhost/uapians/reference_save_confirmation.php ');
mysql_close($con)
?> 