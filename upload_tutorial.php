<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
    $b = $_SESSION['username'];
    $userrole = mysql_query("select * from userinfo where username='{$b}'");
    $userdata = mysql_fetch_assoc($userrole);
    $SID = $userdata['SID'];
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
                <div id="colOne">
                    <?php
                    include("sidebar.php");
                    ?>
                </div>
                <?php
                if ($isLoggedIn) {
                ?>
                <div id="margin_figure">
                    <?php if($_GET['success']){ ?>
                    <div align="center" style="color: #ffffff; padding-top: 10px">
                        <label style="color: #ffffff; font-size:18px;">Yea! <span style="color:#ffffff">Video tutorial added </span>
                            <span style="color:red">wanna add more???</span>
                    </div>
<?php } ?>
                    <div align="center">
                        <form action="upload_tutorial_save.php" method="post"
                              enctype="multipart/form-data">
                            <div>
                                <br>
                                <br>
                                <table>
                                    <tr>
                                        <td>
                                            <div style="font-weight:bold; color:#FFFFFF;">Select language:</div>
                                        </td>
                                        <td>
                                            <select name="video_tutorial_cat_id" id="video_tutorial_cat_id" selected="">
                                                <?php
                                                    $query = "SELECT DISTINCT video_tutorial_cat_id, video_tutorial_cat_name FROM video_tutorial_category";
                                                    $rs = mysql_query($query) or die ('Error submitting');
                                                    while ($rows = mysql_fetch_assoc($rs)) {
                                                        if ($row["video_tutorial_cat_id"] == $rows["video_tutorial_cat_id"]) {
                                                            $selected = 'selected="selected"';
                                                        } else {
                                                            $selected = '';
                                                        }
                                                        print("<option value=\"" . $rows["video_tutorial_cat_id"] . "\" " . $selected . "  >" . $rows["video_tutorial_cat_name"] . "</option>");
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
                                                    Link:</label></td>
                                            <td>
                                                <textarea required="required" name="tutorial_link" rows="2" cols="40"></textarea>
                                            </td>
                                    </p>
                                    </tr></table>
                                <input name="SID" type="hidden" id="SID" value="<?php echo $_SESSION['SID'];?>"/>
                                </p>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                            <br><br>
                            <div align="right" style="padding-right:165px">
                                <button name="login" type="Submit" class="button button_blue">Upload
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php }else {
                    include("permission_error.php");
                }
                ?>
            </div>
            <div class="footer">
                <div class="footer">
                    <?php include("footer.php");
                    ?>
                </div>
            </div>
    </body>
    </html>