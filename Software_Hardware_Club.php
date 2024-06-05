<?php
session_start(); ?>
<?php
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
					<div align="right">
						<font color="#000000">You have visted this page
							<SCRIPT LANGUAGE="JavaScript">
								var cookiec = document.cookie
								if (cookiec != "") {
									var eqchr = 0;
									for (var cloop = 1; cloop <= cookiec.length; cloop++) {
										if (cookiec.charAt(cloop) == "=") {
											eqchr = (++cloop);
										}
									}
									var cookiess = 0;
									clength = cookiec.length;
									cookies = "";
									for (cloop = eqchr; cloop < clength; cloop++) {
										if (cookiec == ";") {
											cloop = clength;
										}
										else {
											cookies = cookies + cookiec.charAt(cloop);
										}
									}
									cookiess = parseInt(cookies);
									document.write("[" + cookiess + "]");
									cookiess++;
									cookies = cookiess;
									var one_week = 7 * 24 * 60 * 60 * 1000;
									var expDate = new Date();
									expDate.setTime(expDate.getTime() + one_week);
									document.cookie = "Counter=" + escape(cookies) + "; expires=" + expDate.toGMTString();
								}
								else {
									var one_week = 7 * 24 * 60 * 60 * 1000;
									var expDate = new Date();
									expDate.setTime(expDate.getTime() + one_week);
									document.cookie = "Counter=2; expires=" + expDate.toGMTString();
									document.write("[1]");
								}
								// -->
							</SCRIPT>
							times.
					</div>
					<div class="realbody">
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
									<div id="paragraph_head">
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
							</div>
							<div id="margin_figure">
								<div>
									<div id="paragraph_head">
										<h1 align="left"
											style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Software
											and Hardware Club</h1>
									</div>
									<p align="left" style="font-size:16; font-weight:bold">Aim:....</p>
									<p align="left">The aim of the Club is to develop and improve student skills through the
										developments of various Software and Hardware projects regularly.
										<br>
										The Club will collect and preserve all the academic projects (current and previous
										ones) developed by the students of the department that include Term Projects, Lab
										Projects, Research Projects etc. and will work on the ones selected by the Executive
										Body on their modifications and further developments as necessary to make them
										market/international standards. The Club will also work on the development of new
										projects with the help of the member students.<br>
										<br>
										The Club will arrange at least one Software Fair per year with the developed
										projects. Through this, it aims to
										<br>
										Give the students of the department the exposure to the outside world and the job
										market presenting their developed projects before the various Firms and
										Organizations.
										<br>
										Enhance the University image in education sector.
										<br>
										Introduce students before the latest and more recent technologies in the market.
									</p>
								</div>
								<br>
								<br>
								<div>
									<div id="paragraph_head">
										<h1 align="left"
											style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ; text-decoration:blink">
											UAP Software & Hardware Club initiated several programs to achieve its goal.
											Till now the club organized the following events</h1>
									</div>
									<p>Three-day workshop on C and C++ before mid term examination of Fall – 2002 in order
										to help junior students to strengthen their knowledge in programming language.
										<br>
										Software & Hardware Fair on CSE – DAY 2003.
										<br>
										Oracle Certified Programmer (OCP) training course to make students more competitive
										in job market.
									</p>
								</div>
								<br>
								<br>
								<div>
									<div id="paragraph_head">
										<h1 align="left" style="color:#FFFFFF">Activities</h1>
									</div>
									<p align="left" style="font-size:16; font-weight:bold"> Software & Hardware Fair on CSE
										– DAY 2003:
									</p>
									<p align="left">
										UAP Software & Hardware Club organized a successful Software & Hardware Fair on 29th
										June’03 to mark CSE – DAY 2003. There were thirty-three outstanding projects
										developed by students and supervised under the guidance of UAP Software & Hardware
										Club. Our honorable Foundation Member Fazle Hussein Bhuiyan, Registrar Dr. Abu
										Sayeed Mustaque Ahmed and Head CSE M. Fayyaz Khan inaugurated the fair. The club
										invited three judges. They are Md. Yunus Ali, Md. Monowar Hafiz and Md. Sohel
										Rahman, from Bangladesh University of Engineering & Technology (BUET). They selected
										three best projects as first, second and third, and the club awarded those students
										with prizes. The club invited all UAP teachers, officers, media peoples and experts
										from software industries. After the fair a press release was issued which was
										published in leading dailies and IT magazines.
									</p>
								</div>
								<br>
								<br>
								<div>
									<div id="paragraph_head">
										<h1 align="left" style="color:#FFFFFF">Forthcoming Activities:</h1>
									</div>
									<p align="left" style="font-size:16; font-weight:bold">
										Upcoming Activities of Software & Hardware Club....</p>
									<p align="left">In future the Club will provide internship facilities to students. The
										students will have the opportunity to gain valuable work experience in local and
										international projects under the supervision of leading software companies of our
										country. The Club also aims to arrange a nation wide ‘Inter University Software &
										Hardware Fair’ once in a year.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="footer">
						<div class="FooterText">
							<a href="http://www.emtiaj.blogspot.com" target="_blank">copyright @ www.emtiaj.blogspot.com</a>
							|||||
							<a href="http://uap-bd.edu/cse/index.html" target="_blank">copyright @ CSE Department, UAP</a>
							<br>
						</div>
					</div>
	</body>

	</html>
	<?php
} ?>