<div class="box" align="left">
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
        session_write_close();
        if (!empty($_SESSION['username'])) {
            ?>
            <script language="JavaScript">
                window.location = "home.php";
            </script>
        <?php
        }elseif (empty($_SESSION['username'])){
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
    <br>
    <br>
    <div id="paragraph_head">
        <h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Academic Aspects
        </h3>
    </div>
    <ul class="bottom">
        <li><a href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course"
               class="thickbox">->>Teachers</a></li>
        <li><a href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course"
               class="thickbox">->>Students</a></li>
        <li><a href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course"
               class="thickbox">->>Courses</a></li>
        <li><a href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course"
               class="thickbox">->>Results</a></li>
        <li><a class="blink_me thickbox" href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course">->>Download Course Material</a></li>
    </ul>
</div>
<br>
<br>
<div class="box">
    <div id="paragraph_head">
        <h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Clubs & Social Works</h3>
    </div>
    <ul class="bottom">
        <li><a href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course"
               class="thickbox">->>Gallery</a></li>
        <li><a class="blink_me thickbox" href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course">->>UAP Blood Bank</a></li>
        <li><a class="blink_me thickbox" href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course">->>Who is from my District</a></li>
        <li><a href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course"
               class="thickbox">->>Programming Contest Club</a></li>
        <li><a href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course"
               class="thickbox">->>Research and Publication Club</a></li>
        <li><a href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course"
               class="thickbox">->>Sports Club</a></li>
        <li><a href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course"
               class="thickbox">->>Software and Hardware Club</a></li>
        <li><a href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course"
               class="thickbox">->>Cultural and Debating Club</a></li>
        <li><a href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course"
               class="thickbox">->>Web Club</a></li>
    </ul>
</div>
<br>
<br>
<div class="box">
    <div id="paragraph_head">
        <h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Admin Panel</h3>
    </div>
    <ul>
        <a href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course"
           class="thickbox">
            <li><img src="images/Picture 2963.jpg" style="width:238px"/>MD. Mazharul islam jihan</li>
        </a>
        <p class="bottom">Phone:01752512666
            E_Mail:jihanislam007@gmail.com
        </p>
        <li><a href="https://www.facebook.com/mazaharulislam.jihan" target="_blank">Find me on facebook</a></li>
        <br>
        <a href="login_request.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course"
           class="thickbox">
            <li><img src="images/1234554321.jpg" style="width:238px "/> Nokib Mozumder</li>
        </a>
        <p class="bottom">Phone:01670756503
            E_Mail:nokib016@gmail.com
        </p>
        <li><a href="https://www.facebook.com/nokib.mozumder" target="_blank">Find me on facebook</a></li>
    </ul>
</div>
<br>
<br>
<div class="box">
    <div id="paragraph_head">
        <h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Contact Us</h3>
    </div>
    <p class="bottom">For any query, or any Information contact with us... <br> Uapians.Net,
        University of Asia Pacific
        Phone:01720613683
        E_Mail:emtiaj@yahoo.com
    </p>
    <li style="list-style: none"><a href="http://www.emtiaj.blogspot.com" target="_blank">www.emtiaj.blogspot.com</a></li>
</div>
<br>
<br>
<div class="fb-like-box" data-href="https://www.facebook.com/pages/UAPIANSNet/1452237808341753?ref=hl" data-width="238"
     data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false"
     data-show-border="true">
</div>