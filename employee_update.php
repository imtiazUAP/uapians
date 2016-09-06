<?php
$connect = mysql_connect("localhost", "root", "");
$select_db = mysql_select_db("mylab");
$strquery = "UPDATE e_info SET EName= '" . $_GET['EName'] . "',EDesignation= '" . $_GET['EDesignation'] . "'where EID='" . $_GET['EID'] . "' ";
$results = mysql_query($strquery);
header('location: https://localhost/mylab/employee_edit.php ');

?>