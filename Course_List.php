<?php
 session_start();
 error_reporting(0);
 include('dbconnect.php'); ?>
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
	<h1><a href="Home.php">Uapians.Net  </a></h1>
	<p>A Stack of Uap Students    ...UNOFFICIAL...</p>
			</div>


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
<form>

					<?php 
					if (($userdata[admin] == '1')) {
					?>
<a href="Course_Insert.php?keepThis=true&TB_iframe=true&height=150&width=200&modal=true" title="New Course" class="thickbox">Create New Course</a>
					<?php
					}
	 				?>
	 				
	 <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
	<h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif;">1st year 1st semester</h1>
	</div>
	
<table class="hoverTable" width="1100" border="1" style="padding-bottom:40px;padding-left:40px;padding-right:40px">
<tr align="center">
<td width="50" height="50" bgcolor="588C73">Course Code</td>
<td width="150" bgcolor="588C73">Course Name</td>
<td width="150" bgcolor="588C73">References</td>
<td width="150" bgcolor="588C73">Semister</td>
</tr>



<?php



$strquery="SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='1'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)
{
$CID=mysql_result($results,$i,"CID");
$CCode=mysql_result($results,$i,"CCode");
$CName=mysql_result($results,$i,"CName");
$SMName=mysql_result($results,$i,"SMName");
?>
<tr align="center">
<td height="40"><?php echo $CCode ; ?></td>
<td><?php echo $CName ; ?></td>
<td ><?php echo " <a href='Reference_List.php? CCode=".$CCode."'>Reference Source</a>"?></td>
<td><?php echo $SMName ; ?></td>
					<?php 
					if (($userdata[admin] == '1')) {
					?>

<td><?php echo " <a href='Course_Edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - ".$CID."'> edit </a> "; ?> | <?php echo " <a href='Course_Delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
					<?php
					}
	 				?>
</tr>
<?php

  $i++;
  }
  ?>
  </table>
  
  
  	 <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
	<h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">1st year 2nd semester</h1>
	</div>
	
<table class="hoverTable"  width="1100" border="1" style="padding-bottom:40px;padding-left:40px;padding-right:40px">


<?php



$strquery="SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='2'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)
{
$CID=mysql_result($results,$i,"CID");
$CCode=mysql_result($results,$i,"CCode");
$CName=mysql_result($results,$i,"CName");
$SMName=mysql_result($results,$i,"SMName");
?>
<tr align="center">
<td height="40"><?php echo $CCode ; ?></td>
<td><?php echo $CName ; ?></td>
<td ><?php echo " <a href='Reference_List.php? CCode=".$CCode."'>Reference Source</a>"?></td>
<td><?php echo $SMName ; ?></td>
					<?php 
					if (($userdata[admin] == '1')) {
					?>

<td><?php echo " <a href='Course_Edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - ".$CID."'> edit </a> "; ?> | <?php echo " <a href='Course_Delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
					<?php
					}
	 				?>
</tr>
<?php

  $i++;
  }
  ?>
  </table>
  
    	 <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
	<h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">2nd year 1st semester</h1>
	</div>
	
<table class="hoverTable"  width="1100" border="1" style="padding-bottom:40px;padding-left:40px;padding-right:40px">

<?php



$strquery="SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='3'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)
{
$CID=mysql_result($results,$i,"CID");
$CCode=mysql_result($results,$i,"CCode");
$CName=mysql_result($results,$i,"CName");
$SMName=mysql_result($results,$i,"SMName");
?>
<tr align="center">
<td height="40"><?php echo $CCode ; ?></td>
<td><?php echo $CName ; ?></td>
<td ><?php echo " <a href='Reference_List.php? CCode=".$CCode."'>Reference Source</a>"?></td>
<td><?php echo $SMName ; ?></td>
					<?php 
					if (($userdata[admin] == '1')) {
					?>

<td><?php echo " <a href='Course_Edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - ".$CID."'> edit </a> "; ?> | <?php echo " <a href='Course_Delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
					<?php
					}
	 				?>
</tr>
<?php

  $i++;
  }
  ?>
  </table>
  
    	 <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
	<h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">2nd year 2nd semester</h1>
	</div>
	
<table class="hoverTable"  width="1100" border="1" style="padding-bottom:40px;padding-left:40px;padding-right:40px">


<?php



$strquery="SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='4'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)
{
$CID=mysql_result($results,$i,"CID");
$CCode=mysql_result($results,$i,"CCode");
$CName=mysql_result($results,$i,"CName");
$SMName=mysql_result($results,$i,"SMName");
?>
<tr align="center">
<td height="40"><?php echo $CCode ; ?></td>
<td><?php echo $CName ; ?></td>
<td ><?php echo " <a href='Reference_List.php? CCode=".$CCode."'>Reference Source</a>"?></td>
<td><?php echo $SMName ; ?></td>
					<?php 
					if (($userdata[admin] == '1')) {
					?>

<td><?php echo " <a href='Course_Edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - ".$CID."'> edit </a> "; ?> | <?php echo " <a href='Course_Delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
					<?php
					}
	 				?>
</tr>
<?php

  $i++;
  }
  ?>
  </table>
  
    	 <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
	<h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">3rd year 1st semester</h1>
	</div>
	
<table class="hoverTable"  width="1100" border="1" style="padding-bottom:40px;padding-left:40px;padding-right:40px">


<?php



$strquery="SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='5'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)
{
$CID=mysql_result($results,$i,"CID");
$CCode=mysql_result($results,$i,"CCode");
$CName=mysql_result($results,$i,"CName");
$SMName=mysql_result($results,$i,"SMName");
?>
<tr align="center">
<td height="40"><?php echo $CCode ; ?></td>
<td><?php echo $CName ; ?></td>
<td ><?php echo " <a href='Reference_List.php? CCode=".$CCode."'>Reference Source</a>"?></td>
<td><?php echo $SMName ; ?></td>
					<?php 
					if (($userdata[admin] == '1')) {
					?>

<td><?php echo " <a href='Course_Edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - ".$CID."'> edit </a> "; ?> | <?php echo " <a href='Course_Delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
					<?php
					}
	 				?>
</tr>
<?php

  $i++;
  }
  ?>
  </table>
  
    	 <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
	<h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">3rd year 2nd semester</h1>
	</div>
	
<table class="hoverTable"  width="1100" border="1" style="padding-bottom:40px;padding-left:40px;padding-right:40px">


<?php



$strquery="SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='6'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)
{
$CID=mysql_result($results,$i,"CID");
$CCode=mysql_result($results,$i,"CCode");
$CName=mysql_result($results,$i,"CName");
$SMName=mysql_result($results,$i,"SMName");
?>
<tr align="center">
<td height="40"><?php echo $CCode ; ?></td>
<td><?php echo $CName ; ?></td>
<td ><?php echo " <a href='Reference_List.php? CCode=".$CCode."'>Reference Source</a>"?></td>
<td><?php echo $SMName ; ?></td>
					<?php 
					if (($userdata[admin] == '1')) {
					?>

<td><?php echo " <a href='Course_Edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - ".$CID."'> edit </a> "; ?> | <?php echo " <a href='Course_Delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
					<?php
					}
	 				?>
</tr>
<?php

  $i++;
  }
  ?>
  </table>
  
    	 <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
	<h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">4th year 1st semester</h1>
	</div>
	
<table class="hoverTable"  width="1100" border="1" style="padding-bottom:40px;padding-left:40px;padding-right:40px">


<?php



$strquery="SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='7'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)
{
$CID=mysql_result($results,$i,"CID");
$CCode=mysql_result($results,$i,"CCode");
$CName=mysql_result($results,$i,"CName");
$SMName=mysql_result($results,$i,"SMName");
?>
<tr align="center">
<td height="40"><?php echo $CCode ; ?></td>
<td><?php echo $CName ; ?></td>
<td ><?php echo " <a href='Reference_List.php? CCode=".$CCode."'>Reference Source</a>"?></td>
<td><?php echo $SMName ; ?></td>
					<?php 
					if (($userdata[admin] == '1')) {
					?>

<td><?php echo " <a href='Course_Edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - ".$CID."'> edit </a> "; ?> | <?php echo " <a href='Course_Delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
					<?php
					}
	 				?>
</tr>
<?php

  $i++;
  }
  ?>
  </table>
  
    	 <div id="paragraph_head" style="padding-left:40px;padding-right:40px;">
	<h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">4th year 2nd semester</h1>
	</div>
	
<table class="hoverTable"  width="1100" border="1" style="padding-bottom:40px;padding-left:40px;padding-right:40px">


<?php



$strquery="SELECT c_info.CID,c_info.CCode,c_info.CName,sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID=sm_info.SMID where c_info.SMID='8'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)
{
$CID=mysql_result($results,$i,"CID");
$CCode=mysql_result($results,$i,"CCode");
$CName=mysql_result($results,$i,"CName");
$SMName=mysql_result($results,$i,"SMName");
?>
<tr align="center">
<td height="40"><?php echo $CCode ; ?></td>
<td><?php echo $CName ; ?></td>
<td ><?php echo " <a href='Reference_List.php? CCode=".$CCode."'>Reference Source</a>"?></td>
<td><?php echo $SMName ; ?></td>
					<?php 
					if (($userdata[admin] == '1')) {
					?>

<td><?php echo " <a href='Course_Edit.php?CID=" . $CID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - ".$CID."'> edit </a> "; ?> | <?php echo " <a href='Course_Delete.php?CID=" . $CID . "'> delete </a> "; ?></td>
					<?php
					}
	 				?>
</tr>
<?php

  $i++;
  }
  ?>
  </table>
  
  
  
  
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