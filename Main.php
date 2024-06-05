<html>

<head>
	<title>Student Management Tool</title>
	<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen">
</head>

<body>
	<div id="grad1">
		<div class="bodydiv">
			<div id="logo">
				<h1><a href="Main.php">Student Management Tool </a></h1>
				<p>A Software for Managing CSE Department</p>
			</div>
			<div id='cssmenu' align="center">
				<ul>
					<li><a href='Home.php'><span>Home</span></a></li>
					<li><a href='Student_List.php' target="iframe"><span>Students</span></a></li>
					<li><a href='Employee_List.php' target="iframe"><span>Employees</span></a></li>
					<li><a href='Course_List.php' target="iframe"><span>Courses</span></a></li>
					<li><a href='Mark_List.php' target="iframe"><span>Marks</span></a></li>
					<li class='last'><a href='Profile_List.php' target="iframe"><span>Profiles</span></a></li>
				</ul>
			</div>
			<div style="display:block; width:100%;">
				<iframe id="iframe" src="Home.php" name="iframe" scrolling="Yes" frameborder="2"></iframe>
			</div>
			<div class="footer"> <a href="http://www.emtiaj.blogspot.com" class="copyright" target="iframe">copyright @
					www.emtiaj.blogspot.com</a> <br>
				<a href="http://uap-bd.edu/cse/index.html" class="copyright" target="iframe">copyright @ CSE Department,
					UAP</a>
			</div>
		</div>
</body>

</html>