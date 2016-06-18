	
		<div class="box" align="left">
		<br>
					
					        <p style="font-weight:bold; font-size:24px">Sign In</p>
        <form  action="" method="post" >
            <div class="tabledv"><div class="registername">User Name:</div><div class="registerfield"><input type="text" name="loginname" id="loginname" maxlength="30" size="29" value="" autofocus="autofocus"/></div></div>
            <div class="tabledv"><div class="registername">Password:</div><div class="registerfield"><input type="password" name="password" id="password" maxlength="30" size="29" value="" autofocus="autofocus"/></div></div>
            <div class="tabledv"><div class="registername"></div><div class="registerfield"><input name="login" type="submit" value="Log In" /></div></div>
        </form>
		
		

		        <?php
        if (isset($_REQUEST['login'])) {
            $usname = $_REQUEST['loginname'];
            $uspass = $_REQUEST['password'];
            $qry = "select * from userinfo where username='" . ($usname) . "' && password='" . md5($uspass) . "' ";

            $usresult = mysql_query($qry);
            $usdata = mysql_fetch_assoc($usresult);
			//session_regenerate_id();
            $_SESSION['username'] = $usdata['username'];
			$_SESSION['userid'] = $usdata['userid'];
			session_write_close();
//			$a=$_SESSION['username'];
	//		print $a;

            if (!empty($_SESSION['username'])) {
            ?>
            <script language="JavaScript">
				window.location="Home.php";
			</script>
             <?php
            }
        	}
        	?>
		
		
		
		
		
		
		<p style="font-weight:bold; font-size:16px">Dont have an account ?</p>
						<a href="sign_up.php" style="font-size:18px; font-weight:bold; text-decoration:none">Sign up</a>

		
		
		
		
		
		
		
		<br>

					<br>
		<div id="paragraph_head">
			<h3  align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Academic Aspects</h3>
			</div>
			<ul class="bottom">
				<li><a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox">Teachers</a></li>
				<li><a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox">Students</a></li>
				<li><a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox">Courses</a></li>
				<li><a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox">Results</a></li>
				<li><a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox">References</a></li>
				
			</ul>
		</div>
		<br>
		<br>
		<div class="box">
		<div id="paragraph_head">
			<h3  align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Clubs & Social Works</h3>
			</div>.
			<ul class="bottom">
				<li><a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox">Gallery</a></li>
				<li><a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox">Blood Bank</a></li>
				<li><a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox">Who is from my District</a></li>
				<li><a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox">Programming Contest Club</a></li>
				<li><a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox">Research and Publication Club</a></li>
				<li><a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox">Sports Club</a></li>
				<li><a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox">Software and Hardware Club</a></li>
				<li><a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox">Cultural and Debating Club</a></li>
				<li><a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox">Web Club</a></li>
			</ul>
		</div>
		
		<br>
		<br>
		
		<div class="box">
		<div id="paragraph_head">
			<h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Admin Panel</h3>
		</div>
				<ul>
				<a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox"><li><img src="images/11391528_926647094024700_3742502908562004938_n.jpg" style="height:100"/>  Nokib</li></a>
				<p class="bottom">Nokib Mozumder, University of Asia Pacific
			Phone:01670756503 
			E_Mail:nokib016@gmail.com 
			</p>
				
				<br>
				
				<a href="Login_Request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course" class="thickbox"><li><img src="images/Picture 2963.jpg" style="height:100"/>MD. Mazharul islam jihan</li></a>
				</ul>
				<p class="bottom">Jihan, University of Asia Pacific
			Phone:+8801752512666
			E_Mail:jihanislam007@gmail.com
			Website:https://www.facebook.com/mazaharulislam.jihan </p>

	</div>
		
		<br>
		<br>
		
	<div class="box">
		<div id="paragraph_head">
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
		
<div class="fb-like-box" data-href="https://www.facebook.com/pages/UAPIANSNet/1452237808341753?ref=hl" data-width="238" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>