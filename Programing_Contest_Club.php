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
	</div>

	









	
<div id="margin_figure">

	
	<div>
	<div id="paragraph_head">
	<h1 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Programming Contest Club</h1>
	</div>
	<p align="left" style="font-size:16; font-weight:bold">Welcome to CSE Programming contest Club....</p>
	<p align="left">In the recent years ACM International Collegiate Programming Contest (ICPC) has achieved immense importance in the computer science arena. Bangladesh has also become successful to put its footmark in the same. BUET has been attending in the world finals consecutively six times since 1998 by becoming champions in the international regional contests. In this connection it could be added that universities from almost every Asian countries participate in these hard-fought regional contests to qualify for the world final.
The goal of this club is to develop students of UAP to participate in different national and regional contests and arrange programming contests of both national and international level in the UAP campus. 
</p>
    </div>
	<br>
        <br>
	
	<div>
		<div id="paragraph_head">
	<h1 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ; text-decoration:blink">News Feed............</h1>
	</div>
<marquee behavior="scroll" direction="up" onMouseOver="this.stop();" onMouseOut="this.start();" align="middle"; style="color:#0099FF; font-size:18px; height:300">

<a href='http://devfest.ydesh.com/' style="text-decoration:none; color:#FFFFFF"><span>DevFest The Coolest Developer Conference 30-31 August 2013</span></a><br> <br>
<a href='Link: http://www.eventbrite.com/event/10239078359' style="text-decoration:none; color:#FFFF00;font-size:22px;"><span>It's Raining Opportunities ! Google Developer Group Bangladesh</span></a><br> <br>
<a href='http://www.ictd.gov.bd/bangla/' style="text-decoration:none; color:#99FF99">Newsletter from National Mobile Application Development</span></a><br> <br>
<a href='http://uap-bd.edu/notice/suspended-25-02-2014.html' style="text-decoration:none; color:#FF33CC;font-size:30px;"><span>All classes of UAP will be suspended on 25  February</span></a><br> <br>
<a href='http://www.uap-bd.edu/'  style="text-decoration:none; color:#FFFF33"><span>Convocation of University of Asia Pacific will be live streamed </span></a><br> <br>
<a href='http://www.scholars4dev.com/8054/univeristy-west-england-scholarships-for-international-students/' style="text-decoration:none; color:#FFFFFF"><span>A Big Scholarship Opportunity for All Bangladeshi Students</span></a><br> <br>
<a href='http://devfest.ydesh.com/' style="text-decoration:none; color:#FFFF00""><span>DevFest The Coolest Developer Conference 30-31 August 2013</span></a><br> <br>
<a href='http://devfest.ydesh.com/' style="text-decoration:none; color:#FF33CC;font-size:25px;"><span>DevFest The Coolest Developer Conference 30-31 August 2013</span></a><br> <br>
<a href='Link: http://www.eventbrite.com/event/10239078359' style="text-decoration:none"><span>It's Raining Opportunities ! Google Developer Group Bangladesh</span></a><br> <br>
<a href='http://www.ictd.gov.bd/bangla/' target="iframe" style="text-decoration:none; color:#99FF99;font-size:20px;"><span>Newsletter from National Mobile Application Development</span></a><br> <br>
<a href='http://uap-bd.edu/notice/suspended-25-02-2014.html' target="iframe" style="text-decoration:none; color:#FFFF00"><span>All classes of UAP will be suspended on 25  February</span></a><br> <br>
<a href='http://www.uap-bd.edu/' target="iframe" style="text-decoration:none; color:#99FF99"><span>Convocation of University of Asia Pacific will be live streamed </span></a><br> <br>
<a href='http://www.scholars4dev.com/8054/univeristy-west-england-scholarships-for-international-students/' style="text-decoration:none; color:#FF33CC"><span>A Big Scholarship Opportunity for All Bangladeshi Students</span></a><br> <br>
<a href='http://devfest.ydesh.com/' style="text-decoration:none; color:#99FF99"><span>DevFest The Coolest Developer Conference 30-31 August 2013</span></a><br> <br>
<a href='Link: http://www.eventbrite.com/event/10239078359' style="text-decoration:none; color:#FFFF00;font-size:25px"><span>It's Raining Opportunities ! Google Developer Group Bangladesh</span></a><br> <br>
<a href='http://www.ictd.gov.bd/bangla/' target="iframe" style="text-decoration:none"><span>Newsletter from National Mobile Application Development</span></a><br> <br>
<a href='http://uap-bd.edu/notice/suspended-25-02-2014.html' target="iframe" style="text-decoration:none; color:#99FF99;font-size:25px"><span>All classes of UAP will be suspended on 25  February</span></a><br> <br>
<a href='http://www.uap-bd.edu/' target="iframe" style="text-decoration:none; color:#FF33CC";font-size:25px;><span>Convocation of University of Asia Pacific will be live streamed </span></a><br> <br>
<a href='http://www.scholars4dev.com/8054/univeristy-west-england-scholarships-for-international-students/' style="text-decoration:none; color:#FFFF00;font-size:25px"><span>A Big Scholarship Opportunity for All Bangladeshi Students</span></a><br> <br>
<a href='https://docs.google.com/file/d/0Bz_14UliIWzsT2U0a3BiMWM5VEE/edit' style="text-decoration:none; color:#FFFF00;font-size:25px"><span>Training on:: Excellence in Executive Communication</span></a><br> <br>


</marquee>
</div>
	<br>
        <br>
	
	
	

	
	<div>
	<div id="paragraph_head">
	<h1 align="left" style="color:#FFFFFF">Activities: </h1>
	</div>
	<p align="left" style="font-size:16; font-weight:bold">To achieve the goal, the club will undertake following activities...
	</p>
	<p align="left">
	Arrange regular coaching programs for students to motivate them for participating in the competition and also to enrich their problem solving capability.
        <br>
        Arrange intra-department progrmming Contest..
</p>
    </div>
	<br>
        <br>
	<br>
        <br>
	<br>
        <br>
	<div>
	<div id="paragraph_head">
	<h1 align="left" style="color:#FFFFFF">About!</h1>
	</div>
	<p align="left" style="font-size:16; font-weight:bold"> </p>
	<p align="left"></p>
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