<?php
session_start();
error_reporting(1);
include_once ("page.inc2.php");
include ("dbconnect.php");
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
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Slider, WOW Slider, HTML5 Slideshow Maker, Picture Slideshow HTML" />
		<meta name="description"
			content="Slider created with WOW Slider, a free wizard program that helps you easily generate beautiful web slideshow" />
		<link rel="stylesheet" type="text/css" href="assets/engine1/style.css" />
		<script type="text/javascript" src="assets/engine1/jquery.js"></script>
		<script>
			function showResult(str) {
				if (str.length == 0) {
					document.getElementById("livesearch").innerHTML = "";
					document.getElementById("livesearch").style.border = "0px";
					return;
				}
				if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				}
				else {// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
						document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
					}
				}
				xmlhttp.open("GET", "livesearch.php?q=" + str, true);
				xmlhttp.send();
			}
		</script>
	</head>

	<body>
		<div id="grad1">
			<div class="bodydiv">
				<div id="logo" align="left">
					<h1><a href="Home.php">UAPians.Net </a></h1>
					<p>A Stack of Uap Students ...UNOFFICIAL...</p>
					<div class="realbody" style="min-height:2100px">
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
									<div style="text-decoration:none;font-size:24px; color:#FFFFFF; font-weight:bold">
										<span>You are Logged in as <?php print $_SESSION['username'] ?></span></div>
									<br>
									<a href="Log_out.php"
										style="text-decoration:none;font-size:24px; font-weight:bold"><span>Log
											out</span></a>
									<br>
									<br>
									<div>
										<form>
											<input type="text" size="29" placeholder="Search for any page"
												onKeyUp="showResult(this.value)">
											<div id="livesearch"></div>
										</form>
									</div>
									<br>
									<div style="font-weight:bold; font-size:16px">
										<ul>
											<li><a href="send_message_to_your_friend.php">Send a Message...</a></li>
										</ul>
									</div>
									<br>
									<div id="paragraph_head">
										<h3 align="left"
											style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif; padding:5px 5px; ">
											Academic Aspects</h3>
									</div>
									<ul class="bottom">
										<li><a href="Employee_List.php">Teachers</a></li>
										<li><a href="Student_List.php">Students</a></li>
										<li><a href="Course_List.php">Courses</a></li>
										<li><a href="Mark_List.php">Results</a></li>
										<li><a href="Reference_List_All.php">References</a></li>
									</ul>
								</div>
								<br>
								<br>
								<div class="box">
									<div id="paragraph_head">
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
								<br>
								<br>
								<div class="box">
									<div id="paragraph_head">
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
								<br>
								<br>
								<div class="box">
									<div id="paragraph_head">
										<h3 align="left"
											style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Contact Us
										</h3>
									</div>
									<p class="bottom">For any query, or any Information contact with us... <br> Student
										Management Tools,
										University of Asia Pacific
										Phone:+8801736516583
										E_Mail:emtiaj@yahoo.com
										Website:www.emtiaj.blogspot.com
										<br>
										<br>
										For any Information to Add, Edit or Delete Contact with Admins
									</p>
								</div>
								<br>
								<br>
								<div id="paragraph_head">
									<h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">
										Find Us on</h3>
								</div>
								<br>
								<div id="Social_Links" style="display:inline">
									<ul>
										<a href="https://www.facebook.com/pages/Student-Management-Tool/1452237808341753"
											target="_blank">
											<li><img src="images/FB_Icon.png" style="height:72; width:72" />
										</a>
										<a href="https://twitter.com/ILiton" target="_blank">
											<li><img src="images/Twitter_Icon.png" style="height:75; width:75" />
										</a>
										<a href="https://plus.google.com/u/0/" target="_blank">
											<li><img src="images/Google_Icon2.png" style="height:70; width:70" />
										</a>
									</ul>
								</div>
							</div>
							<div id="margin_figure">
								<div id="new_blog_button"><a href="Blog_Insert.php"> আপনি একটি ব্লগ লিখুন</a></div>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<div>
									<?php
									$Blog_ID = $_GET["Blog_ID"];
									$strquery = "SELECT DISTINCT blog.blog, blog.SID, blog.Date, Blog_ID, SName, SReg, SPortrait, SMName FROM blog INNER JOIN s_info ON blog.SID=s_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMID where Blog_ID='" . $Blog_ID . "'";
									$results = mysql_query($strquery);
									$num = mysql_numrows($results);
									$Blog = mysql_result($results, $i, "Blog");
									$SID = mysql_result($results, $i, "SID");
									$Date = mysql_result($results, $i, "Date");
									//$Blog_ID=mysql_result($results,$i,"Blog_ID");
									$SName = mysql_result($results, $i, "SName");
									$SPortrait = mysql_result($results, $i, "SPortrait");
									$SMName = mysql_result($results, $i, "SMName");
									?>
									<div style="padding-bottom:100px; padding-right:50px; color:#FFFFFF">
										<img style="width:60px;padding:2px;border:2px solid white;margin:0px; font-size:18px"
											src="<?php echo $SPortrait; ?>" alt="Smiley face" width="50" height="60"
											align="right">
										<div style="padding:10px; font-weight:bold"><?php echo $SName; ?> </div>
										<div style="padding-left:10px"><?php echo $SMName; ?></div>
										<div style="width:500px;padding:10px;margin:0px; font-size:11px">
											<?php echo $Date; ?></div>
										<div>
											<p style="font-size:14px; font-weight:bold">Article:</p>
										</div>
										<div
											style="width:700px;padding:10px;border:1px solid white;margin:0px; font-size:16px">
											<?php echo $Blog; ?></div>
										<?php
										if (($userdata['admin'] == '1')) {
											?>
											<div align="right">
												<?php echo " <a href='Blog_Edit.php?Blog_ID=" . $Blog_ID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $Blog_ID . "'> Edit This Article </a> "; ?>
												|
												<?php echo " <a href='Blog_Delete.php?Blog_ID=" . $Blog_ID . "'> Delete This Article </a> "; ?>
											</div>
											<?php
										}
										?>
										<?php
										if (($userdata['SID'] == $SID)) {
											?>
											<div align="right">
												<?php echo " <a href='Blog_Edit.php?Blog_ID=" . $Blog_ID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $Blog_ID . "'> Edit This Article </a> "; ?>
												|
												<?php echo " <a href='Blog_Delete.php?Blog_ID=" . $Blog_ID . "'> Delete This Article </a> "; ?>
											</div>
											<?php
										}
										?>
										<?php
										$strquery = "SELECT SName,SPortrait,COMMENT FROM comments INNER JOIN s_info ON comments.SID=s_info.SID WHERE Blog_ID='" . $Blog_ID . "'";
										$results = mysql_query($strquery);
										$num = mysql_numrows($results);
										$i = 0;
										while ($i < $num) {
											$SName = mysql_result($results, $i, "SName");
											$SPortrait = mysql_result($results, $i, "SPortrait");
											$Comment = mysql_result($results, $i, "Comment");
											?>
											<div style="padding-bottom:100px; padding-right:50px; color:#FFFFFF">
												<img style="padding:2px;border:2px solid white;margin:0px; font-size:18px"
													src="<?php echo $SPortrait; ?>" alt="Smiley face" width="40" height="50">
												<div style="padding:2px; font-weight:bold"><?php echo $SName; ?> </div>
												<div style="padding:2px;border:1px solid white;margin:0px; font-size:12px; width:500px"
													;><?php echo $Comment; ?> </div>
												<br>
												<?php
												$i++;
										}
										?>
											<form action="Comment_Save.php" method="post">
												<div>
													<input value="<?php echo $userdata['SID']; ?>" name="SID"
														type="hidden" />
													<input value="<?php echo $Blog_ID; ?>" name="Blog_ID" type="hidden" />
													<div style="font-weight:bold;font-size:20px; color:#FFFFFF;">Comments:
													</div>
													<textarea name="Comment" rows="4" cols="50"
														placeholder="Leave your comment here..."></textarea>
													<br>
												</div>
												<br>
												<br>
												<div id="detail_blog" float="right">
													<input type="Submit" Value="Comment" />
												</div>
											</form>
										</div>
									</div>
								</div>
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