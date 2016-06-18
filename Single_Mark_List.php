<?php
 session_start(); ?>
<?php
if (empty($_SESSION['username'])) {
    ?>
    <script language="JavaScript">
        window.location="index.php";
    </script><?php } else { ?>




<html>
<title>Mark | Student Management Tool</title>
<head>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
</head>
<body>
	<div id="grad1">
	<div class="bodydiv">

			<div id="logo" align="left">
	<h1><a href="Home.php">UAPians.Net  </a></h1>
	<p>A Stack of Uap Students    ...UNOFFICIAL...</p>
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
			
			
			
			<div align="center">
					
		



<div>
	<?php
	$connect=mysql_connect("localhost","root","");
	$select_db=mysql_select_db("mylab");

	$strquery="SELECT SName FROM s_info WHERE SID='" . $_GET["SID"] . "'";

	$results=mysql_query($strquery);
	$num=mysql_numrows($results);

	$SName=mysql_result($results,$i,"SName");
	?>

</div>


<div>
<p align="center" style="font-size:27px; font-weight:bold; padding-top:25; padding-bottom:25"><?php echo $SName ; ?></p>	
<p align="center" style="font-size:25px">1st Year 1st Semister</p>	
	<table align="center"width="900" border="1">
		<tr>
			<td height="50" align="center" style="width:300">Subject Code</td>
			<td align="center" style="width:300">subject Name</td>
			<td align="center" style="width:300">Mark</td> 
		</tr>


<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("mylab");

$strquery="SELECT SMName,SName,CCode, CName,Mark FROM c_info INNER JOIN m_info ON m_info.CID=c_info.CID INNER JOIN s_info ON s_info.SID=m_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE m_info.SID='" . $_GET["SID"] . "' AND SMName='1st Year 1st Semister'";

$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{
$SName=mysql_result($results,$i,"SName");
$Semester_Name=mysql_result($results,$i,"SMName");
$Student_Name=mysql_result($results,$i,"SName");
$Course_Code=mysql_result($results,$i,"CCode");
$Course_Name=mysql_result($results,$i,"CName");
$Obtained_Mark=mysql_result($results,$i,"Mark");

?>


		<tr>
			<td align="center" style="width:300"><?php echo $Course_Code ; ?></td>
			<td align="center" style="width:300"><?php echo $Course_Name ; ?></td>
			<td align="center" style="width:300"><?php echo $Obtained_Mark ; ?></td>
		</tr>

<?php

  $i++;
  }
?>
	</table>
</div>
<br>
<br>
<br>
<br>	

		
		<div>
<p align="center" style="font-size:25px">1st Year 2nd Semister</p>	
	<table align="center"width="900" border="1">
		<tr>
			<td height="50" align="center" style="width:300">Subject Code</td>
			<td align="center" style="width:300">subject Name</td>
			<td align="center" style="width:300">Mark</td> 
		</tr>


<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("mylab");

$strquery="SELECT SMName,SName,CCode, CName,Mark FROM c_info INNER JOIN m_info ON m_info.CID=c_info.CID INNER JOIN s_info ON s_info.SID=m_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE m_info.SID='" . $_GET["SID"] . "' AND SMName='1st Year 2nd Semister'";

$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{
$SName=mysql_result($results,$i,"SName");
$Semester_Name=mysql_result($results,$i,"SMName");
$Student_Name=mysql_result($results,$i,"SName");
$Course_Code=mysql_result($results,$i,"CCode");
$Course_Name=mysql_result($results,$i,"CName");
$Obtained_Mark=mysql_result($results,$i,"Mark");

?>


		<tr>
			<td align="center" style="width:300"><?php echo $Course_Code ; ?></td>
			<td align="center" style="width:300"><?php echo $Course_Name ; ?></td>
			<td align="center" style="width:300"><?php echo $Obtained_Mark ; ?></td>
		</tr>

<?php

  $i++;
  }
?>
	</table>
</div>
<br>
<br>
<br>
<br>	

		<div>
<p align="center" style="font-size:25px">2nd Year 1st Semister</p>	
	<table align="center"width="900" border="1">
		<tr>
			<td height="50" align="center" style="width:300">Subject Code</td>
			<td align="center" style="width:300">subject Name</td>
			<td align="center" style="width:300">Mark</td> 
		</tr>


<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("mylab");

$strquery="SELECT SMName,SName,CCode, CName,Mark FROM c_info INNER JOIN m_info ON m_info.CID=c_info.CID INNER JOIN s_info ON s_info.SID=m_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE m_info.SID='" . $_GET["SID"] . "' AND SMName='2nd Year 1st Semister'";

$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{
$SName=mysql_result($results,$i,"SName");
$Semester_Name=mysql_result($results,$i,"SMName");
$Student_Name=mysql_result($results,$i,"SName");
$Course_Code=mysql_result($results,$i,"CCode");
$Course_Name=mysql_result($results,$i,"CName");
$Obtained_Mark=mysql_result($results,$i,"Mark");

?>


		<tr>
			<td align="center" style="width:300"><?php echo $Course_Code ; ?></td>
			<td align="center" style="width:300"><?php echo $Course_Name ; ?></td>
			<td align="center" style="width:300"><?php echo $Obtained_Mark ; ?></td>
		</tr>

<?php

  $i++;
  }
?>
	</table>
</div>
<br>
<br>
<br>
<br>	

		<div>
<p align="center" style="font-size:25px">2nd Year 2nd Semister</p>	
	<table align="center"width="900" border="1">
		<tr>
			<td height="50" align="center" style="width:300">Subject Code</td>
			<td align="center" style="width:300">subject Name</td>
			<td align="center" style="width:300">Mark</td> 
		</tr>


<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("mylab");

$strquery="SELECT SMName,SName,CCode, CName,Mark FROM c_info INNER JOIN m_info ON m_info.CID=c_info.CID INNER JOIN s_info ON s_info.SID=m_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE m_info.SID='" . $_GET["SID"] . "' AND SMName='2nd Year 2nd Semister'";

$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{
$SName=mysql_result($results,$i,"SName");
$Semester_Name=mysql_result($results,$i,"SMName");
$Student_Name=mysql_result($results,$i,"SName");
$Course_Code=mysql_result($results,$i,"CCode");
$Course_Name=mysql_result($results,$i,"CName");
$Obtained_Mark=mysql_result($results,$i,"Mark");

?>


		<tr>
			<td align="center" style="width:300"><?php echo $Course_Code ; ?></td>
			<td align="center" style="width:300"><?php echo $Course_Name ; ?></td>
			<td align="center" style="width:300"><?php echo $Obtained_Mark ; ?></td>
		</tr>

<?php

  $i++;
  }
?>
	</table>
</div>
<br>
<br>
<br>
<br>	

		<div>
<p align="center" style="font-size:25px">3rd Year 1st Semister</p>	
	<table align="center"width="900" border="1">
		<tr>
			<td height="50" align="center" style="width:300">Subject Code</td>
			<td align="center" style="width:300">subject Name</td>
			<td align="center" style="width:300">Mark</td> 
		</tr>


<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("mylab");

$strquery="SELECT SMName,SName,CCode, CName,Mark FROM c_info INNER JOIN m_info ON m_info.CID=c_info.CID INNER JOIN s_info ON s_info.SID=m_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE m_info.SID='" . $_GET["SID"] . "' AND SMName='3rd Year 1st Semister'";

$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{
$SName=mysql_result($results,$i,"SName");
$Semester_Name=mysql_result($results,$i,"SMName");
$Student_Name=mysql_result($results,$i,"SName");
$Course_Code=mysql_result($results,$i,"CCode");
$Course_Name=mysql_result($results,$i,"CName");
$Obtained_Mark=mysql_result($results,$i,"Mark");

?>


		<tr>
			<td align="center" style="width:300"><?php echo $Course_Code ; ?></td>
			<td align="center" style="width:300"><?php echo $Course_Name ; ?></td>
			<td align="center" style="width:300"><?php echo $Obtained_Mark ; ?></td>
		</tr>

<?php

  $i++;
  }
?>
	</table>
</div>
<br>
<br>
<br>
<br>	

		<div>
<p align="center" style="font-size:25px">3rd Year 2nd Semister</p>	
	<table align="center"width="900" border="1">
		<tr>
			<td height="50" align="center" style="width:300">Subject Code</td>
			<td align="center" style="width:300">subject Name</td>
			<td align="center" style="width:300">Mark</td> 
		</tr>


<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("mylab");

$strquery="SELECT SMName,SName,CCode, CName,Mark FROM c_info INNER JOIN m_info ON m_info.CID=c_info.CID INNER JOIN s_info ON s_info.SID=m_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE m_info.SID='" . $_GET["SID"] . "' AND SMName='3rd Year 2nd Semister'";

$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{
$SName=mysql_result($results,$i,"SName");
$Semester_Name=mysql_result($results,$i,"SMName");
$Student_Name=mysql_result($results,$i,"SName");
$Course_Code=mysql_result($results,$i,"CCode");
$Course_Name=mysql_result($results,$i,"CName");
$Obtained_Mark=mysql_result($results,$i,"Mark");

?>


		<tr>
			<td align="center" style="width:300"><?php echo $Course_Code ; ?></td>
			<td align="center" style="width:300"><?php echo $Course_Name ; ?></td>
			<td align="center" style="width:300"><?php echo $Obtained_Mark ; ?></td>
		</tr>

<?php

  $i++;
  }
?>
	</table>
</div>
<br>
<br>
<br>
<br>	

<div>
<p align="center" style="font-size:25px">4th Year 1st Semister</p>	
	<table align="center"width="900" border="1">
		<tr>
			<td height="50" align="center" style="width:300">Subject Code</td>
			<td align="center" style="width:300">subject Name</td>
			<td align="center" style="width:300">Mark</td> 
		</tr>


<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("mylab");

$strquery="SELECT SMName,SName,CCode, CName,Mark FROM c_info INNER JOIN m_info ON m_info.CID=c_info.CID INNER JOIN s_info ON s_info.SID=m_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE m_info.SID='" . $_GET["SID"] . "' AND SMName='4th Year 1st Semister'";

$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{
$SName=mysql_result($results,$i,"SName");
$Semester_Name=mysql_result($results,$i,"SMName");
$Student_Name=mysql_result($results,$i,"SName");
$Course_Code=mysql_result($results,$i,"CCode");
$Course_Name=mysql_result($results,$i,"CName");
$Obtained_Mark=mysql_result($results,$i,"Mark");

?>


		<tr>
			<td align="center" style="width:300"><?php echo $Course_Code ; ?></td>
			<td align="center" style="width:300"><?php echo $Course_Name ; ?></td>
			<td align="center" style="width:300"><?php echo $Obtained_Mark ; ?></td>
		</tr>

<?php

  $i++;
  }
?>
	</table>
</div>
<br>
<br>
<br>
<br>	



<div>
<p align="center" style="font-size:25px">4th Year 2nd Semister</p>	
	<table align="center"width="900" border="1">
		<tr>
			<td height="50" align="center" style="width:300">Subject Code</td>
			<td align="center" style="width:300">subject Name</td>
			<td align="center" style="width:300">Mark</td> 
		</tr>


<?php
$connect=mysql_connect("localhost","root","");
$select_db=mysql_select_db("mylab");

$strquery="SELECT SMName,SName,CCode, CName,Mark FROM c_info INNER JOIN m_info ON m_info.CID=c_info.CID INNER JOIN s_info ON s_info.SID=m_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE m_info.SID='" . $_GET["SID"] . "' AND SMName='4th Year 2nd Semister'";

$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{
$SName=mysql_result($results,$i,"SName");
$Semester_Name=mysql_result($results,$i,"SMName");
$Student_Name=mysql_result($results,$i,"SName");
$Course_Code=mysql_result($results,$i,"CCode");
$Course_Name=mysql_result($results,$i,"CName");
$Obtained_Mark=mysql_result($results,$i,"Mark");

?>


		<tr>
			<td align="center" style="width:300"><?php echo $Course_Code ; ?></td>
			<td align="center" style="width:300"><?php echo $Course_Name ; ?></td>
			<td align="center" style="width:300"><?php echo $Obtained_Mark ; ?></td>
		</tr>

<?php

  $i++;
  }
?>
	</table>
</div>
<br>
<br>
<br>
<br>	

</div>


</div>
	
</div>



</body>
</html>

    <?php
}?>