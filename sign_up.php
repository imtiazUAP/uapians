<?php
session_start();
error_reporting(0);
include("dbconnect.php");
include_once("page.inc.php");
$b = $_SESSION['username'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
?>
<html>
<head>
    <?php include("header.php"); ?>
</head>
<body>
<div id="grad1">
    <div class="bodydiv" align="center">
        <?php include("logo.php"); ?>
        <div class="realbody">
            <?php
            include("menu.php");
            ?>
            <div id="content">
                <div id="colOne" align="left">
                    <?php
                    include("sidebar.php");
                    ?>
                </div>
                <?php
                if(!$_POST['email'])
                { ?>
                <br>
                <br>
                <div style="font-size:18px; font-weight:bold; color:#FFFFFF">Sign Up</div>
                <div style="font-size:14px">
                    <p>After successful registration a email will be sent to your valid email account with username and
                        password. Use that user name and password to log in... </p>
                </div>
                <br>
                <br>
                <div align="center">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table align="center">
                            <p>
                                <tr>
                                    <td><label for="name" class="signup_field" data-icon="u">Your Registration: </label>
                                    </td>
                                    <td><input id="lastnamesignup" name="reg" required="required" type="text"
                                               placeholder="ভার্সিটি আইডি নং"/></td>
                                </tr>
                            </p>
                            <p>
                                <tr>
                                    <td><label for="name" class="signup_field" data-icon="u">Your Name: </label></td>
                                    <td><input id="lastnamesignup" name="name" required="required" type="text"
                                               placeholder="আপনার পুর্ন নাম"/></td>
                                </tr>
                            </p>
                            <tr>
                                <td>Semester:</td>
                                <td><select name="SMID" id="SMID">
                                        <?php
                                        $query = "SELECT DISTINCT SMID,SMName FROM sm_info ORDER BY SMID";
                                        $rs = mysql_query($query) or die ('Error submitting');
                                        while ($row = mysql_fetch_assoc($rs)) {
                                            print("<option value=\"" . $row["SMID"] . "\">" . $row["SMName"] . "</option>");
                                        }
                                        ?>
                                </td>
                            </tr>
                            <tr>
                                <td>UAP CSE Batch:</td>
                                <td><select name="Batch_ID" id="Batch_ID">
                                        <?php
                                        $query = "SELECT DISTINCT Batch_ID,Batch_Name FROM batch_info ORDER BY Batch_ID DESC";
                                        $rs = mysql_query($query) or die ('Error submitting');
                                        while ($row = mysql_fetch_assoc($rs)) {
                                            print("<option value=\"" . $row["Batch_ID"] . "\">" . $row["Batch_Name"] . "</option>");
                                        }
                                        ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Blood Group:</td>
                                <td><select name="Blood_Group_ID" id="Blood_Group_ID">
                                        <?php
                                        $query = "SELECT DISTINCT Blood_Group_ID, Blood_Group_Name FROM blood_group_info ORDER BY Blood_Group_ID";
                                        $rs = mysql_query($query) or die ('Error submitting');
                                        while ($row = mysql_fetch_assoc($rs)) {
                                            print("<option value=\"" . $row["Blood_Group_ID"] . "\">" . $row["Blood_Group_Name"] . "</option>");
                                        }
                                        ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Blood Donor:</td>
                                <td><select name="donor_value" id="donor_value">
                                        <?php
                                        $query = "SELECT DISTINCT donor_value,Blood_Donor FROM blood_donor_yes_no ORDER BY donor_value";
                                        $rs = mysql_query($query) or die ('Error submitting');
                                        while ($row = mysql_fetch_assoc($rs)) {
                                            print("<option value=\"" . $row["donor_value"] . "\">" . $row["Blood_Donor"] . "</option>");
                                        }
                                        ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Home City:</td>
                                <td><select name="district_id" id="district_id">
                                        <?php
                                        $query = "SELECT DISTINCT district_id,district_name FROM districts ORDER BY district_id";
                                        $rs = mysql_query($query) or die ('Error submitting');
                                        while ($row = mysql_fetch_assoc($rs)) {
                                            print("<option value=\"" . $row["district_id"] . "\">" . $row["district_name"] . "</option>");
                                        }
                                        ?>
                                </td>
                            </tr>
                                <tr>
                                    <td><label for="Portrait" class="signup_field" data-icon="u">Current Residence:</label></td>
                                    <td><input id="file" name="residence" required="required" type="text" placeholder="ঢাকায় যেখানে থাকেন"/></td>
                                </tr>
                            <p>
                                <tr>
                                    <td><label for="email" class="signup_field" data-icon="u">Your E Mail:</label></td>
                                    <td><input id="lastnamesignup" name="email" required="required" type="email"
                                               placeholder="আপনার ই-মেইল"/></td>
                                </tr>
                            </p>
                            <p>
                                <tr>
                                    <td><label for="Portrait" class="signup_field" data-icon="u">Upload Photo:</label>
                                    </td>
                                    <td><input id="file" name="file" required="required" type="file"
                                               placeholder="required"/></td>
                                </tr>
                            </p>
                            <p>
                                <tr>
                                    <td><label for="Portrait" class="signup_field" data-icon="u">Your Nick Name:</label></td>
                                    <td><input id="file" name="username" required="required" type="text"
                                               placeholder="ডাক নাম"/></td>
                                </tr>
                            </p>
                            <p>
                                <tr>
                                    <td><label for="Portrait" class="signup_field" data-icon="u">Password:</label></td>
                                    <td><input id="file" name="password" required="required" type="password" placeholder="পাসওয়ার্ড"/></td>
                                </tr>
                            </p>
                        </table>
                        <br>
                        <br>
                        <button type="Submit" class="button button_blue">Create my account</button>
                    </form>
                    <?php
                    }elseif($_POST['email']) {

                    $email = $_POST['email'];
                    $query = "SELECT userid, username, SID FROM userinfo WHERE SE_Mail='" . $email . "'";
                    $result = mysql_query($query);
                    $Results = mysql_fetch_array($result);

                    if (count($Results['userid']) >= 1) {
                        $query1 = "SELECT SPortrait FROM s_info WHERE SID='" . $Results['SID'] . "'";
                        $result1 = mysql_query($query1);
                        $Results1 = mysql_fetch_array($result1);
                        $studentPortrait = $Results1['SPortrait'];
                        ?>
                        <div align="center" style="padding-top:30px"><a href="student_profile.php?SID=<?= $Results['SID']; ?>">
                            <img style="width:150px;padding:10px;border:1px solid white;margin:0px; border-radius: 15px;"
                                 src="<?php echo $studentPortrait; ?>"/> </a>
                        </div>
                        </br>
                        <div align="center">
                            <label style="color: white; font-size:14px;">Opps!! <span style="color: #F4D85D;"><?php echo $Results['username']; ?></span> <span style="color: #ff0000">there is already an account created with this email</span>
                                Please reset your password here...<span class="blink_me"><a style="color: #53AA45" href="reset_pass.php" >Reset Password</a></span> </br> <a class="blink_me" style="color: #50B9E8"
                                                                                                                                     href="student_profile.php?SID=<?= $Results['SID'] ?>">Click here to find your profile</a></label>
                        </div>
                    <?php }else{
                    $post_photo = $_FILES['file']['name'];
                    $post_photo_tmp = $_FILES['file']['tmp_name'];
                    $ext = pathinfo($post_photo, PATHINFO_EXTENSION); // getting image extension
                    if ($ext == 'png' || $ext == 'PNG' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'gif' || $ext == 'GIF') {
                        if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG') {
                            ini_set('memory_limit', '-1'); //It will take unlimited memory usage of server
                            $src = imagecreatefromjpeg($post_photo_tmp);
                        }
                        if ($ext == 'png' || $ext == 'PNG') {
                            ini_set('memory_limit', '-1'); //It will take unlimited memory usage of server
                            $src = imagecreatefrompng($post_photo_tmp);
                        }
                        if ($ext == 'gif' || $ext == 'GIF') {
                            ini_set('memory_limit', '-1'); //It will take unlimited memory usage of server
                            $src = imagecreatefromgif($post_photo_tmp);
                        }
                        list($width_min, $height_min) = getimagesize($post_photo_tmp);
                        $newwidth_min = 350;
                        $newheight_min = ($height_min / $width_min) * $newwidth_min;
                        $tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min);
                        imagecopyresampled($tmp_min, $src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);
                        $newfilename = round(microtime(true)) . '.' . $ext;
                        imagejpeg($tmp_min, "images/" . $newfilename, 80); //copy image in folder//
                        $photo_name = 'images/' . $newfilename; // new name with path to save in database
                        /*
                         $lastUserIdResult = mysql_query($sql = "SELECT userid FROM userinfo ORDER BY userid DESC LIMIT 1");
                        $lastUserId = mysql_result($lastUserIdResult, "userid");
                        $nextUserId = $lastUserId + 1;
                        */
                        mysql_query($sql = "INSERT INTO sign_up (SID,SPortrait,SName,SReg,district_id,SHouse,SE_Mail,SMID,Batch_ID,Blood_Group_ID,donor_value,username,password)VALUES ('','$photo_name','" . $_REQUEST['name'] . "','" . $_REQUEST['reg'] . "','" . $_REQUEST['district_id'] . "','" . $_REQUEST['residence'] . "','" . $_REQUEST['email'] . "','" . $_REQUEST['SMID'] . "','" . $_REQUEST['Batch_ID'] . "','" . $_REQUEST['Blood_Group_ID'] . "','" . $_REQUEST['donor_value'] . "','" . $_REQUEST['username'] . "','" . $_REQUEST['password'] . "')");
                        mysql_close($con);
                        ?>
                        </br>
                        </br>
                        <div align="center">
                            <label style="color: #55AA45; font-size:16px;">Contrgratulations!! you signed up successfully <span style="color: #ff0000">Now admin will review your provided information & approve your account,</span>
                                 <span style="color: #ffffff">a confirmation email will be sent to your email within 24 hour then you can log in.. Thank you!</span></br> <a target="_blank" class="blink_me" style="color: #50B9E8"
                                                                                                                                     href="https://www.facebook.com/nokib.mozumder">You can send a message to admin for immidiately accept your account here...</a></label>
                        </div>
                    <?php } else { ?>
                        </br>
                        </br>
                        <div align="center">
                            <label style="color: white; font-size:14px;">Sorry!! <span style="color: #ff0000">Account can not be created.</span>
                                Try again with filling up the sign up form correctly or contact with admin</br> <a class="blink_me" style="color: #50B9E8"
                                                                                                                                     href="student_profile.php?SID=461">Click here to contact with admin</a></label>
                        </div>
                   <?php } }} ?>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php
            include("footer.php");
            ?>
        </div>
</body>
</html>