<?php
$con=mysql_connect("localhost","root","");
if(!$con)
{
	die('Could Not Connect:'.mysql_error());
	}
	mysql_select_db("uapians_mylab",$con);

	$email  = $_POST['email'];
	$query = "SELECT id FROM users where email='".$email."'";
	$result  = mysql_query($query,$con);
	$Results = mysql_fetch_array($result);
	$id      = $Results[id];	
 
	if(count($id)>=1){
		$encrypt = md5(90*13+$Results['id']);
		$message = "Your password reset link send to your e-mail address.";
		$to=$email;
		$subject="Forget Password";
		$from = 'emtiaj@yahoo.com';
		$body='Hi, <br/> <br/>Your Membership ID is '.$Results['id'].' <br><br>Click here to reset your password https://localhost/uapians/reset_pass.php?encrypt='.$encrypt.'&action=reset   <br/> <br/>--<br>UAPians.<br>Solve your problems.';
		$headers = "From: " . strip_tags($from) . "\r\n";
		$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		$query = "update users set recovery='".$encrypt."' where id='".$Results['id']."'";
		mysql_query($query,$con);
		
		mail($to,$subject,$body,$headers);

	}else {
		echo "Account not found please signup now!!";	
	}

mysql_close($con)

?>