<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
?>
<?php
$b = $_SESSION['email'];
//$c=$_SESSION['userid'];
$userrole = mysql_query("select * from userinfo where email='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
//echo $userdata['admin'];
if (empty($_SESSION['email'])) {
	?>
	<script language="JavaScript">
		window.location = "index.php";
	</script><?php } else { ?>
	<html>

	<head>
		<?php
		include ("header.php");
		?>
		<style>
			img {
				opacity: 0.9;
				filter: alpha(opacity=40);
				/* For IE8 and earlier */
			}

			img:hover {
				opacity: 1.0;
				filter: alpha(opacity=100);
				/* For IE8 and earlier */
			}
		</style>
	</head>

	<body>
		<div id="canvas">
			<div class="body_wrapper">
				<?php include ("logo.php"); ?>
				<div class="body" style="min-height:2300px">
					<?php include ("menu.php"); ?>
					<div id="content_wrapper">
						<div id="sidebar">
							<?php
							include ("sidebar.php");
							?>
						</div>
						<div id="content">
							<table>
								<tr>
									<td>
										<a href="video_tutorial.php?vtid=1"><img border="0" alt="W3Schools"
												src="images/videodefaultimage.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=2"><img border="0" alt="W3Schools"
												src="images/c.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=3"><img border="0" alt="W3Schools"
												src="images/c++.jpg" width="265" height="160"></a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="video_tutorial.php?vtid=4"><img border="0" alt="W3Schools"
												src="images/csharp.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=5"><img border="0" alt="W3Schools"
												src="images/android.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=6"><img border="0" alt="W3Schools"
												src="images/assembly.jpg" width="265" height="160"></a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="video_tutorial.php?vtid=7"><img border="0" alt="W3Schools"
												src="images/webapps.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=8"><img border="0" alt="W3Schools"
												src="images/python.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=9"><img border="0" alt="W3Schools"
												src="images/database.jpg" width="265" height="160"></a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="video_tutorial.php?vtid=10"><img border="0" alt="W3Schools"
												src="images/php.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=11"><img border="0" alt="W3Schools"
												src="images/graphics.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=12"><img border="0" alt="W3Schools"
												src="images/wordpress.jpg" width="265" height="160"></a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="video_tutorial.php?vtid=13"><img border="0" alt="W3Schools"
												src="images/php.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=14"><img border="0" alt="W3Schools"
												src="images/graphics.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=15"><img border="0" alt="W3Schools"
												src="images/wordpress.jpg" width="265" height="160"></a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="video_tutorial.php?vtid=16"><img border="0" alt="W3Schools"
												src="images/php.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=17"><img border="0" alt="W3Schools"
												src="images/graphics.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=18"><img border="0" alt="W3Schools"
												src="images/wordpress.jpg" width="265" height="160"></a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="video_tutorial.php?vtid=19"><img border="0" alt="W3Schools"
												src="images/php.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=20"><img border="0" alt="W3Schools"
												src="images/graphics.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=21"><img border="0" alt="W3Schools"
												src="images/wordpress.jpg" width="265" height="160"></a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="video_tutorial.php?vtid=22"><img border="0" alt="W3Schools"
												src="images/php.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=23"><img border="0" alt="W3Schools"
												src="images/graphics.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=24"><img border="0" alt="W3Schools"
												src="images/wordpress.jpg" width="265" height="160"></a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="video_tutorial.php?vtid=25"><img border="0" alt="W3Schools"
												src="images/php.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=26"><img border="0" alt="W3Schools"
												src="images/graphics.jpg" width="265" height="160"></a>
									</td>
									<td>
										<a href="video_tutorial.php?vtid=27"><img border="0" alt="W3Schools"
												src="images/videodefaultimage.jpg" width="265" height="160"></a>
									</td>
								</tr>
							</table>
						</div>
						<!--<div>
		  <p>fgfeaffwefw</p>
		  <p><button style=" background:#C92124 " ><a href="About_me.php" target="_blank" >About me</        button></p>
	 </div>-->
	</body>
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