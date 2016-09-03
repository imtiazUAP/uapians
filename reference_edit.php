<html>
<?php
    include("dbconnect.php");
    $strquery = "SELECT * from reference_info where ref_id= '" . $_GET["ref_id"] . "' ";
    $results = mysql_query ($strquery);
    $row = mysql_fetch_array($results);
?>
<head>
    <?php
    include("header.php");
    ?>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
</head>
<body>

<form id="form1" name="form1" method="get" action="Reference_Update.php">

<table>

<tr>
<td>Course ID:</td>
<td><input name="CID" type="text" id="CCode" value=" <?php echo $row["CID"]; ?>" /></td>
</tr>
<tr>
<td>Employee ID:</td>
<td><input name="EID" type="text" id="CName" value=" <?php echo $row["EID"]; ?>" /></td>
</tr>

<tr>
<td>Semester ID:</td>
<td><input name="SMID" type="text" id="CName" value=" <?php echo $row["SMID"]; ?>" /></td>
</tr>

<tr>
<td>Reference Link:</td>
<td><input name="Reference_Link" type="text" id="CName" value=" <?php echo $row["Reference_Link"]; ?>" /></td>
</tr>

<tr>
<td>Detail:</td>
<td><input name="Detail" type="text" id="CName" value=" <?php echo $row["Detail"]; ?>" /></td>
</tr>

</table>
	

<input name="ref_id" type="hidden" id="ref_id"  value=" <?php echo $row["ref_id"]; ?>" />
<p>
<label>
<input type="submit" name="Submit" value="Update" />
<a href="#" onClick="tb_remove();">Close</a>
</label>
</p>
</form>

</html>