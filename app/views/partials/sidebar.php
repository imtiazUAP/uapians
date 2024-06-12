<div class="sidebar_box">
	<div class="sidebar_login_info">
		You are Logged in as: <span><?php print $_SESSION['username'] ?></span>
		<button class="button button_red" onclick="window.open('Log_Out.php','_top')"> Log Out </button>
	</div>
	<?php if (($userdata['admin'] == '3')) {?>
		<a href='php_sendmail_upload1.php'>Send Email</a>
	<?php } ?>

	<div class="sidebar_send_message">
		<ul>
			<li><a href="send_message_to_your_friend.php">Send a Message...</a></li>
		</ul>
	</div>

	<div class="sidebar_section_head">
		<h3 align="left">Academic Aspects</h3>
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
	<div class="sidebar_section_head">
		<h3 align="left">Clubs & Social Works</h3>
	</div>.
	<ul class="sidebar_links">
		<li><a href="galary.php">Gallery</a></li>
		<li><a href="Blood_List_All.php">Blood Bank</a></li>
		<li><a href="Districtwise_StudentList.php">Who is from my District</a></li>
		<li><a href="Programing_Contest_Club.php">Programming Contest Club</a></li>
		<li><a href="Research_Publication_Club.php">Research and Publication Club</a></li>
		<li><a href="Sports_Club.php">Sports Club</a></li>
		<li><a href="Software_Hardware_Club.php">Software and Hardware Club</a></li>
		<li><a href="Cultural_Debating_Club.php">Cultural and Debating Club</a></li>
		<li><a href="Web_Club.php">Web Club</a></li>
	</ul>
</div>


<div class="sidebar_box">
	<div class="sidebar_section_head">
		<h3 align="left">Admin Panel</h3>
	</div>
	<ul>
		<div class="sidebar_admin_photo">
			<a href="/../admin/Admin_Nokib.php">
				<li><img src="<?= BASE_URL ?>/app/assets/images/1234554321.jpg" /> Nokib Mozumder</li>
			</a>
		</div>
		<p class="bottom">Nokib Mozumder, University of Asia Pacific
			Phone:01670756503
			E_Mail:nokib016@gmail.com
		</p>
		<li><a href="send_message_to_admin.php">Send him a Message</a></li>
		<?php if (($userdata['admin'] == '1')) { ?>
			<li><a href="Message_List_for_Admin.php"> My Messages</a></li>
		<?php } ?>

		<div class="sidebar_admin_photo">
			<a href="Admin_Jihan.php">
				<li><img src="<?= BASE_URL ?>/app/assets/images/Picture 2963.jpg" />MD. Mazharul islam jihan</li>
			</a>
		</div>
		<p class="bottom">Jihan, University of Asia Pacific
			Phone:+8801752512666
			E_Mail:jihanislam007@gmail.com</p>
		<li><a href="send_message_to_admin.php">Send him a Message</a></li>
		<?php if (($userdata['admin'] == '1')) { ?>
			<li><a href="Message_List_for_Admin.php"> My Messages</a></li>
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