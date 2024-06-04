<?php
session_start();
error_reporting(1);
include_once("page.inc.php");
include("dbconnect.php");
?>
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
   <link rel="stylesheet" href="css/style_new.css">
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


<div class="realbody">
<?php include("menu.php"); ?>
	
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
			<h3  align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Admin Controls</h3>
			</div>
<ul class="bottom">
						<?php 
					if (($userdata[admin] == '1')) {
					?>
					
<li><a href='php_sendmail_upload1.php'>Send Email</a></li>
<li><a href='Admin_Control.php'>Students Signup Confirmation </a></li>
					<?php
					}
	 				?>
</ul>
		</div>
		<br>
		<br>
		<div class="box">
		<div id="paragraph_head">
			<h3  align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Clubs & Social Works</h3>
			</div>
			<ul class="bottom">
						<?php 
					if (($userdata[admin] == '1')) {
					?>
					
<li><a href='php_sendmail_upload1.php'>Send Email</a></li>
					<?php
					}
	 				?>
<li><a href="upload_video_tutorial.php">Add Video Tutorial</a></li>
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
		
<div class="fb-like-box" data-href="https://www.facebook.com/pages/UAPIANSNet/1452237808341753?ref=hl" data-width="238" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>	
		
	</div>

	
<div>
<div style="padding-top:40">
<form>
					<?php 
					if (($userdata[admin] == '1')) {
					?>

<a href="Student_Insert.php?keepThis=true&TB_iframe=true&height=600&width=350&modal=true" title="New Student" class="thickbox">Create New Student</a>
					<?php
					}
	 				?>
	 				
	 				
	 				
	 				
	 				
		<table border="1" align="center" width="800" >
		<tr align="center">
		<td bgcolor="588C73" width="120"> Registration Number </td>
		<td bgcolor="588C73" width="200">Name of Student</td>
		<td bgcolor="588C73" width="100px"> Portrait </td>
		<td bgcolor="588C73" width="200"> Semester </td>
		

		
		<td bgcolor="#006699" width="100"> Admin|Panel </td>

		</tr>
		
		
<?php

                                    $strquery = "SELECT S.*, M.SMName FROM sign_up S, sm_info M WHERE S.SMID=M.SMID ORDER BY S.SReg";
                                    $results = mysql_query($strquery);
                                    $num = mysql_numrows($results);


                                    $SID = mysql_result($results, $i, "SID");
                                    $f2 = mysql_result($results, $i, "SName");
                                    $f3 = mysql_result($results, $i, "SReg");
                                    $f12 = mysql_result($results, $i, "SPortrait");
                                    $SMName = mysql_result($results, $i, "SMName");


                                    $sql = "SELECT S.*, M.SMName FROM sign_up S, sm_info M WHERE S.SMID=M.SMID ORDER BY S.SReg";
                                    $result = @mysql_query($sql);
                                    $total_records = @mysql_num_rows($result);
                                    $record_per_page = 13;
                                    $scroll = 4;
                                    $page = new Page(); ///creating new instance of Class Page
                                    $page->set_page_data($_SERVER['PHP_SELF'], $_GET["SMID"], $total_records, $record_per_page, $scroll, true, true, true);
                                    $result = @mysql_query($page->get_limit_query($sql));
                                    while ($data = mysql_fetch_assoc($result)) {
                                        ?>


                                        <table border="1" align="center" width="800" >
                                            <tr align="center">
                                                <td width="120"><?= $data['SReg'] ?></td>
                                                <td width="200"><?= $data['SName'] ?></td>
                                                <td width="100"><img src=<?= $data['SPortrait'] ?> echo  style="height:100px;" ></td>
                                                <td width="200"><?= $data['SMName'] ?></td>
                                                

 <?php

                                                if (($userdata[admin] == '1')) {
                                                    ?>
                                                


                                               
                                                    <td width="100">
                                                        <a href='Sign_Up_Review.php?SReg=<?= $data['SReg'] ?>&keepThis=true&TB_iframe=true&height=300&width=350&do=edit&modal=true' class='thickbox'> Review</a> | <a href='Sign_Up_Review_Delete.php?SReg=<?= $data['SReg'] ?>'> delete </a>
                                                    </td>
                                                    <?php
                                                }
                                                ?>

                                            </tr>
                                        </table>

                                        <?php
                                    }
                                    echo $page->get_page_nav();
                                    ?>
  
	</form>
	</div>
	</div>

	
	</div>
	
	
</div>





 
</body>
</html>
    <?php
}?>