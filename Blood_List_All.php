<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>Mark | Student Management Tool</title>
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/thickbox.js"></script>
	<link rel="stylesheet" href="assets/css/thickbox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen">
</head>

<body>
	<div id="canvas">
		<div class="body_wrapper">
			<div id="logo" align="left">
				<h1><a href="Home.php">Student Management Tool </a></h1>
				<p>A Software for Managing CSE Department</p>
			</div>
			<div class="body">
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
				<div>
					<img src="images/Donate_Blood.jpg" alt="" width="350" height="200" class="image" align="left" />
					<h1 style="color:#FFFFFF">why donate Blood?</h1>
					<p align="right" style="text-align:left"> You don�t need a special reason to give blood.
						You just need your own reason.
						Some of us give blood because we were asked by a friend.
						Some know that a family member or a friend might need blood some day.
						Some believe it is the right thing we do.
						Whatever your reason, the need is constant and your contribution is important for a healthy and
						reliable blood supply. And you�ll feel good knowing you've helped change a life.
						You will receive a mini physical to check your:
						Pulse
						Blood pressure
						Body temperature
						Hemoglobin</p>
					<h1 style="color:#FFFFFF">Benefits of Donating</h1>
					<p align="right" style="text-align:left"> You don�t need a special reason to give blood.
						You just need your own reason.
						Some of us give blood because we were asked by a friend.
						Some know that a family member or a friend might need blood some day.
						Some believe it is the right thing we do.
						Whatever your reason, the need is constant and your contribution is important for a healthy and
						reliable blood supply. And you�ll feel good knowing you've helped change a life.
						You will receive a mini physical to check your:
						Pulse
						Blood pressure
					</p>
					</p>
				</div>
				<form>
					<table id="itable" width="1100" border="1" style="padding-bottom:25">
						<tr>
							<td height="50" bgcolor="#006699">SReg</td>
							<td align="center" bgcolor="#006699">SName</td>
							<td align="center" bgcolor="#006699">SPh_Number</td>
							<td align="center" bgcolor="#006699">Blood_Group_Name</td>
						</tr>
						<?php
						include ("dbconnect.php");
						$strquery = "SELECT * FROM 
(SELECT S.SReg, S.SName, S.SPh_Number, B.Blood_Group_Name,B.Blood_Group_ID FROM s_info S, blood_group_info B
WHERE
S.Blood_Group_ID=B.Blood_Group_ID
) A WHERE blood_group_ID='1'
OR blood_group_ID='2'
OR blood_group_ID='3'
OR blood_group_ID='4'
OR blood_group_ID='5'
OR blood_group_ID='6'
OR blood_group_ID='7'
OR blood_group_ID='8'
ORDER BY blood_group_ID
";
						$results = mysql_query($strquery);
						$num = mysql_numrows($results);
						$i = 0;
						while ($i < $num) {
							$f1 = mysql_result($results, $i, "SReg");
							$f2 = mysql_result($results, $i, "SName");
							$f3 = mysql_result($results, $i, "SPh_Number");
							$f4 = mysql_result($results, $i, "Blood_Group_Name");
							?>
							<tr align="center">
								<td height="40">
									<?php echo $f1; ?>
								</td>
								<td><?php echo $f2; ?></td>
								<td><?php echo $f3; ?></td>
								<td><?php echo $f4; ?></td>
								<?php
								$i++;
						}
						?>
				</form>
			</div>
		</div>
</body>

</html>