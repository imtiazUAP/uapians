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
            <div class="realbody" style="min-height:2300px">

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
                    <div align="center">
                        <form action="upload_project_save.php" method="post"
                              enctype="multipart/form-data">
                            <div>
                            <table>
                                <tr>
                                    <td>
                                        <div style="color:#FFFFFF;">Project Language:</div>
                                    </td>
                                    <td>
                                        <select name="language_id" id="language_id" selected="">
                                            <?php
                                                $query = "SELECT DISTINCT language_id, language_name FROM language_table";
                                                $rs = mysql_query($query) or die ('Error submitting');
                                                while ($rows = mysql_fetch_assoc($rs)) {
                                                    if ($row["language_id"] == $rows["language_id"]) {
                                                        $selected = 'selected="selected"';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                    print("<option value=\"" . $rows["language_id"] . "\" " . $selected . "  >" . $rows["language_name"] . "</option>");
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="email" class="signup_field" data-icon="u">Project Title:</label>
                                    </td>
                                    <td>
                                        <textarea required="required" name="project_name" rows="2" cols="40"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:#FFFFFF;">Project Platform:</div>
                                    </td>
                                    <td>
                                        <select name="platform_id" id="platform_id" selected="">
                                            <?php
                                                $query = "SELECT DISTINCT platform_id, platform_name FROM platform_table";
                                                $rs = mysql_query($query) or die ('Error submitting');
                                                while ($rows = mysql_fetch_assoc($rs)) {
                                                    if ($row["platform_id"] == $rows["platform_id"]) {
                                                        $selected = 'selected="selected"';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                    print("<option value=\"" . $rows["platform_id"] . "\" " . $selected . "  >" . $rows["platform_name"] . "</option>");
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:#FFFFFF;">Project Category:</div>
                                    </td>
                                    <td>
                                        <select name="project_cat_id" id="cat_id" selected="">
                                            <?php
                                                $query = "SELECT DISTINCT cat_id,cat_name FROM project_category_table";
                                                $rs = mysql_query($query) or die ('Error submitting');
                                                while ($rows = mysql_fetch_assoc($rs)) {
                                                    if ($row["cat_id"] == $rows["cat_id"]) {
                                                        $selected = 'selected="selected"';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                    print("<option value=\"" . $rows["cat_id"] . "\" " . $selected . "  >" . $rows["cat_name"] . "</option>");
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="email" class="signup_field" data-icon="u">Project Demo Link:</label>
                                    </td>
                                    <td>
                                        <textarea name="project_link" rows="2" cols="40"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="email" class="signup_field" data-icon="u">Source Code Link:</label>
                                    </td>
                                    <td>
                                        <textarea  name="source_code_link" rows="2" cols="40"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="Portrait" class="signup_field" data-icon="u">Project Screenshot:</label>
                                    </td>
                                    <td>
                                        <input id="file" name="file" required="required" type="file"
                                               placeholder="required"/>
                                    </td>
                                </tr>
                            </table>
                                <input name="SID" type="hidden" id="SID" value="<?php echo $SID;
                                ?>"/>

                            </div>
                            <br><br>
                            <div align="right" style="padding-right:165px">
                                <button name="login" type="Submit" class="button button_blue">Upload Project
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
                    <?php include("footer.php");
                    ?>
            </div>
    </body>
    </html>