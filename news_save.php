<html>
<head>
    <?php
    include("header.php");
    ?>
</head>
<body>
<?php
include('dbconnect.php');
$sql = "Insert into news_info(News_Hints,News_Link)
    values
    ('$_POST[News_Hints]','$_POST[News_Link]')";
if (!mysql_query($sql)) {
    die('Error:' . mysql_error());
}
echo "<div style='color: #000000'>News Saved!!!!!!!! Thank you</div>";
?>
<div align="right" style="padding-right:25">
    <button class="button button_red" onClick="tb_remove()"> Close </button>
</div>
</body>
</html>