<?php
session_start();
include ("dbconnect.php"); ?>
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
				<div class="body" style="min-height:600px">
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
					<form method="post">
						<?php
						if (($userdata['admin'] == '1')) {
							?>
							<a href="Mark_Insert.php?keepThis=true&TB_iframe=true&height=600&width=500&modal=true"
								title="New Marks Entry" class="thickbox">New Marks Entry</a>
							<?php
						}
						?>
						<tr>
							<td>Semester</td>
							<td>
								<select name="SMID" id="SMID" selected="">
									<?php
									$query = "SELECT DISTINCT SMID,SMName FROM sm_info ORDER BY SMID";
									$rs = mysql_query($query) or die('Error submitting');
									while ($rows = mysql_fetch_assoc($rs)) {
										if ($row["SMID"] == $rows["SMID"]) {
											$selected = 'selected="selected"';
										} else {
											$selected = '';
										}
										print ("<option value=\"" . $rows["SMID"] . "\" " . $selected . "  >" . $rows["SMName"] . "</option>");
									}
									?>
								</select>
							</td>
						</tr>
						<input type="Submit" />
						<?php
						if ($_POST[SMID] == "1") { ?>
							<table id="itable" width="1100" border="1">
								<tr>
									<td height="50">SReg</td>
									<td align="center">HSS_101</td>
									<td align="center">HSS_111_A</td>
									<td align="center">HSS_111_B</td>
									<td align="center">PHY_101</td>
									<td align="center">MTH_101</td>
									<td align="center">CSE_101</td>
									<td align="center">PHY_102</td>
									<td align="center">CSE_102</td>
									<td align="center">Summation</td>
									<td align="center">Average_Marks</td>
								</tr>
								<?php
								$strquery = "SELECT *, (HSS_101+HSS_111_A+HSS_111_B+PHY_101+MTH_101+CSE_101+PHY_102+CSE_102) AS Summation, (HSS_101+HSS_111_A+HSS_111_B+PHY_101+MTH_101+CSE_101+PHY_102+CSE_102)/5 AS Average_Marks,
CASE WHEN HSS_101>'39' THEN 1
ELSE 0 END HSS_101_Binary,
CASE WHEN HSS_111_A>'39' THEN 1
ELSE 0 END HSS_111_A_Binary,
CASE WHEN HSS_111_B>'39' THEN 1
ELSE 0 END HSS_111_B_Binary,
CASE WHEN PHY_101>'39' THEN 1
ELSE 0 END PHY_101_Binary,
CASE WHEN MTH_101>'39' THEN 1
ELSE 0 END MTH_101_Binary,
CASE WHEN CSE_101>'39' THEN 1
ELSE 0 END CSE_101_Binary,
CASE WHEN PHY_102>'39' THEN 1
ELSE 0 END PHY_102_Binary,
CASE WHEN CSE_102>'39' THEN 1
ELSE 0 END CSE_102_Binary
 FROM 
(SELECT SReg, SUM(mark1) AS HSS_101, SUM(mark2) AS HSS_111_A, SUM(mark3) AS HSS_111_B, SUM(mark4) AS PHY_101, SUM(mark5) AS MTH_101, SUM(mark6) AS CSE_101, SUM(mark7) AS PHY_102, SUM(mark8) AS CSE_102
FROM
(
SELECT SID, mark mark1, 0 mark2, 0 mark3, 0 mark4, 0 mark5, 0 mark6, 0 mark7, 0 mark8 FROM m_info WHERE CID=1
UNION ALL
SELECT SID, 0 mark1, mark mark2, 0 mark3, 0 mark4, 0 mark5, 0 mark6, 0 mark7, 0 mark8 FROM m_info WHERE CID=2
UNION ALL
SELECT SID, 0 mark1, 0 mark2, mark mark3, 0 mark4, 0 mark5, 0 mark6, 0 mark7, 0 mark8 FROM m_info WHERE CID=3
UNION ALL
SELECT SID, 0 mark1, 0 mark2, 0 mark3, mark mark4, 0 mark5, 0 mark6, 0 mark7, 0 mark8 FROM m_info WHERE CID=4
UNION ALL
SELECT SID, 0 mark1, 0 mark2, 0 mark3, 0 mark4, mark mark5, 0 mark6, 0 mark7, 0 mark8 FROM m_info WHERE CID=5
UNION ALL
SELECT SID, 0 mark1, 0 mark2, 0 mark3, 0 mark4, 0 mark5, mark mark6, 0 mark7, 0 mark8 FROM m_info WHERE CID=6
UNION ALL
SELECT SID, 0 mark1, 0 mark2, 0 mark3, 0 mark4, 0 mark5, 0 mark6, mark mark7, 0 mark8 FROM m_info WHERE CID=7
UNION ALL
SELECT SID, 0 mark1, 0 mark2, 0 mark3, 0 mark4, 0 mark5, 0 mark6, 0 mark7, mark mark8 FROM m_info WHERE CID=8
) A
INNER JOIN s_info
ON
A.SID=s_info.SID
GROUP BY SReg) A";
								$results = mysql_query($strquery);
								$num = mysql_numrows($results);
								$i = 0;
								while ($i < $num) {
									$f1 = mysql_result($results, $i, "SReg");
									$f2 = mysql_result($results, $i, "HSS_101");
									$f3 = mysql_result($results, $i, "HSS_111_A");
									$f4 = mysql_result($results, $i, "HSS_111_B");
									$f5 = mysql_result($results, $i, "PHY_101");
									$f6 = mysql_result($results, $i, "MTH_101");
									$f7 = mysql_result($results, $i, "CSE_101");
									$f8 = mysql_result($results, $i, "PHY_102");
									$f9 = mysql_result($results, $i, "CSE_102");
									$f10 = mysql_result($results, $i, "Summation");
									$f11 = mysql_result($results, $i, "Average_Marks");
									?>
									<tr align="center">
										<td height="40"><?php echo $f1; ?></td>
										<td><?php echo $f2; ?></td>
										<td><?php echo $f3; ?></td>
										<td><?php echo $f4; ?></td>
										<td><?php echo $f5; ?></td>
										<td><?php echo $f6; ?></td>
										<td><?php echo $f7; ?></td>
										<td><?php echo $f8; ?></td>
										<td><?php echo $f9; ?></td>
										<td><?php echo $f10; ?></td>
										<td><?php echo $f11; ?></td>
										<?php
										$i++;
								}
						}
						if ($_POST[SMID] == "2") {
							?>
									<table id="itable" width="1100" border="1">
										<tr align="center">
											<td height="50">SReg</td>
											<td>HSS_103</td>
											<td>PHY_103</td>
											<td>MTH_103</td>
											<td>CSE_103</td>
											<td>CSE_105</td>
											<td>ECE_101</td>
											<td>CSE_104</td>
											<td>ECE_102</td>
										</tr>
										<?php
										$strquery = "SELECT SReg, SUM(mark1) AS HSS_103, SUM(mark2) AS PHY_103, SUM(mark3) MTH_103, SUM(mark4) AS CSE_103, SUM(mark5) AS CSE_105, SUM(mark6) AS ECE_101, SUM(mark7) AS CSE_104, SUM(mark8) AS ECE_102
FROM
(
SELECT SID, mark mark1, 0 mark2, 0 mark3, 0 mark4, 0 mark5, 0 mark6, 0 mark7, 0 mark8 FROM m_info WHERE CID=9
UNION ALL
SELECT SID, 0 mark1, mark mark2, 0 mark3, 0 mark4, 0 mark5, 0 mark6, 0 mark7, 0 mark8 FROM m_info WHERE CID=10
UNION ALL
SELECT SID, 0 mark1, 0 mark2, mark mark3, 0 mark4, 0 mark5, 0 mark6, 0 mark7, 0 mark8 FROM m_info WHERE CID=11
UNION ALL
SELECT SID, 0 mark1, 0 mark2, 0 mark3, mark mark4, 0 mark5, 0 mark6, 0 mark7, 0 mark8 FROM m_info WHERE CID=12
UNION ALL
SELECT SID, 0 mark1, 0 mark2, 0 mark3, 0 mark4, mark mark5, 0 mark6, 0 mark7, 0 mark8 FROM m_info WHERE CID=13
UNION ALL
SELECT SID, 0 mark1, 0 mark2, 0 mark3, 0 mark4, 0 mark5, mark mark6, 0 mark7, 0 mark8 FROM m_info WHERE CID=14
UNION ALL
SELECT SID, 0 mark1, 0 mark2, 0 mark3, 0 mark4, 0 mark5, 0 mark6, mark mark7, 0 mark8 FROM m_info WHERE CID=15
UNION ALL
SELECT SID, 0 mark1, 0 mark2, 0 mark3, 0 mark4, 0 mark5, 0 mark6, 0 mark7, mark mark8 FROM m_info WHERE CID=16
) A
INNER JOIN s_info
ON
A.SID=s_info.SID
GROUP BY SReg";
										$results = mysql_query($strquery);
										$num = mysql_numrows($results);
										$i = 0;
										while ($i < $num) {
											$f1 = mysql_result($results, $i, "SReg");
											$f2 = mysql_result($results, $i, "HSS_103");
											$f3 = mysql_result($results, $i, "PHY_103");
											$f4 = mysql_result($results, $i, "MTH_103");
											$f5 = mysql_result($results, $i, "CSE_103");
											$f6 = mysql_result($results, $i, "CSE_105");
											$f7 = mysql_result($results, $i, "ECE_101");
											$f8 = mysql_result($results, $i, "CSE_104");
											$f9 = mysql_result($results, $i, "ECE_102");
											?>
											<tr align="center">
												<td height="40"><?php echo $f1; ?></td>
												<td><?php echo $f2; ?></td>
												<td><?php echo $f3; ?></td>
												<td><?php echo $f4; ?></td>
												<td><?php echo $f5; ?></td>
												<td><?php echo $f6; ?></td>
												<td><?php echo $f7; ?></td>
												<td><?php echo $f8; ?></td>
												<td><?php echo $f9; ?></td>
												<?php
												$i++;
										}
						}
						?>
					</form>
				</div>
			</div>
			<div class="footer">
				<div class="FooterText">
					<a href="http://www.emtiaj.blogspot.com" target="_blank">copyright @ www.emtiaj.blogspot.com</a> |||||
					<a href="http://uap-bd.edu/cse/index.html" target="_blank">copyright @ CSE Department, UAP</a> <br>
				</div>
			</div>
	</body>

	</html>
	<?php
} ?>