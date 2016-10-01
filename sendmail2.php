<?php
session_start();
error_reporting(0);
include('dbconnect.php');

$b = $_SESSION['username'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
?>
<html>
    <head>
        <?php
        include("header.php");
        ?>
    </head>
    <body>
        <div id="grad1">
            <div class="bodydiv">
                <?php
                include("logo.php");
                ?>
                <div class="realbody">
                    <?php
                    include("menu.php");
                    ?>
                    <div id="content">
                        <div id="colOne">
                            <?php
                            include("sidebar.php");
                            ?>
                        </div>
                        <?php
                        if ($isLoggedIn) {
                        ?>
                        <?php
                        if ($_POST[send_mail_option_id] == '1') {
                            $query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='1' ");
                        }
                        if ($_POST[send_mail_option_id] == '2') {
                            $query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='2' ");
                        }
                        if ($_POST[send_mail_option_id] == '3') {
                            $query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='3' ");
                        }
                        if ($_POST[send_mail_option_id] == '4') {
                            $query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='4' ");
                        }
                        if ($_POST[send_mail_option_id] == '5') {
                            $query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='5' ");
                        }
                        if ($_POST[send_mail_option_id] == '6') {
                            $query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='6' ");
                        }
                        if ($_POST[send_mail_option_id] == '7') {
                            $query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='7' ");
                        }
                        if ($_POST[send_mail_option_id] == '8') {
                            $query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='8' ");
                        }
                        if ($_POST[send_mail_option_id] == '9') {
                            $query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='1' OR SMID='2' OR SMID='3' OR SMID='4' OR SMID='5' OR SMID='6' OR SMID='7' OR SMID='8' ");
                        }
                        if ($_POST[send_mail_option_id] == '10') {
                            $query = mysql_query("SELECT SE_Mail FROM s_info ");
                        }
                        if ($_POST[send_mail_option_id] == '11') {
                            $query = mysql_query("SELECT SE_Mail FROM e_info ");
                        }
                        if ($_POST[send_mail_option_id] == '12') {
                            $query = mysql_query("SELECT SE_Mail FROM s_info WHERE SMID='12' ");
                        }

                        while ($row = mysql_fetch_assoc($query)) {

                            $strTo = $row['SE_Mail'];
                            $strSubject = $_POST["txtSubject"];
                            $strMessage = nl2br($_POST["txtDescription"]);

                            //*** Uniqid Session ***//
                            $strSid = md5(uniqid(time()));

                            $strHeader = "";
                            $strHeader .= "From: " . $_POST["txtFormName"] . "<" . $_POST["txtFormEmail"] . ">\nReply-To: " . $_POST["txtFormEmail"] . "" . "X-Mailer: PHP/" . phpversion();

                            //******* 'From: faruk@uapians.net' . "\r\n" .'Reply-To: '.$POST["txtFormEmail"]. "\r\n" .'X-Mailer: PHP/' . phpversion(); ***********//
                            //*******  From: Mr.Weerachai Nukitram<webmaster@shotdev.com>\nReply-To: shotdev@hotmail.com"; ***********//

                            $strHeader .= "MIME-Version: 1.0\n";
                            $strHeader .= "Content-Type: multipart/mixed; boundary=\"" . $strSid . "\"\n\n";
                            $strHeader .= "This is a multi-part message in MIME format.\n";

                            $strHeader .= "--" . $strSid . "\n";
                            $strHeader .= "Content-type: text/html; charset=utf-8\n";
                            $strHeader .= "Content-Transfer-Encoding: 7bit\n\n";
                            $strHeader .= $strMessage . "\n\n";

                            //*** Attachment ***//
                            if ($_FILES["fileAttach"]["name"] != "") {
                                $strFilesName = $_FILES["fileAttach"]["name"];
                                $strContent = chunk_split(base64_encode(file_get_contents($_FILES["fileAttach"]["tmp_name"])));
                                $strHeader .= "--" . $strSid . "\n";
                                $strHeader .= "Content-Type: application/octet-stream; name=\"" . $strFilesName . "\"\n";
                                $strHeader .= "Content-Transfer-Encoding: base64\n";
                                $strHeader .= "Content-Disposition: attachment; filename=\"" . $strFilesName . "\"\n\n";
                                $strHeader .= $strContent . "\n\n";
                            }

                            $flgSend = @mail($strTo, $strSubject, null, $strHeader); // @ = No Show Error //

                        }
                        if ($flgSend) {
                            echo "Mail send completed. Thakyou!!!";
                        } else {
                            echo "Sorry!!! Cannot send mail.";
                        }
                        ?>
                    </div>
                <?php }else {
                    include("permission_error.php");
                }
                ?>
                </div>
        <div class="footer">
            <?php
            include("footer.php");
            ?>
        </div>
            </div>
        </div>
    </body>
</html>