<?php
include("dbconnect.php");
$strquery = " DELETE from c_info where CID = '" . $_GET['CID'] . "' ";
$results = mysql_query($strquery);
header('location: http://www.uapians.net/Course_List.php ');
?>