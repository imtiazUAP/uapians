<?php
$con = mysql_connect("localhost", "root", "");
if (!$con) {
	die('Could Not Connect:' . mysql_error());
}
mysql_select_db("mylab", $con);
$sql = "Insert into e_info(EName,EDesignation)
values
('$_POST[EName]','$_POST[EDesignation]')";
if (!mysql_query($sql, $con)) {
	die('Error:' . mysql_error());
}
header('location: https://localhost/mylab/Employee_Insert.php ');
mysql_close($con)
	?>
<html>

<head>
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/thickbox.js"></script>
	<link rel="stylesheet" href="assets/css/thickbox.css" type="text/css" media="screen" />
</head>

<body>
	<form action="Employee_Save.php" method="post">
		<table>
			<tr>
				<td>EName:</td>
				<td><input type="text" name="EName" /></td>
			</tr>
			<tr>
				<td>EDesignation:</td>
				<td><input type="text" name="EDesignation" /></td>
			</tr>
		</table>
		<br><br>
		<input type="Submit" />
		<a href="#" onClick="tb_remove();">Close</a>
	</form>
</body>

</html>