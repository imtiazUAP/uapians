<html>
<?php
$connect = mysql_connect("localhost", "root", "");
$select_db = mysql_select_db("mylab");
$strquery = "SELECT * from e_info where EID= '" . $_GET["EID"] . "' ";
$results = mysql_query($strquery);
$row = mysql_fetch_array($results);
?>
    <head>
        <?php
        include("header.php");
        ?>
    </head>
    <body>
        <form id="form1" name="form1" method="get" action="Employee_Update.php">
            <table>
                <tr>
                    <td>EName:</td>
                    <td><input name="EName" type="text" id="EName" value=" <?php echo $row["EName"]; ?>"/></td>
                </tr>
                <tr>
                    <td>EDesignation:</td>
                    <td><input name="EDesignation" type="text" id="EDesignation" value=" <?php echo $row["EDesignation"]; ?>"/>
                    </td>
                </tr>
            </table>
            <input name="EID" type="hidden" id="EID" value=" <?php echo $row["EID"]; ?>"/>
            <p>
                <label>
                    <input type="submit" name="Submit" value="Update"/>
                    <a href="#" onClick="tb_remove();">Close</a>
                </label>
            </p>
        </form>
    </body>
</html>