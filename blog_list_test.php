<?php
session_start();
error_reporting(0);
include('dbconnect.php');
include_once("page.inc2.php");
$b=$_SESSION['username'];
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
                <div class="realbody" style="min-height:2100px">
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
                        $sql = "SELECT DISTINCT blog.blog, blog.SID, blog.Date, Blog_ID, SName, SReg, SPortrait, SMName FROM blog INNER JOIN s_info ON blog.SID=s_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMID ORDER BY Blog_ID desc";
                        $result = @mysql_query($sql);
                        $total_records = @mysql_num_rows($result);
                        $record_per_page = 5;
                        $scroll = 4;
                        $page = new Page(); ///creating new instance of Class Page
                        $page->set_page_data($_SERVER['PHP_SELF'], $total_records, $record_per_page, $scroll, true, true, true);
                        $result = @mysql_query($page->get_limit_query($sql));
                    ?>
                    <div id="margin_figure">
                        <div style="background-color:#54A944; color: #ffffff; font-size: 14px; border-radius: 5px; height: 20px; padding: 5px"><label>UAPians.Net এ এখন ব্লগ আছে সর্বমোটঃ</label> <?php echo($total_records); ?> টি</div>
                        <div  id="new_blog_button"><a href="blog_insert.php"> আপনি একটি ব্লগ লিখুন</a></div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <?php
                        while ($data = mysql_fetch_assoc($result)) {
                        ?>
                            <div class="blog" style="padding-bottom:100px; padding-right:50px; color:#FFFFFF">
                                <a href='student_profile.php? SID=<?= $data['SID'] ?>'><img src=<?php echo $data['SPortrait'] ? $data['SPortrait'] : '14101071.jpg' ?> echo style="width:60px;padding:2px;border:2px solid white;margin:0px; font-size:18px;  border-radius: 35px;" alt="Smiley face" width="50" height="60" align="right">
                                </a>
                                <div style="padding:10px; font-weight:bold"><?php echo $data['SName'] ; ?> </div>
                                <div style="padding-left:10px"><?php echo $data['SMName'] ; ?></div>
                                <div style="width:500px;padding:10px;margin:0px; font-size:11px"><?php echo $data['Date'] ?></div>
                                <div><p style="font-size:14px; font-weight:bold">Article:</p></div>

                                <div style="background-color:#0F1628; width:700px;padding:10px;border:1px solid white;margin:0px; font-size:16px; border-radius: 15px;">
                                    <?php if(strlen($data['blog']) < 300){
                                        echo($data['blog']);
                                    } else {
                                        echo(substr($data['blog'], 0, 300)."...");
                                        ?>
                                        <a style="color: #55AA45" href='single_blog_list.php? Blog_ID=<?php echo($data['Blog_ID']) ?>'> Read more>> </a>
                                    <?php } ?>
                                </div>
                                <div id="detail_blog"> <a href='single_blog_list.php? Blog_ID=<?php echo($data['Blog_ID']) ?>'> See comments on this post>> </a> </div>


                                <?php
                                if (($isLoggedIn && $isAdmin || $userdata['SID'] == $SID)) {
                                    ?>
                                    <div align="right"><?php echo " <a href='blog_edit.php?Blog_ID=" . $data['Blog_ID'] . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $data['Blog_ID'] . "'> Edit This Article </a> "; ?>
                                        | <?php echo " <a href='blog_delete.php?Blog_ID=" . $data['Blog_ID'] . "'> Delete This Article </a> "; ?></div>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                        </table>
                        <?php
                        echo $page->get_page_nav();
                        ?>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php include("footer.php");
            ?>
        </div>
    </body>
</html>