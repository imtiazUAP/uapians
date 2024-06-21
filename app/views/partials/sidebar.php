<div class=""sidebar_box>
	<?php if (empty($_SESSION['user_id'])) { ?>
		<div class="sidebar_login">
			<p id="sidebar_sign_in">Sign In</p></br>
			<form action="" method="post">
				<div class="tabledv">
					<div class="registername"></div>
					<div class="registerfield"><input type="text" name="email" id="email" maxlength="30"
							placeholder="Enter e-mail" required="required" size="29" value="" autofocus="autofocus" /></div>
				</div> </br>
				<div class="tabledv">
					<div class="registername"></div>
					<div class="registerfield"><input required="required" type="password" name="password" id="password"
							maxlength="30" placeholder="Enter password" size="29" value="" autofocus="autofocus" /></div>
				</div>
				<button name="login" type="Submit" class="button button_blue">Log In</button>
			</form>
			<button name="reset_pass" onclick="window.open('reset_pass.php','_top')" class="button button_red">Forgot Password?</button>
			<button name="sign_up" onclick="window.open('<?= BASE_URL . '/student/sign-up' ?>','_top')" class="button button_blue">Sign Up</button>
			<?php
			if (isset($_REQUEST['login']) && !empty($_REQUEST['email'])) {
				$loginEmail = $_REQUEST['email'];
				$loginPassword = $_REQUEST['password'];
				$dbconnect = new dbClass();
				$connection = $dbconnect->getConnection();
				$qry = "SELECT * FROM user WHERE email=? AND password=?";
				$stmt = $connection->prepare($qry);
				if ($stmt) {
					// TODO: Md5
					// $stmt->bind_param("ss", $email, md5($userPassword));
					$stmt->bind_param("ss", $loginEmail, $loginPassword);
					$stmt->execute();
					$result = $stmt->get_result();
					$loggedInUserInfo = $result->fetch_assoc();
					$stmt->close();
				} else {
					die("Prepare failed: " . $connection->error);
				}
				$_SESSION['email'] = $loggedInUserInfo['email'];
				$_SESSION['user_id'] = $loggedInUserInfo['user_id'];
				$_SESSION['group_id'] = $loggedInUserInfo['group_id'];
				session_write_close();

				if (!empty($_SESSION['email'])) {
					?>
					<script language="JavaScript">
						window.location = "/uapians/";
					</script>
					<?php
				} elseif (empty($_SESSION['email'])) {
					?>
					<script language="JavaScript">
						window.location = "reset_pass.php?message=wrong_login_id__or_pass";
					</script>
					<?php
				}
			}
			?>
			<p id="sidebar_no_account" >Don't have an account ?</p>
			<a id="sidebar_sign_up" href="<?= BASE_URL . '/student/sign-up' ?>">Sign up</a>
		</div>
	<?php } else { ?>
		<div class="sidebar_logout">
			<div class="sidebar_login_info">
				You are Logged in as: <span><?php print $_SESSION['email'] ?></span>
				<button class="button button_red" onclick="window.open('<?php echo BASE_URL . '/logout'; ?>', '_top')">Log Out</button>

			</div>
			<?php if (($userInfo['group_id'] == 1)) {?>
				<a href='php_sendmail_upload1.php'>Send Email</a>
			<?php } ?>

			<div class="sidebar_send_message">
				<ul>
					<li><a href="send_message_to_your_friend.php">Send a Message...</a></li>
				</ul>
			</div>
		</div>
	<?php } ?>
</div>

<div class="sidebar_box">
	<div class="sidebar_section_head">
		<h3 align="left">Academic Aspects</h3>
	</div>
	<ul class="sidebar_links">
		<li><a href="<?= BASE_URL . '/teacher/list' ?>">Teachers</a></li>
		<li><a href="<?= BASE_URL . '/student/list?SMID=9' ?>">Students</a></li>
		<li><a href="<?= BASE_URL . '/course/list' ?>">Courses</a></li>
		<li><a href="Mark_List.php">Results</a></li>
	</ul>
</div>

<div class="sidebar_box">
	<div class="sidebar_section_head">
		<h3 align="left">Clubs & Social Works</h3>
	</div>.
	<ul class="sidebar_links">
		<li><a href="<?= BASE_URL. '/gallery/list' ?>">Gallery</a></li>
		<li><a href="<?= BASE_URL. '/blood-bank/list' ?>">Blood Bank</a></li>
		<li><a href="<?= BASE_URL. '/student/district/list' ?>">Who is from my District</a></li>
		<li><a href="<?= BASE_URL. '/club/programming/detail' ?>">Programming Contest Club</a></li>
		<li><a href="<?= BASE_URL. '/club/research/detail' ?>">Research and Publication Club</a></li>
		<li><a href="<?= BASE_URL. '/club/sports/detail' ?>">Sports Club</a></li>
		<li><a href="<?= BASE_URL. '/club/software/detail' ?>">Software and Hardware Club</a></li>
		<li><a href="<?= BASE_URL. '/club/cultural/detail' ?>">Cultural and Debating Club</a></li>
		<li><a href="<?= BASE_URL. '/club/web/detail' ?>">Web Club</a></li>
	</ul>
</div>


<div class="sidebar_box">
	<div class="sidebar_section_head">
		<h3 align="left">Admin Panel</h3>
	</div>
	<ul>
		<?php foreach($adminInfo as $admin) { ?>
			<div class="sidebar_admin_photo">
			<a href="<?= BASE_URL . '/student/profile?SID=' .$admin['user_id'] ?>">
				<li><img src="<?= BASE_URL . '/app/assets/' . $admin['SPortrait'] ?>" />  <?= $admin['SName'] ?></li>
			</a>
			</div>
			<p class="bottom">
				<?= $admin['SPh_Number'] ?>
				<?= $admin['email'] ?> <br>
				<?= $admin['SMName'] ?> <br>
				University of Asia Pacific
			</p>
			<li><a href="send_message_to_admin.php">Send him a Message</a></li>
			<?php if (!empty($userInfo['group_id']) && ($userInfo['group_id'] == 1)) { ?>
				<li><a href="Message_List_for_Admin.php"> My Messages</a></li>
			<?php } ?>
		<?php } ?>
	</ul>
</div>

<div class="sidebar_box">
	<div class="sidebar_section_head">
		<h3 align="left">Contact Us</h3>
	</div>
	<p class="bottom">For any query, or any Information contact with us... Student Management Tools,
		University of Asia Pacific
		Phone:+8801736516583
		E_Mail:emtiaj@yahoo.com
		Website:www.emtiaj.blogspot.com
		For any Information to Add, Edit or Delete Contact with Admins
	</p>
</div>

<div class="fb-like-box" data-href="https://www.facebook.com/pages/UAPIANSNet/1452237808341753?ref=hl" data-width="238"
	data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true">
</div>