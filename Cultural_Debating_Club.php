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
	<link rel="stylesheet" type="text/css" href="assets/Cultural_Club/engine1/style.css" />
	<script type="text/javascript" src="assets/Cultural_Club/engine1/jquery.js"></script>
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
	<div id="background_canvas">
		<div class="body_wrapper">
			<div id="logo" align="left">
				<h1><a href="Home.php">Student Management Tool </a></h1>
				<p>A Software for Managing CSE Department ...UNOFFICIAL...</p>
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
				<div class="content_wrapper" style="height:1700px">
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
							<br>
							<br>
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
							<br>
							<br>
							<div class="box">
								<div id="section_head">
									<h3 align="left"
										style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Admin Panel
									</h3>
								</div>
								<ul>
									<a href="Admin_Imtiaz.php">
										<li><img src="images/11201028.jpg" style="height:100" /> Imtiaz Ahmad
									</a></li>
									<p class="bottom">Imtiaz Ahmad, University of Asia Pacific
										Phone:+880170613683
										E_Mail:emtiaj@yahoo.com
										Website:www.emtiaj.blogspot.com </p>
									<br>
									<a href="Admin_tanvir.php">
										<li><img src="images/11201037.jpg" style="height:100" /> Irfan Tanvir
									</a></li>
								</ul>
								<p class="bottom">Irfan Tanvir, University of Asia Pacific
									Phone:+8801736516583
									E_Mail:uap.tanvir@gmail.com
									Website:www.facebook.com/myclubbd </p>
							</div>
							<br>
							<div class="box">
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
						</div>
						<div id="margin_figure">
							<div>
								<div>
									<div id="section_head">
										<h1 align="left"
											style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">CSE
											Cultural & Debating Club</h1>
									</div>
									<td width="100"><img src=images/shaila_mam1.jpg style="height:250px; padding:10px"
											align="right"></td>
									<p align="left" style="font-size:16; font-weight:bold"> CSE Cultural Club is a
										Cultural Club Operated by Mrs. Shaila Rahman....</p>
									<p align="left">University is the highest seat of learning. A university student is
										to learn socio-interaction, etiquette, exercise tolerance towards the opinions
										of the others and as a whole promote the intellectual ability beyond the domain
										of his/her main study.
										Apart from the rigorous CSE subjects, extracurricular activities like Cultural
										programs and Debate will broaden students’ minds and enhance their worth
										appreciating qualities that will ultimately express the excellence of the CSE
										Department in particular and the UAP in general.
										With a pragmatic view to encouraging extracurricular activities, creating and
										sustaining a congenial environment for such activities, the CSE Department of
										the UAP has formed the CSE Cultural & Debating Club.
									</p>
								</div>
							</div>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<div id="wowslider-container1" style="height:267">
								<div class="ws_images">
									<ul>
										<li><img src="assets/Cultural_Club/data1/images/1176353_10201824031220250_299244289_n.jpg"
												alt="FareWell Organised by CSe Cultural CLub"
												title="FareWell Organised by CSe Cultural CLub" id="wows1_0" /></li>
										<li><img src="assets/Cultural_Club/data1/images/12177_4319308698703_1275228451_n.jpg"
												alt="" Pitha Utshob" Organised by CSE Cultural Club" title="" Pitha
												Utshob" Organised by CSE Cultural Club" id="wows1_1" /></li>
										<li><img src="assets/Cultural_Club/data1/images/971296_594950683868503_1156440747_n.jpg"
												alt="" title="" id="wows1_2" /></li>
									</ul>
								</div>
								<div class="ws_bullets">
									<div>
										<a href="#" title="FareWell Organised by CSe Cultural CLub"><img
												src="assets/Cultural_Club/data1/tooltips/1176353_10201824031220250_299244289_n.jpg"
												alt="FareWell Organised by CSe Cultural CLub" />1</a>
										<a href="#" title="" Pitha Utshob" Organised by CSE Cultural Club"><img
												src="assets/Cultural_Club/data1/tooltips/12177_4319308698703_1275228451_n.jpg"
												alt="" Pitha Utshob" Organised by CSE Cultural Club" />2</a>
										<a href="#" title=""><img
												src="assets/Cultural_Club/data1/tooltips/971296_594950683868503_1156440747_n.jpg"
												alt="" />3</a>
									</div>
								</div>
								<span class="wsl"><a href="http://wowslider.com">HTML Picture Slideshow</a> by
									WOWSlider.com v4.9</span>
								<div class="ws_shadow"></div>
							</div>
							<script type="text/javascript" src="assets/Cultural_Club/engine1/wowslider.js"></script>
							<script type="text/javascript" src="assets/Cultural_Club/engine1/script.js"></script>
							<br>
							<br>
							<br>
							<div>
								<div id="section_head">
									<h1 align="left" style="color:#FFFFFF">Events Organised by CSE Cultural Club
										(Activities):</h1>
								</div>
								<p align="left" style="font-size:16; font-weight:bold">In Every year many Events are
									Organised by CSE Cultural Club. those are...
								</p>
								<p align="left">Whenever a national event is to be observed on behalf of the UAPCC, the
									CSE Cultural and Debating club will represent the Department.
									<br>
									Arrangement of the Orientation program on behalf of the department in every
									semester.
									<br>
									This club will reserve the right to select cultural/debate participants from the CSE
									department for competitions to be held outside the university.
									<br>
									Arranging Inter/ Intra department debating competitions on regular basis in the
									department.
									<br>
									Arranging Workshop or Training program on cultural/ debating activities to flourish
									the student members.
									<br>
									Arranging various cultural festivals on the basis of demand.
								</p>
							</div>
							<br>
							<br>
							<br>
							<div>
								<div id="section_head">
									<h1 align="left" style="color:#FFFFFF">About!</h1>
								</div>
								<p align="left" style="font-size:16; font-weight:bold">
									The prime objectives of the CSE Cultural & Debating Club are to:</p>
								<p align="left">The prime objectives of the CSE Cultural & Debating Club are to:
									Uphold the name and fame of the UAP by promoting the excellence of the students in
									cultural programs and debate.
									Promote the cultural spirit and social etiquette among the students
									Develop the skills of the students in stage performance, speaking for or against a
									motion by articulating their respective views.
									Develop the skills of the students in teamwork, critical thinking, quick
									decision-making and prompt logical response to arguments.
									Enhance their ability to defend and prove their ideas through reasoning, improvising
									and presence of mind.
									Exercise the tolerance towards the arguments of the others
									Pave the way for being interested all the more in their study by surmounting the
									monotony of the rigorous CSE subjects</p>
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