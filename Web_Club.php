<?php
session_start(); ?>
<?php
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
					<div class="body">
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
									<ul class="sidebar_links">
										<li><a href="Employee_List.php">Teachers</a></li>
										<li><a href="Student_List.php">Students</a></li>
										<li><a href="Course_List.php">Courses</a></li>
										<li><a href="Mark_List.php">Results</a></li>
										<li><a href="Reference_List_All.php">References</a></li>
									</ul>
								</div>
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
								<div class="sidebar_box">
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
								<div class="sidebar_box">
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
							<div id="content">
								<div>
									<div id="section_head">
										<h1 align="left"
											style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Welcome!
										</h1>
									</div>
									<p align="left" style="font-size:16; font-weight:bold"> Student Management Tool is just
										not a Website its a Webased software. It can Collect, Calculate & Store the results
										of an University....</p>
									<p align="left">A common English usage misconception is that a paragraph has three to
										five sentences; single-word paragraphs can be seen in some professional writing, and
										journalists often use single-sentence paragraphs.[7]
										The crafting of clear, coherent paragraphs is the subject of considerable stylistic
										debate. Forms generally vary among types of writing. For example, newspapers,
										scientific journals, and fictional essays have somewhat different conventions for
										the placement of paragraph breaks.
										English students are sometimes taught that a paragraph should have a topic sentence
										or "main idea", preferably first, and multiple "supporting" or "detail" sentences
										which explain or supply evidence. One technique of this type, intended for essay
										writing, is known as the Schaffer paragraph. For example, the following excerpt from
										Dr. Samuel Johnson's Lives of the English Poets, the first sentence is the main
										idea: that Joseph Addison is a skilled "describer of life and manners". The
										succeeding sentences are details that support and explain the main idea in a
										specific way.
									</p>
								</div>
								<div>
									<div id="section_head">
										<h1 align="left"
											style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ; text-decoration:blink">
											News Feed............</h1>
									</div>
									<marquee behavior="scroll" direction="up" onMouseOver="this.stop();"
										onMouseOut="this.start();" align="middle" ;
										style="color:#0099FF; font-size:18px; height:300">
										<a href='http://devfest.ydesh.com/'
											style="text-decoration:none; color:#FFFFFF"><span>DevFest The Coolest Developer
												Conference 30-31 August 2013</span></a><br> <br>
										<a href='Link: http://www.eventbrite.com/event/10239078359'
											style="text-decoration:none; color:#FFFF00;font-size:22px;"><span>It's Raining
												Opportunities ! Google Developer Group Bangladesh</span></a><br> <br>
										<a href='http://www.ictd.gov.bd/bangla/'
											style="text-decoration:none; color:#99FF99">Newsletter from National Mobile
											Application Development</span></a><br> <br>
										<a href='http://uap-bd.edu/notice/suspended-25-02-2014.html'
											style="text-decoration:none; color:#FF33CC;font-size:30px;"><span>All classes of
												UAP will be suspended on 25 February</span></a><br> <br>
										<a href='http://www.uap-bd.edu/'
											style="text-decoration:none; color:#FFFF33"><span>Convocation of University of
												Asia Pacific will be live streamed </span></a><br> <br>
										<a href='http://www.scholars4dev.com/8054/univeristy-west-england-scholarships-for-international-students/'
											style="text-decoration:none; color:#FFFFFF"><span>A Big Scholarship Opportunity
												for All Bangladeshi Students</span></a><br> <br>
										<a href='http://devfest.ydesh.com/' style="text-decoration:none; color:#FFFF00""><span>DevFest The Coolest Developer Conference 30-31 August 2013</span></a><br> <br>
<a href='http://devfest.ydesh.com/' style=" text-decoration:none; color:#FF33CC;font-size:25px;"><span>DevFest The
												Coolest Developer Conference 30-31 August 2013</span></a><br> <br>
										<a href='Link: http://www.eventbrite.com/event/10239078359'
											style="text-decoration:none"><span>It's Raining Opportunities ! Google Developer
												Group Bangladesh</span></a><br> <br>
										<a href='http://www.ictd.gov.bd/bangla/' target="iframe"
											style="text-decoration:none; color:#99FF99;font-size:20px;"><span>Newsletter
												from National Mobile Application Development</span></a><br> <br>
										<a href='http://uap-bd.edu/notice/suspended-25-02-2014.html' target="iframe"
											style="text-decoration:none; color:#FFFF00"><span>All classes of UAP will be
												suspended on 25 February</span></a><br> <br>
										<a href='http://www.uap-bd.edu/' target="iframe"
											style="text-decoration:none; color:#99FF99"><span>Convocation of University of
												Asia Pacific will be live streamed </span></a><br> <br>
										<a href='http://www.scholars4dev.com/8054/univeristy-west-england-scholarships-for-international-students/'
											style="text-decoration:none; color:#FF33CC"><span>A Big Scholarship Opportunity
												for All Bangladeshi Students</span></a><br> <br>
										<a href='http://devfest.ydesh.com/'
											style="text-decoration:none; color:#99FF99"><span>DevFest The Coolest Developer
												Conference 30-31 August 2013</span></a><br> <br>
										<a href='Link: http://www.eventbrite.com/event/10239078359'
											style="text-decoration:none; color:#FFFF00;font-size:25px"><span>It's Raining
												Opportunities ! Google Developer Group Bangladesh</span></a><br> <br>
										<a href='http://www.ictd.gov.bd/bangla/' target="iframe"
											style="text-decoration:none"><span>Newsletter from National Mobile Application
												Development</span></a><br> <br>
										<a href='http://uap-bd.edu/notice/suspended-25-02-2014.html' target="iframe"
											style="text-decoration:none; color:#99FF99;font-size:25px"><span>All classes of
												UAP will be suspended on 25 February</span></a><br> <br>
										<a href='http://www.uap-bd.edu/' target="iframe"
											style="text-decoration:none; color:#FF33CC" ;font-size:25px;><span>Convocation
												of University of Asia Pacific will be live streamed </span></a><br> <br>
										<a href='http://www.scholars4dev.com/8054/univeristy-west-england-scholarships-for-international-students/'
											style="text-decoration:none; color:#FFFF00;font-size:25px"><span>A Big
												Scholarship Opportunity for All Bangladeshi Students</span></a><br> <br>
										<a href='https://docs.google.com/file/d/0Bz_14UliIWzsT2U0a3BiMWM5VEE/edit'
											style="text-decoration:none; color:#FFFF00;font-size:25px"><span>Training on::
												Excellence in Executive Communication</span></a><br> <br>
									</marquee>
								</div>
								<div id="section_head">
									<h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">
										Notice!</h1>
								</div>
								<div id="notice_board">
									<p
										style="padding-left:60px; padding-right:55px; color:#66CC33;font-size:16px; font-weight:bold; ">
										<br><br><br><br><br>All Classes of University of Asia Pacific will Reswume on
										Thursday!!!......... All the Students are requested to attend the Class.<br>
										<br>Thank You<br>
									</p>
								</div>
								<div>
									<div id="section_head">
										<h1 align="left" style="color:#FFFFFF">Mission...</h1>
									</div>
									<p align="left" style="font-size:16; font-weight:bold"> Student Management Tool is just
										not a Website its a Webased software. I can Collect, Calculate & Store the results
										of an University....
									</p>
									<p align="left">
										A common English usage misconception is that a paragraph has three to five
										sentences; single-word paragraphs can be seen in some professional writing, and
										journalists often use single-sentence paragraphs.[7]
										The crafting of clear, coherent paragraphs is the subject of considerable stylistic
										debate. Forms generally vary among types of writing. For example, newspapers,
										scientific journals, and fictional essays have somewhat different conventions for
										the placement of paragraph breaks.
										English students are sometimes taught that a paragraph should have a topic sentence
										or "main idea", preferably first, and multiple "supporting" or "detail" sentences
										which explain or supply evidence. One technique of this type, intended for essay
										writing, is known as the Schaffer paragraph. For example, the following excerpt from
										Dr. Samuel Johnson's Lives of the English Poets, the first sentence is the main
										idea: that Joseph Addison is a skilled "describer of life and manners". The
										succeeding sentences are details that support and explain the main idea in a
										specific way.
										As a describer of life and manners, he must be allowed to stand perhaps the first of
										the first rank. His humour, which, as Steele observes, is peculiar to himself, is so
										happily diffused as to give the grace of novelty to domestic scenes and daily
										occurrences. He never "o'ersteps the modesty of nature," nor raises merriment or
										wonder by the violation of truth. His figures neither divert by distortion nor amaze
										by aggravation. He copies life with so much fidelity that he can be hardly said to
										invent; yet his exhibitions have an air so much original, that it is difficult to
										suppose them not merely the product of imagination.
									</p>
								</div>
								<div>
									<div id="section_head">
										<h1 align="left" style="color:#FFFFFF">About!</h1>
									</div>
									<p align="left" style="font-size:16; font-weight:bold">
										Student Management Tool is just not a Website its a Webased software. I can Collect,
										Calculate & Store the results of an University....</p>
									<p align="left">A common English usage misconception is that a paragraph has three to
										five sentences; single-word paragraphs can be seen in some professional writing, and
										journalists often use single-sentence paragraphs.[7]
										The crafting of clear, coherent paragraphs is the subject of considerable stylistic
										debate. Forms generally vary among types of writing. For example, newspapers,
										scientific journals, and fictional essays have somewhat different conventions for
										the placement of paragraph breaks.
										English students are sometimes taught that a paragraph should have a topic sentence
										or "main idea", preferably first, and multiple "supporting" or "detail" sentences
										which explain or supply evidence. One technique of this type, intended for essay
										writing, is known as the Schaffer paragraph. For example, the following excerpt from
										Dr. Samuel Johnson's Lives of the English Poets, the first sentence is the main
										idea: that Joseph Addison is a skilled "describer of life and manners". The
										succeeding sentences are details that support and explain the main idea in a
										specific way.
										As a describer of life and manners, he must be allowed to stand perhaps the first of
										the first rank. His humour, which, as Steele observes, is peculiar to himself, is so
										happily diffused as to give the grace of novelty to domestic scenes and daily
										occurrences. He never "o'ersteps the modesty of nature," nor raises merriment or
										wonder by the violation of truth. His figures neither divert by distortion nor amaze
										by aggravation. He copies life with so much fidelity that he can be hardly said to
										invent; yet his exhibitions have an air so much original, that it is difficult to
										suppose them not merely the product of imagination.</p>
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