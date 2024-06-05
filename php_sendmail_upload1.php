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
					<div id="wowslider-container1" style="height:200px">
						<?php include ("slider1.php");
						?>
					</div>
					<div id="content">
						<div id="colOne">
							<?php
							include ("sidebar.php");
							?>
						</div>
						<form action="php_sendmail_upload2.php" method="post" name="form1" enctype="multipart/form-data">
							<table width="830" border="2" style="padding:100px;">
								<tr>
									<td>Select Mail Contacts:</td>
									<td>
										<select name="send_mail_option_id" id="send_mail_option_name" selected="">
											<?php
											$query = "SELECT DISTINCT send_mail_option_id, send_mail_option_name FROM send_mail_option";
											$rs = mysql_query($query) or die('Error submitting');
											while ($rows = mysql_fetch_assoc($rs)) {
												if ($row["send_mail_option_id"] == $rows["send_mail_option_id"]) {
													$selected = 'selected="selected"';
												} else {
													$selected = '';
												}
												print ("<option value=\"" . $rows["send_mail_option_id"] . "\" " . $selected . "  >" . $rows["send_mail_option_name"] . "</option>");
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Subject:</td>
									<td><input name="txtSubject" type="text" id="txtSubject"></td>
								</tr>
								<tr>
									<td>Message Description:</td>
									<td><textarea name="txtDescription" cols="40" rows="8" id="txtDescription"></textarea>
									</td>
								</tr>
								<tr>
									<td>Sender Name:</td>
									<td><input name="txtFormName" type="text"></td>
								</tr>
								<tr>
								<tr>
									<td>Sender Email:</td>
									<td><input name="txtFormEmail" type="text"></td>
								</tr>
								<tr>
									<td>Attach file:</td>
									<td><input name="fileAttach" type="file"></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><input type="submit" name="Submit" value="Send"></td>
								</tr>
							</table>
						</form>
					</div>
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