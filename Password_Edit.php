<html>
<?php
include ('dbconnect.php');
$strquery = "SELECT SID,userid,username,password from userinfo where SID= '" . $_GET["SID"] . "' ";
$results = mysql_query($strquery);
$row = mysql_fetch_array($results);
?>

<head>
  <script type="text/javascript" src="assets/js/jquery.js"></script>
  <script type="text/javascript" src="assets/js/thickbox.js"></script>
  <link rel="stylesheet" href="assets/css/thickbox.css" type="text/css" media="screen" />
</head>

<body>
  <form id="form1" name="form1" method="get" action="Password_Update.php">
    <table style="padding:30px">
      <tr>
        <td>Your username:</td>
        <td><?php echo $row["username"]; ?></td>
      </tr>
      <tr>
        <td>Type Your New Password:</td>
        <td><input name="new_password" type="password" id="new_password" placeholder="Type new password" /></td>
      </tr>
    </table>
    <input name="SID" type="hidden" id="SID" value=" <?php echo $row["SID"]; ?>" />
    <p>
      <label>
        <input type="submit" name="Submit" value="Update" />
        <a href="#" onClick="tb_remove();">Close</a>
      </label>
    </p>
  </form>

</html>