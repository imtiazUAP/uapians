<?php
include("dbconnect.php");
if(strlen($_POST[Blog]) > 0){
    $sql = "Insert into blog(SID,Blog)
    values
    ('$_POST[SID]','$_POST[Blog]')";
    if (!mysql_query($sql)) {
        die('Error:' . mysql_error());
    }
}
header('location: https://localhost/uapians/blog_list.php ');
?>