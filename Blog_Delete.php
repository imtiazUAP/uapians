<?php
include("dbconnect.php");
mysql_query($sql="DELETE from blog where Blog_ID = '" . $_GET['Blog_ID'] . "' ");
header ('location: https://localhost/uapians/Blog_List.php ');
?>