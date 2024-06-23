<html>

<head>
    <?php include (BASE_DIR . "/app/views/partials/header.php"); ?>
</head>

<body>
    <div class="modal_body" >
    <?php if (isset($_GET['message'])) { ?>
        <div class="message"><?php echo htmlspecialchars($_GET['message']); ?></div>
        <div class="modal_button_bar">
            <button type="button" onClick="tb_remove();">Close</button>
        </div>
    <?php } else { ?>
        <form id="form1" name="form1" method="post"
            action="<?= BASE_URL . '/blog/update?Blog_ID=' . $blogInfo['Blog_ID'] ?>">
            <div>Blog:</div>
            <textarea name="Blog" type="text" id="Blog" cols="50" rows="9"><?= $blogInfo['blog'] ?></textarea>
            <br>
            <input name="Blog_ID" type="hidden" id="Blog_ID" value="<?= $blogInfo["Blog_ID"] ?>" />
            <input name="Date" type="hidden" id="Date" value=" <?= $blogInfo["Date"] ?>" />
            <div class="modal_button_bar">
                <button type="submit" name="Submit" value="Update">Update</button>
                <button type="button" onClick="tb_remove();">Close</button>
            </div>
        </form>
        <?php } ?>
    </div>
</body>

</html>