<?php
session_start();
include ('dbconnect.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Email Test</title>
  <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen">
  <style>
    P {
      text-align: center
    }
  </style>
</head>

<body style="background-color:#661D79">
  <form method="post">
    <tr>
      <td>Blood Group</td>
      <td>
        <select name="SMID" id="SMID" selected="">
          <?php
          $query = "SELECT DISTINCT SMID, SMName FROM sm_info";
          $rs = mysql_query($query) or die('Error submitting');
          while ($rows = mysql_fetch_assoc($rs)) {
            if ($row["SMID"] == $rows["SMID"]) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            print ("<option value=\"" . $rows["SMID"] . "\" " . $selected . "  >" . $rows["SMName"] . "</option>");
          }
          ?>
        </select>
      </td>
    </tr>
    <table align="center" style="padding-top:80px">
      <tr>
        <td width="400px">
          <div align="right" style="margin-right:150px">
            <?php
            // display form if user has not clicked submit
            if (!isset($_POST["submit"])) {
              ?>
              <h2 align="right" style="padding-right:200px; color:#FFFFFF">Contact Form</h2>
              <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <table style="color:#FFFFFF">
                  <tr>
                    <td>Subject:</td>
                    <td><input type="text" name="subject" placeholder="subject"><br></td>
                  </tr>
                  <tr>
                    <td>Message:</td>
                    <td><textarea rows="10" cols="40" name="message" placeholder="your message"></textarea><br></td>
                  </tr>
                  <table>
                    <input type="submit" name="submit" value="Send">
              </form>
            <?php
            } else {
              // the user has submitted the form
              $query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID=$_POST[SMID] ");
              while ($row = mysql_fetch_assoc($query)) {
                $to = $row['SE_Mail'];
                $subject = $_POST["subject"];
                $message = $_POST["message"];
                $headers = 'From: farukahmed@uapians.net' . "\r\n" .
                  'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $message, $headers);
              }
              echo "Your messages sent successfully!!!!!!! Thankyou!";
            }
            ?>
          </div>
        </td>
      </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="footer" align="center">
      <p>Copyright@<a href="http://www.uapians.net"
          style=" color:#F4FA58; text-decoration:none">www.uapians.net</a>|||||||||||Developed by <a
          href="http://www.facebook.com/iliton" target="_blank" style=" color:#F4FA58; text-decoration:none">Imtiaz
          Ahmad</a></p>
    </div>
</body>

</html>