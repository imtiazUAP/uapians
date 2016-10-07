<div class="box">
<?php
if(!$isLoggedIn){ ?>
    <br>
    <p style="font-weight:bold; font-size:18px">Sign In
    </p>
    </br>
    <form action="" method="post">
        <div class="tabledv">
            <div class="registername"></div>
            <div class="registerfield"><input type="text" name="loginname" id="loginname" maxlength="30"
                                              placeholder="Enter e-mail" required="required" size="29" value=""
                                              autofocus="autofocus"/>
            </div>
        </div>
        </br>
        <div class="tabledv">
            <div class="registername">
            </div>
            <div class="registerfield"><input required="required" type="password" name="password" id="password"
                                              maxlength="30" placeholder="Enter password" size="29" value=""
                                              autofocus="autofocus"/>
            </div>
        </div>
        <button name="login" type="Submit" class="button button_blue">Log In
        </button>
    </form>
    <button name="reset_pass" onclick="window.open('reset_pass.php','_top')" class="button button_red">Forgot Password?
    </button>
    <button name="sign_up" onclick="window.open('sign_up.php','_top')" class="button button_blue">Sign Up
    </button>
    <?php
    if (isset($_REQUEST['login']) && !empty($_REQUEST['loginname'])) {
        $usname = $_REQUEST['loginname'];
        $uspass = $_REQUEST['password'];
        $qry = "select * from userinfo where SE_Mail='" . ($usname) . "' && password='" . md5($uspass) . "' ";
        $usresult = mysql_query($qry);
        $usdata = mysql_fetch_assoc($usresult);
        $_SESSION['username'] = $usdata['username'];
        $_SESSION['userid'] = $usdata['userid'];
        $_SESSION['SID'] = $usdata['SID'];
        session_write_close();
        $authetication = new Authentication();
        $isLoggedIn = $authetication->isLoggedIn();

        if ($isLoggedIn) {
            ?>
            <script language="JavaScript">
                window.location.reload();
            </script>
        <?php
        }elseif (!$isLoggedIn){
        ?>
            <script language="JavaScript">
                window.location = "reset_pass.php?message=wrong_login_id__or_pass";
            </script>
        <?php
        }
    }
    ?>
    <p style="font-weight:bold; font-size:16px">Dont have an account ?</p>
    <a href="sign_up.php" style="font-size:18px; font-weight:bold; text-decoration:none">Sign up
    </a>
<?php
}else{ ?>
    <br>
    <br>
    <div style="text-decoration:none;font-size:18px; color:#FFFFFF; font-weight:bold">You are Logged in as...
        <span class="font-effect-3d-float" style="font-style: italic; font-size: 24px">
            <?php
            print $_SESSION['username']
            ?>
        </span>
    </div>
    <br>
    <?php
    if (($userdata[admin] == '3')) {
        ?>
        <br>
        <a href='sendmail1.php'>Send Email</a>
        <br>
    <?php
    }
    ?>
    <form action="" method="post">
    <button name="logout" type="Submit" class="button button_red"> Log Out
    </button>
    </form>
    <?php
    if (isset($_REQUEST['logout']) && $isLoggedIn) {
        error_reporting(0);
        session_start();
        session_destroy();
        unset($_SESSION);
        session_regenerate_id(true);
    ?>
        <script language="JavaScript">
            window.location.reload();
        </script>
    <?php
    }
    ?>
<?php
}
?>
    <?php $SID = $_SESSION['SID']; ?>

    <br>
    <br>
    <div id="paragraph_head">
        <h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif;"><img src="images/system_images/academic_icon.png">Academic Aspects</h3>
    </div>
    <ul class="bottom">
        <?php if($isLoggedIn && $isAdmin){ ?>
        <li><a href='sendmail1.php'>->>Send Email</a></li>
        <li><a href='administration.php'>->>Students Signup Confirmation </a></li>
        <li><a href="news_insert.php?keepThis=true&TB_iframe=true&height=150&width=400&modal=true" title="Add News" class="thickbox">->>Add News</a></li>
        <li><a href='upload_material.php?SID=<?= $SID ?>'>->>Upload Materials</a></li>
        <li><a href='upload_tutorial.php?SID=<?= $SID ?>'>->>Upload Tutorials</a></li>
        <li><a href='upload_project.php?SID=<?= $SID ?>'>->>Upload Projects</a></li>
        <li><a href="course_insert.php?keepThis=true&TB_iframe=true&height=150&width=200&modal=true" title="New Course" class="thickbox">->>Add New Course</a></li>
        <?php } ?>
        <li><a href="faculty_list.php">->>Faculty</a></li>
        <li><a href="student_list.php">->>Students</a></li>
        <!--<li><a href="mark_list.php">->>Results</a></li>-->
        <li><a class="blink_me" href="course_list.php">->>Download Course Material</a></li>
        <li><a class="blink_me" href="tutorial_gallery.php">->>Find Programming Tutorials</a></li>
        <li><a class="blink_me" href="project_gallery.php">->>Find Complete Projects</a></li>
        <?php if($isLoggedIn && $isGeneralStudent || $isFaculty){ ?>
            <li><a href='upload_material.php?SID=<?= $SID ?>'>->>Upload Materials</a></li>
            <li><a href='upload_tutorial.php?SID=<?= $SID ?>'>->>Upload Tutorials</a></li>
            <li><a href='upload_project.php?SID=<?= $SID ?>'>->>Upload Projects</a></li>
        <?php } ?>
    </ul>
</div>
<br>
<br>
<div class="box">
    <div id="paragraph_head">
        <h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif "><img src="images/system_images/club_icon.png">Clubs & Social Works</h3>
    </div>
    <ul class="bottom">
        <li><a href="galary.php">->>Gallery</a></li>
        <li><a class="blink_me" href="blood_list.php">->>UAP Blood Bank</a></li>
        <li><a class="blink_me" href="districtwise_students.php">->>Who is from my District</a></li>
        <li><a href="programing_contest_club.php">->>Programming Contest Club</a></li>
        <li><a href="research_publication_club.php">->>Research and Publication Club</a></li>
        <li><a href="sports_club.php">->>Sports Club</a></li>
        <li><a href="software_hardware_club.php">->>Software and Hardware Club</a></li>
        <li><a href="cultural_club.php">->>Cultural and Debating Club</a></li>
        <li><a href="web_club.php">->>Web Club</a></li>
        <?php if($isLoggedIn && $isGeneralStudent){ ?>
        <li><a href="message_to_friend.php">->>Send a Message...</a></li>
        <?php } ?>
    </ul>
</div>
<br>
<br>
<div class="box">
    <div id="paragraph_head">
        <h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif "><img src="images/system_images/admin_icon.png">Admin Panel</h3>
    </div>
    <ul>
        <br>
        <a href="student_profile.php?SID=239">
            <li><img src="images/system_images/jihan.jpg" style="width:238px "/>MD. Mazharul islam jihan</li>
        </a>
        <p class="bottom">Phone:+8801752512666
            E_Mail:jihanislam007@gmail.com</p>
        <li><a href="https://www.facebook.com/mazaharulislam.jihan">Find me on facebook</a></li>
        <?php if($isLoggedIn){?>
        <li><a href="message_to_admin.php">Send him a Message</a></li>
        <?php } ?>
        <?php
        if (($isLoggedIn && $isAdmin  && $isLoggedIn)) {
            ?>
            <li><a href="messages_admin.php"> My Messages</a></li>
        <?php
        }
        ?>
        <a href="student_profile.php?SID=461">
            <li><img src="images/system_images/1234554321.jpg" style="width:238px "/> Nokib Mozumder</li>
        </a>
        <p class="bottom">Phone:01670756503
            E_Mail:nokib016@gmail.com
        </p>
        <li><a href="https://www.facebook.com/nokib.mozumder" target="_blank">Find me on facebook</a></li>
        <?php if($isLoggedIn){?>
            <li><a href="message_to_admin.php">Send him a Message</a></li>
        <?php } ?>
        <?php
        if (($isLoggedIn && $isAdmin && $isLoggedIn)) {
            ?>
            <li><a href="messages_admin.php"> My Messages</a></li>
        <?php
        }
        ?>
    </ul>
</div>
<br>
<br>
<div class="box">
    <div id="paragraph_head">
        <h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif "><img src="images/system_images/contact_icon.png">Contact Us</h3>
    </div>
    <p class="bottom">For any query, or any Information contact with us... <br> Student Management Tools,
        University of Asia Pacific
        Phone:+8801720 - 613 683
        E_Mail:emtiaj@yahoo.com
    </p>
    <li style="list-style: none"><a href="http://www.emtiaj.blogspot.com" target="_blank">www.emtiaj.blogspot.com</a></li>
</div>
<br>
<div class="fb-like-box" data-href="https://www.facebook.com/pages/UAPIANSNet/1452237808341753?ref=hl" data-width="238"
     data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false"
     data-show-border="true"></div>