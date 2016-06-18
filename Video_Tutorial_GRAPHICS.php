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



$strquery="SELECT * FROM video_tutorial WHERE video_tutorial_cat_id='24'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)
{
$tutorial_id=mysql_result($results,$i,"tutorial_id");
$video_tutorial_cat_id=mysql_result($results,$i,"video_tutorial_cat_id");
$tutorial_link=mysql_result($results,$i,"tutorial_link");
?>


	
	
	


<table style="padding:5px; float: left">
	<tr style="height:20px">
		<td style="border:inset" colspan=2  align="center"><iframe width="256" height="160" src="<?php echo $tutorial_link ; ?>" frameborder="0" allowfullscreen></iframe></td>
	</tr>

</table>
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


