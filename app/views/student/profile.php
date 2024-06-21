<div class="bodyforprofile">
	<div class="profileuserinterface">
		<?php
		// if (($userdata['admin'] == '1' || $userdata['SID'] == $studentInfo["user_id"])) {
		if ($userInfo['group_id'] == 1 || $userInfo['user_id'] == $studentInfo['user_id']) { ?>
			<div align="center" style="background-color:#FFFF00; width:500px; height:20px">

				<a href="<?= BASE_URL . '/student/edit?SID=' . $studentInfo["user_id"] . '&keepThis=true&TB_iframe=true&height=543&width=400&do=edit&modal=true' ?>"
					class='thickbox' title='Edit Student - " . $studentInfo["SName"] . "'> Edit my Profile </a>
				|
				<?php echo " <a href='Password_Edit.php?SID=" . $studentInfo['user_id'] . "&keepThis=true&TB_iframe=true&height=200&width=300&do=edit&modal=true'     	class='thickbox' title='Change Password - " . $studentInfo["SName"] . "'> Change my Password </a> "; ?>
				| <?php echo " <a href='Message_List_personal.php? SID=" . $studentInfo["user_id"] . "'> My Messages </a>" ?>
				| <?php echo " <a href='Upload_Project.php?SID=" . $studentInfo["user_id"] . "'> | upload project  </a>" ?>
			</div>
		<?php } ?>
	</div>
	<div style="font-weight:bold; font-size:16px; padding-left:10px; color:#0099FF">
		<ul>
			<li><a href="send_message_to_your_friend.php">Send a Message...</a></li>
		</ul>
	</div>
	<div id="content">
		<br>
		<div class="profilepicturebox">
			<img src="<?= BASE_URL . '/app/assets/' . $studentInfo['SPortrait'] ?>" alt="Profile Picture" width="200">
		</div>
		<br>
		<br>
		<p style="font:Arial, Helvetica, sans-serif; font-size:54px; color:#FFFFFF"><?php echo $studentInfo["SName"]; ?>
		</P>
		<br>
		<br>
		<br>
		<p style="padding-top:1px; color:#FFFFFF; font-size:16px">Registration No: <?php echo $studentInfo["SReg"]; ?>
		</P>
		<br>
		<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Semester: <?php echo $studentInfo["SMName"]; ?></P>
		<br>
		<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Noted
			Activity:<?php echo $studentInfo["Noted_Activity"]; ?></P>
		<br>
		<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Date of
			Birth:<?php echo $studentInfo["SB_of_Date"]; ?></P>
		<br>
		<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Blood Group:
			<?php echo $studentInfo["Blood_Group_Name"]; ?>
		</P>
		<br>
		<p style="padding-top:10px; color:#FFFFFF; font-size:16px">House: <?php echo $studentInfo["SHouse"]; ?></P>
		<br>
		<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Home City: <?php echo $studentInfo["SHome_City"]; ?>
		</P>
		<br>
		<p style="padding-top:10px; color:#FFFFFF; font-size:16px">School:<br></p>
		<br>
		<div class="myprofilebox">
			<p><?php echo $studentInfo["School"]; ?></P>
		</div>
		<br>
		<br>
		<p style="padding-top:10px; color:#FFFFFF">College:<br></p>
		<div class="myprofilebox">
			<p><?php echo $studentInfo["College"]; ?></P>
		</div>
		<br>
		<br>
		<p style="padding-top:10px; color:#FFFFFF">Knows the Programs:<br></p>
		<div class="myprofilebox">
			<p><?php echo $studentInfo["Knows_Programs"]; ?></P>
		</div>.
		<br>
		<br>
		<p style="padding-top:10px; color:#FFFFFF">Interested In:<br></p>
		<div class="myprofilebox">
			<p><?php echo $studentInfo["Interested_In"]; ?></P>
		</div>.
		<br>
		<br>
		<p style="padding-top:10px; color:#FFFFFF">Now Working At:<br></p>
		<div class="myprofilebox">
			<p><?php echo $studentInfo["Working_At"]; ?></P>
		</div>.
		<br>
		<br>
		<p style="padding-top:10px; color:#FFFFFF">Contact: <br></p>
		<br>
		<br>
		<div style=" padding-bottom:75px;" class="myprofilebox">
			<p>
				Phone Number: <?php echo $studentInfo["SPh_Number"]; ?> <br>
				E_Mail: <?php echo $studentInfo["email"]; ?> <br>
				Facebook: <?php echo $studentInfo["FB_Link"]; ?> <br>
				Twitter: <?php echo $studentInfo["Twitter_Link"]; ?> <br>
				Blog: <?php echo $studentInfo["Blog"]; ?> <br>
			</p>
		</div>
	</div>
</div>