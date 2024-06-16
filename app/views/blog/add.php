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
            <form action="<?= BASE_URL . '/blog/save' ?>" method="post">
                <div>
                    <input value="<?= $userInfo['user_id']; ?>" name="SID" type="hidden" />
                    <input value="<?= $userInfo['user_id']; ?>" name="user_id" type="hidden" />
                    <div style="font-weight:bold; color:#FFFFFF;">Article:</div>
                    <textarea name="Blog" cols="50" rows="9"></textarea><br>
                </div>
                <div class="modal_button_bar">
                    <button type="submit" name="Submit" value="Update">Save</button>
                    <button type="button" onClick="tb_remove();">Close</button>
                </div>
            </form>
        <?php } ?>
    </div>
</body>