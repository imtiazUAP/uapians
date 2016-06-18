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
    <?php } else { ?>
<html>
<head>
<?php
 include("header.php");
	?>

</head>

<body>
<div id="grad1">
<div class="bodydiv">
 <link rel="stylesheet" href="css/nokib2.css" type="text/css" media="screen">

<?php include("logo.php"); ?>





<div class="realbody" style="min-height:2300px">



<?php include("menu.php"); ?>






	
	
	<div id="content">
	<div id="colOne">
<?php
//include("sidebar.php");
?>

		
		
	</div>

<br>
<br>

     <div>
     <hr>
          <h1> Project Gallery </h1>
          <br><br>
         
     </div>
     <hr>
     <br>
     


<table class="hoverTable"  width="1100" border="1" style="padding-bottom:10px;padding-left:10px;padding-right:10px">


<?php

?>
<tr align="center">

<td height="40"><div class="C_btn C_btn:hover"><a href="Project_gallery_C.php" style="text-decoration:none" target="_blank" > C </a></div></td>

<td height="40"><div class="C2_btn C2_btn:hover"><a href="Project_gallery_C++.php"  style="text-decoration:none"target="_blank" > C++ </a></div></td>

<td height="40"><div class="JAVA_btn JAVA_btn:hover"><a href="Project_gallery_JAVA.php"  style="text-decoration:none"target="_blank" > JAVA </a></div></td>

</tr>

</table>


<table class="hoverTable"  width="1100" border="1" style="padding-bottom:10px;padding-left:10px;padding-right:10px">


<tr align="center"><td height="40"><div class="C2_btn C2_btn:hover"><a href="Project_gallery_Web_application.php"  style="text-decoration:none" target="_blank" > Web Application </a></div></td>
<tr align="center">

</tr>
 
</table>

<table class="hoverTable"  width="1100" border="2" style="padding-bottom:10px;padding-left:10px;padding-right:10px">


<?php

?>
<tr align="center">

<td height="40"><div class="JAVA_btn JAVA_btn:hover"><a href="Project_gallery_Androit.php" style="text-decoration:none" target="_blank" >Androit </a></div></td>

<td height="40"><div class="C_btn C_btn:hover"><a href="Project_gallery_C#.php" style="text-decoration:none" target="_blank" > C# </a></div></td>

<td height="40"><div class="C2_btn C2_btn:hover"><a href="Project_gallery_Python.php"  style="text-decoration:none"target="_blank" > Python </a></div></td>

</tr>

</table>

<table class="hoverTable"  width="1100" border="1" style="padding-bottom:10px;padding-left:10px;padding-right:10px">


<?php

?>
<tr align="center">

<td height="40"><div class="C_btn C_btn:hover"><a href="Project_gallery_Assembly.php" style="text-decoration:none" target="_blank" > Assembly </a></div></td>

<td height="40"><div class="C2_btn C2_btn:hover"><a href="Project_gallery_Database.php"  style="text-decoration:none"target="_blank" > Database </a></div></td>


</tr>

</table>
	
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




