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
        <form id="form1" name="form1" method="post" action="<?= BASE_URL . '/gallery/delete-execute' ?>">
            <div>
                Are you sure you want to delete the photo?
            </div>
            <input name="photo_id" type="hidden" id="CID" value="<?php echo $photo['Photo_Id']; ?>" />
            <div class="modal_button_bar">
                <button type="submit" name="Submit" value="Delete">Delete</button>
                <button type="button" onClick="tb_remove();">Close</button>
            </div>
        </form>
    <?php } ?>
    </div>
</body>

</html>
