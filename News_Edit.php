<html>
<?php

include('dbconnect.php');

$strquery = "SELECT * from news_info where News_ID= '" . $_GET["News_ID"] . "' ";
$results = mysql_query ($strquery);
$row = mysql_fetch_array($results);
?>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
</head>
<body>

<form id="form1" name="form1" method="get" action="News_Update.php">

<table>

<tr>
<td>News Hints:</td>
<td><input name="News_Hints" type="text" id="News_Hints" value=" <?php echo $row["News_Hints"]; ?>" /></td>
</tr>
<tr>
<td>News Link:</td>
<td><input name="News_Link" type="text" id="News_Link" value=" <?php echo $row["News_Link"]; ?>" /></td>
</tr>

</table>
	

<input name="News_ID" type="hidden" id="News_ID"  value=" <?php echo $row["News_ID"]; ?>" />
<p>
<label>
<input type="submit" name="Submit" value="Update" />
<a href="#" onClick="tb_remove();">Close</a>
</label>
</p>
</form>

</html>