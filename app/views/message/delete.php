<html>

<head>
    <?php include(BASE_DIR . "/app/views/partials/header.php"); ?>
</head>

<body>
    <div class="modal_body">
    <?php if (isset($_GET['message'])) { ?>
        <div class="message"><?php echo htmlspecialchars($_GET['message']); ?></div>
        <div class="modal_button_bar">
        <button type="button" onClick="tb_remove();">Close</button>
        </div>
    <?php } else { ?>
        <form id="form" name="form" method="post" action="<?= BASE_URL . '/message/delete-execute' ?>">
            <div>
                Are you sure you want to delete the message?
            </div>
            <input name="message_id" type="hidden" value="<?php echo $message['message_id']; ?>" />
            <div class="modal_button_bar">
                <button type="submit" name="Submit" value="Delete">Delete</button>
                <button type="button" onClick="tb_remove();">Close</button>
            </div>
        </form>
    <?php } ?>
    </div>
</body>

</html>
