<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
include_once ("page.inc.php");
?>
<?php
$b = $_SESSION['username'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
if (empty($_SESSION['username'])) {
	?>
	<script language="JavaScript">
		window.location = "index.php";
	</script><?php } else { ?>
	<html>

	<head>
		<?php include ("header.php"); ?>
	</head>

	<body>
		<div id="canvas">
			<div class="body_wrapper">
				<?php include ("logo.php"); ?>
				<div id="logo">
					<div class="body" style="height:2000px">
						<?php include ("menu.php"); ?>
						<?php
						$strquery = "SELECT * from e_info INNER JOIN
userinfo
ON
e_info.SID=userinfo.SID
 WHERE username='{$b}'";
						$results = mysql_query($strquery);
						$num = mysql_numrows($results);
						$SID = mysql_result($results, $i, "SID");
						$Employee_Name = mysql_result($results, $i, "EName");
						$Employee_Designation = mysql_result($results, $i, "EDesignation");
						$Employee_Contact = mysql_result($results, $i, "Employee_Contact");
						$Employee_Speech = mysql_result($results, $i, "Employee_Speech");
						$Employee_Qualification = mysql_result($results, $i, "Employee_Qualification");
						$Employee_Experience = mysql_result($results, $i, "Employee_Experience");
						$Employee_Role = mysql_result($results, $i, "Employee_Role");
						$Employee_Portrait = mysql_result($results, $i, "Employee_Portrait");
						$current_subject = mysql_result($results, $i, "current_subject");
						?>
						<?php
						if (($userdata['SID'] == $SID)) {
							?>
							<div align="center" style="background-color:#FFFF00; width:700px; height:20px">
								<?php echo " <a href='My_profile_Teacher_Edit.php? SID=" . $SID . "'> Edit Profile </a>" ?>
								<?php echo " <a href='Reference_Upload.php? SID=" . $SID . "'> Upload File </a>" ?>
							</div>
							<?php
						}
						?>
						<div id="content">
							<div align="center" style="padding-top:30px">
								<img style="width:150px;padding:10px;border:5px solid white;margin:0px; font-size:18px"
									src="<?php echo $Employee_Portrait; ?>" />
							</div>
							<p align="center" style="font:Arial, Helvetica, sans-serif; font-size:40px; color:#FFFFFF">
								<?php echo $Employee_Name; ?></P>
							<p align="center" style="padding-top:1px; color:#FFFFFF; font-size:18px">
								<?php echo $Employee_Designation; ?></P>
							<p align="center" style="padding-top:10px; color:#FFFFFF; font-size:16px">
								<?php echo $Employee_Contact; ?></P>
							<p style="padding-top:10px; color:#FFFFFF; font-size:18px">Speech for the Students:<br></p>
							<div>
								<p style="width:900px;padding:10px;border:2px solid white;margin:0px; font-size:14px">
									<?php echo $Employee_Speech; ?></P>
							</div>.
							<p style="padding-top:10px; color:#FFFFFF; font-size:18px">Academic Qualification:<br></p>
							<div>
								<p style="width:900px;padding:10px;border:2px solid white;margin:0px; font-size:14px">
									<?php echo $Employee_Qualification; ?></P>
							</div>
							<p style="padding-top:10px; color:#FFFFFF; font-size:18px">Teaching Experience:<br></p>
							<div>
								<p style="width:900px;padding:10px;border:2px solid white;margin:0px; font-size:14px">
									<?php echo $Employee_Experience; ?></P>
							</div>
							<p style="padding-top:10px; color:#FFFFFF; font-size:18px">Playing Role in UAP:<br></p>
							<div style="padding-bottom:75px">
								<p style="width:900px;padding:10px;border:2px solid white;margin:0px; font-size:14px">
									<?php echo $Employee_Role; ?></P>
							</div>
							<p style="padding-top:10px; color:#FFFFFF; font-size:18px">Currently Conducting Subject:<br></p>
							<div style="padding-bottom:75px">
								<p style="width:900px;padding:10px;border:2px solid white;margin:0px; font-size:14px">
									<?php echo $current_subject; ?></P>
							</div>
						</div>
					</div>
				</div>
				<div class="footer">
					<div class="FooterText">
						<a href="http://www.emtiaj.blogspot.com" target="_blank">copyright @ www.emtiaj.blogspot.com</a>
						|||||
						<a href="http://uap-bd.edu/cse/index.html" target="_blank">copyright @ CSE Department, UAP</a> <br>
					</div>
				</div>
	</body>

	</html>
	<?php
} ?>