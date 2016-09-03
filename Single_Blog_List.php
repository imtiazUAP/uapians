<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
    include_once("page.inc.php");
    $b = $_SESSION['username'];
    $userrole = mysql_query("select * from userinfo where username='{$b}'");
    $userdata = mysql_fetch_assoc($userrole);
    if (empty($_SESSION['username'])) {
?>
    <script language="JavaScript">
        window.location = "index.php";
    </script>
    <?php
    } else {
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
        <?php include("logo.php");
        ?>
        <div class="realbody" style="min-height:2300px">
            <?php
            include("menu.php");
            ?>
            <div id="wowslider-container1" style="height:200px">
                <?php
                include("slider1.php");
                ?>
            </div>
            <div id="content">
                <div id="colOne">
                    <?php
                    include("sidebar.php");
                    ?>
                </div>
                <div id="content">
                    <div id="colOne">
                    </div>
                    <div id="margin_figure">
                        <div id="new_blog_button"><a href="Blog_Insert.php"> আপনি একটি ব্লগ লিখুন</a></div>
                        <br><br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div>
                            <?php
                                $Blog_ID = $_GET["Blog_ID"];
                                $strquery = "SELECT DISTINCT blog.blog, blog.SID, blog.Date, Blog_ID, SName, SReg, SPortrait, SMName FROM blog INNER JOIN s_info ON blog.SID=s_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMID where Blog_ID='" . $Blog_ID . "'";
                                $results = mysql_query($strquery);
                                $num = mysql_numrows($results);
                                $Blog = mysql_result($results, $i, "Blog");
                                $SID = mysql_result($results, $i, "SID");
                                $Date = mysql_result($results, $i, "Date");
                                //$Blog_ID=mysql_result($results,$i,"Blog_ID");
                                $SName = mysql_result($results, $i, "SName");
                                $SPortrait = mysql_result($results, $i, "SPortrait");
                                $SMName = mysql_result($results, $i, "SMName");
                            ?>
                            <div style="padding-bottom:100px; padding-right:50px; color:#FFFFFF">
                                <img
                                    style="width:60px;padding:2px;border:2px solid white;margin:0px; font-size:18px"
                                    src="<?php echo $SPortrait; ?>" alt="Smiley face"
                                    width="50" height="60" align="right">
                                <div style="padding:10px; font-weight:bold">
                                    <?php echo $SName;
                                    ?>
                                </div>
                                <div style="padding-left:10px">
                                    <?php echo $SMName;
                                    ?>
                                </div>
                                <div
                                    style="width:500px;padding:10px;margin:0px; font-size:11px"><?php echo $Date; ?></div>
                                <div><p style="font-size:14px; font-weight:bold">Article:</p></div>
                                <div
                                    style="width:700px;padding:10px;border:1px solid white;margin:0px; font-size:16px">
                                    <?php echo $Blog;
                                    ?>
                                </div>
                                <?php
                                if (($userdata[admin] == '1')) {
                                    ?>
                                    <div
                                        align="right"><?php echo " <a href='Blog_Edit.php?Blog_ID=" . $Blog_ID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $Blog_ID . "'> Edit This Article </a> "; ?>
                                        | <?php echo " <a href='Blog_Delete.php?Blog_ID=" . $Blog_ID . "'> Delete This Article </a> "; ?></div>
                                <?php
                                }
                                ?>
                                <?php
                                if (($userdata['SID'] == $SID)) {
                                    ?>
                                    <div
                                        align="right"><?php echo " <a href='Blog_Edit.php?Blog_ID=" . $Blog_ID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $Blog_ID . "'> Edit This Article </a> "; ?>
                                        |
                                        <?php
                                        echo " <a href='Blog_Delete.php?Blog_ID=" . $Blog_ID . "'> Delete This Article </a> ";
                                        ?>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                $strquery = "SELECT SName,SPortrait,COMMENT FROM comments INNER JOIN s_info ON comments.SID=s_info.SID WHERE Blog_ID='" . $Blog_ID . "'";
                                $results = mysql_query($strquery);
                                $num = mysql_numrows($results);
                                $i = 0;
                                while ($i < $num) {
                                    $SName = mysql_result($results, $i, "SName");
                                    $SPortrait = mysql_result($results, $i, "SPortrait");
                                    $Comment = mysql_result($results, $i, "Comment");
                                    ?>

                                    <div style="padding-bottom:100px; padding-right:50px; color:#FFFFFF">
                                        <img style="padding:2px;border:2px solid white;margin:0px; font-size:18px"
                                             src="<?php echo $SPortrait; ?>" alt="Smiley face"
                                             width="40" height="50">
                                        <div style="padding:2px; font-weight:bold">
                                            <?php echo $SName; ?>
                                        </div>
                                        <div
                                            style="padding:2px;border:1px solid white;margin:0px; font-size:12px; width:500px"
                                        ;>
                                        <?php echo $Comment; ?>
                                    </div>
                                    <br>
                                    <?php
                                    $i++;
                                }
                                ?>
                                <form action="Comment_Save.php" method="post">
                                    <div>
                                        <input value="<?php echo $userdata['SID']; ?>" name="SID" type="hidden"/>
                                        <input value="<?php echo $Blog_ID; ?>" name="Blog_ID" type="hidden"/>
                                        <div style="font-weight:bold;font-size:20px; color:#FFFFFF;">Comments:
                                        </div>
                                        <textarea name="Comment" rows="4" cols="50" placeholder="Leave your comment here...">
                                        </textarea>
                                        <br>
                                    </div>
                                    <br>
                                    <br>
                                    <div id="detail_blog" float="right">
                                        <input type="Submit" Value="Comment"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <?php include("footer.php");
        ?>
    </div>
</body>
</html>
<?php
}?>