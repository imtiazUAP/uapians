<?php
session_start();
error_reporting(0);
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





<div class="realbody">

	<?php

$strquery="SELECT SPortrait,username FROM s_info INNER JOIN userinfo ON s_info.SID=userinfo.SID WHERE username='{$b}'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);


$SPortrait=mysql_result($results,$i,"SPortrait");
$username=mysql_result($results,$i,"username");
?>

						<?php

$strquery="SELECT Employee_Portrait,username FROM e_info INNER JOIN userinfo ON e_info.SID=userinfo.SID WHERE username='{$b}'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);


$Employee_Portrait=mysql_result($results,$i,"Employee_Portrait");
$username=mysql_result($results,$i,"username");
?>



<div id='cssmenu_new'>
<ul>

						<?php 
					if ($userdata[admin] == '0') {
					?>
   <li><a href='My_Profile.php'><span><img style="width:13px; height:13px; border:1px solid white; vertical-align:middle"src="<?php echo $SPortrait; ?>" alt="Profile Picture"><span> &nbsp My Profile</span></a></li>
					<?php
					}
	 				?>
					
					
											<?php 
					if ($userdata[admin] == '1') {
					?>

<li><a href='Admin_Control.php'><span>Administration</span></a></li>
					<?php
					}
	 				?>
					
					
					
					
						<?php 
					if ($userdata[admin] == '4') {
					?>
		
   <li><a href='My_Profile_Teacher.php'><span><img style="width:13px; height:13px; border:1px solid white; vertical-align:middle"src="<?php echo $Employee_Portrait; ?>" alt="Profile Picture"><span> &nbsp My Profile</span></a></li>
					<?php
					}
	 				?>
					
											<?php 
					if ($userdata[admin] == '5') {
					?>
   <li><a href='My_Profile_Staff.php'><span><img style="width:13px; height:13px; border:1px solid white; vertical-align:middle"src="<?php echo $Employee_Portrait; ?>" alt="Profile Picture"><span> &nbsp My Profile</span></a></li>
					<?php
					}
	 				?>

   <li><a href='Home.php'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Students</span></a>
      <ul>
         <li class='has-sub'><a href='1st_Year_1st_Semester.php'><span>1st year 1st Semester</span></a>
         </li>
         <li class='has-sub'><a href='1st_Year_2nd_Semester.php'><span>1st year 2nd Semester</span></a>
         </li>
		          <li class='has-sub'><a href='2nd_Year_1st_Semester.php'><span>2nd year 1st Semester</span></a>
         </li>
		          <li class='has-sub'><a href='2nd_Year_2nd_Semester.php'><span>2nd year 2nd Semester</span></a>
         </li>
		          <li class='has-sub'><a href='3rd_Year_1st_Semester.php'><span>3rd year 1st Semester</span></a>
         </li>
		          <li class='has-sub'><a href='3rd_Year_2nd_Semester.php'><span>3rd year 2nd Semester</span></a>
         </li>
		          <li class='has-sub'><a href='4th_Year_1st_Semester.php'><span>4th year 1st Semester</span></a>
         </li>
		          </li>
		          <li class='has-sub'><a href='4th_Year_2nd_Semester.php'><span>4th year 2nd Semester</span></a>
         </li>
		 <li class='has-sub'><a href='ExStudents.php'><span>Ex Students of CSE</span></a>
         </li>
      </ul>
   </li>
      <li class='active has-sub'><a href='#'><span>Faculties & Staffs</span></a>
      <ul>
         <li class='has-sub'><a href='Faculty_List.php'><span>Faculty</span></a>
         </li>
         <li class='has-sub'><a href='Staff_List.php'><span>Staff</span></a>
         </li>

      </ul>
   </li>
   
   <li><a href='Course_List.php'><span>Courses & References</span></a></li>

   
   <li><a href='Blog_List.php'><span>CSE Blog</span></a></li>
   <li><a href='Blood_List.php'><span>Blood Bank</span></a></li>
   <li class='last'><a href='About.php'><span>About</span></a></li>
</ul>
</div>


	<div id='cssmenu' align="center" style="vertical-align:middle">
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
				<li><a href="1st_Year_1st_Semester.php">1st Year 1st Semester</a></li>
				<li><a href="1st_Year_2nd_Semester.php">1st Year 2nd Semester</a></li>
				<li><a href="2nd_Year_1st_Semester.php">2nd Year 1st Semester</a></li>
				<li><a href="2nd_Year_2nd_Semester.php">2nd Year 2nd Semester</a></li>
				<li><a href="3rd_Year_1st_Semester.php">3rd Year 1st Semester</a></li>
				<li><a href="3rd_Year_2nd_Semester.php">3rd Year 2nd Semester</a></li>
				<li><a href="4th_Year_1st_Semester.php">4th Year 1st Semester</a></li>
				<li><a href="4th_Year_2nd_Semester.php">4th Year 2nd Semester</a></li>
                                <li><a href="28th_batch.php">28th Batch</a></li>
				<li><a href="27th_batch.php">27th Batch</a></li>
				
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
			<ul>
			<a href="https://www.facebook.com/pages/Student-Management-Tool/1452237808341753" target="_blank"><li><img src="images/FB_Icon.png" style="height:72; width:72"/></a>
			<a href="https://twitter.com/ILiton" target="_blank"><li><img src="images/Twitter_Icon.png" style="height:75; width:75"/></a>
			<a href="https://plus.google.com/u/0/" target="_blank"><li><img src="images/Google_Icon2.png" style="height:70; width:70"/></a>
			</ul>		
		
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
	 				
	 				
	 				
	 				<?php 
					if (($userdata[admin] == '1')) {
					?>

<a href="Sign_Up_List.php">On Waiting Student</a>
					<?php
					}
	 				?>
	 				
	 				
		<table class="hoverTable" border="1" align="center" width="800" >
		<tr align="center">
		<td bgcolor="588C73" width="120"> Registration Number </td>
		<td bgcolor="588C73" width="200">Name of Student</td>
		<td bgcolor="588C73" width="100px"> Portrait </td>
		<td bgcolor="588C73" width="200"> Semester </td>
		

					<?php 
					if (($userdata[admin] == '1')) {
					?>
		<td bgcolor="#006699" > Results </td>
		<td bgcolor="#006699" width="100"> Admin|Panel </td>
					<?php
					}
	 				?>
		</tr>
		
		
<?php

                                    $strquery = "SELECT S.*, M.SMName FROM s_info S, sm_info M WHERE S.SMID=M.SMID ORDER BY S.SReg DESC";
                                    $results = mysql_query($strquery);
                                    $num = mysql_numrows($results);


                                    $SID = mysql_result($results, $i, "SID");
                                    $f2 = mysql_result($results, $i, "SName");
                                    $f3 = mysql_result($results, $i, "SReg");
                                    $f12 = mysql_result($results, $i, "SPortrait");
                                    $SMName = mysql_result($results, $i, "SMName");


                                    $sql = "SELECT S.*, M.SMName FROM s_info S, sm_info M WHERE S.SMID=M.SMID ORDER BY S.SReg DESC";
                                    $result = @mysql_query($sql);
                                    $total_records = @mysql_num_rows($result);
                                    $record_per_page = 13;
                                    $scroll = 4;
                                    $page = new Page(); ///creating new instance of Class Page
                                    $page->set_page_data($_SERVER['PHP_SELF'], $total_records, $record_per_page, $scroll, true, true, true);
                                    $result = @mysql_query($page->get_limit_query($sql));
                                    while ($data = mysql_fetch_assoc($result)) {
                                        ?>

					
                                            <tr align="center" class="tablerow">
                                                <td width="120"><?= $data['SReg'] ?></td>
                                                <td width="200"><a href='Profile_List.php? SID=<?= $data['SID'] ?>'><?= $data['SName'] ?></a></td>
                                                <td width="100"><a href='Profile_List.php? SID=<?= $data['SID'] ?>'><img src=<?= $data['SPortrait'] ?> echo  style="height:100px;" ></a></td>
                                                <td width="200"><?= $data['SMName'] ?></td>
                                               

 <?php
                                                if (($userdata[admin] == '1')) {
                                                    ?>
                                                <td > <a href='Single_Mark_List.php? SID=<?= $data['SID'] ?>'> Results </a></td>
                                               
                                                    <td width="100">
                                                        <a href='Student_Edit.php?SID=<?= $data['SID'] ?>&keepThis=true&TB_iframe=true&height=600&width=350&do=edit&modal=true' class='thickbox'> edit </a> | <a href='Student_Delete.php?SID=<?= $data['SID'] ?>'> delete </a>
                                                    </td>
                                                <?php
                                                }
                                                ?>

                                            </tr>
                                            
                                        <?php
                                        }
                                        ?>
                                        
					</table>
					
                                    <?php
                                    echo $page->get_page_nav();
                                    ?>
                                    
  
	</form>
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