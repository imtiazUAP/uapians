<html>
<?php
include("dbconnect.php");
$strquery = "SELECT * from c_info where CID= '" . $_GET["CID"] . "' ";
$results = mysql_query ($strquery);
$row = mysql_fetch_array($results);
?>
    <head>
        <?php
        include("header.php");
        ?>
    </head>
    <body>
        <form id="form1" name="form1" method="get" action="course_update.php">
        <table>
            <tr>
                <td>CCode:</td>
                <td><input name="CCode" type="text" id="CCode" value=" <?php echo $row["CCode"]; ?>" /></td>
            </tr>
            <tr>
                <td>CName:</td>
                <td><input name="CName" type="text" id="CName" value=" <?php echo $row["CName"]; ?>" /></td>
            </tr>
        </table>

        <input name="CID" type="hidden" id="CID"  value=" <?php echo $row["CID"]; ?>" />
        <p>
        <label>
            <input type="submit" name="Submit" value="Update" />
            <a href="#" onClick="tb_remove();">Close</a>
        </label>
        </p>
        </form>
    </body>
</html>