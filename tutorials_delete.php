<?php
include('dbconnect.php');
error_reporting(0);
include("classes/Authentication.php");
if($isLoggedIn && $isAdmin){
$strquery = "DELETE from video_tutorial where tutorial_id = '" . $_GET['tutorial_id'] . "' ";
$results = mysql_query($strquery);
header("location: https://localhost/uapians/tutorials.php?vtid=".$_GET['vtid']);
}
?>