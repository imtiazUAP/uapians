<div>
    <?php if (isset($_GET['message'])) { ?>
        <div class="message" style="font-weight:bold; color:#FFFFFF;"><?php echo htmlspecialchars($_GET['message']); ?></div>
    <?php } else { ?>
        <form action="<?= BASE_URL . '/message/send' ?>" method="post">
            <div>
                <input value="<?php echo $userInfo['user_id']; ?>" name="sender_user_id" type="hidden" />
                <input value="<?= !empty($_GET['receiver_user_id']) ? $_GET['receiver_user_id'] : 0 ?>"
                    name="receiver_user_id" type="hidden" />
                <br>
                <label style="font-weight:bold; color:#FFFFFF;">Subject:</label>
                <input type="text" name="subject" />
                <br>
                <label style="font-weight:bold; color:#FFFFFF;">Message:</label>
                <textarea name="message" cols="80" rows="15"></textarea>
                <input value="<?= !empty($_GET['admin_message']) ? $_GET['admin_message'] : 0 ?>" name="admin_message"
                    type="hidden" />
            </div>
            <div class="modal_button_bar">
                <button type="submit" name="Submit" value="Delete">Send</button>
            </div>
        </form>
    <?php } ?>
</div>