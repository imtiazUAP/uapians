<?php
session_start();
error_reporting(1);
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
		<?php
		include ("header.php");
		?>
	</head>

	<body>
		<div id="grad1">
			<div class="bodydiv">
				<?php include ("logo.php"); ?>
				<div id="logo">
					<div class="realbody" style="height:2000px">
						<?php include ("menu.php"); ?>
						<div id="content">
							<div id="colOne">
								<?php
								include ("sidebar.php");
								?>
							</div>
							<div id="margin_figure">
								<div>
									<div>
										<div id="paragraph_head">
											<h1 align="left"
												style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">About
												Us</h1>
										</div>
										<td width="100"><img src=images/11201028.jpg style="height:250px; padding:10px"
												align="right"></td>
										<td width="100"><img src=images/11201037.jpg style="height:250px; padding:10px"
												align="right"></td>
										<p align="left" style="font-size:16; font-weight:bold">Uapians.Net এর ফাউন্ডারদের
											সম্পর্কে কিছু কথা...</p>
										<p align="left">Uapians.Net নামের এই পোর্টালটির ফাউন্ডার ইরফান তানভীর এবং ইমতিয়াজ
											আহমাদ। তাদের UAP ID যথাক্রমে 11201037 এবং 11201028 প্রথমে শুধুমাত্র একটি
											সেমিস্টার কোর্সের জন্যেই ইউনিভার্সিটি থেকে তাদেরকে বলা হয় একটা প্রোজেক্ট করার
											জন্যে। তারা প্রথমে Student Management Tools শিরোনামে একটি সফটঅয়ারের কাজ শুরু করে
											কিন্তু অল্প কিছুদিন কাজ করার পরেই তারা অনুধাবন করে যে একটু পরিশ্রম করলেই তারা
											তাদের এই প্রোজেক্টের মাধ্যমেই নতুন কিছু করতে পারে যা কিনা তাদের জন্যে এবং
											পরবর্তী স্টুডেন্টদের জন্যে উপকারী এবং দৃষ্টান্ত হয়ে থাকবে। এবং দেরী না করে তারা
											সমন্নয় করে কাজ শুরু করে এবং দেখতে-দেখতে কয়েক মাসের মধ্যেই এই ওয়েব সাইটটি দাড়িয়ে
											যায় যার ফলাফল আজকে সবার সামনেই। এই ওয়েবসাইটি করার অন্যতম একটি উদ্দেশ্য ছিলো সব
											ধরনের রেফারেন্স সংক্রান্ত হেল্প প্রত্যেক জুনিয়র স্টুডেন্ট পর্যন্ত পৌছে দেওয়া এবং
											আজকে তাদের সেই উদ্দ্যেশের প্রতিফলন হয়েছে। CSE ডিপার্টমেন্টের প্রায় সব স্টুডেন্ট
											এই ওয়েব সাইটটির মাধ্যমে তাদের সিনিয়রদের কাছ থেক সব ধরনের বিগত বছরের প্রশ্নপত্র
											থেকে শুরু করে হ্যান্ডনোট পর্যন্ত পেয়ে থাকে। তাই এই কাজের জন্যে তারা সকল
											স্টুদেন্টদের কাছ থেকে ধন্যবাদের দাবীদার। বর্তমানে তাদের উভয়ই পড়ছে ৪র্থ বর্ষের
											প্রথম সেমিস্টারে।। তারা সকলের কাছে দোয়া প্রার্থী।।
										</p>
									</div>
								</div>
								<br>
								<br>
								<br>
								<div>
									<div id="paragraph_head">
										<h1 align="left" style="color:#FFFFFF">Features:</h1>
									</div>
									<p align="left" style="font-size:16; font-weight:bold">The Features, Providing by this
										Website are....
									</p>
									<p align="left">
										• Students can Connect with one another by using this software
										<br>
										• a News Feed is added by which all the student can be alert about present condition
										of Job field, Educational Opportunity of differents Institute & Job market demand
										<br>
										• A virtual Blood Bank is added by which any student can find his/her desired blood
										groups Blood in case of emergency
										<br>
										• A graphical notice board by which student can know about current notice of his/her
										institute
										<br>
										• Here Every Students have a Complete Profile. all the information about that
										student is inserted.
										<br>
										• Any Student can know briefly about the other Student.
										<br>
										• Student Can contact with the Teachers
										<br>
										• Teachers can upload the lecture sheet & References here for his Student
										<br>
										• A Photo gallery is included there where all the latest events photos of a
										university will will be update
										<br>
										• A portion for Programming Contest Club
										<br>
										• Several Portions for CSE Clubs
										<br>
										• A blog is added in this project where all the students can write article on any
										academic or non-academic subject
										<br>
										• Other Students can Comments on that blog
										<br>
										• Any Teacher or Student Can send message to admin for any problem occur
										<br>
										• Some Social Media Buttons are added like Facebook, Twitter, Google+
										<br>
										• Students can find and download any reference book from this site
										<br>
										• All the activities can be modify or change from the admin account
									</p>
								</div>
								<br>
								<br>
								<br>
								<div>
									<div id="paragraph_head">
										<h1 align="left" style="color:#FFFFFF">About!</h1>
									</div>
									<td width="100"><img src=images/Najmus_Sadat.jpg style="height:250px; padding:10px"
											align="right"></td>
									<td width="100"><img src=images/Bijan_Paul.jpg style="height:250px; padding:10px"
											align="right"></td>
									<td width="100"><img src=images/Faruk_Ahmed.jpg style="height:250px; padding:10px"
											align="right"></td>
									<td width="100"><img src=images/Saidur_Rahman.jpg style="height:250px; padding:10px"
											align="right"></td>
									<td width="100"><img src=images/Sharif_Zaman.jpg style="height:250px; padding:10px"
											align="right"></td>
									<p align="left" style="font-size:16; font-weight:bold">এই ওয়েবসাইটটির শুরু থেকে শেষ
										পর্যন্ত যারা জড়িত...</p>
									<p align="left">প্রথমেই যার কথা বলতে হয় উনি হচ্ছেন
									<p style="font-size:20px">Faruk Ahmed</p> Microsoft Developer হিসাবে দীর্ঘদিন কাজ করার
									পর এখন তিনি কানাডার একটি সফটওয়্যার প্রতিষ্ঠানের Lead Developer হিসাবে কাজ করছেন। ইমতিয়াজ
									আহমাদ এবং ইরফান তানভীর যখন এই পোর্টালটির কাজ যখন শুরু করে তখন তাদের ওয়েব ডেভেলপমেন্ট
									সম্পর্কে ধারণা ছিলো সামান্য সেই সামান্য ধারণা থেকে আজকের এই রুপ দেওয়া পর্যন্ত এই
									মানুষটির অবদান সবথেকে বেশী। তাদের যে কোন সমস্যায় রাত-দিন যে কোন সাহায্য তিনি করেছেন।
									<br>
									<p style="font-size:20px">Bijon Paul</p>ওই সময় তাদের ডাটাবেজের Course Teacher ছিলেন।
									পড়ালেখা করেছেন শাহজালাল বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয় থেকে বর্তমানে তিনি American
									University of Bangladesh (AIUB) তে শিক্ষকতার দায়িক্ত পালন করছেন তার অবদান অস্বীকার করার
									মতো নয়। Admin দের ডাটাবেজে হাতেখড়ি উনার কাছেই।
									<br>
									<p style="font-size:20px">Dr. Najmus Sadat</p> পড়ালেখা শেষ করেছেন অস্ট্রেলিয়ার Monash
									University থেকে উনি বর্তমানে Assistant প্রফেসর হিসাবে দায়িক্তপালন করছেন University of
									Asia Pacific এ। অ্যালগরিদম সংক্রান্ত সকল জটিলতায় ইমতিয়াজের পাশে ছিলেন উনি সর্বদা...
									<br>
									<p style="font-size:20px">Sharif Zaman</p> জুনিয়র ইঞ্জিনিয়ার,Epsilon Consulting Ltd.
									পড়াশোনা করেছেন CSE তেই University of Development Alternative থেকে তার পাশে বসেই করা
									হয়েছে ডিজাইনের সব কাজ।
									<br>
									<p style="font-size:20px">S.M. Saidur Rahman</p> Senior Engineer at Epsilon Consulting
									Ltd. এই ওয়েবসাইটটির ডোমেইনটি নেওয়া হয়েছে উনার মাধ্যমেই। অত্যান্ত হেল্পফুল এবং জিনিয়াস
									একজন মানুষ। এখন পর্যন্ত কখন যদি এই ওয়েবসাইটের সার্ভার সংক্রান্ত কোন সমস্যা হয় তাহলে উনি
									জানা মাত্রই ঠিক করে দেওয়ার জন্যে কাজ করেন। বলা যায় এই ওয়েবসাইটের চুড়ান্ত পরিনতি উনার
									মাধ্যমেই।</p>
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
	<?php
} ?>