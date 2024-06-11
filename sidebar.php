<div class="sidebar_box">
	<br>
	<br>
	<div style="text-decoration:none;font-size:18px; color:#FFFFFF; font-weight:bold">You are Logged in as <span
			style="font-style: italic; font-size: 24px">...<?php print $_SESSION['username'] ?> </span> </div>
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
	<button class="button button_red" onclick="window.open('Log_Out.php','_top')"> Log Out </button>
	<br>
	<br>
	<div>
		<form>
			<input type="text" size="27" placeholder="Search for any page" onKeyUp="showResult(this.value)">
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
		<h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif;">Academic Aspects</h3>
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
		<h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Clubs & Social Works</h3>
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
<br>
<br>
<div class="sidebar_box">
	<div id="section_head">
		<h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Admin Panel</h3>
	</div>
	<ul>
		<a href="Admin_Nokib.php">
			<li><img src="images/1234554321.jpg" style="height:100" /> Nokib Mozumder</li>
		</a>
		<p class="bottom">Nokib Mozumder, University of Asia Pacific
			Phone:01670756503
			E_Mail:nokib016@gmail.com
		</p>
		<li><a href="send_message_to_admin.php">Send him a Message</a></li>
		<?php
		if (($userdata['admin'] == '1')) {
			?>
			<li><a href="Message_List_for_Admin.php"> My Messages</a></li>
			<?php
		}
		?>
		<br>
		<a href="Admin_Jihan.php">
			<li><img src="images/Picture 2963.jpg" style="height:100" />MD. Mazharul islam jihan</li>
		</a>
		<p class="bottom">Jihan, University of Asia Pacific
			Phone:+8801752512666
			E_Mail:jihanislam007@gmail.com
			Website:https://www.facebook.com/mazaharulislam.jihan </p>
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
		<h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Contact Us</h3>
	</div>
	<p class="bottom">For any query, or any Information contact with us... <br> Student Management Tools,
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
<div class="fb-like-box" data-href="https://www.facebook.com/pages/UAPIANSNet/1452237808341753?ref=hl" data-width="238"
	data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true">
</div>