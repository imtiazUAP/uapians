<?php
    session_start();
    include('dbconnect.php');
include("classes/Authentication.php");
?>

<!DOCTYPE html>
<html>
                <head>
                    <title>Email Test</title>
                    <link rel="stylesheet" href="css/style.css" type="text/css"/>
                    <style type="text/css">._css3m {
                            display: none
                        }
                    </style>
                </head>

    <body style="background-color:#661D79">
    <?php
    if ($isLoggedIn) {
    ?>

        <table align="center" style="padding-top:80px">
    <tr>

        <td width="400px">
       <div align="right" style="margin-right:150px">
    <?php
    // display form if user has not clicked submit
    if (!isset($_POST["submit"])) {
      ?>
      <h2 align="right" style="padding-right:200px; color:#FFFFFF">Contact Form</h2>

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
      <table style="color:#FFFFFF">
                  <tr>
                      <td>From:</td> <td><input type="text" name="from" placeholder="email address"><br></td>
                  </tr>
                  <tr>
                      <td>Subject:</td> <td><input type="text" name="subject" placeholder="subject"><br></td>
                  </tr>
                  <tr>
                       <td>Message:</td> <td><textarea rows="10" cols="40" name="message" placeholder="your message"></textarea><br></td>
                  </tr>
                      <table>
                          <input type="submit" name="submit" value="Send">
                                 </form>

                              <?php
                                   }
                                   else
                                   {
                            // the user has submitted the form
                              // Check if the "from" input field is filled out
                                          if (isset($_POST["from"])) {

                                            $from = $_POST["from"]; // sender
                                            //$to='emtiaj@yahoo.com,emtiaj2011@yahoo.com';



                                            $to = $SE_Mail;


                                            $subject = $_POST["subject"];
                                            $message = $_POST["message"];
                                            // message lines should not exceed 70 characters (PHP rule), so wrap it
                                            $message = wordwrap($message, 70);
                                            // send mail
                                            mail($to,$subject,$message,"From: $from\n");
                                            echo "Message Sent! Thank you for sending us feedback";
                                          }
                            }
                            ?>

                            <?php
                                   $query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='12' ");
                                    while ($row = mysql_fetch_assoc($query)) {

                                              $to      = $row['SE_Mail'];
                                              $subject = 'the subject';
                                              $message = 'hello this is test 2 after database ok';
                                              $headers = 'From: webmaster@example.com' . "\r\n" .
                                                'X-Mailer: PHP/' . phpversion();

                                              mail($to, $subject, $message, $headers);
                                              echo "Message Sent! Thank you for sending us feedback";
                                    }
                            ?>
                         </div>
                         </td>
                         </tr>
                      </table>
    </table>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            <div class="footer" align="center">
               <?php include('footer.php'); ?>
            </div>
    <?php }else {
        include("permission_error.php");
    }
    ?>
    </body>
</html>