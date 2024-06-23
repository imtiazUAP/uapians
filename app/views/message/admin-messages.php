<?php foreach ($messages as $message) { ?>
    <div style="padding-bottom:50px; padding-left:100px; color:#FFFFFF">
        <div style="padding-left:10px"> Sender user id: <?= $message['sender_user_id'] ?></div>
        <div style="width:500px;padding:10px;margin:0px; font-size:16px; font-weight:bold">
            Subject:<?= $message['subject'] ?> </div>
        <br>
        <div style="width:500px;padding:10px;border:1px solid white;margin:0px; font-size:16px">Message:
            <?= $message['message'] ?>
        </div>
    </div>
    <?php if (($userInfo['group_id'] == 1)) {
									?>
									<a href="<?= BASE_URL . '/message/delete-confirm?message_id=' . $message['message_id'] . '&keepThis=true&TB_iframe=true&height=300&width=350&do=edit&modal=true' ?>" class="thickbox"> delete </a>
									<?php
								}
								?>
<?php } ?>