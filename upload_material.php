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
                    <?php if(!$_POST["SID"]) {?>
                    <div align="center">
                        <form action="upload_material.php" method="post"
                              enctype="multipart/form-data">
                            <div>
                            <table>
                                <tr>
                                    <td>
                                        <div style="color:#FFFFFF;">Course Name:</div>
                                    </td>
                                    <td>
                                        <select name="CID" id="CID" selected="">
                                            <?php
                                                $query = "SELECT DISTINCT CID, CName FROM c_info";
                                                $rs = mysql_query($query) or die ('Error submitting');
                                                while ($rows = mysql_fetch_assoc($rs)) {
                                                    if ($row["CID"] == $rows["CID"]) {
                                                        $selected = 'selected="selected"';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                    print("<option value=\"" . $rows["CID"] . "\" " . $selected . "  >" . $rows["CName"] . "</option>");
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:#FFFFFF;">Course Teacher:</div>
                                    </td>
                                    <td>
                                        <select name="EID" id="EID" selected="">
                                            <?php
                                                $query = "SELECT DISTINCT EID, EName FROM e_info";
                                                $rs = mysql_query($query) or die ('Error submitting');
                                                while ($rows = mysql_fetch_assoc($rs)) {
                                                    if ($row["EID"] == $rows["EID"]) {
                                                        $selected = 'selected="selected"';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                    print("<option value=\"" . $rows["EID"] . "\" " . $selected . "  >" . $rows["EName"] . "</option>");
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:#FFFFFF;">Semester:</div>
                                    </td>
                                    <td>
                                        <select name="SMID" id="SMID" selected="">
                                            <?php
                                                $query = "SELECT DISTINCT SMID,SMName FROM sm_info WHERE SMID < 9";
                                                $rs = mysql_query($query) or die ('Error submitting');
                                                while ($rows = mysql_fetch_assoc($rs)) {
                                                    if ($row["SMID"] == $rows["SMID"]) {
                                                        $selected = 'selected="selected"';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                    print("<option value=\"" . $rows["SMID"] . "\" " . $selected . "  >" . $rows["SMName"] . "</option>");
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="email" class="signup_field" data-icon="u">Material Detail:</label>
                                    </td>
                                    <td>
                                        <textarea  required="required" placeholder="A short description about this material" name="Detail" rows="2" cols="40"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label  for="email" class="signup_field" data-icon="u">Material Link:</label>
                                    </td>
                                    <td>
                                        <textarea required="required" placeholder="Dropbox/Google Drive/ Facebook ETC" name="Reference_Link" rows="2" cols="40"></textarea>
                                    </td>
                                </tr>
                            </table>
                                <input name="SID" type="hidden" id="SID" value="<?php echo $SID;?>"/>
                            </div>
                            <br><br>
                            <div align="right" style="padding-right:165px">
                                <button name="login" type="Submit" class="button button_blue">Upload Material
                                </button>
                            </div>
                        </form>
                    </div>
                <?php
                    } else {
                        mysql_query($sql = "INSERT INTO reference_info (CID,EID,Reference_Link,SMID,Detail,uploaded_by)VALUES ('" . $_REQUEST['CID'] . "','" . $_REQUEST['EID'] . "','" . $_REQUEST['Reference_Link'] . "','" . $_REQUEST['SMID'] . "','" . $_REQUEST['Detail'] . "','" . $_REQUEST['SID'] . "')");
                        ?>
                        <div align="center">
                            <label style="color: white; font-size:14px;">Course Material Uploaded!!
                                Thank You! It will help others to grow! If you want to upload another material  </br> <a style="color: #50B9E8"
                                                                                                      href="upload_material.php">click
                                    here</a></label>
                        </div>
                <?php
                    }
                    ?>
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