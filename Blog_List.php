<?php
session_start();
error_reporting(1);
include('dbconnect.php');
include_once("page.inc2.php");
?>
<?php
$b=$_SESSION['username'];
//$c=$_SESSION['userid'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
//echo $userdata['admin'];
if (empty($_SESSION['username'])) {
    ?>
    <script language="JavaScript">
        window.location="index.php";
    </script><?php } else { ?>
<html>
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
   <link rel="stylesheet" href="assets/css/main_menu_style.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
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
<div id="background_canvas">
<div class="body_wrapper">
<div id="logo" align="left">
	<h1><a href="Home.php">UAPians.Net  </a></h1>
	<p>A Stack of Uap Students    ...UNOFFICIAL...</p>
<div class="content_wrapper" style="min-height:2100px">
<?php include("menu.php"); ?>
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
						<input type="text" size="29" placeholder="Search for any page" onKeyUp="showResult(this.value)">
						<div id="livesearch"></div>
						</form>
					</div>			
					<br>
					<div style="font-weight:bold; font-size:16px"><ul><li><a href="send_message_to_your_friend.php">Send a Message...</a></li></ul></div>
			<br>		
		<div id="section_head">
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
		<div id="section_head">
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
		<div id="section_head">
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
		<div id="section_head">
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
	</div>
<div id="margin_figure">
					<div  id="new_blog_button"><a href="Blog_Insert.php"> আপনি একটি ব্লগ লিখুন</a></div>
<br>
<br>
<br>
<br>
<br>
<br>
<div>
<?php
$strquery="SELECT DISTINCT blog.blog, blog.SID, blog.Date, Blog_ID, SName, SReg, SPortrait, SMName FROM blog INNER JOIN s_info ON blog.SID=s_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMID ORDER BY Blog_ID desc";
$results=mysql_query($strquery);
$num=mysql_numrows($results);
$i=0;
while ($i< $num)
{
$Blog=mysql_result($results,$i,"Blog");
$SID=mysql_result($results,$i,"SID");
$Date=mysql_result($results,$i,"Date");
$Blog_ID=mysql_result($results,$i,"Blog_ID");
$SName=mysql_result($results,$i,"SName");
$SPortrait=mysql_result($results,$i,"SPortrait");
$SMName=mysql_result($results,$i,"SMName");
?>
<div style="padding-bottom:100px; padding-right:50px; color:#FFFFFF">
	<img style="width:60px;padding:2px;border:2px solid white;margin:0px; font-size:18px"src="<?php echo $SPortrait; ?>" alt="Smiley face"
	width="50" height="60" align="right">
<div style="padding:10px; font-weight:bold"><?php echo $SName ; ?> </div>
<div style="padding-left:10px"><?php echo $SMName ; ?></div>
<div style="width:500px;padding:10px;margin:0px; font-size:11px"><?php echo $Date; ?></div>
<div><p style="font-size:14px; font-weight:bold">Article:</p></div>
<div style="width:700px;padding:10px;border:1px solid white;margin:0px; font-size:16px"><?php echo $Blog ; ?></div>
<div id="detail_blog" ><?php echo " <a href='Single_Blog_List.php? Blog_ID=".$Blog_ID."'> বিস্তারির দেখুন </a>"?></div>
					<?php 
					if (($userdata['admin'] == '1')) {
					?>
<div align="right"><?php echo " <a href='Blog_Edit.php?Blog_ID=" . $Blog_ID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - ".$Blog_ID."'> Edit This Article </a> "; ?> | <?php echo " <a href='Blog_Delete.php?Blog_ID=" . $Blog_ID . "'> Delete This Article </a> "; ?></div>
					<?php
					}
	 				?>
		<?php 
		if (($userdata['SID'] == $SID)) {
		?>
<div align="right"><?php echo " <a href='Blog_Edit.php?Blog_ID=" . $Blog_ID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - ".$Blog_ID."'> Edit This Article </a> "; ?> | <?php echo " <a href='Blog_Delete.php?Blog_ID=" . $Blog_ID . "'> Delete This Article </a> "; ?></div>
		<?php
	 	}
	 	?>
</div>
<?php
  $i++;
  }
  ?>
</div>
</div>		
</div>
</div>
		<div class="footer">
		<div class="FooterText">
 		<a href="http://www.emtiaj.blogspot.com" target="_blank">copyright @ www.emtiaj.blogspot.com</a>   |||||
		<a href="http://uap-bd.edu/cse/index.html" target="_blank">copyright @ CSE Department, UAP</a> <br>
<div class="fb-like" data-href="https://www.facebook.com/pages/UAPIANSNet/1452237808341753" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
		</div>			 
		</div>
</body>
</html>
    <?php
}?>
