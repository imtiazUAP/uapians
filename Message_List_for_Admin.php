<?php
 session_start();
include("dbconnect.php");?>
<?php
$b=$_SESSION['username'];
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

</head>


<body>
	<div id="grad1">
	<div class="bodydiv">

			<div id="logo" align="left">
			<h1><a href="Home.php">Student Management Tool  </a></h1>
			<p>A Software for Managing CSE Department</p>
			</div>



<div class="realbody">
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
<form>




<?php

$strquery="SELECT Message_Id, Message,SUBJECT,SName,SReg FROM messages_for_admin INNER JOIN s_info ON messages_for_admin.SID=s_info.SID";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)
{
$Message_Id=mysql_result($results,$i,"Message_Id");
$Message=mysql_result($results,$i,"Message");
$Subject=mysql_result($results,$i,"Subject");
$SName=mysql_result($results,$i,"SName");
$SReg=mysql_result($results,$i,"SReg");
?>
<div style="padding-bottom:50px; padding-left:100px; color:#FFFFFF">
<div style="padding:10px">Registration No:<?php echo $SReg ; ?> </div>
<div style="padding-left:10px"> Name: <?php echo $SName; ?></div>

<div style="width:500px;padding:10px;margin:0px; font-size:16px; font-weight:bold"> Subject:<?php echo $Subject ; ?> </div>
<br>
<div style="width:500px;padding:10px;border:1px solid white;margin:0px; font-size:16px">Message: <?php echo $Message ; ?></div>



					<?php 
					if (($userdata[admin] == '1')) {
					?>

<td> <?php echo " <a href='Message_Delete.php?Message_Id=" . $Message_Id. "'> delete </a> "; ?></td>
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