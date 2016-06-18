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
$SID=$userdata['SID'];

    ?>



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
    
    <div id="margin_figure">
<div align="center">
 
 <form action="Upload_Project_Save.php" method="post"
              enctype="multipart/form-data">
<div>



<br>
<br>
<tr>
<td><div style="font-weight:bold; color:#FFFFFF;">Select your language:</div>
</td>
<td>
<select name="language_id" id="language_id" selected="">
<?php

$query="SELECT DISTINCT language_id, language_name FROM language_table";
$rs = mysql_query($query) or die ('Error submitting');
while ($rows = mysql_fetch_assoc($rs)) {
	if ($row["language_id"] == $rows["language_id"])
    {
        $selected = 'selected="selected"';
    }
    else
    {
    	$selected = '';
    }
    print("<option value=\"" . $rows["language_id"] . "\" ".$selected."  >" . $rows["language_name"] . "</option>");
}
?>
</select>
<br>
<br>
<br>
<br>

    <p> <tr> <td>
         <label for="email" class="signup_field" data-icon="u">Project Name:</label> </td>
         <td>
         
         
                           <textarea name="project_name" rows="2" cols="40">
</textarea>
         </td>
         </tr>
    </p>

<br>
<br>
<br>
<br>
<tr>
<td><div style="font-weight:bold; color:#FFFFFF;">Platform:</div>
</td>
<select name="platform_id" id="platform_id" selected="">
<?php

$query="SELECT DISTINCT platform_id, platform_name FROM platform_table";
$rs = mysql_query($query) or die ('Error submitting');
while ($rows = mysql_fetch_assoc($rs)) {
	if ($row["platform_id"] == $rows["platform_id"])
    {
        $selected = 'selected="selected"';
    }
    else 
    {
    	$selected = '';
    }
    print("<option value=\"" . $rows["platform_id"] . "\" ".$selected."  >" . $rows["platform_name"] . "</option>");
}
?>
</select>
<br>
<br>
<br>
<br>

<tr>
<td><div style="font-weight:bold; color:#FFFFFF;">Category:</div>
</td>
<select name="project_cat_id" id="cat_id" selected="">
<?php

$query="SELECT DISTINCT cat_id,cat_name FROM project_category_table";
$rs = mysql_query($query) or die ('Error submitting');
while ($rows = mysql_fetch_assoc($rs)) {
	if ($row["cat_id"] == $rows["cat_id"])
    {
        $selected = 'selected="selected"';
    }
    else
    {
    	$selected = '';
    }
    print("<option value=\"" . $rows["cat_id"] . "\" ".$selected."  >" . $rows["cat_name"] . "</option>");
}
?>
</select>
<br>
<br>
<br>
<br>

    <p> <tr> <td>
         <label for="email" class="signup_field" data-icon="u">Project_Link:</label> </td>
         <td>
         
         
                           <textarea name="project_link" rows="2" cols="40">
</textarea>
         </td>
         </tr>
    </p>

<br>
<br>
<br>
<br>
		 
		 

<tr>
    		<td>
         <label for="Portrait" class="signup_field" data-icon="u">Project Screenshot:</label>
         </td>
         <td>
         <input id="file" name="file" required="required" type="file" placeholder="required" />
         </td>
         </tr>
		 
		 <input name="SID" type="hidden" id="SID"  value="<?php echo $SID; ?>" />
		 

<br>
<br>
<br>
<br>


</div>
<br><br>
<div align="right" style="padding-right:165px">
<input type="Submit"/>
</div>

</form>
</div>

    
    
    
   <!-- !!!!!!!!!!!!!!!!!!!!!!-->   
	
	
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
?>