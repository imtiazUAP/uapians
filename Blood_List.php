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

	<div class="realbody" style="min-height:1200px">

			
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
			
	<div>
	<img src="images/Donate_Blood.jpg" alt="" width="350" height="200" class="image"  align="left"/>
	<h1 style="color:#FFFFFF">why donate Blood?</h1>
	<p align="right" style="text-align:left"> You don’t need a special reason to give blood. 
You just need your own reason.
Some of us give blood because we were asked by a friend.
Some know that a family member or a friend might need blood some day.
Some believe it is the right thing we do.
Whatever your reason, the need is constant and your contribution is important for a healthy and reliable blood supply.  And  you’ll feel good knowing you've helped change a life.


You will receive a mini physical to check your:

Pulse
Blood pressure
Body temperature
Hemoglobin</p>

<h1 style="color:#FFFFFF">Benefits of Donating</h1>
	<p align="right" style="text-align:left">You don’t need a special reason to give blood. 
You just need your own reason.
Some of us give blood because we were asked by a friend.
Some know that a family member or a friend might need blood some day.
Some believe it is the right thing we do.
Whatever your reason, the need is constant and your contribution is important for a healthy and reliable blood supply.  And  you’ll feel good knowing you've helped change a life.</p>
	</div>	
				
<form method="post" >
<tr>
<td>Blood Group</td>
<td>
<select name="Blood_Group_ID" id="Blood_Group_ID" selected="">
<?php

$query="SELECT DISTINCT Blood_Group_ID, Blood_Group_Name FROM blood_group_info";
$rs = mysql_query($query) or die ('Error submitting');
while ($rows = mysql_fetch_assoc($rs)) {
	if ($row["Blood_Group_ID"] == $rows["Blood_Group_ID"])
    {
        $selected = 'selected="selected"';
    }
    else
    {
    	$selected = '';
    }
    print("<option value=\"" . $rows["Blood_Group_ID"] . "\" ".$selected."  >" . $rows["Blood_Group_Name"] . "</option>");
}
?>
</select>
</td>
</tr>
    <p class="signin_button"> 
	<input type="Submit" value="Search"/>
	</p>









<?php	
	if ($_POST[Blood_Group_ID] == "1")		
{
?>

<table id="itable" width="1100" border="1">
<tr>
<td align="center" height="50" bgcolor="#006699">Registration No</td>
<td align="center" bgcolor="#006699">Name</td>
<td align="center" bgcolor="#006699">Phone Number</td>
<td align="center" bgcolor="#006699">Blood Group Name</td> 

</tr>

<?php



$strquery="SELECT * FROM 
(SELECT S.SReg, S.SName, S.SPh_Number, B.Blood_Group_Name,B.Blood_Group_ID FROM s_info S, blood_group_info B
WHERE
S.Blood_Group_ID=B.Blood_Group_ID
) A where blood_group_ID='1'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{

$f1=mysql_result($results,$i,"SReg");
$f2=mysql_result($results,$i,"SName");
$f3=mysql_result($results,$i,"SPh_Number");
$f4=mysql_result($results,$i,"Blood_Group_Name");



?>

<tr align="center">
<td height="40">
<?php echo $f1 ; ?></td>
<td><?php echo $f2 ; ?></td>
<td><?php echo $f3 ; ?></td>
<td><?php echo $f4 ; ?></td>




<?php
  $i++;
  }
}
?>




<?php	
	if ($_POST[Blood_Group_ID] == "2")		
{
?>

<table id="itable" width="1100" border="1">
<tr>
<td height="50" bgcolor="#006699">Registration No</td>
<td align="center" bgcolor="#006699">Name</td>
<td align="center" bgcolor="#006699">Phone Number</td>
<td align="center" bgcolor="#006699">Blood Group Name</td> 

</tr>

<?php



$strquery="SELECT * FROM 
(SELECT S.SReg, S.SName, S.SPh_Number, B.Blood_Group_Name,B.Blood_Group_ID FROM s_info S, blood_group_info B
WHERE
S.Blood_Group_ID=B.Blood_Group_ID
) A where blood_group_ID='2'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{

$f1=mysql_result($results,$i,"SReg");
$f2=mysql_result($results,$i,"SName");
$f3=mysql_result($results,$i,"SPh_Number");
$f4=mysql_result($results,$i,"Blood_Group_Name");



?>

<tr align="center">
<td height="40">
<?php echo $f1 ; ?></td>
<td><?php echo $f2 ; ?></td>
<td><?php echo $f3 ; ?></td>
<td><?php echo $f4 ; ?></td>




<?php
  $i++;
  }
}
?>


<?php	
	if ($_POST[Blood_Group_ID] == "3")		
{
?>

<table id="itable" width="1100" border="1">
<tr>
<td height="50" bgcolor="#006699">registration No</td>
<td align="center" bgcolor="#006699">Name</td>
<td align="center" bgcolor="#006699">Phone Number</td>
<td align="center" bgcolor="#006699">Blood Group Name</td> 

</tr>

<?php



$strquery="SELECT * FROM 
(SELECT S.SReg, S.SName, S.SPh_Number, B.Blood_Group_Name,B.Blood_Group_ID FROM s_info S, blood_group_info B
WHERE
S.Blood_Group_ID=B.Blood_Group_ID
) A where blood_group_ID='3'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{

$f1=mysql_result($results,$i,"SReg");
$f2=mysql_result($results,$i,"SName");
$f3=mysql_result($results,$i,"SPh_Number");
$f4=mysql_result($results,$i,"Blood_Group_Name");



?>

<tr align="center">
<td height="40">
<?php echo $f1 ; ?></td>
<td><?php echo $f2 ; ?></td>
<td><?php echo $f3 ; ?></td>
<td><?php echo $f4 ; ?></td>



<?php
  $i++;
  }
}
?>




<?php	
	if ($_POST[Blood_Group_ID] == "4")		
{
?>

<table id="itable" width="1100" border="1">
<tr>
<td height="50" bgcolor="#006699">Registration Number</td>
<td align="center" bgcolor="#006699">Name</td>
<td align="center" bgcolor="#006699">Phone Number</td>
<td align="center" bgcolor="#006699">Blood Group Name</td> 

</tr>

<?php



$strquery="SELECT * FROM 
(SELECT S.SReg, S.SName, S.SPh_Number, B.Blood_Group_Name,B.Blood_Group_ID FROM s_info S, blood_group_info B
WHERE
S.Blood_Group_ID=B.Blood_Group_ID
) A where blood_group_ID='4'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{

$f1=mysql_result($results,$i,"SReg");
$f2=mysql_result($results,$i,"SName");
$f3=mysql_result($results,$i,"SPh_Number");
$f4=mysql_result($results,$i,"Blood_Group_Name");



?>

<tr align="center">
<td height="40">
<?php echo $f1 ; ?></td>
<td><?php echo $f2 ; ?></td>
<td><?php echo $f3 ; ?></td>
<td><?php echo $f4 ; ?></td>



<?php
  $i++;
  }
}
?>




<?php	
	if ($_POST[Blood_Group_ID] == "5")		
{
?>

<table id="itable" width="1100" border="1">
<tr>
<td height="50" bgcolor="#006699">Registration no</td>
<td align="center" bgcolor="#006699">Name</td>
<td align="center" bgcolor="#006699">Phone Number</td>
<td align="center" bgcolor="#006699">Blood Group Name</td> 

</tr>

<?php



$strquery="SELECT * FROM 
(SELECT S.SReg, S.SName, S.SPh_Number, B.Blood_Group_Name,B.Blood_Group_ID FROM s_info S, blood_group_info B
WHERE
S.Blood_Group_ID=B.Blood_Group_ID
) A where blood_group_ID='5'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{

$f1=mysql_result($results,$i,"SReg");
$f2=mysql_result($results,$i,"SName");
$f3=mysql_result($results,$i,"SPh_Number");
$f4=mysql_result($results,$i,"Blood_Group_Name");



?>

<tr align="center">
<td height="40">
<?php echo $f1 ; ?></td>
<td><?php echo $f2 ; ?></td>
<td><?php echo $f3 ; ?></td>
<td><?php echo $f4 ; ?></td>



<?php
  $i++;
  }
}
?>


<?php	
	if ($_POST[Blood_Group_ID] == "6")		
{
?>

<table id="itable" width="1100" border="1">
<tr>
<td height="50" bgcolor="#006699">Registration No</td>
<td align="center" bgcolor="#006699">Name</td>
<td align="center" bgcolor="#006699">Phone Number</td>
<td align="center" bgcolor="#006699">Blood Group Name</td> 

</tr>

<?php



$strquery="SELECT * FROM 
(SELECT S.SReg, S.SName, S.SPh_Number, B.Blood_Group_Name,B.Blood_Group_ID FROM s_info S, blood_group_info B
WHERE
S.Blood_Group_ID=B.Blood_Group_ID
) A where blood_group_ID='6'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{

$f1=mysql_result($results,$i,"SReg");
$f2=mysql_result($results,$i,"SName");
$f3=mysql_result($results,$i,"SPh_Number");
$f4=mysql_result($results,$i,"Blood_Group_Name");



?>

<tr align="center">
<td height="40">
<?php echo $f1 ; ?></td>
<td><?php echo $f2 ; ?></td>
<td><?php echo $f3 ; ?></td>
<td><?php echo $f4 ; ?></td>



<?php
  $i++;
  }
}
?>


<?php	
	if ($_POST[Blood_Group_ID] == "7")		
{
?>

<table id="itable" width="1100" border="1">
<tr>
<td height="50" bgcolor="#006699">Registration No</td>
<td align="center" bgcolor="#006699">Name</td>
<td align="center" bgcolor="#006699">Phone Number</td>
<td align="center" bgcolor="#006699">Blood Group Name</td> 

</tr>

<?php



$strquery="SELECT * FROM 
(SELECT S.SReg, S.SName, S.SPh_Number, B.Blood_Group_Name,B.Blood_Group_ID FROM s_info S, blood_group_info B
WHERE
S.Blood_Group_ID=B.Blood_Group_ID
) A where blood_group_ID='7'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{

$f1=mysql_result($results,$i,"SReg");
$f2=mysql_result($results,$i,"SName");
$f3=mysql_result($results,$i,"SPh_Number");
$f4=mysql_result($results,$i,"Blood_Group_Name");



?>

<tr align="center">
<td height="40">
<?php echo $f1 ; ?></td>
<td><?php echo $f2 ; ?></td>
<td><?php echo $f3 ; ?></td>
<td><?php echo $f4 ; ?></td>



<?php
  $i++;
  }
}
?>


<?php	
	if ($_POST[Blood_Group_ID] == "8")		
{
?>

<table id="itable" width="1100" border="1">
<tr>
<td height="50" bgcolor="#006699">Registration No</td>
<td align="center" bgcolor="#006699">Name</td>
<td align="center" bgcolor="#006699">Phone Number</td>
<td align="center" bgcolor="#006699">Blood Group Name</td> 

</tr>

<?php



$strquery="SELECT * FROM 
(SELECT S.SReg, S.SName, S.SPh_Number, B.Blood_Group_Name,B.Blood_Group_ID FROM s_info S, blood_group_info B
WHERE
S.Blood_Group_ID=B.Blood_Group_ID
) A where blood_group_ID='8'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{

$f1=mysql_result($results,$i,"SReg");
$f2=mysql_result($results,$i,"SName");
$f3=mysql_result($results,$i,"SPh_Number");
$f4=mysql_result($results,$i,"Blood_Group_Name");



?>

<tr align="center">
<td height="40">
<?php echo $f1 ; ?></td>
<td><?php echo $f2 ; ?></td>
<td><?php echo $f3 ; ?></td>
<td><?php echo $f4 ; ?></td>



<?php
  $i++;
  }
}
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