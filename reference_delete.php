<?php
include('dbconnect.php');
error_reporting(0);
include("classes/Authentication.php");
if($isLoggedIn && $isAdmin){
    $strquery=" DELETE from reference_info where ref_id = '". $_GET['ref_id'] ."' ";
    $results=mysql_query ($strquery);
    header ("location: https://localhost/uapians/reference_list.php?CID=".$_GET['CID']);
}
?>