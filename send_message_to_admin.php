<?php
 session_start(); ?>
<?php
$b=$_SESSION['username'];

$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
//echo $userdata['admin'];
//echo $userdata['SID'];




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





<div class="realbody" style="min-height:1850">
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
		<div style="text-decoration:none;font-size:24px; color:#FFFFFF; font-weight:bold"><span>You are Logged in as  <?php print $_SESSION['username']?></span></div>
				
		<br>
		<a href="Log_out.php" style="text-decoration:none;font-size:24px; font-weight:bold"><span>Log out</span></a>
		
		<br>
		<br>
		<div>
						<form>
						<input type="text" size="34" placeholder="Search for any page" onKeyUp="showResult(this.value)">
						<div id="livesearch"></div>
						</form>
					</div>			
					<br>
					<br>
		<div id="paragraph_head">
			<h3  align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif; padding:5px 5px; ">Academic Aspects</h3>
		</div>
			<ul class="bottom">
				<li><a href="Employee_List.php">Teachers</a></li>
				<li><a href="Student_List.php">Students</a></li>
				<li><a href="Course_List.php">Courses</a></li>
				<li><a href="Mark_List.php">Results</a></li>
				<li><a href="Reference_List_All.php">References</a></li>
				
			</ul>
		</div>
		
		<br>
		<br>
		
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
	
		<br>
		<br>
		
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
					if (($userdata[admin] == '1')) {
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
					if (($userdata[admin] == '1')) {
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
	
		<br>
		<br>
		
		<div id="paragraph_head">
			<h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Find Us on</h3>
		</div>
		<br>
		<div id="Social_Links" style="display:inline">
			<ul>
			<a href="https://www.facebook.com/pages/Student-Management-Tool/1452237808341753" target="_blank"><li><img src="images/FB_Icon.png" style="height:72; width:72"/></a>
			<a href="https://twitter.com/ILiton" target="_blank"><li><img src="images/Twitter_Icon.png" style="height:75; width:75"/></a>
			<a href="https://plus.google.com/u/0/" target="_blank"><li><img src="images/Google_Icon2.png" style="height:70; width:70"/></a>
			</ul>
		</div>
	</div>


<form action="Message_Save.php" method="post">
<div>

    <br />


<input value="<?php echo $userdata['SID'];?>" name="SID" type="hidden"/>
<br>
<br>

<div style="font-weight:bold; color:#FFFFFF;">Subject:</div>
<input type="text" name="Subject"/>



<br>
<br>

<div style="font-weight:bold; color:#FFFFFF;">Message:</div>

<textarea name="Message" cols="80" rows="15">
Type your message here...
</textarea><br>

</div>
<br><br>
<div align="right" style="padding-right:165px">
<input type="Submit"/>
</div>
</form>






	

	

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