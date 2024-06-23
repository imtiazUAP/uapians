<html>

<head>
    <?php include (BASE_DIR . "/app/views/partials/header.php"); ?>
</head>

<body>
    <div class="modal_body">
        <?php if (isset($_GET['message'])) { ?>
            <div class="message"><?php echo htmlspecialchars($_GET['message']); ?></div>
            <div class="modal_button_bar">
                <button type="button" onClick="tb_remove();">Close</button>
            </div>
        <?php } else { ?>
            <form id="form" name="form" method="post" action="<?= BASE_URL . '/admin/save-password' ?>">
                <table style="padding:30px">
                    <tr>
                        <td>Your email:</td>
                        <td><?php echo $userInfo["email"]; ?></td>
                    </tr>
                    <tr>
                        <td>New Password:</td>
                        <td><input name="new_password" type="password" id="new_password" placeholder="Type new password" />
                        </td>
                    </tr>
                </table>
                <input name="user_id" type="hidden" id="user_id" value=" <?= $userInfo["user_id"] ?>" />
                <div class="modal_button_bar">
                    <button type="submit" name="Submit" value="Update">Update</button>
                    <button type="button" onClick="tb_remove();">Close</button>
                </div>
            </form>
        <?php } ?>
    </div>
</body>

</html>