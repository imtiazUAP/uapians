<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
?>
<?php
$b = $_SESSION['username'];
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
				<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/thickbox.js"></script>
	<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
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
					<h1><a href="Home.php">UAPians.Net </a></h1>
					<p>A Stack of Uap Students ...UNOFFICIAL...</p>
				</div>
				<div class="realbody">
					<?php include ("menu.php");
					$strquery = "SELECT * from e_info INNER JOIN userinfo ON e_info.SID=userinfo.SID WHERE username='{$b}'";
					$results = mysql_query($strquery);
					$num = mysql_numrows($results);
					$Employee_Name = mysql_result($results, $i, "EName");
					$Employee_Designation = mysql_result($results, $i, "EDesignation");
					$Employee_Contact = mysql_result($results, $i, "Employee_Contact");
					$Employee_Speech = mysql_result($results, $i, "Employee_Speech");
					$Employee_Qualification = mysql_result($results, $i, "Employee_Qualification");
					$Employee_Experience = mysql_result($results, $i, "Employee_Experience");
					$Employee_Role = mysql_result($results, $i, "Employee_Role");
					$Employee_Portrait = mysql_result($results, $i, "Employee_Portrait");
					?>
					<div id="margin_figure_profile">
						<div align="center" style="padding-top:30px">
							<img style="width:150px;padding:10px;border:5px solid white;margin:0px; font-size:18px"
								src="<?php echo $Employee_Portrait; ?>" />
						</div>
						<p align="center" style="font:Arial, Helvetica, sans-serif; font-size:40px; color:#FFFFFF">
							<?php echo $Employee_Name; ?></P>
						<p align="center" style="padding-top:1px; color:#FFFFFF; font-size:18px">
							<?php echo $Employee_Designation; ?></P>
						<p align="center" style="padding-top:10px; color:#FFFFFF; font-size:16px">
							<?php echo $Employee_Contact; ?></P>
						<p style="padding-top:10px; color:#FFFFFF; font-size:18px">Speech for the Students:<br></p>
						<div>
							<p style="width:900px;padding:10px;border:2px solid white;margin:0px; font-size:14px">
								<?php echo $Employee_Speech; ?></P>
						</div>.
						<p style="padding-top:10px; color:#FFFFFF; font-size:18px">Academic Qualification:<br></p>
						<div>
							<p style="width:900px;padding:10px;border:2px solid white;margin:0px; font-size:14px">
								<?php echo $Employee_Qualification; ?></P>
						</div>
						<p style="padding-top:10px; color:#FFFFFF; font-size:18px">Teaching Experience:<br></p>
						<div>
							<p style="width:900px;padding:10px;border:2px solid white;margin:0px; font-size:14px">
								<?php echo $Employee_Experience; ?></P>
						</div>.
						<p style="padding-top:10px; color:#FFFFFF; font-size:18px">Playing Role in UAP:<br></p>
						<div style="padding-bottom:75px">
							<p style="width:900px;padding:10px;border:2px solid white;margin:0px; font-size:14px">
								<?php echo $Employee_Role; ?></P>
						</div>.
					</div>
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