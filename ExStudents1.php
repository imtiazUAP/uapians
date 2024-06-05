<?php
session_start();
include ('dbconnect.php'); ?>
<?php
$b = $_SESSION['username'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
if (empty($_SESSION['username'])) {
	?>
	<script language="JavaScript">
		window.location = "index.php";
	<?php } else { ?>
			< html >
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
					function showResult(str)
					{
	if (str.length==0)
					{
						document.getElementById("livesearch").innerHTML = "";
					document.getElementById("livesearch").style.border="0px";
					return;
	  }
					if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
	  }
					else
					{// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  }
					xmlhttp.onreadystatechange=function()
					{
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
					document.getElementById("livesearch").style.border="1px solid #A5ACB2";
		}
	  }
					xmlhttp.open("GET","livesearch.php?q="+str,true);
					xmlhttp.send();
	}
	</script>
	</head>

	<body>
		<div id="grad1">
			<div class="bodydiv">
				<div id="logo" align="left">
					<h1><a href="Home.php">Uapians.Net </a></h1>
					<p>A Stack of Uap Students ...UNOFFICIAL...</p>
					<div class="realbody" style="min-height:2000px">
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
										<li><a href="1st_Year_1st_Semester.php">1st Year 1st Semester</a></li>
										<li><a href="1st_Year_2nd_Semester.php">1st Year 2nd Semester</a></li>
										<li><a href="2nd_Year_1st_Semester.php">2nd Year 1st Semester</a></li>
										<li><a href="2nd_Year_2nd_Semester.php">2nd Year 2nd Semester</a></li>
										<li><a href="3rd_Year_1st_Semester.php">3rd Year 1st Semester</a></li>
										<li><a href="3rd_Year_2nd_Semester.php">3rd Year 2nd Semester</a></li>
										<li><a href="4th_Year_1st_Semester.php">4th Year 1st Semester</a></li>
										<li><a href="4th_Year_2nd_Semester.php">4th Year 2nd Semester</a></li>
										<li><a href="28th_batch.php">28th Batch</a></li>
										<li><a href="27th_batch.php">27th Batch</a></li>
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
							<div>
								<div style="padding-top:40">
									<form>
										<div align="center">
											<?php
											if (($userdata['admin'] == '1')) {
												?>
												<a href="Student_Insert.php?keepThis=true&TB_iframe=true&height=350&width=280&modal=true"
													title="New Student" class="thickbox">Create New Student</a>
												<?php
											}
											?>
										</div>
										<table class="hoverTable" border="1" align="center" width="800">
											<tr align="center">
												<td bgcolor="588C73" width="120"> Registration Number </td>
												<td bgcolor="588C73" width="200">Name of Student</td>
												<td bgcolor="588C73" width="100px"> Portrait </td>
												<td bgcolor="588C73"> Semester </td>
												<?php
												if (($userdata['admin'] == '1')) {
													?>
													<td bgcolor="#006699"> Results </td>
													<td bgcolor="#006699" width="100"> Admin|Panel </td>
													<?php
												}
												?>
											</tr>
											<?php
											//$connect=mysql_connect("localhost","root","");
											//$select_db=mysql_select_db("example_db");
											$strquery = "SELECT SID,SName,SReg,SPortrait,SMName FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE s_info.SMID='9' order by SReg";
											$results = mysql_query($strquery);
											$num = mysql_numrows($results);
											$i = 0;
											while ($i < $num) {
												$SID = mysql_result($results, $i, "SID");
												$f2 = mysql_result($results, $i, "SName");
												$f3 = mysql_result($results, $i, "SReg");
												$f12 = mysql_result($results, $i, "SPortrait");
												$semester = mysql_result($results, $i, "SMName");
												?>
												<tr align="center" class="tablerow">
													<td width="120"><?php echo $f3; ?></td>
													<td><?php echo " <a href='Profile_List.php? SID=" . $SID . "'>$f2</a>" ?></td>
													<td width="100"><a href='Profile_List.php? SID=<?= $SID ?>'><img src=<?= $f12 ?> echo style="height:100px;"></a></td>
													<td width="120"><?php echo $semester; ?></td>
													<?php
													if (($userdata['admin'] == '1')) {
														?>
														<td><?php echo " <a href='Single_Mark_List.php? SID=" . $SID . "'> Results </a>" ?>
														</td>
														<td width="100">
															<?php echo " <a href='Student_Edit.php?SID=" . $SID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true'     	class='thickbox' title='Edit Student - " . $f2 . "'> edit </a> "; ?>
															|
															<?php echo " <a href='Student_Delete.php?SID=" . $SID . "'> delete </a> "; ?>
														</td>
														<?php
													}
													?>
												</tr>
												<?php
												$i++;
											}
											?>
										</table>
									</form>
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