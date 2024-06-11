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
//echo $userdata['admin'];
if (empty($_SESSION['username'])) {
	?>
	<script language="JavaScript">
		window.location = "index.php";
	</script><?php } else { ?>
	<html>

	<head>
		<title>Home | Student Management Tool</title>
		<script type="text/javascript" src="assets/js/jquery.js"></script>
		<script type="text/javascript" src="assets/js/thickbox.js"></script>
		<link rel="stylesheet" href="assets/css/thickbox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen">
	</head>

	<body>
		<div id="background_canvas">
			<div class="body_wrapper">
				<div id="logo" align="left">
					<h1><a href="Home.php">Student Management Tool </a></h1>
					<p>A Software for Managing CSE Department ...UNOFFICIAL...</p>
					<div class="content_wrapper" style="min-height:1800px">
						<?php
						//$connect=mysql_connect("localhost","root","");
//$select_db=mysql_select_db("mylab");
						$strquery = "SELECT SPortrait,username FROM s_info INNER JOIN userinfo ON s_info.SID=userinfo.SID WHERE username='{$b}'";
						$results = mysql_query($strquery);
						$num = mysql_numrows($results);
						$SPortrait = mysql_result($results, $i, "SPortrait");
						$userName = mysql_result($results, $i, "username");
						?>
						<div id='cssmenu' align="center" style="vertical-align:middle">
							<ul>
								<li style="vertical-align:middle;"><a href='My_Profile.php'><span><img
												style="width:15px; height:15px; border:1px solid white; vertical-align:middle"
												src="<?php echo $SPortrait; ?>" alt="Profile Picture"><span>
												Profile</span></a></li>
								<li><a href='Home.php'><span>Home</span></a></li>
								<li><a href='Student_List.php'><span>Students</span></a></li>
								<li><a href='Employee_List.php'><span>Employees</span></a></li>
								<li><a href='Blog_List.php'><span>CSE Blog</span></a></li>
								<li><a href='Blood_List.php'><span>Blood</span></a></li>
								<li><a href='About.php'><span>About</span></a></li>
							</ul>
						</div>
						<div id="content">
							<div id="colOne">
								<div class="box">
									<br>
									<br>
									<a href="index.php"
										style="text-decoration:none;font-size:24px; font-weight:bold"><span>Logout</span></a>
									<div>
										<form>
											<input type="text" size="29" placeholder="Search for any page"
												onKeyUp="showResult(this.value)">
											<div id="livesearch"></div>
										</form>
									</div>
									<br>
									<div id="section_head">
										<h3 align="left"
											style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Academic
											Aspects</h3>
									</div>
									<ul class="bottom">
										<li><a href="Employee_List.php">Teachers</a></li>
										<li><a href="Student_List.php">Students</a></li>
										<li><a href="Course_List.php">Courses</a></li>
										<li><a href="Mark_List.php">Results</a></li>
										<li><a href="Reference_List_All.php">References</a></li>
									</ul>
								</div>
								<div class="box">
									<div id="section_head">
										<h3 align="left"
											style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Clubs &
											Social Works</h3>
									</div>.
									<ul class="bottom">
										<li><a href="galary.php">Gallery</a></li>
										<li><a href="Blood_List_All.php">Blood Bank</a></li>
										<li><a href="Programing_Contest_Club.php">Programming Contest Club</a></li>
										<li><a href="Research_Publication_Club.php">Research and Publication Club</a></li>
										<li><a href="Sports_Club.php">Sports Club</a></li>
										<li><a href="Software_Hardware_Club.php">Software and Hardware Club</a></li>
										<li><a href="Cultural_Debating_Club.php">Cultural and Debating Club</a></li>
										<li><a href="Web_Club.php">Web Club</a></li>
									</ul>
								</div>
								<div class="box">
									<div id="section_head">
										<h3 align="left"
											style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Admin Panel
										</h3>
									</div>
									<ul>
										<a href="Admin_Sayem.php">
											<li><img src="images/1962727_694969320562722_1717298201_n.jpg"
													style="height:100" /> Sayem Hossain</li>
										</a>
										<p class="bottom">Sayem Hossain, University of Asia Pacific
											Phone:+8801xxxxxxxxx
											E_Mail:sayem@ekushay.com
											Website:www.ekushay.com </p>
										<li><a href="send_message_to_admin.php">Send him a Message</a></li>
										<?php
										if (($userdata['admin'] == '1')) {
											?>
											<li><a href="Message_List_for_Admin.php"> My Messages</a></li>
											<?php
										}
										?>
										<br>
										<a href="Admin_Taqi.php">
											<li><img src="images/image-Copy.jpg" style="height:100" /> Taqi Tahmid Tanzil
											</li>
										</a>
										<p class="bottom">Taqi Tahmid, University of Asia Pacific
											Phone:+8801937970970
											E_Mail:t.t.tanzil@facebook.com
											Website:www.facebook.com/t.t.tanzil </p>
										<li><a href="send_message_to_admin.php">Send him a Message</a></li>
										<?php
										if (($userdata['admin'] == '1')) {
											?>
											<li><a href="Message_List_for_Admin.php"> My Messages</a></li>
											<?php
										}
										?>
									</ul>
								</div>
								<div class="box">
									<div id="section_head">
										<h3 align="left"
											style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Contact Us
										</h3>
									</div>
									<p class="bottom">Imtiaz Ahmad, University of Asia Pacific
										Phone:+880170613683
										E_Mail:emtiaj@yahoo.com
										Website:www.emtiaj.blogspot.com </p>
									<br>
									<p class="bottom">Irfan Tanvir, University of Asia Pacific
										Phone:+8801736516583
										E_Mail:emtiaj@yahoo.com
										Website:www.emtiaj.blogspot.com </p>
								</div>
							</div>
							<div id="margin_figure">
								<?php
								if (($userdata['admin'] == '1')) {
									?>
									<div>
										<a href="Gallery_Insert.php?keepThis=true&TB_iframe=true&height=100&width=400&modal=true"
											title="New Student" class="thickbox">Add New Photos</a>
									</div>
									<?php
								}
								?>
								<?php
								$strquery = "Select * from gallery";
								$results = mysql_query($strquery);
								$num = mysql_numrows($results);
								$i = 0;
								while ($i < $num) {
									$Photo_Id = mysql_result($results, $i, "Photo_Id");
									$Photo_Link = mysql_result($results, $i, "Photo_Link");
									$Photo_Caption = mysql_result($results, $i, "Photo_Caption");
									?>
									<div class="img" style="background-color:#000033">
										<a target="_blank" href="<?php echo $Photo_Link; ?>">
											<img src="<?php echo $Photo_Link; ?>" alt="Klematis" width="205" height="160">
										</a>
										<div class="desc" style="color:#FFFFFF"><?php echo $Photo_Caption; ?></div>
									</div>
									<?php
									if (($userdata['admin'] == '1')) {
										?>
										<div>
											<?php echo " <a href='Gallery_Delete.php?Photo_Id=" . $Photo_Id . "'> delete </a> "; ?>
										</div>
										<?php
									}
									?>
									<?php
									$i++;
								}
								?>
								</table>
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