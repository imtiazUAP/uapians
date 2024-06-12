<?php
 session_start();
  include('dbconnect.php'); ?>
<?php
$b=$_SESSION['email'];
$userrole = mysql_query("select * from userinfo where email='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
//echo $userdata['admin'];
if (empty($_SESSION['email'])) {
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
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="assets/css/thickbox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen">
</head>
<body>
	<div id="canvas">
	<div class="body_wrapper">
			<div id="logo" align="left">
	<h1><a href="Home.php">UAPians.Net  </a></h1>
	<p>A Stack of Uap Students    ...UNOFFICIAL...</p>
			</div>
<div class="body">
			<?php
//$connect=mysql_connect("localhost","root","");
//$select_db=mysql_select_db("mylab");
$strquery="SELECT SPortrait,email FROM s_info INNER JOIN userinfo ON s_info.SID=userinfo.SID WHERE email='{$b}'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);
$SPortrait=mysql_result($results,$i,"SPortrait");
$email=mysql_result($results,$i,"email");
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
<form>
					<?php 
					if (($userdata['admin'] == '1')) {
					?>
<a href="Employee_Insert.php?keepThis=true&TB_iframe=true&height=120&width=240&modal=true" title="New Employee" class="thickbox">Create New Employee</a>
<table class="hoverTable" width="1100" border="1" style=" padding-bottom:40px;padding-left:40px;padding-right:40px;" >
<tr align="center">
<td width="50" height="50" bgcolor="588C73">Employee Name</td>
<td width="150" bgcolor="588C73" >Employee Designation</td>
<td width="150" bgcolor="588C73" >Portrait</td>
<td width="150" bgcolor="588C73" >Profiles</td>
<td width="150" bgcolor="#006699" >Admin Panel</td>
</tr>
					<?php
					}
	 				?>
	<?php 
					if (($userdata['admin'] == '0')) {
					?>				
<table class="hoverTable" width="1100" border="1" style=" padding-bottom:40px;padding-left:40px;padding-right:40px;" >
<tr align="center">
<td width="50" height="50" bgcolor="#006699">Employee Name</td>
<td width="150" bgcolor="#006699" >Employee Designation</td>
<td width="150" bgcolor="#006699" >Portrait</td>
<td width="150" bgcolor="#006699" >Profiles</td>
</tr>
<?php
					}
	 				?>
<?php
$strquery="SELECT * from e_info order by EID";
$results=mysql_query($strquery);
$num=mysql_numrows($results);
$i=0;
while ($i< $num)
{
$EID=mysql_result($results,$i,"EID");
$EName=mysql_result($results,$i,"EName");
$EDesignation=mysql_result($results,$i,"EDesignation");
$Employee_Portrait=mysql_result($results,$i,"Employee_Portrait");
?>
<tr align="center">
<td height="40"><?php echo $EName ; ?></td>
<td ><?php echo $EDesignation ; ?></td>
<td width="100"><img src="<?php echo $Employee_Portrait; ?>"  style="height:100px;" ></td>
<td ><?php echo " <a href='Teacher_Profile_List.php? EID=".$EID."'> Profile </a>"?></td>
					<?php 
					if (($userdata['admin'] == '1')) {
					?>
<td align="center"><?php echo " <a href='Employee_Edit.php?EID=" . $EID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Employee - ".$EID."'> edit </a> "; ?> | <?php echo " <a href='Employee_Delete.php?EID=" . $EID . "'> delete </a> "; ?></td>
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
		</div>			 
		</div>
</body>
</html>
    <?php
}?>
