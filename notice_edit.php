<?php
include("dbconnect.php");
include("classes/Authentication.php");
$strquery = "SELECT * from notice_info where Notice_ID= '" . $_GET["Notice_ID"] . "' ";
$results = mysql_query($strquery);
$row = mysql_fetch_array($results);
?>
<html>
    <head>
        <?php
        include("header.php");
        ?>
    </head>
    <body>
    <?php
    if ($isLoggedIn) {
    ?>
    <form id="form1" name="form1" method="get" action="notice_update.php">
        <table style="color: #000000">
            <tr>
                <td>Notice:</td>
            </tr>
        </table>
        <textarea name="Notice" type="text" id="Notice" cols="70" rows="15">
            <?php echo $row["Notice"]; ?>
        </textarea><br>
        <input name="Notice_ID" type="hidden" id="Notice_ID" value=" <?php echo $row["Notice_ID"]; ?>"/>
        <div align="right" style="padding-right:25">
            <button type="submit" class="button button_blue"> Save </button>
            <button class="button button_red" onClick="tb_remove()"> Cancel </button>
        </div>
    </form>
    <?php }else {
        include("permission_error.php");
    }
    ?>
    </body>
</html>
