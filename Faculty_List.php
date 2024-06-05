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
		<div id="grad1">
			<div class="bodydiv">
				<?php include ("logo.php"); ?>
				<div class="realbody" style="min-height:2300px">
					<?php include ("menu.php"); ?>
					<form>
						<?php
						if (($userdata['admin'] == '1')) {
							?>
							<a href="Employee_Insert.php?keepThis=true&TB_iframe=true&height=120&width=240&modal=true"
								title="New Employee" class="thickbox">Create New Employee</a>
							<table class="hoverTable" width="1100" border="1"
								style=" padding-bottom:40px;padding-left:40px;padding-right:40px;">
								<tr align="center">
									<td width="50" height="50" bgcolor="588C73">Employee Name</td>
									<td width="150" bgcolor="588C73">Employee Designation</td>
									<td width="150" bgcolor="588C73">Portrait</td>
									<td width="150" bgcolor="588C73">Profiles</td>
									<td width="150" bgcolor="#006699">Admin Panel</td>
								</tr>
								<?php
						}
						?>
							<?php
							if (($userdata['admin'] == '4')) {
								?>
								<table class="hoverTable" width="1100" border="1"
									style=" padding-bottom:40px;padding-left:40px;padding-right:40px;">
									<tr align="center">
										<td width="50" height="50" bgcolor="#006699">Employee Name</td>
										<td width="150" bgcolor="#006699">Employee Designation</td>
										<td width="150" bgcolor="#006699">Portrait</td>
										<td width="150" bgcolor="#006699">Profiles</td>
									</tr>
									<?php
							}
							?>
								<?php
								if (($userdata['admin'] == '0')) {
									?>
									<table class="hoverTable" width="1100" border="1"
										style=" padding-bottom:40px;padding-left:40px;padding-right:40px;">
										<tr align="center">
											<td width="50" height="50" bgcolor="#006699">Employee Name</td>
											<td width="150" bgcolor="#006699">Employee Designation</td>
											<td width="150" bgcolor="#006699">Portrait</td>
											<td width="150" bgcolor="#006699">Profiles</td>
										</tr>
										<?php
								}
								?>
									<?php
									$strquery = "SELECT * from e_info order by EID";
									$results = mysql_query($strquery);
									$num = mysql_numrows($results);
									$i = 0;
									while ($i < $num) {
										$EID = mysql_result($results, $i, "EID");
										$EName = mysql_result($results, $i, "EName");
										$EDesignation = mysql_result($results, $i, "EDesignation");
										$Employee_Portrait = mysql_result($results, $i, "Employee_Portrait");
										?>
										<tr align="center">
											<td height="40"><?php echo $EName; ?></td>
											<td><?php echo $EDesignation; ?></td>
											<td width="100"><img src="<?php echo $Employee_Portrait; ?>" style="height:100px;">
											</td>
											<td><?php echo " <a href='Teacher_Profile_List.php? EID=" . $EID . "'> Profile </a>" ?>
											</td>
											<?php
											if (($userdata['admin'] == '1')) {
												?>
												<td align="center">
													<?php echo " <a href='Employee_Edit.php?EID=" . $EID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Employee - " . $EID . "'> edit </a> "; ?>
													| <?php echo " <a href='Employee_Delete.php?EID=" . $EID . "'> delete </a> "; ?>
												</td>
												<?php
											}
											?>
										</tr>
										<?php
										$i++;
									}
									?>
								</table>
				</div>
			</div>
			<div class="footer">
				<div class="FooterText">
					<a href="http://www.emtiaj.blogspot.com" target="_blank">copyright @ www.emtiaj.blogspot.com</a> |||||
					<a href="http://uap-bd.edu/cse/index.html" target="_blank">copyright @ CSE Department, UAP</a> <br>
					<div class="fb-like" data-href="https://www.facebook.com/pages/UAPIANSNet/1452237808341753"
						data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
				</div>
			</div>
	</body>

	</html>
	<?php
} ?>