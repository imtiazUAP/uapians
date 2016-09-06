<?php
include("dbconnect.php");
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

    <form id="form1" name="form1" method="get" action="notice_update.php">
        <table>
            <tr>
                <td>Notice:</td>
            </tr>
        </table>
        <textarea name="Notice" type="text" id="Notice" cols="70" rows="15">
            <?php echo $row["Notice"]; ?>
        </textarea><br>
        <input name="Notice_ID" type="hidden" id="Notice_ID" value=" <?php echo $row["Notice_ID"]; ?>"/>
        <p>
            <label>
                <input type="submit" name="Submit" value="Update"/>
                <a href="#" onClick="tb_remove();">Close</a>
            </label>
        </p>
    </form>
    </body>
</html>
