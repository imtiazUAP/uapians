<?php
 session_start();
 error_reporting(0);
 include("dbconnect.php");
 $con=mysql_connect("localhost","root","");
	if(!$con)
	{
		die('Could Not Connect:'.mysql_error());
	}
?>

<html>
    <head>
        <?php include("header.php");?>
    </head>

    <body>
    <div id="grad1">
    <div class="bodydiv" align="center">
        <?php include("logo_for_index.php"); ?>
    <div class="realbody">

    <?php include("menu_for_index.php");?>

        <div id="content">
        <div id="colOne" align="left">
            <?php include("sidebar_for_index.php");?>
        </div>
		
        <br>
        <br>
		
		<?php
		if(isset($_GET['action']))
		{ 
			if($_GET['action']=="reset")
			{
				$encrypt = $_GET['encrypt'];
				$query = "SELECT id FROM users where recovery='".$encrypt."'";
				$result  = mysql_query($query,$con);
				$Results = mysql_fetch_array($result);

				if(count($Results[id])>=1) {
				?>
				
	<body>
	<div align="center">
		</br>               
			<form action="reset_pass.php" method="post" id="reset" >
				<table align="center">
					<tr>
						<td><label for="email" class="signup_field" data-icon="u">Enter a new password: </label></td>
						<td><input id="password" name="password" required="required" type="password" placeholder="new password"></td>
						<input name="action" type="hidden" value='<?= $encrypt ?>'>
						<td><button name="login" type="Submit" class="button button_blue">Reset Password</button></td>
					</tr>
				</table>
			</form>
			</div>
	
			<?php } else
				{
					echo 'Invalid key please try again. <a href="reset_pass.php">Forget Password?</a>';
				}
			}
		}
		elseif(isset($_POST['action'])){
			$encrypt      = $_POST['action'];
			$password     = $_POST['password'];
			$query = "SELECT id FROM users where recovery = '".$encrypt."'";
			
			$result  = mysql_query($query,$con);
			$Results = mysql_fetch_array($result);
				
			if(count($Results[id])>=1){
				$query = "update users set password='".md5($password)."' where id='".$Results['id']."'";
				mysql_query($query,$con);

				echo 'Your password changed sucessfully <a href="index.php">click here to login</a>.';
			}else{
				echo 'Invalid key please try again. <a href="reset_pass.php">Forget Password?</a>';
			}
		}else{
			?>
			
			<div align="center">
				<form action="reset_pass_request.php" method="post" enctype="multipart/form-data">
					<table align="center">
						<tr>
							<td><label for="email" class="signup_field" data-icon="u">Your E Mail:</label> </td>
							<td><input id="lastnamesignup" name="email" required="required" type="text" placeholder="example@yahoo.com" /></td>
							<td><button type="Submit" class="button button_blue">Reset Password</button></td>
						</tr>
					</table>
					<br>
					<br>
				</form>
			</div>
			
			<?php } ?>		
		
		</div>
		</div>
		<div class="footer">
			<?php include("footer.php");?>
		</div>

    </body>
</html>