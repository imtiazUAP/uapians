<?php
 session_start();
  error_reporting(1);
 include("dbconnect.php");
  ?>

<?php
$b=$_SESSION['username'];

$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
//echo $userdata['admin'];
//echo $userdata['SID'];




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
   <link rel="stylesheet" href="style_new.css">
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



<?php
 include("header.php");
	?>
</head>

<body>
	<div id="grad1">
	<div class="bodydiv">
	<div class="realbodyforprofile">




<?php
include"menu.php"
?>

			

			
	<?php


	$strquery="SELECT *,SMName,Blood_Group_Name,username FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID 
INNER JOIN
blood_group_info
ON
s_info.Blood_Group_ID=blood_group_info.Blood_Group_ID
INNER JOIN
userinfo
ON
s_info.SID=userinfo.SID
 WHERE username='{$b}'";
	$results=mysql_query($strquery);
	$num=mysql_numrows($results);

	$SID=mysql_result($results,$i,"SID");
	$Portrait=mysql_result($results,$i,"SPortrait");
	$Semester=mysql_result($results,$i,"SMName");
	$Name=mysql_result($results,$i,"SName");	
	$Reg=mysql_result($results,$i,"SReg");
	$Date_of_Birth=mysql_result($results,$i,"SB_of_Date");
	$Blood_Group=mysql_result($results,$i,"Blood_Group_Name");
	$School=mysql_result($results,$i,"School");
	$College=mysql_result($results,$i,"College");
	$Knows_Programs=mysql_result($results,$i,"Knows_Programs");
	$Interested_In=mysql_result($results,$i,"Interested_In");
	$Working_At=mysql_result($results,$i,"Working_At");
	$House=mysql_result($results,$i,"SHouse");
	$Home_City=mysql_result($results,$i,"SHome_City");
	$Phone_Number=mysql_result($results,$i,"SPh_Number");
	$SE_Mail=mysql_result($results,$i,"SE_Mail");
	$FB_Link=mysql_result($results,$i,"FB_Link");
	$Twitter_Link=mysql_result($results,$i,"Twitter_Link");
	$Blog=mysql_result($results,$i,"Blog");
	$Noted_Activity=mysql_result($results,$i,"Noted_Activity");
	?>
	
	
	<div class="profileuserinterface">

		<?php 
		if (($userdata['admin'] == '1')) {
		?>
<div align="center" style="background-color:#FFFF00; width:500px; height:20px">
		<?php echo " <a href='Student_Edit.php?SID=" . $SID . "&keepThis=true&TB_iframe=true&height=500&width=300&do=edit&modal=true'     	class='thickbox' title='Edit Student - ".$Name."'> Edit my Profile  </a> "; ?>  |
		
				
								<?php echo " <a href='Password_Edit.php?SID=" . $SID . "&keepThis=true&TB_iframe=true&height=200&width=400&do=edit&modal=true'     	class='thickbox' title='Change Password - ".$Name."'> Change my Password  </a> "; ?>  |

		<?php echo " <a href='Single_Mark_List.php? SID=".$SID."'>My  Results Vault  </a>"?> |
		<?php echo " <a href='Message_List_personal.php? SID=".$SID."'> My Messages  </a>"?>
        
		</div>
		 <?php
	 	}
	 	?>
	

	
	
	
	
	
		<?php 
		if (($userdata['SID'] == $SID)) {
		?>
<div align="center" style="background-color:#FFFF00; width:700px; height:20px">
		<?php echo " <a href='Student_Edit.php?SID=" . $SID . "&keepThis=true&TB_iframe=true&height=300&width=300&do=edit&modal=true'     	class='thickbox' title='Edit Student - ".$Name."'> Edit my Profile </a> "; ?>  |
		
								<?php echo " <a href='Password_Edit.php?SID=" . $SID . "&keepThis=true&TB_iframe=true&height=200&width=400&do=edit&modal=true'     	class='thickbox' title='Change Password - ".$Name."'> Change my Password </a> "; ?>  |
                            

		<?php echo " <a href='Single_Mark_List.php? SID=".$SID."'> My Results Vault </a>"?> |
		<?php echo " <a href='Message_List_personal.php? SID=".$SID."'> My Messages  </a>"?>
        <?php echo " <a href='Upload_Project.php?SID=".$SID."'> | upload project  </a>"?>
		</div>
		<?php
	 	}
	 	?>
	 	</div>

<div style="font-weight:bold; font-size:16px; padding-left:10px; color:#0099FF";}><ul><li style="list-style-type: none;"><a href="send_message_to_your_friend.php">Send a Message...</a></li></ul></div>
	
	<div id="margin_figure_profile">
	<br>
	<div class="profilepicturebox">
	<img src="<?php echo $Portrait; ?>" alt="Profile Picture" style="float:right;" width="200">
		</div>

	<br>
	<br>
	<p style="font:Arial, Helvetica, sans-serif; font-size:54px; color:#FFFFFF"><?php echo $Name ; ?></P>
	<br>
	<br>
	<br>
	<p style="padding-top:1px; color:#FFFFFF; font-size:16px">Registration No: <?php echo $Reg; ?></P>
	<br>
	<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Semester: <?php echo $Semester; ?></P>
	<br>
	<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Noted Activity:<?php echo $Noted_Activity; ?></P>
	<br>

	<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Date of Birth:<?php echo $Date_of_Birth; ?></P>
	<br>

	<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Blood Group: <?php echo $Blood_Group; ?></P>
	<br>

	<p style="padding-top:10px; color:#FFFFFF; font-size:16px">House: <?php echo $House; ?></P>
	<br>
	<p style="padding-top:10px; color:#FFFFFF; font-size:16px">Home City: <?php echo $Home_City; ?></P>
	<br>

	<p style="padding-top:10px; color:#FFFFFF; font-size:16px">School:<br></p>
	<br>
	<div class="myprofilebox">
	<p><?php echo $School; ?></P>
	</div>
	<br>
	<br>
	<p style="padding-top:10px; color:#FFFFFF";>College:<br></p>
	<div class="myprofilebox">
	<p><?php echo $College; ?></P>
	</div>
	<br>
	<br>
	<p style="padding-top:10px; color:#FFFFFF";>Knows the Programs:<br></p>
	
	<div class="myprofilebox">
	<p><?php echo $Knows_Programs; ?></P>
	</div>.
	<br>
	<br>
	<p style="padding-top:10px; color:#FFFFFF";>Interested In:<br></p>
	
	<div class="myprofilebox">
	<p><?php echo $Interested_In; ?></P>
	</div>.
	<br>
	<br>
	<p style="padding-top:10px; color:#FFFFFF";>Now Working At:<br></p>
	<div class="myprofilebox">
	<p><?php echo $Working_At; ?></P>
	</div>.
	<br>
	<br>


		<p style="padding-top:10px; color:#FFFFFF";>Contact: <br></p>
		<br>
		<br>
		<div style=" padding-bottom:75px;" class="myprofilebox">
		<p>
		Phone Number: <?php echo $Phone_Number; ?> <br>
		E_Mail: <?php echo $SE_Mail; ?> <br>
		Facebook Link: <?php echo $FB_Link; ?> <br>
		Twitter: <?php echo $Twitter_Link; ?> <br>
		Blog: <?php echo $Blog; ?> <br>
		</p>
		</div>

		
		
		
	
	
	</div>
	<br>
	<br>
	
</div>


		<div class="footer">
<?php include("footer.php");
?>					 
		</div>

</body>

</html>

    <?php
}?>