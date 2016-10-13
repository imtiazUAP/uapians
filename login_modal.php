<?php
     session_start();
     //error_reporting(0);
     include("dbconnect.php");
?>

<html>
    <head>
        <?php
        include("header.php");
        ?>
    </head>

    <body>
    <div style="background-color: #55A947; padding-left: 50px; padding-right: 50px">
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
    <button name="reset_pass" onclick="window.open('reset_pass.php','_top')" class="button button_green">Forgot Password?
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
        ?>

        <?php if($_SESSION['username']){ ?>
            <script language="JavaScript">
                tb_remove();
            </script>
       <?php }else{ ?>
            Sign In failed. May your password or email is incorrect! Try again or reset your password
        <?php } ?>

    <?php
    }
    ?>

        <div align="right";>
            <button class="button button_red" onClick="tb_remove()"> Close </button>
        </div>
    </div>
    </body>
</html>