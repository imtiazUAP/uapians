<html>
<?php
    include('dbconnect.php');
    include("classes/Authentication.php");
    $strquery = "SELECT * from news_info where News_ID= '" . $_GET["News_ID"] . "' ";
    $results = mysql_query($strquery);
    $row = mysql_fetch_array($results);
?>
<head>
    <?php
    include("header.php");
    ?>
</head>
<body>
<?php
if ($isLoggedIn && $isAdmin) {
?>
<form id="form1" name="form1" method="get" action="news_update.php">
    <table style="color: #000000">
        <tr>
            <td>News Hints:</td>
            <td><input name="News_Hints" type="text" id="News_Hints" value=" <?php echo $row["News_Hints"]; ?>"/></td>
        </tr>
        <tr>
            <td>News Link:</td>
            <td><input name="News_Link" type="text" id="News_Link" value=" <?php echo $row["News_Link"]; ?>"/></td>
        </tr>
    </table>

    <input name="News_ID" type="hidden" id="News_ID" value="
    <?php echo $row["News_ID"];
    ?>"/>

    <div align="right" style="padding-right:25">
    <button type="submit" class="button button_blue"> Save </button>
    <button class="button button_red" onClick="tb_remove()"> Cancel </button>
    </div>
</form>
<?php }else {
    include("permission_error.php");
}
?>
</html>