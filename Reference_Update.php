<?php
include("dbconnect.php");

$strquery="UPDATE reference_info SET CID= '" . $_GET['CID'] . "', EID= '" . $_GET['EID'] . "' , SMID= '" . $_GET['SMID'] . "' , Reference_Link= '" . $_GET['Reference_Link'] . "' , Detail= '" . $_GET['Detail'] . "' where ref_id='".$_GET['ref_id']."' ";

$results=mysql_query ($strquery);

header ('location: http://www.uapians.net/reference_edit.php '); 
