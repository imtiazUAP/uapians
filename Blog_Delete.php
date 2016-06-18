<?php
include("dbconnect.php");

$strquery=" DELETE from blog where Blog_ID = '" . $_GET['Blog_ID'] . "' ";
$results=mysql_query ($strquery);
header ('location: http://uapians.net/Blog_List.php '); 
?>