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
                        <div id="margin_figure">
                            <div>
                                <div id="paragraph_head">
                                    <h1 align="left" style="color:#FFFFFF"><img src="images/system_images/mission_icon.png">Welcome Champ...</h1>
                                </div>
                                <p align="left" style="font-size:16; font-weight:bold">UAPIANS.NET মুলত ইউনিভার্সিটি স্টুডেন্টদের মিলনমেলা...</p>
                                <p align="left" style="font-size:14">
                                    কম্পিউটার সায়েন্সে পড়ুয়া কতিপয় তরুনের উদ্যোগে আত্মপ্রকাশ করা UAPIANS.NET মুলত ইউনিভার্সিটি স্টুডেন্টদের মিলনমেলা। প্রাথমিকভাবে শুধুমাত্র University of Asia Pacific এর কম্পিউটার বিজ্ঞান প্রকৌশল বিভাগের জন্য উন্মুক্ত, তবে ধীরে ধীরে অন্যান্য ডিপার্টমেন্ট এবং সারা বাংলাদেশের সকল বিশ্ববিদ্যালয়ের মাঝে ছড়িয়ে দেয়ার পরিকল্পনা চলছে।
                                    সম্পূর্নই আনঅফিসিয়াল এ এপ্লিকেশনটি বিশ্ববিদ্যালয় পর্যায়ের স্টুডেন্টদের মধ্যে পারষ্পরিক মেলবন্ধনের ক্ষেত্রে এক অনবদ্য ভূমিকা রাখবে বলে আশা করা যায়। ছাত্রছাত্রীদের নিজেরদের মধ্যে পারষ্পরিক যোগাযোগ, অটোমেটেড ডিজিটালাইজড রেজাল্টশীট প্রস্তুতকরুন, নোটস আদান প্রদান এবং সর্বোপরি বিভিন্ন বিষয়ে পারষ্পরিক সহযোগীতা এবং বিভিন্ন প্ল্যাটফরমের উপর নিজেদের ভেতরে আলোচনার সুযোগ থাকছে। সেই সাথে আছে ব্লাড ব্যাঙ্ক এবং এক অসম্ভব হেল্পফুল একটি স্বেচ্ছাসেবক টিম আপনার সহযোগীতার জন্য যারা সর্বাত্মক চেষ্টা করে যাবে যে কোন প্রয়োজনে।
                                    আপনি যদি একজন UAPian হয়ে থাকেন তবে দেরী না করে এখনই রেজিস্ট্রেশন করে ফেলুন এবং চলে আসুন আমাদের পরিবারে।
                                    It’s time to be united, time to shout out together…</p>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div align="center">
                                <div id="paragraph_head">
                                    <h1 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ; text-decoration:blink"><img src="images/system_images/news_icon.png">News Feed............</h1>
                                </div>
                                <marquee behavior="scroll" direction="up"  style="vertical-align:middle;text-align:center; cursor:pointer;color:#0099FF; font-size:18px; height:300"  onmouseover="this.stop();" onMouseOut="this.start();" >
                                    <?php
                                    if ($isLoggedIn && $isAdmin) {
                                        ?>
                                        <br>
                                        <a href="news_insert.php?keepThis=true&TB_iframe=true&height=150&width=400&modal=true" title="New Course" class="thickbox">Add New News</a>
                                        <br>
                                    <?php
                                    }
                                    $strquery = "SELECT * FROM news_info";
                                    $results = mysql_query($strquery);
                                    $num = mysql_numrows($results);

                                    $i = 0;
                                    while ($i < $num) {
                                        $News_ID = mysql_result($results, $i, "News_ID");
                                        $News_Hints = mysql_result($results, $i, "News_Hints");
                                        $News_Link = mysql_result($results, $i, "News_Link");
                                        ?>
                                        <a href='<?php echo $News_Link; ?>' target="_blank" style="text-decoration:none; color:#FFFFFF"><span><?php echo $News_Hints; ?></span></a>
                                        <br> <br>
                                        <?php
                                        if ($isLoggedIn && $isAdmin) {
                                            ?>
                                            <td><?php echo " <a href='news_edit.php?News_ID=" . $News_ID . "&keepThis=true&TB_iframe=true&height=100&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $News_ID . "'> edit </a> "; ?>
                                                | <?php echo " <a href='news_delete.php?News_ID=" . $News_ID . "'> delete </a> "; ?></td>
                                            <br>
                                        <?php
                                        }
                                        $i++;
                                    }
                                    ?>
                                </marquee>
                            </div>
                            <br>
                            <br>
                            <div id="paragraph_head">
                                <h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif "><img src="images/system_images/notice_icon.png">Notice!</h1>
                            </div>
                            <div id="notice_board">
                                <?php
                                $strquery = "SELECT * FROM notice_info";
                                $results = mysql_query($strquery);
                                $num = mysql_numrows($results);

                                $i = 0;
                                while ($i < $num) {
                                    $Notice_ID = mysql_result($results, $i, "Notice_ID");
                                    $Notice = mysql_result($results, $i, "Notice");
                                ?>
                                <p style="padding-left:60px; padding-right:60px; color:#9F7953;font-size:16px; font-weight:bold; "><br><br><br><br><br><?php echo $Notice ; ?><br> <br>Thank You<br>


                                <?php
                                    if ($isLoggedIn && $isAdmin) {
                                        ?>
                                        <td><?php echo " <a href='notice_edit.php?Notice_ID=" . $Notice_ID . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Course - " . $Notice_ID . "'> Update Notice </a> "; ?></td>
                                        <br>
                                    <?php
                                    }
                                    $i++;
                                }
                                ?>
                                </p>
                            </div>
                            <br>
                            <br>
                            <div>
                                <div id="paragraph_head">
                                    <h1 align="left" style="color:#FFFFFF"><img src="images/system_images/academic_icon.png">Leates Notes...</h1>
                                </div>
                                <p align="left" style="font-size:16; font-weight:bold">আরো - আরো Notes ডাউনলোড করতে সাইন ইন করুন...</p>
                                <marquee behavior="scroll" direction="up"  style="vertical-align:middle;text-align:center; cursor:pointer;color:#0099FF; font-size:18px; height:300"  onmouseover="this.stop();" onMouseOut="this.start();" >
                                    <?php
                                    $strquery = "SELECT ref_id, CCode, Reference_Link, EName, Detail, SMName_Short, uploaded_by, SName, upload_date FROM reference_info
                                    INNER JOIN c_info
                                    ON reference_info.CID=c_info.CID
                                    LEFT JOIN e_info
                                    ON reference_info.EID=e_info.EID
                                    LEFT JOIN s_info
                                    ON s_info.SID=reference_info.uploaded_by
                                    LEFT JOIN sm_info
                                    ON reference_info.SMID=sm_info.SMID
                                    ORDER BY reference_info.ref_id DESC LIMIT 10";
                                    $results = mysql_query($strquery);
                                    $num = mysql_numrows($results);

                                    $i = 0;
                                     while ($i < 10) {
                                        $ref_id = mysql_result($results, $i, "ref_id");
                                        $CCode = mysql_result($results, $i, "CCode");
                                        $f10 = mysql_result($results, $i, "EName");
                                        $SID = mysql_result($results, $i, "uploaded_by");
                                        $uploaded_by = mysql_result($results, $i, "SName");
                                        $SMName = mysql_result($results, $i, "SMName_Short");
                                        $upload_date = mysql_result($results, $i, "upload_date");
                                        $Detail = mysql_result($results, $i, "Detail");
                                         $DetailstringCut = substr($Detail, 0, 35);
                                        $f3 = mysql_result($results, $i, "Reference_Link");
                                        ?>
                                        <a href='<?php echo $f3; ?>' target="_blank" style="text-decoration:none; color:#FFFFFF"><span style="color: #50B9E8"><?php echo $CCode; ?></span>- <span style="color: #F5DF7C"><?php echo $DetailstringCut; ?>...</span> for <span style="color: #F44336">semester: <?php echo $SMName; ?></span> given by: <span style="color: #54A944"><?php echo $uploaded_by ? $uploaded_by : 'admin' ; ?></span></a>
                                        <br> <br>
                                        <?php
                                        $i++;
                                     }
                                        ?>
                                    <div style="background-color:#54A944; color: #ffffff; font-size: 14px; border-radius: 5px; padding: 5px; float: right; width: 20%;"  id="new_blog_button"><a href="course_list.php"> Find Out More Notes >></a></div>
                                </marquee>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div>
                                <div id="paragraph_head">
                                    <h1 align="left" style="color:#FFFFFF"><img src="images/system_images/about_icon.png">Trending Tutorials</h1>
                                </div>
                                <?php
                                $strquery="SELECT vt.*, u.username, u.SID, vtc.video_tutorial_cat_name FROM video_tutorial vt INNER JOIN userinfo u ON u.SID = vt.uploaded_by INNER JOIN video_tutorial_category vtc ON vtc.video_tutorial_cat_id = vt.video_tutorial_cat_id order by vt.tutorial_id DESC LIMIT 6";
                                $results=mysql_query($strquery);
                                $num=mysql_numrows($results);
                                if($num > 0){
                                    $i=0;
                                    while ($i< $num)
                                    {
                                        $tutorial_id=mysql_result($results,$i,"tutorial_id");
                                        $video_tutorial_cat_id=mysql_result($results,$i,"video_tutorial_cat_id");
                                        $video_tutorial_cat_name=mysql_result($results,$i,"video_tutorial_cat_name");
                                        $tutorial_link=mysql_result($results,$i,"tutorial_link");
                                        $uploaderId=mysql_result($results,$i,"uploaded_by");
                                        $uploaderName=mysql_result($results,$i,"username");
                                        $uploadTime=mysql_result($results,$i,"upload_time");
                                        ?><figure>
                                        <table style="padding:5px; float: left; width: 248px; color: #50B9E8">
                                            <tr style="height:20px">
                                                <td style="border:inset" colspan=2  align="center"><iframe width="248" height="160" src="<?php echo $tutorial_link ; ?>" frameborder="0" allowfullscreen></iframe></td>
                                            </tr>
                                            <tr><td><figcaption>Uploaded by : <a style="color: #55AA45; " href='student_profile.php?SID=<?php echo ($uploaderId == 9999) ? '29' : $uploaderId; ?>' target="_blank"> <?php echo $uploaderName; ?></a> for <span style="color: #F44336"><?= $video_tutorial_cat_name ?></span>  on :<span style="color: #55AA45"> <?= $uploadTime ?></span></figcaption></td></tr>
                                        </table>

                                        </figure>
                                        <?php $i++; }
                                } else {
                                    ?>
                                    <div style="font-weight: bold;">
                                        </br></br></br></br><p style="text-align:center">No video tutorials are added for this category yet. Stay connected, it will be added...</p>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div style="background-color:#54A944; color: #ffffff; font-size: 14px; border-radius: 5px; height: 20px; padding: 5px; float: right; width: 20%;"  id="new_blog_button"><a href="tutorial_gallery.php"> Find Out More Videos >></a></div>
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