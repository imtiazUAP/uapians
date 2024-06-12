<?php
session_start();
include ("dbconnect.php"); ?>
<?php
$b = $_SESSION['email'];
$userrole = mysql_query("select * from userinfo where email='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
//echo $userdata['admin'];
//echo $userdata['SID'];
if (empty($_SESSION['email'])) {
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
		<div id="canvas">
			<div class="body_wrapper">
				<div id="logo" align="left">
					<h1><a href="Home.php">UAPians.Net </a></h1>
					<p>A Stack of Uap Students ...UNOFFICIAL...</p>
					<div class="body" style="min-height:1850">
						<?php
						//$connect=mysql_connect("localhost","root","");
//$select_db=mysql_select_db("mylab");
						$strquery = "SELECT SPortrait,email FROM s_info INNER JOIN userinfo ON s_info.SID=userinfo.SID WHERE email='{$b}'";
						$results = mysql_query($strquery);
						$num = mysql_numrows($results);
						$SPortrait = mysql_result($results, $i, "SPortrait");
						$email = mysql_result($results, $i, "email");
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
						<div id="content_wrapper">
							<div id="sidebar">
								<div class="sidebar_box">
									<br>
									<br>
									<div style="text-decoration:none;font-size:24px; color:#FFFFFF; font-weight:bold">
										<span>You are Logged in as <?php print $_SESSION['email'] ?></span></div>
									<br>
									<a href="Log_out.php"
										style="text-decoration:none;font-size:24px; font-weight:bold"><span>Log
											out</span></a>
									<br>
									<br>
									<div>
										<form>
											<input type="text" size="34" placeholder="Search for any page"
												onKeyUp="showResult(this.value)">
											<div id="livesearch"></div>
										</form>
									</div>
									<br>
									<br>
									<div id="section_head">
										<h3 align="left"
											style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif; padding:5px 5px; ">
											Academic Aspects</h3>
									</div>
									<ul class="sidebar_links">
										<li><a href="Employee_List.php">Teachers</a></li>
										<li><a href="Student_List.php">Students</a></li>
										<li><a href="Course_List.php">Courses</a></li>
										<li><a href="Mark_List.php">Results</a></li>
										<li><a href="Reference_List_All.php">References</a></li>
									</ul>
								</div>
								<br>
								<br>
								<div class="sidebar_box">
									<div id="section_head">
										<h3 align="left"
											style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Clubs &
											Social Works</h3>
									</div>.
									<ul class="sidebar_links">
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
								<div class="sidebar_box">
									<div id="section_head">
										<h3 align="left"
											style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Admin Panel
										</h3>
									</div>
									<ul>
										<a href="Admin_Imtiaz.php">
											<li><img src="images/11201028.jpg" style="height:100" /> Imtiaz Ahmad</li>
										</a>
										<p class="bottom">Imtiaz Ahmad, University of Asia Pacific
											Phone:+880170613683
											E_Mail:emtiaj@yahoo.com
											Website:www.emtiaj.blogspot.com </p>
										<li><a href="Send_message_to_admin.php">Send him a Message</a></li>
										<br>
										<a href="Admin_tanvir.php">
											<li><img src="images/11201037.jpg" style="height:100" /> Irfan Tanvir</li>
										</a>
										<p class="bottom">Irfan Tanvir, University of Asia Pacific
											Phone:+8801736516583
											E_Mail:uap.tanvir@gmail.com
											Website:www.facebook.com/myclubbd </p>
										<li><a href="Send_message_to_admin.php">Send him a Message</a></li>
									</ul>
								</div>
								<br>
								<br>
								<div class="sidebar_box">
									<div id="section_head">
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
								<div id="section_head">
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
							<div style="font-size:24px; font-weight:bold; padding:200">Done!!! ThankYou......
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