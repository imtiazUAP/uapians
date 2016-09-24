<?php
include("dbconnect.php");
if(strlen($_POST[Comment])>0){
$sql = "Insert into comments(SID,Blog_ID,Comment)
values
('$_POST[SID]','$_POST[Blog_ID]','$_POST[Comment]')";
if (!mysql_query($sql)) {
    die('Error:' . mysql_error());
}
}
header('location: https://localhost/uapians/single_blog_list.php?Blog_ID='.$_POST[Blog_ID]);
?>