<?php
 session_start();
  error_reporting(1);
 include("dbconnect.php");

  ?>
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
<?php
 include("header.php");
	?>
	<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
</head>

</head>

<body>

<div id="grad1">
<div class="bodydiv">

<?php include("logo.php"); ?>





<div class="realbody" style="min-height:2300px">



<?php include("menu.php"); ?>
<!--//////////////////////////////-->
<hr>
<br>
<br>
<?php
$strquery = "SELECT * from e_info where SID= '".$_GET["SID"]."' ";
$results = mysql_query ($strquery);
$row = mysql_fetch_array($results);
?>
<div align="center" >


<form id="form1" name="form1" method="get" action="my_profile_teacher_update.php">

<table >

<tr>
<td><h3>Name:</h3></td>
<td ><textarea name="ename" cols="80" rows="5" style="border:inset" type="text" id="EName"> <?php echo $row["EName"]; ?></textarea> </td>
</tr>


<tr>
<td><h3>Designation:</h3></td>
<td ><textarea name="edesignation" cols="80" rows="5" style="border:inset" type="text" id="EName"> <?php echo $row["EDesignation"]; ?></textarea> </td>
</tr>


<tr>
<td><h3>Phone Number:</h3></td>
<td ><textarea name="employee_Contact" cols="80" rows="5" style="border:inset" type="text" id="EName"> <?php echo $row["Employee_Contact"]; ?></textarea> </td>
</tr>

<tr>
<td><h3>Speech for Students:</h3></td>
<td ><textarea name="employee_Speech" cols="80" rows="5" style="border:inset" type="text" id="EName"> <?php echo $row["Employee_Speech"]; ?></textarea> </td>
</tr>


<tr>
<td><h3>Academic Qualification:</h3></td>
<td ><textarea name="employee_Qualification" cols="80" rows="5" style="border:inset" type="text" id="EName"> <?php echo $row["Employee_Qualification"]; ?></textarea> </td>
</tr>

<tr>
<td><h3>Teaching Experience:</h3></td>
<td ><textarea name="employee_Experience" cols="80" rows="5" style="border:inset" type="text" id="EName"> <?php echo $row["Employee_Experience"]; ?></textarea> </td>
</tr>

<tr>
<td><h3>Playing Role in UAP:</h3></td>
<td ><textarea name="employee_Role" cols="80" rows="5" style="border:inset" type="text" id="EName"> <?php echo $row["Employee_Role"]; ?></textarea> </td>
</tr>

<tr>
<td><h3>E Mail:</h3></td>
<td ><textarea name="employee_Email" cols="80" rows="5" style="border:inset" type="text" id="EName"> <?php echo $row["employee_email"]; ?></textarea> </td>
</tr>
 </p>
    
    
    
<tr><td><br><br>

<label>
<input type="submit" name="Submit" value="Update" />
</label>
</td></tr>
 

</table>




<!--//////////////////////////////-->
</form>
</div>
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