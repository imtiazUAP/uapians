<div>
    <?php
    $message = !empty($_GET['message']) ? $_GET['message'] : '';
    if ($message == 'confirmation_mail') {
        ?>
        </br>
        </br>
        <div align="center">
            <label style="color: white; font-size:14px;">A confirmation mail sent to your <span style="color: #ff0000">Email
                    address.</span> </br> Log in to your Email & click on that
                <span style="color: #50B9E8">link</span> to reset your password.</label>
        </div>
        <?php
    } elseif ($message == 'account_not_found') {
        ?>
        </br>
        </br>
        <div align="center">
            <label style="color: white; font-size:14px;">Account not found with this <span style="color: #ff0000">Email
                    address.</span>. Please... <a style="color: #ff0000" href="sign_up.php">Sign Up</a> to continue... </br>
                or <a style="color: #ff0000"
                    href="<?= BASE_URL . '/admin/reset-password?keepThis=true&TB_iframe=true&height==400&width=600&do=edit&modal=true' ?>"
                    class="thickbox">click here</a> to try with a different Email
                address</label>
        </div>
        <?php
    } elseif ($message == 'wrong_login_id__or_pass') {
        ?>
        </br>
        </br>
        <div align="center">
            <label style="color: white; font-size:14px;">Opps!! <span style="color: #ff0000">wrong login
                    info</span> provided. Please try again or if you forgot your password... </br> <a style="color: #50B9E8"
                    href="<?= BASE_URL . '/admin/reset-password?keepThis=true&TB_iframe=true&height==400&width=600&do=edit&modal=true' ?>"
                    class="thickbox">click here to reset your
                    password</a></label>
        </div>
        <?php
    } else {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == "reset") {
                $encrypt = $_GET['encrypt'];
                $query = "SELECT userid FROM userinfo where recovery='" . $encrypt . "'";
                $result = mysqli_query($query, $con);
                $Results = mysqli_fetch_array($result);
                if (count($Results['userid']) >= 1) {
                    ?>

                    <body>
                        <div align="center">
                            </br>
                            <form action="<?= BASE_URL . '/admin/save-password' ?>" method="post" id="reset">
                                <table align="center">
                                    <tr>
                                        <td><label for="email" class="signup_field" data-icon="u">Enter a new password:
                                            </label></td>
                                        <td><input id="password" name="new_password" required="required" type="password"
                                                placeholder="new password"></td>
                                        <input name="action" type="hidden" value='<?= $encrypt ?>'>
                                        <td><button name="login" type="Submit" class="button button_blue">Reset
                                                Password</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    <?php } else {
                    ?>
                        </br>
                        </br>
                        <div align="center">
                            <label style="color: white; font-size:14px;">Invalid verification link, or this verification
                                link is already used one time. </br> Please try again... <a style="color: #ff0000"
                                    href="<?= BASE_URL . '/admin/reset-password?keepThis=true&TB_iframe=true&height==400&width=600&do=edit&modal=true' ?>"
                                    class="thickbox">Forget Password?</a></label>
                        </div>
                        <?php
                }
            }
        } elseif (isset($_POST['action'])) {
            $encrypt = $_POST['action'];
            $password = $_POST['password'];
            $query = "SELECT userid FROM userinfo where recovery = '" . $encrypt . "'";
            $result = mysqli_query($query, $con);
            $Results = mysqli_fetch_array($result);
            if (count($Results['userid']) >= 1) {
                $randomNumber = date("Y-m-d H:i:s");
                $newEncrypt = md5($randomNumber * 209 * 19 + $Results['userid']);
                $query = "update userinfo set password='" . md5($password) . "', recovery='" . $newEncrypt . "' where userid='" . $Results['userid'] . "'";
                mysqli_query($query, $con);
                ?>
                    </br>
                    </br>
                    <div align="center">
                        <label style="color: white; font-size:14px;">Your password changed sucessfully... <a style="color: #ff0000"
                                href="index.php">click here to login</a></label>
                    </div>
                    <?php
            } else {
                ?>
                    </br>
                    </br>
                    <div align="center">
                        <label style="color: white; font-size:14px;">Invalid verification link, or this verification
                            link is already used one time. </br> Please try again... <a style="color: #ff0000"
                                href="<?= BASE_URL . '/admin/reset-password?keepThis=true&TB_iframe=true&height==400&width=600&do=edit&modal=true' ?>"
                                class="thickbox">Forget Password?</a></label>
                    </div>
                    <?php
            }
        } else {
            ?>
                <div align="center">
                    <form action="<?= BASE_URL . '/admin/reset-password-confirm' ?>" method="post"
                        enctype="multipart/form-data">
                        <table align="center">
                            <tr>
                                <td><label for="email" class="signup_field" data-icon="u">Your E Mail:</label>
                                </td>
                                <td><input id="lastnamesignup" name="email" required="required" type="text"
                                        placeholder="example@yahoo.com" /></td>
                                <td><button type="Submit" class="button button_blue">Reset Password</button>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <br>
                    </form>
                </div>
            <?php }
    }
    ?>
</div>