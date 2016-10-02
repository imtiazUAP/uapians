<?php
error_reporting(0);
session_start();
include("classes/Authentication.php");
include('dbconnect.php');
$b = $_SESSION['username'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
?>
<?php
$SID = $_GET['SID'];
$strquery = "DELETE from e_info where SID ='$SID'";
$results = mysql_query($strquery);

$strquery = "DELETE from userinfo where SID ='$SID'";
$results = mysql_query($strquery);
header('location: https://localhost/uapians/faculty_list.php ');
?>