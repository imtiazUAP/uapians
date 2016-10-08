<?php
session_start();
error_reporting(0);
$b = $_SESSION['username'];
include("dbconnect.php");
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
                        <div id="colOne"><?php
                            include("sidebar.php");
                            ?>
                        </div>
                       <?php if ($isLoggedIn && $authentication->isOwner($userdata['SID'])){ ?>
                    <div id="margin_figure">
                        <form action="blog_save.php" method="post">
                            <div>
                                <input value="<?php echo $userdata['SID'];?>" name="SID" type="hidden"/>
                                <br>
                                <div style="font-weight:bold; color:#FFFFFF;">Write you blog:</div>
                                <textarea placeholder="Write your blog here" name="Blog" cols="80" rows="15"></textarea><br>
                            </div>
                            <br>
                            <br>
                            <div align="right" style="padding-right:165px">
                                <button name="login" type="Submit" class="button button_blue">Save & Post
                                </button>
                            </div>
                        </form>
                        <div>
                        <?php
                        $strquery="SELECT DISTINCT blog.blog,blog.SID, blog.Date,Blog_ID, SName,SReg,SPortrait, SMName FROM blog INNER JOIN s_info ON blog.SID=s_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMID ORDER BY Blog_ID desc";
                        $results=mysql_query($strquery);
                        $num=mysql_numrows($results);
                        $i=0;
                        while ($i< $num)
                        {
                        $Blog=mysql_result($results,$i,"Blog");
                        $SID=mysql_result($results,$i,"SID");
                        $Date=mysql_result($results,$i,"Date");
                        $Blog_ID=mysql_result($results,$i,"Blog_ID");
                        $SName=mysql_result($results,$i,"SName");
                        $SPortrait=mysql_result($results,$i,"SPortrait");
                        $SMName=mysql_result($results,$i,"SMName");
                        ?>
                        <div style="padding-bottom:100px; padding-right:50px; color:#FFFFFF"> <img style="width:60px;padding:2px;border:2px solid white;margin:0px; font-size:18px"src="<?php echo $SPortrait; ?>" alt="Smiley face" width="50" height="60" align="right">
                        <div style="padding:10px; font-weight:bold"><?php echo $SName ; ?> </div>
                        <div style="padding-left:10px"><?php echo $SMName ; ?></div>
                        <div style="width:500px;padding:10px;margin:0px; font-size:11px"><?php echo $Date; ?></div>
                        <div><p style="font-size:14px; font-weight:bold">Article:</p></div>
                        <div style="width:700px;padding:10px;border:1px solid white;margin:0px; font-size:16px"><?php echo $Blog ; ?></div>

                            <?php
                            if ($isLoggedIn && $isAdmin) {
                                ?>
                                <div align="right"><?php echo " <a href='blog_edit.php?Blog_ID=" . $Blog_ID . "&keepThis=true&TB_iframe=true&height=300&width=650&do=edit&modal=true' class='thickbox' title='Edit Course - " . $Blog_ID . "'> Edit This Article </a> "; ?> | <?php echo " <a href='blog_delete.php?Blog_ID=" . $Blog_ID . "'> Delete This Article </a> "; ?></div>
                            <?php
                            }
                            ?>
                            <?php
                            if (($userdata['SID'] == $SID)) {
                                ?>
                                <div align="right"><?php echo " <a href='blog_edit.php?Blog_ID=" . $Blog_ID . "&keepThis=true&TB_iframe=true&height=300&width=650&do=edit&modal=true' class='thickbox' title='Edit Course - " . $Blog_ID . "'> Edit This Article </a> "; ?> | <?php echo " <a href='blog_delete.php?Blog_ID=" . $Blog_ID . "'> Delete This Article </a> "; ?></div>
                            <?php
                            }
                            ?>
                        </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>

                </div>
                       <?php }else {
                           include("permission_error.php");
                       } ?>
            </div>
        </div>
        <div class="footer">
            <?php include("footer.php");
            ?>
        </div>
    </body>
</html>