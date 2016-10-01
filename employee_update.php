<?php
include("dbconnect.php");
$strquery = "UPDATE e_info SET EName= '" . $_GET['EName'] . "',EDesignation= '" . $_GET['EDesignation'] . "'where EID='" . $_GET['EID'] . "' ";
$results = mysql_query($strquery);
header('location: https://localhost/mylab/employee_edit.php ');

?>