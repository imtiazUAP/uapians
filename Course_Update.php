<?php
include("dbconnect.php");
$strquery = "UPDATE c_info SET CCode= '" . $_GET['CCode'] . "',CName= '" . $_GET['CName'] . "'where CID='" . $_GET['CID'] . "' ";
$results = mysql_query($strquery);
header('location: https://localhost/mylab/Course_Edit.php ');
?>