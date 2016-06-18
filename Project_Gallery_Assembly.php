<?php
 session_start();
  error_reporting(0);
 include("dbconnect.php");

  ?>
<?php
$b=$_SESSION['username'];
//$c=$_SESSION['userid'];


$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
//echo $userdata['admin'];
$SID=$userdata['SID'];




if (empty($_SESSION['username'])) {
    ?>
    <script language="JavaScript">
        window.location="index.php";
    </script><?php } else { ?>
<html>
<head>
<?php
 include("header.php");
	?>

</head>

<body>
<div id="grad1">
<div class="bodydiv">

<?php include("logo.php"); ?>





<div class="realbody" style="min-height:2300px">



<?php include("menu.php"); ?>






	
	
	<div id="content">
	<div id="colOne">
<?php
 include("sidebar.php");
?>

		
		
	</div>
	
	




<?php



$strquery="SELECT project.SID,project.project_name,project.project_screenshot,project_link,cat_name,SName,platform_name FROM project INNER JOIN project_category_table ON project.project_cat_id=project_category_table.cat_id INNER JOIN s_info ON project.SID=s_info.SID INNER JOIN platform_table ON project.platform_id=platform_table.platform_id WHERE project.language_id='6'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)
{
$project_name=mysql_result($results,$i,"project_name");
$platform_id=mysql_result($results,$i,"platform_name");
$project_cat_id=mysql_result($results,$i,"cat_name");
$SName=mysql_result($results,$i,"SName");
$SID=mysql_result($results,$i,"SID");
$project_link=mysql_result($results,$i,"project_link");
$project_screenshot=mysql_result($results,$i,"project_screenshot");
?>


	
	
	

<div style="padding:10px;">
<table style="width:250px; border: inset;">
	<tr style="height:20px">
		<td style="border:inset" colspan=2  align="center"><?php echo $project_name ; ?></td>
	</tr>
	<tr  style="height:100px">
		<td style="border:inset" colspan=2  align="center"> <a href='<?php echo $project_link ; ?>'><span><img style="width:300px; height:200px; border:1px solid white; vertical-align:middle"src="<?php echo $project_screenshot; ?>"<span> Click to Download</span></a></td>
	</tr>
	<tr style="height:20px">
	
	<td style="border:inset"  align="center"><a href='Profile_List.php? SID=<?= $SID ?>'><?= $SName ?></a></td>
		<td style="border:inset"  align="center"><?php echo $project_cat_id ; ?></td>
	</tr>
</table>
</div>
<?php

  $i++;
  }
  ?>
</div>

</div>


		<div class="footer">
<?php include("footer.php");
?>		 
		</div>
 
</body>
</html>
    <?php
}?>


