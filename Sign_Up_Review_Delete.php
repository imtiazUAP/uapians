<?php
    include("dbconnect.php");
    $strquery = " DELETE from sign_up where SReg = '" . $_GET['SReg'] . "' ";
    $results = mysql_query($strquery);
    header('location: https://localhost/uapians/Admin_Control.php ');
?>