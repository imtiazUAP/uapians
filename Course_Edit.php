<html>
<?php
include ("dbconnect.php");
$strquery = "SELECT * from c_info where CID= '" . $_GET["CID"] . "' ";
$results = mysql_query($strquery);
$row = mysql_fetch_array($results);
?>

<head>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/thickbox.js"></script>
    <link rel="stylesheet" href="assets/css/thickbox.css" type="text/css" media="screen" />
</head>

<body>
    <form id="form1" name="form1" method="get" action="Course_Update.php">
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
        <input name="CID" type="hidden" id="CID" value=" <?php echo $row["CID"]; ?>" />
        <p>
            <label>
                <input type="submit" name="Submit" value="Update" />
                <a href="#" onClick="tb_remove();">Close</a>
            </label>
        </p>
    </form>

</html>