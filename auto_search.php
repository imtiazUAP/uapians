<?php
include('db.php');
if($_POST)
{
$q=$_POST['search'];
$sql_res=mysql_query("select SID,SName,SReg from s_info where SName like '%$q%' or SReg like '%$q%' order by SID LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$username=$row['SName'];
$email=$row['SReg'];
$b_username='<strong>'.$q.'</strong>';
$b_email='<strong>'.$q.'</strong>';
$final_username = str_ireplace($q, $b_username, $username);
$final_email = str_ireplace($q, $b_email, $email);
?>
<div class="show" align="left">
<img src="images/11201028.jpg" style="width:50px; height:50px; float:left; margin-right:6px;" /><span class="name"><?php echo $final_username; ?></span>&nbsp;<br/><?php echo $final_email; ?><br/>
</div>
<?php
}
}
?>