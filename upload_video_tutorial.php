<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
?>
<?php
$b = $_SESSION['email'];
//$c=$_SESSION['userid'];
$userrole = mysql_query("select * from userinfo where email='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
$SID = $userdata['SID'];
?>
<html>

<head>
    <?php
    include ("header.php");
    ?>
</head>

<body>
    <div id="canvas">
        <div class="body_wrapper">
            <?php include ("logo.php"); ?>
            <div class="body" style="min-height:2300px">
                <?php include ("menu.php"); ?>
                <div id="content">
                    <div align="center">
                        <form action="upload_video_tutorial_save.php" method="post" enctype="multipart/form-data">
                            <div>
                                <br>
                                <br>
                                <table>
                                    <tr>
                                        <td>
                                            <div style="font-weight:bold; color:#FFFFFF;">Select your language:</div>
                                        </td>
                                        <td>
                                            <select name="video_tutorial_cat_id" id="video_tutorial_cat_id" selected="">
                                                <?php
                                                $query = "SELECT DISTINCT video_tutorial_cat_id, video_tutorial_cat_name FROM video_tutorial_category";
                                                $rs = mysql_query($query) or die('Error submitting');
                                                while ($rows = mysql_fetch_assoc($rs)) {
                                                    if ($row["video_tutorial_cat_id"] == $rows["video_tutorial_cat_id"]) {
                                                        $selected = 'selected="selected"';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                    print ("<option value=\"" . $rows["video_tutorial_cat_id"] . "\" " . $selected . "  >" . $rows["video_tutorial_cat_name"] . "</option>");
                                                }
                                                ?>
                                            </select>
                                    </tr>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <p>
                                        <tr>
                                            <td>
                                                <label for="email" class="signup_field" data-icon="u">Tutorial Embed
                                                    Link:</label>
                                            </td>
                                            <td>
                                                <textarea name="tutorial_link" rows="2" cols="40">
</textarea>
                                            </td>
                                    </p>
                                    </tr>
                                </table>
                                </p>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                            <br><br>
                            <div align="right" style="padding-right:165px">
                                <input type="Submit" />
                            </div>
                        </form>
                    </div>
                    <!-- !!!!!!!!!!!!!!!!!!!!!!-->
                </div>
            </div>
            <div class="footer">
                <div class="FooterText">
                    <a href="http://www.emtiaj.blogspot.com" target="_blank">copyright @ www.emtiaj.blogspot.com</a>
                    |||||
                    <a href="http://uap-bd.edu/cse/index.html" target="_blank">copyright @ CSE Department, UAP</a> <br>
                </div>
            </div>
</body>

</html>
<?php
?>