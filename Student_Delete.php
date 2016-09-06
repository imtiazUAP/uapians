<?php
    include("dbconnect.php");
    $strquery = " DELETE from s_info where SID = '" . $_GET['SID'] . "' ";
    $results = mysql_query($strquery);
    header('location: http:/student_list.php ');
?>