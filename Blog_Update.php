<?php
include("dbconnect.php");
$strquery = "UPDATE blog SET Blog= '" . $_GET['Blog'] . "' where Blog_ID='" . $_GET['Blog_ID'] . "' ";
$results = mysql_query($strquery);
header('location: https://localhost/uapians/Blog_Edit.php ');
?>