<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
?>
<?php
$b = $_SESSION['username'];
//$c=$_SESSION['userid'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
//echo $userdata['admin'];
if (empty($_SESSION['username'])) {
	?>
	<script language="JavaScript">
		window.location = "index.php";
	<?php } else { ?>
			< html >
			<head>
				<title>A Stack of Uapians</title>
				<link rel="shortcut icon" href="images/tiittleimage.ico" />
				<meta name="title" content="Uapians.Net" />
				<meta name="description" content="An Exclusive Website only for Uapians..." />
				<link rel="image_src" href="http://www.uapians.net/images/tittleimage.png" />
				<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/thickbox.js"></script>
	<link rel="stylesheet" href="assets/css/thickbox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="assets/engine1/style.css" />
	<script type="text/javascript" src="assets/engine1/jquery.js"></script>
	<meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style_new.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="script.js"></script>
	<script>
					function showResult(str)
					{
	if (str.length==0)
					{
						document.getElementById("livesearch").innerHTML = "";
					document.getElementById("livesearch").style.border="0px";
					return;
	  }
					if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
	  }
					else
					{// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  }
					xmlhttp.onreadystatechange=function()
					{
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
					document.getElementById("livesearch").style.border="1px solid #A5ACB2";
		}
	  }
					xmlhttp.open("GET","livesearch.php?q="+str,true);
					xmlhttp.send();
	}
	</script>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
					fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	</head>

	<body>
		<div id="grad1">
			<div class="bodydiv">
				<div id="logo" align="left">
					<h1><a href="Home.php">Student Management Tool </a></h1>
					<p>A Software for Managing CSE Department</p>
				</div>
				<div class="realbody">
					<?php include ("menu.php");
					$strquery = "SELECT *,SMName,Blood_Group_Name FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID 
INNER JOIN
blood_group_info
ON
s_info.Blood_Group_ID=blood_group_info.Blood_Group_ID WHERE SID='58'";
					$results = mysql_query($strquery);
					$num = mysql_numrows($results);
					$Portrait = mysql_result($results, $i, "SPortrait");
					$Semester = mysql_result($results, $i, "SMName");
					$Name = mysql_result($results, $i, "SName");
					$Reg = mysql_result($results, $i, "SReg");
					$Age = mysql_result($results, $i, "SAge");
					$Blood_Group = mysql_result($results, $i, "Blood_Group_Name");
					$School = mysql_result($results, $i, "School");
					$College = mysql_result($results, $i, "College");
					$Knows_Programs = mysql_result($results, $i, "Knows_Programs");
					$Interested_In = mysql_result($results, $i, "Interested_In");
					$Working_At = mysql_result($results, $i, "Working_At");
					$House = mysql_result($results, $i, "SHouse");
					$Home_City = mysql_result($results, $i, "SHome_City");
					$Phone_Number = mysql_result($results, $i, "SPh_Number");
					$SE_Mail = mysql_result($results, $i, "SE_Mail");
					$FB_Link = mysql_result($results, $i, "FB_Link");
					$Twitter_Link = mysql_result($results, $i, "Twitter_Link");
					$Blog = mysql_result($results, $i, "Blog");
					$Noted_Activity = mysql_result($results, $i, "Noted_Activity");
					?>
					<div id="margin_figure_profile">
						<img style="width:200px;padding:10px;border:5px solid white;margin:0px; font-size:18px"
							src="<?php echo $Portrait; ?>" alt="Smiley face" width="200" height="220" align="right">
						<p style="font:Arial, Helvetica, sans-serif; font-size:54px; color:#FFFFFF"><?php echo $Name; ?>
						</P>
						<p style="padding-top:1px; color:#FFFFFF; font-size:16px">Registration No: <?php echo $Reg; ?></P>
						<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Semester: <?php echo $Semester; ?></P>
						<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Noted
							Activity:<?php echo $Noted_Activity; ?></P>
						<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Age:<?php echo $Age; ?></P>
						<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Blood Group: <?php echo $Blood_Group; ?>
						</P>
						<p style="padding-top:10px; color:#FFFFFF; font-size:16px">House: <?php echo $House; ?></P>
						<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Home City: <?php echo $Home_City; ?></P>
						<p style="padding-top:10px; color:#FFFFFF; font-size:16px">School:<br></p>
						<div>
							<p style="width:500px;padding:10px;border:2px solid white;margin:0px; font-size:18px">
								<?php echo $School; ?></P>
						</div>
						<p style="padding-top:10px; color:#FFFFFF" ;>College:<br></p>
						<div>
							<p style="width:500px;padding:10px;border:2px solid white;margin:0px; font-size:18px">
								<?php echo $College; ?></P>
						</div>
						<p style="padding-top:10px; color:#FFFFFF" ;>Knows the Programs:<br></p>
						<div>
							<p style="width:500px;padding:10px;border:2px solid white;margin:0px; font-size:18px">
								<?php echo $Knows_Programs; ?></P>
						</div>.
						<p style="padding-top:10px; color:#FFFFFF" ;>Interested In:<br></p>
						<div>
							<p style="width:500px;padding:10px;border:2px solid white;margin:0px; font-size:18px">
								<?php echo $Interested_In; ?></P>
						</div>.
						<p style="padding-top:10px; color:#FFFFFF" ;>Now Working At:<br></p>
						<div>
							<p style="width:500px;padding:10px;border:2px solid white;margin:0px; font-size:18px">
								<?php echo $Working_At; ?></P>
						</div>.
						<p style="padding-top:10px; color:#FFFFFF" ;>Contact: <br></p>
						<div style=" padding-bottom:75px;">
							<p style="width:500px;padding:10px;border:2px solid white;margin:0px; font-size:18px;">
								Phone Number: <?php echo $Phone_Number; ?> <br>
								E_Mail: <?php echo $SE_Mail; ?> <br>
								Facebook Link: <?php echo $FB_Link; ?> <br>
								Twitter: <?php echo $Twitter_Link; ?> <br>
								Blog: <?php echo $Blog; ?> <br>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<div class="FooterText">
					<a href="http://www.emtiaj.blogspot.com" target="_blank">copyright @ www.emtiaj.blogspot.com</a> |||||
					<a href="http://uap-bd.edu/cse/index.html" target="_blank">copyright @ CSE Department, UAP</a> <br>
					<div class="fb-like" data-href="https://www.facebook.com/pages/UAPIANSNet/1452237808341753"
						data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
				</div>
			</div>
	</body>

	</html>
	<?php
} ?>