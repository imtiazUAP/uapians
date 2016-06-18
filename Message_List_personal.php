<?php
 session_start();
include("dbconnect.php");
 ?>
<?php
$b=$_SESSION['username'];

$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
//echo $userdata['Reg'];
$Reg=$userdata['Reg'];


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







<div class="realbody" style="min-height:2300px">



<?php include("menu.php"); ?>

<form>




<?php

$strquery="SELECT Message,SUBJECT,SName,SReg FROM messages INNER JOIN s_info ON messages.SID=s_info.SID WHERE Receiver_Reg='".$Reg."'";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)
{
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