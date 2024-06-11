<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
?>
<?php //print $_SESSION['username'];                 ?>
<html>

<head>
	<?php
	include ("header.php");
	?>
</head>

<body>
	<div id="canvas">
		<div class="body_wrapper" align="center">
			<?php include ("logo_for_index.php"); ?>
			<div class="body">
				<?php include ("menu_for_index.php"); ?>
				<div id="wowslider-container1" style="height:200px">
					<?php include ("slider1.php");
					?>
				</div>
				<div id="content_wrapper">
					<div id="sidebar" align="left">
						<?php
						include ("sidebar_for_index.php");
						?>
					</div>
					<div id="content" align="left">
						<div>
							<div id="section_head">
								<h1 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">
									Welcome!</h1>
							</div>
							<p align="left" style="font-size:16; font-weight:bold">Uapians.Net একটি ওয়েবসাইট.... আমাদের
								জন্যে আমাদের বানানো</p>
							<p align="left" style="font-size:14">Uapians.Net একটি সফটওয়্যার যার মুল উদ্দেশ্যই হলো
								ইউনিভার্সিটি পর্যায়ে যে সকল complexity আছে তা কিছুটা হলেও দূর করা , এবং বিষয়গুলো সহজভাবে
								সবার কাছে উপস্থাপন করা... এই সফটওয়্যারের সব ধরনের কর্মকাণ্ড University of Asia Pacific
								এর ছাত্রছাত্রীদের দ্বারা পরিচালিত হয়ে থাকে। Authority পর্যায়ের কেউ এটার সাথে এখন পর্যন্ত
								জড়িত নয়। এখানে ইউনিভার্সিটির সব স্টুডেন্টের প্রোফাইল থাকবে এবং সেখানে ওই স্টুডেন্টের
								যাবতীয় তথ্য থাকবে যাতে করে একে-অন্যকে আরো ভালোভাবে জানতে পারে-চিনতে পারে। এখান থেকে সবাই
								সব সেমিস্টারের যাবতীয় হ্যান্ডনোট/Slide/PDF/EBook/Question sample ডাউনলোড করে নিতে পারবে।
								এখানে শিক্ষকরা সরাসরি নোট/slide/reference আপলোড করে দিতে পারবে। এবং পরবর্তী সেমিস্টারে
								নতুন স্টুডেন্টরা এসেই সব কিছু গোছানো পেয়ে যাবে তাতে করে যে সকল স্টুডেন্ট ক্লাসে উপস্থিত
								থাকে ঠিক ই কিন্তু মন থাকে আকাশে-বাতাসে তাদের কিছুটা হলেও উপকার হবে বলে আশা করি... এখানে
								একজন অন্যজনকে মেসেজ দিতে পারবে গ্রুপ মেসেজ করতে পারবে তাতে করে
								শিক্ষক-ছাত্রছাত্রী-বন্ধুবান্ধবের মধ্যের ব্রিজ কানেকশানটা আরো একটু ভালো হবে আশা করি।
								এখানকার সব কিছুই হবে Academic এবং Professional লেভেল এর জন্যে । এই প্রজেক্টের মাধ্যমে
								কারো যদি এতটুকু উপকার হয় তাহলে আমাদের প্রচেস্টা সফল হবে। ভালো কথা এখানে একটা ব্লগ করা
								হয়েছে যদিও খুব একটা ভালো হয়নি এখনো তবে আমরা চেষ্টা করে যাচ্ছি । এই ব্লগে ছাত্রছাত্রীরা
								তাদের Academic বিষয় নিয়ে আলোচনা করবে/ Article লিখবে বলে আমরা আশা করি।।
							</p>
						</div>
						<br>
						<br>
						<br>
						<div align="center">
							<div id="section_head">
								<h1 align="left"
									style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ; text-decoration:blink">
									News Feed............</h1>
							</div>
							<marquee behavior="scroll" direction="up"
								style="vertical-align:middle;text-align:center; cursor:pointer;color:#0099FF; font-size:18px; height:300"
								onMouseOver="this.stop();" onMouseOut="this.start();">
								<?php
								$dbconnect = new dbClass();
								$connection = $dbconnect->getConnection();
								$stmt = $connection->prepare("SELECT * FROM news_info");
								$stmt->execute();
								$results = $stmt->get_result();
								foreach ($results as $result) {
									?>
									<a href='<?php echo $result['News_Link']; ?>' target="_blank"
										style="text-decoration:none; color:#FFFFFF"><span><?php echo $result['News_Hints']; ?></span></a><br>
									<br>
									<?php
								}
								?>
							</marquee>
						</div>
						<div id="section_head">
							<h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">
								Notice!</h1>
						</div>
						<div id="notice_board">
							<?php
							$noticeStmt = $connection->prepare("SELECT * FROM notice_info");
							$noticeStmt->execute();
							$noticeResults = $noticeStmt->get_result();
							foreach ($noticeResults as $notice) {
								?>
								<p
									style="padding-left:60px; padding-right:55px; color:#66CC33;font-size:16px; font-weight:bold; ">
									<br><br><br><br><br><?php echo $notice['Notice']; ?><br> <br>Thank You<br>
									<?php
							}
							?>
							</p>
						</div>
						<div>
							<div id="section_head">
								<h1 align="left" style="color:#FFFFFF">Mission...</h1>
							</div>
							<p align="left" style="font-size:16; font-weight:bold">UAPIANS.NET মুলত ইউনিভার্সিটি
								স্টুডেন্টদের মিলনমেলা...
							</p>
							<p align="left" style="font-size:14">
								কম্পিউটার সায়েন্সে পড়ুয়া কতিপয় তরুনের উদ্যোগে আত্মপ্রকাশ করা UAPIANS.NET মুলত
								ইউনিভার্সিটি স্টুডেন্টদের মিলনমেলা। প্রাথমিকভাবে শুধুমাত্র University of Asia Pacific এর
								কম্পিউটার বিজ্ঞান প্রকৌশল বিভাগের জন্য উন্মুক্ত, তবে ধীরে ধীরে অন্যান্য ডিপার্টমেন্ট এবং
								সারা বাংলাদেশের সকল বিশ্ববিদ্যালয়ের মাঝে ছড়িয়ে দেয়ার পরিকল্পনা চলছে।
								সম্পূর্নই আনঅফিসিয়াল এ এপ্লিকেশনটি বিশ্ববিদ্যালয় পর্যায়ের স্টুডেন্টদের মধ্যে পারষ্পরিক
								মেলবন্ধনের ক্ষেত্রে এক অনবদ্য ভূমিকা রাখবে বলে আশা করা যায়। ছাত্রছাত্রীদের নিজেরদের
								মধ্যে পারষ্পরিক যোগাযোগ, অটোমেটেড ডিজিটালাইজড রেজাল্টশীট প্রস্তুতকরুন, নোটস আদান প্রদান
								এবং সর্বোপরি বিভিন্ন বিষয়ে পারষ্পরিক সহযোগীতা এবং বিভিন্ন প্ল্যাটফরমের উপর নিজেদের ভেতরে
								আলোচনার সুযোগ থাকছে। সেই সাথে আছে ব্লাড ব্যাঙ্ক এবং এক অসম্ভব হেল্পফুল একটি স্বেচ্ছাসেবক
								টিম আপনার সহযোগীতার জন্য যারা সর্বাত্মক চেষ্টা করে যাবে যে কোন প্রয়োজনে।
								আপনি যদি একজন UAPian হয়ে থাকেন তবে দেরী না করে এখনই রেজিস্ট্রেশন করে ফেলুন এবং চলে আসুন
								আমাদের পরিবারে।
								It’s time to be united, time to shout out together…
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
								Fall 2013 তে হয় আমাদের পথচলার শুরু...</p>
							<p align="left" style="font-size:14">এই প্রজেক্টের কাজ আমরা শুরু করি Fall 2013 সেমিস্টারে
								আমাদের CSE 300 এবং CSE 322 এর আন্ডারে দেশের অবস্থা খারাপ থাকায় ইউনিভার্সিটি বন্ধ হয়ে
								গেলো এবং সেটা হলো আমাদের কাজ করার জন্যে একটা সুবর্ণ সুযোগ দীর্ঘ ৭ মাস সময় পেলাম একটা
								সেমিস্টারে এবং তার মধ্যে আমারা কাজ শেখা থেকে শুরু করে বর্তমান অবস্থা পর্যন্ত নিয়ে আসি।
								আমরা মনে করি আমাদের এই প্রজেক্ট দেখে পরবর্তী স্টুডেন্টরাও এরকম কিছু করার জন্যে উদ্বুদ্ধ
								হবে । কোর্স আমাদের Course Teachers ছিলেন Dr. Najmus Sadat.... Bijan Paul স্যার উনারা
								আমাদের প্রত্যেকটা Step এ হেল্প করেছেন আমরা উনাদের কাছে কৃতজ্ঞ। এবং পরবর্তীদের সময়েও
								উনারা এই রকম ই হেল্পফুল থাকবেন বলে মনে করি যা কিনা আমাদের ডিপার্টমেন্টের স্টুডেন্টদের
								জন্যে আশীর্বাদ স্বরূপ ।।</p>
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