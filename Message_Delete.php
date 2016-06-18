<?php
include("dbconnect.php");

$strquery=" DELETE from messages_for_admin where Message_Id = '" . $_GET['Message_Id'] . "' ";
$results=mysql_query ($strquery);
header ('location: http://uapians.net/Message_List_for_Admin.php '); 
?>