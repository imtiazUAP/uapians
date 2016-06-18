<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("mylab");

$strquery=" DELETE from e_info where EID = '" . $_GET['EID'] . "' ";
$results=mysql_query ($strquery);
header ('location: https://localhost/mylab/Employee_List.php '); 
?>