<?php
    include("dbconnect.php");
    $strquery=" DELETE from reference_info where ref_id = '" . $_GET['ref_id'] . "' ";
    $results=mysql_query ($strquery);
    header ('location: http://www.uapians.net/Reference_List.php ');
?>