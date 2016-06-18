<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
</head>
<body>
<?php
 include('dbconnect.php');
 
	  mysql_query($sql="
	  
	  INSERT INTO s_info (SID,SPortrait,SName,SReg,SHouse,district_id,SPh_Number,SE_Mail,SB_of_Date,SMID,Blood_Group_ID,donor_value,Noted_Activity, School, College, Knows_Programs,Interested_In,Working_At,FB_Link,Twitter_Link,Blog)VALUES ('" . $_REQUEST['SID'] . "','" . $_REQUEST['SPortrait'] . "','" . $_REQUEST['SName'] . "','" . $_REQUEST['SReg'] . "','" . $_REQUEST['SHouse'] . "','" . $_REQUEST['district_id'] . "','" . $_REQUEST['SPh_Number'] . "','" . $_REQUEST['SE_Mail'] . "','" . $_REQUEST['dob'] . "','" . $_REQUEST['SMID'] . "','" . $_REQUEST['Blood_Group_ID'] . "','" . $_REQUEST['donor_value'] . "','" . $_REQUEST['Noted_Activity'] . "','" . $_REQUEST['School'] . "','" . $_REQUEST['College'] . "','" . $_REQUEST['Knows_Programs'] . "','" . $_REQUEST['Interested_In'] . "','" . $_REQUEST['Working_At'] . "','" . $_REQUEST['FB_Link'] . "','" . $_REQUEST['Twitter_Link'] . "','" . $_REQUEST['Blog'] . "')");
	  
	  $password=$_REQUEST['password'];
	 mysql_query($sql="INSERT INTO userinfo (username,password,Reg,SID) VALUES ('" . $_REQUEST['username'] . "','" . md5($password) . "','" . $_REQUEST['SReg'] . "','" . $_REQUEST['SID'] . "')");
	  
  





  
    $email=$_REQUEST['SE_Mail'];
    $username=$_REQUEST['username'];
    $pasword=$_REQUEST['password'];
    $from ="info@uapians.net"; // sender
    $subject ="Profile Activated";
    $message ="Your Profile is Activated at http://www.uapians.net please log in to continue.... Username:$username   Password:$pasword  Thank You!!!";
    // message lines should not exceed 70 characters (PHP rule), so wrap it
    $message = wordwrap($message, 70);
    // send mail
    mail("$email",$subject,$message,"From: $from\n");




 $results=mysql_query ($strquery);
echo "This Profile is activated!  Message Sent!!! Thank you";







?>
<div align="center">
<label>
<br>
<br>
<a href="#" onClick="tb_remove();">Close</a>
</label>
</div>
</body>
</html>