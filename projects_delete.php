<?php
include('dbconnect.php');
error_reporting(0);
include("classes/Authentication.php");
if($isLoggedIn && $isAdmin){
$strquery = "DELETE from project where project_id = '" . $_GET['project_id'] . "' ";
$results = mysql_query($strquery);
header("location: https://localhost/uapians/projects.php?language_id=".$_GET['language_id']);
}
?>