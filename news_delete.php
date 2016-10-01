<?php
    session_start();
    include("dbconnect.php");
    $strquery = " DELETE from news_info where News_ID = '" . $_GET['News_ID'] . "' ";
    $results = mysql_query($strquery);
    header('location: http:/index.php ');
?>