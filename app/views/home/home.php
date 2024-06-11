<?php
session_start();
if (empty($_SESSION['username'])) {
?>
	<script language="JavaScript">
		window.location = "index.php";
	</script><?php } else { ?>
	<html>
	<head>
		<?php include (__DIR__ . "/../partials/header.php"); ?>
	</head>

	<body>
		<div id="background_canvas">
			<div class="body_wrapper">
				<?php include (__DIR__ . "/../partials/logo.php"); ?>
				<div class="content_wrapper">
					<?php include (__DIR__ . "/../partials/menu.php"); ?>
					<!-- Section:: Slider -->
					<div id="wowslider-container1">
						<?php include (__DIR__ . "/../partials/slider1.php"); ?>
					</div>
					<div id="content">
						<!-- Section:: Sidebar -->
						<div id="colOne">
							<?php include (__DIR__ . "/../partials/sidebar.php"); ?>
						</div>
						<div id="margin_figure">
							<!-- Section:: Welcome -->
							<div class="section">
								<div id="section_head">
									<h1>
										Welcome!
									</h1>
								</div>
								<p id="section_title"><?= $introTitle ?></p>
								<p id="section_content"><?= $intro ?>
							</div>

							<!-- Section:: News -->
							<div class="section">
								<div id="section_head">
									<h1>
										News Feed............
									</h1>
								</div>
								<marquee behavior="scroll" direction="up" onmouseover="this.stop();" onMouseOut="this.start();">
									<?php
									if ($isAdmin) { ?>
										<div class="news_new">
											<a href="News_Insert.php?keepThis=true&TB_iframe=true&height=150&width=400&modal=true"
												title="New Course" class="thickbox">Add New News</a>
										</div>
										<?php
									}
									foreach ($newsResults as $news) { ?>
										<div class="news_hint">
											<a href='<?php echo $news['News_Link']; ?>' target="_blank"><span><?php echo $news['News_Hints']; ?></span></a>
										</div>
										<?php if ($isAdmin) { ?>
											<div class="news_actions">
												<?php echo " <a href='News_Edit.php?News_ID=" . $news['News_ID'] . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $news['News_ID'] . "'> edit </a> "; ?>
												|
												<?php echo " <a href='News_Delete.php?News_ID=" . $news['News_ID'] . "'> delete </a> "; ?>
											</div>
										<?php }
									} ?>
								</marquee>
							</div>

							<!-- Section:: Notice -->
							<div class="section">
								<div id="section_head">
									<h1>Notice!</h1>
								</div>
								<div id="notice_board">
									<?php
									foreach ($noticeResults as $notice) {
										?>
										<Div class="notice_content">
											<p>
												<?php echo $notice['Notice']; ?><br><br> Thank You
												<?php if ($isAdmin) { ?>
													<?php echo " <a href='Notice_Edit.php?Notice_ID=" . $notice['Notice_ID'] . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $notice['Notice_ID'] . "'> Update Notice </a> "; ?>
												<?php } ?>
											</p>
										</Div>
									<?php } ?>
								</div>
							</div>

							<!-- Section:: Mission -->
							<div class="section">
								<div id="section_head">
									<h1>Mission...</h1>
								</div>
								<p id="section_title"><?= $missionTitle ?></p>
								<p id="section_content"><?= $mission ?></p>
							</div>

							<!-- Section:: About -->
							<div class="section">
								<div id="section_head">
									<h1>About!</h1>
								</div>
								<p id="section_title"><?= $aboutTitle ?></p>
								<p id="section_content"><?= $about ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="footer">
					<?php include (__DIR__ . "/../partials/footer.php");
					?>
				</div>
	</body>

	</html>
	<?php
} ?>