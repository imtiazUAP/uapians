<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
?>
<?php //print $_SESSION['email'];                 ?>
<html>

<head>
	<?php
	include ("header.php");
	?>
</head>

<body>
	<div id="canvas">
		<div class="body_wrapper" align="center">
			<?php include ("logo_for_index.php"); ?>
			<div class="body">
				<?php include ("menu_for_index.php");
				?>
				<div id="wowslider-container1" style="height:200px">
					<?php include ("slider1.php");
					?>
				</div>
				<div id="content_wrapper">
					<div id="sidebar" align="left">
						<?php
						include ("sidebar_for_index.php");
						?>
					</div>
					<div id="content">
						<div style="font-size:24px; font-weight:bold; padding:50; color:#FFFFFF">Your Registration is
							Complete!!! Please wait for Admin Review (maximum 24 hour)
							<br>
							A confirmation a email will be sent to your valid email account with email and password.
							Use that user name and password to log in...
							<br>
							ThankYou......
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<?php include ("footer.php");
				?>
			</div>
</body>

</html>