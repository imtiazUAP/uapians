<?php
session_start();
error_reporting(0);
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("mylab");
?>
<?php //print $_SESSION['username'];                 ?>


<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
</head>
<body>
<br>
<div style="font-size:24px; color:#0000FF; font-weight:bold" align="center">

<div>
<img src="images/tutorial.png"  style="height:150"/>
</div>
<p>Please Log in to continue...
</p>
</div>
	
</div>

<div align="right"; style="padding-right:25">
<label>
<a href="#" onClick="tb_remove();">Close</a>
</label>
</div>
</body>
</html>