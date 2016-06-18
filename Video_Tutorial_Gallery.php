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
	<style>
img {
    opacity: 0.9;
    filter: alpha(opacity=40); /* For IE8 and earlier */
}

img:hover {
    opacity: 1.0;
    filter: alpha(opacity=100); /* For IE8 and earlier */
}
</style>
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

	

     
 
<div id="margin_figure">
<table>
	<tr>
		<td>
			<a href="Video_Tutorial_HTML.php"><img border="0" alt="W3Schools" src="images/videodefaultimage.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_HTML5.php"><img border="0" alt="W3Schools" src="images/c.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_CSS.php"><img border="0" alt="W3Schools" src="images/c++.jpg" width="265" height="160"></a>
		</td>
	</tr>
		<tr>
		<td>
			<a href="Video_Tutorial_PHP.php"><img border="0" alt="W3Schools" src="images/csharp.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_JAVASCRIPT.php"><img border="0" alt="W3Schools" src="images/android.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_JQUERY.php"><img border="0" alt="W3Schools" src="images/assembly.jpg" width="265" height="160"></a>
		</td>
	</tr>
		<tr>
		<td>
			<a href="Video_Tutorial_WORDPRESS.php"><img border="0" alt="W3Schools" src="images/webapps.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_AJAX.php"><img border="0" alt="W3Schools" src="images/python.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_TWITTERBOOTSTRAP.php"><img border="0" alt="W3Schools" src="images/database.jpg" width="265" height="160"></a>
		</td>
	</tr>
			<tr>
		<td>
			<a href="Video_Tutorial_JOOMLA.php"><img border="0" alt="W3Schools" src="images/php.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_PHOTOSHOP.php"><img border="0" alt="W3Schools" src="images/graphics.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_ILLUSTRATOR.php"><img border="0" alt="W3Schools" src="images/wordpress.jpg" width="265" height="160"></a>
		</td>
	</tr>
				<tr>
		<td>
			<a href="Video_Tutorial_SEO.php"><img border="0" alt="W3Schools" src="images/php.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_CSHARP.php"><img border="0" alt="W3Schools" src="images/graphics.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_ASPDOTNET.php"><img border="0" alt="W3Schools" src="images/wordpress.jpg" width="265" height="160"></a>
		</td>
	</tr>
				<tr>
		<td>
			<a href="Video_Tutorial_CODEIGNITER.php"><img border="0" alt="W3Schools" src="images/php.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_CAKEPHP.php"><img border="0" alt="W3Schools" src="images/graphics.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_MYSQL.php"><img border="0" alt="W3Schools" src="images/wordpress.jpg" width="265" height="160"></a>
		</td>
	</tr>
				<tr>
		<td>
			<a href="Video_Tutorial_MSSQL.php"><img border="0" alt="W3Schools" src="images/php.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_C.php"><img border="0" alt="W3Schools" src="images/graphics.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_CPLUSPLUS.php"><img border="0" alt="W3Schools" src="images/wordpress.jpg" width="265" height="160"></a>
		</td>
	</tr>
				<tr>
		<td>
			<a href="Video_Tutorial_PYTHON.php"><img border="0" alt="W3Schools" src="images/php.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_JAVA.php"><img border="0" alt="W3Schools" src="images/graphics.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_GRAPHICS.php"><img border="0" alt="W3Schools" src="images/wordpress.jpg" width="265" height="160"></a>
		</td>
	</tr>
				<tr>
		<td>
			<a href="Video_Tutorial_ANDROID.php"><img border="0" alt="W3Schools" src="images/php.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="Video_Tutorial_ODESK.php"><img border="0" alt="W3Schools" src="images/graphics.jpg" width="265" height="160"></a>
		</td>
		
		<td>
			<a href="#"><img border="0" alt="W3Schools" src="images/videodefaultimage.jpg" width="265" height="160"></a>
		</td>
	</tr>
</table>
</div>
     
     <!--<div>
          <p>fgfeaffwefw</p>
          <p><button style=" background:#C92124 " ><a href="About_me.php" target="_blank" >About me</        button></p>

     </div>-->
        
    </body>  

   
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