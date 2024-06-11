<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
?>
<?php
$b = $_SESSION['username'];
//$c=$_SESSION['userid'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
//echo $userdata['admin'];
if (empty($_SESSION['username'])) {
	?>
	<script language="JavaScript">
		window.location = "index.php";
	</script><?php } else { ?>
	<html>

	<head>
		<?php
		include ("header.php");
		?>
	</head>

	<body>
		<div id="background_canvas">
			<div class="body_wrapper">
				<?php include ("logo.php"); ?>
				<div class="content_wrapper" style="min-height:2300px">
					<?php include ("menu.php"); ?>
					<form>
						<table border="1" align="center" width="1100">
							<tr align="center">
								<td bgcolor="#006699" width="80">Course_Code</td>
								<td bgcolor="#006699" width="160">Course_Name</td>
								<td bgcolor="#006699" width="170">Course_Teacher</td>
								<td bgcolor="#006699" width="180">Detail</td>
								<td bgcolor="#006699" width="100px">Download_Link</td>
								<?php
								include ("dbconnect.php");
								$strquery = "SELECT CCode,CName,Reference_Link, EName,Detail,  SMName FROM reference_info
INNER JOIN c_info
ON reference_info.CID=c_info.CID
INNER JOIN e_info
ON reference_info.EID=e_info.EID
INNER JOIN sm_info
ON reference_info.SMID=sm_info.SMID ORDER BY CCode";
								$results = mysql_query($strquery);
								$num = mysql_numrows($results);
								$i = 0;
								while ($i < $num) {
									$CCode = mysql_result($results, $i, "CCode");
									$CName = mysql_result($results, $i, "CName");
									$f10 = mysql_result($results, $i, "EName");
									$Detail = mysql_result($results, $i, "Detail");
									$f3 = mysql_result($results, $i, "Reference_Link");
									?>
									<table border="1" align="center" width="1100">
										<tr align="center">
											<td width="130" height="50"><?php echo $CCode; ?></td>
											<td width="200" height="50"><?php echo $CName; ?></td>
											<td align="center" width="220" height="50"><?php echo $f10; ?></td>
											<td align="center" width="220" height="50"><?php echo $Detail; ?></td>
											<td width="150" height="50"><a href="<?php echo $f3; ?>">Download</a></td>
									</table>
									<?php
									$i++;
								}
								?>
					</form>
				</div>
			</div>
			<div class="footer">
				<?php include ("footer.php");
				?>
			</div>
	</body>

	</html>
	<?php
} ?>