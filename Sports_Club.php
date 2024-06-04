<?php
 session_start(); ?>
<?php
if (empty($_SESSION['username'])) {
    ?>
    <script language="JavaScript">
        window.location="index.php";
    </script><?php } else { ?>



<html>
<head>
<title>Home | Student Management Tool</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/thickbox.js"></script>
	<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">	
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Slider, WOW Slider, HTML5 Slideshow Maker, Picture Slideshow HTML" />
	<meta name="description" content="Slider created with WOW Slider, a free wizard program that helps you easily generate beautiful web slideshow" />
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	
	
	
<script>
function showResult(str)
{
if (str.length==0)
  { 
  document.getElementById("livesearch").innerHTML="";
  document.getElementById("livesearch").style.border="0px";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
xmlhttp.open("GET","livesearch.php?q="+str,true);
xmlhttp.send();
}
</script>

</head>

<body>
<div id="grad1">
<div class="bodydiv">

<div id="logo" align="left">

	<h1><a href="Home.php">UAPians.Net  </a></h1>
	<p>A Stack of Uap Students    ...UNOFFICIAL...</p>


<div align="right">
	<font color="#000000">You have visted this page
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	var cookiec = document.cookie
	if (cookiec != "") {
		var eqchr = 0;
		for (var cloop = 1; cloop <= cookiec.length; cloop++) {
			if (cookiec.charAt(cloop) == "=") {
				eqchr=(++cloop);
			}
		}
		var cookiess = 0;
		clength=cookiec.length;
		cookies="";
		for (cloop = eqchr; cloop < clength; cloop++) {
			if (cookiec==";") {
				cloop=clength;
			}
			else {
				cookies = cookies + cookiec.charAt(cloop);			
			}
		}
		cookiess = parseInt(cookies);
		document.write("[" + cookiess + "]");
		cookiess++;
		cookies = cookiess;
		var one_week = 7 * 24 * 60 * 60 * 1000;
		var expDate = new Date();
		expDate.setTime(expDate.getTime() + one_week);
		document.cookie = "Counter=" + escape(cookies) + "; expires=" + expDate.toGMTString();
		}	
		else{
			var one_week = 7 * 24 * 60 * 60 * 1000;
			var expDate = new Date();
			expDate.setTime(expDate.getTime() + one_week);
 			document.cookie = "Counter=2; expires=" + expDate.toGMTString();
			document.write("[1]");
			}
	
			// -->
			</SCRIPT>
			times.

		

				</div>


<div class="realbody" >

	<?php

//$connect=mysql_connect("localhost","root","");
//$select_db=mysql_select_db("mylab");

$strquery="SELECT SPortrait,username FROM s_info INNER JOIN userinfo ON s_info.SID=userinfo.SID WHERE username='{$b}'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);


$SPortrait=mysql_result($results,$i,"SPortrait");
$username=mysql_result($results,$i,"username");
?>

	<div id='cssmenu' align="center" style="vertical-align:middle">
	<ul>
			<li style="vertical-align:middle;"><a href='My_Profile.php'><span><img style="width:15px; height:15px; border:1px solid white; vertical-align:middle"src="<?php echo $SPortrait; ?>" alt="Profile Picture"><span> Profile</span></a></li>
			
   		<li><a href='Home.php'><span>Home</span></a></li>
		
		

		
			
   		<li><a href='Student_List.php'><span>Students</span></a></li>

		<li><a href='Employee_List.php'><span>Employees</span></a></li>
   		<li><a href='Blog_List.php'><span>CSE Blog</span></a></li>   


		
   		<li><a href='Blood_List.php'><span>Blood</span></a></li>
		<li><a href='About.php'><span>About</span></a></li>
				
	</ul>



	</div>
	
	
	
	
	<div id="content">
	<div id="colOne">
	
		<div class="box">
		
					
		<br>
		<br>
		<a href="index.php" style="text-decoration:none;font-size:24px; font-weight:bold"><span>Logout</span></a>
		
		
		<div>
						<form>
						<input type="text" size="29" placeholder="Search for any page" onKeyUp="showResult(this.value)">
						<div id="livesearch"></div>
						</form>
					</div>			
					<br>
		<div id="paragraph_head">
			<h3  align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Academic Aspects</h3>
			</div>
			<ul class="bottom">
				<li><a href="Employee_List.php">Teachers</a></li>
				<li><a href="Student_List.php">Students</a></li>
				<li><a href="Course_List.php">Courses</a></li>
				<li><a href="Mark_List.php">Results</a></li>
				<li><a href="Reference_List_All.php">References</a></li>
				
			</ul>
		</div>
		
		<div class="box">
		<div id="paragraph_head">
			<h3  align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Clubs & Social Works</h3>
			</div>.
			<ul class="bottom">
				<li><a href="galary.php">Gallery</a></li>
				<li><a href="Blood_List_All.php">Blood Bank</a></li>
				<li><a href="Programing_Contest_Club.php">Programming Contest Club</a></li>
				<li><a href="Research_Publication_Club.php">Research and Publication Club</a></li>
				<li><a href="Sports_Club.php">Sports Club</a></li>
				<li><a href="Software_Hardware_Club.php">Software and Hardware Club</a></li>
				<li><a href="Cultural_Debating_Club.php">Cultural and Debating Club</a></li>
				<li><a href="Web_Club.php">Web Club</a></li>
			</ul>
		</div>
	<div class="box">
		<div id="paragraph_head">
			<h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Admin Panel</h3>
		</div>
				<ul>
				<a href="Admin_Sayem.php"><li><img src="images/1962727_694969320562722_1717298201_n.jpg" style="height:100"/>  Sayem Hossain</li></a>
				<p class="bottom">Sayem Hossain, University of Asia Pacific
			Phone:+8801xxxxxxxxx
			E_Mail:sayem@ekushay.com
			Website:www.ekushay.com </p>
			<li><a href="send_message_to_admin.php">Send him a Message</a></li>
			
														<?php 
					if (($userdata['admin'] == '1')) {
					?>
			
			


					<li><a href="Message_List_for_Admin.php"> My Messages</a></li>
					<?php
					}
	 				?>
				
				<br>
				
				<a href="Admin_Taqi.php"><li><img src="images/image-Copy.jpg" style="height:100"/>  Taqi Tahmid Tanzil</li></a>
				
				<p class="bottom">Taqi Tahmid, University of Asia Pacific
			Phone:+8801937970970
			E_Mail:t.t.tanzil@facebook.com
			Website:www.facebook.com/t.t.tanzil  </p>
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
	</div>

	









	
<div id="margin_figure">

	
	<div>
	<div id="paragraph_head">
	<h1 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Sports Club</h1>
	</div>
	<p align="left" style="font-size:16; font-weight:bold"> Welcome to CSE Sports Club...</p>
	<p align="left">To promote and develop individual interests in various sports and recreational activities.
In addition to the development of specific skills, Sport Clubs are designed to be a learning experience for their members and, through involvement in leadership, responsibility, decision-making, public relations, organization, and fiscal management.
Uphold the name and fame of the CSE department as well as UAP by promoting the excellence of the students in different sports competitions.
Develop the skills of the students in teamwork, critical thinking, quick decision-making and prompt logical response to arguments.
</p>
    </div>
	<br>
<br>
	
	<div>
		<div id="paragraph_head">
	<h1 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ; text-decoration:blink">Activities:............</h1>
	</div>
<p>
The Club will arrange at least one intradepartmental sports competition in an academic year on regular basis.
<br>
This club will select the participants from the CSE department for UAP Sports Competitions or any Sports event outside the university.
<br>
For outdoor games the Club will manage a sports field on part-time basis. Say, 3 days per week starting from 2pm.
<br>
The Club can manage some sort of training for both indoor and outdoor games.</p>
</div>
<br>
<br>	
	
	
	
	<div id="paragraph_head">
	<h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Notice!</h1>
	</div>
	<div id="notice_board">
	<p style="padding-left:60px; padding-right:55px; color:#66CC33;font-size:16px; font-weight:bold; "><br><br><br><br><br>All Classes of University of Asia Pacific will Reswume on Thursday!!!......... All the Students are requested to attend the Class.<br> <br>Thank You<br>

	</p>
	</div>
	
	<div>
	<div id="paragraph_head">
	<h1 align="left" style="color:#FFFFFF">Mission...</h1>
	</div>
	<p align="left" style="font-size:16; font-weight:bold">
	</p>
	<p align="left">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</p>
    </div>
<br>
<br>
	
	<div>
	<div id="paragraph_head">
	<h1 align="left" style="color:#FFFFFF">About!</h1>
	</div>
	<p align="left" style="font-size:16; font-weight:bold">
	</p>
	
	<p align="left"><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br></p>
    </div>
	

</div>		

</div>
</div>
		<div class="footer">
		<div class="FooterText">
 		<a href="http://www.emtiaj.blogspot.com" target="_blank">copyright @ www.emtiaj.blogspot.com</a>   |||||
		<a href="http://uap-bd.edu/cse/index.html" target="_blank">copyright @ CSE Department, UAP</a> <br>
		</div>			 
		</div>
 
</body>
</html>
    <?php
}?>