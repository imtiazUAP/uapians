<?php
session_start();
include ('dbconnect.php');
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
		<title>Mail | Uapians.Net</title>
		<link rel="shortcut icon" href="images/tiittleimage.ico" />
		<meta name="title" content="Uapians.Net" />
		<meta name="description" content="An Exclusive Website only for Uapians..." />
		<link rel="image_src" href="http://www.uapians.net/images/tittleimage.png" />
		<script type="text/javascript" src="assets/js/jquery.js"></script>
		<script type="text/javascript" src="assets/js/thickbox.js"></script>
		<link rel="stylesheet" href="assets/css/thickbox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen">
	</head>

	<body>
		<div id="canvas">
			<div class="body_wrapper">
				<div id="logo" align="left">
					<h1><a href="Home.php">UAPians.Net </a></h1>
					<p>A Stack of Uap Students ...UNOFFICIAL...</p>
				</div>
				<div class="body" style="min-height:2000px">
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
											src="<?php echo $SPortrait; ?>" alt="Profile Picture"><span> Profile</span></a>
							</li>
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
								<div style="text-decoration:none;font-size:24px; color:#FFFFFF; font-weight:bold"><span>You
										are Logged in as <?php print $_SESSION['username'] ?></span></div>
								<br>
								<?php
								if (($userdata['admin'] == '3')) {
									?>
									<br>
									<a href='php_sendmail_upload1.php'>Send Email</a>
									<br>
									<?php
								}
								?>
								<a href="Log_Out.php"
									style="text-decoration:none;font-size:24px; font-weight:bold"><span>Log out</span></a>
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
								<div id="section_head">
									<h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif;">
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
									<h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">
										Clubs & Social Works</h3>
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
									<h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">
										Admin Panel</h3>
								</div>
								<ul>
									<a href="Admin_Sayem.php">
										<li><img src="images/1962727_694969320562722_1717298201_n.jpg" style="height:100" />
											Sayem Hossain</li>
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
										<li><img src="images/image-Copy.jpg" style="height:100" /> Taqi Tahmid Tanzil</li>
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
							<div class="sidebar_box">
								<div id="section_head">
									<h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">
										Contact Us</h3>
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
								<h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Find
									Us on</h3>
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
						<?
						if ($_POST[send_mail_option_id] == '1') {
							$query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='1' ");
						}
						if ($_POST[send_mail_option_id] == '2') {
							$query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='2' ");
						}
						if ($_POST[send_mail_option_id] == '3') {
							$query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='3' ");
						}
						if ($_POST[send_mail_option_id] == '4') {
							$query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='4' ");
						}
						if ($_POST[send_mail_option_id] == '5') {
							$query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='5' ");
						}
						if ($_POST[send_mail_option_id] == '6') {
							$query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='6' ");
						}
						if ($_POST[send_mail_option_id] == '7') {
							$query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='7' ");
						}
						if ($_POST[send_mail_option_id] == '8') {
							$query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='8' ");
						}
						if ($_POST[send_mail_option_id] == '9') {
							$query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='1' OR SMID='2' OR SMID='3' OR SMID='4' OR SMID='5' OR SMID='6' OR SMID='7' OR SMID='8' ");
						}
						if ($_POST[send_mail_option_id] == '10') {
							$query = mysql_query("SELECT SE_Mail FROM s_info ");
						}
						if ($_POST[send_mail_option_id] == '11') {
							$query = mysql_query("SELECT SE_Mail FROM e_info ");
						}
						if ($_POST[send_mail_option_id] == '12') {
							$query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='12' ");
						}
						while ($row = mysql_fetch_assoc($query)) {
							$strTo = $row['SE_Mail'];
							$strSubject = $_POST["txtSubject"];
							$strMessage = nl2br($_POST["txtDescription"]);
							//*** Uniqid Session ***//
							$strSid = md5(uniqid(time()));
							$strHeader = "";
							$strHeader .= "From: " . $_POST["txtFormName"] . "<" . $_POST["txtFormEmail"] . ">\nReply-To: " . $_POST["txtFormEmail"] . "" . "X-Mailer: PHP/" . phpversion();
							//******* 'From: faruk@uapians.net' . "\r\n" .'Reply-To: '.$POST["txtFormEmail"]. "\r\n" .'X-Mailer: PHP/' . phpversion(); ***********//
							//*******  From: Mr.Weerachai Nukitram<webmaster@shotdev.com>\nReply-To: shotdev@hotmail.com"; ***********//
							$strHeader .= "MIME-Version: 1.0\n";
							$strHeader .= "Content-Type: multipart/mixed; boundary=\"" . $strSid . "\"\n\n";
							$strHeader .= "This is a multi-part message in MIME format.\n";
							$strHeader .= "--" . $strSid . "\n";
							$strHeader .= "Content-type: text/html; charset=utf-8\n";
							$strHeader .= "Content-Transfer-Encoding: 7bit\n\n";
							$strHeader .= $strMessage . "\n\n";
							//*** Attachment ***//
							if ($_FILES["fileAttach"]["name"] != "") {
								$strFilesName = $_FILES["fileAttach"]["name"];
								$strContent = chunk_split(base64_encode(file_get_contents($_FILES["fileAttach"]["tmp_name"])));
								$strHeader .= "--" . $strSid . "\n";
								$strHeader .= "Content-Type: application/octet-stream; name=\"" . $strFilesName . "\"\n";
								$strHeader .= "Content-Transfer-Encoding: base64\n";
								$strHeader .= "Content-Disposition: attachment; filename=\"" . $strFilesName . "\"\n\n";
								$strHeader .= $strContent . "\n\n";
							}
							$flgSend = @mail($strTo, $strSubject, null, $strHeader);  // @ = No Show Error //
						}
						if ($flgSend) {
							echo "Mail send completed. Thakyou!!!";
						} else {
							echo "Sorry!!! Cannot send mail.";
						}
						?>
					</div>
				</div>
			</div>
			<div class="footer">
				<div class="FooterText">
					<a href="http://www.emtiaj.blogspot.com" target="_blank">copyright @ www.emtiaj.blogspot.com</a> |||||
					<a href="http://uap-bd.edu/cse/index.html" target="_blank">copyright @ CSE Department, UAP</a> <br>
				</div>
			</div>
	</body>

	</html>
	<?php
} ?>