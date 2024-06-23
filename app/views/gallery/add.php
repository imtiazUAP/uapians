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
            <form action="<?= BASE_URL . '/gallery/save' ?>" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Upload Photo:</td>
                        <td><input type="file" name="file" id="file"></td>
                    </tr>
                    <tr>
                        <td>Photo Caption:</td>
                        <td><input type"text" name="photo_caption" /></td>
                    </tr>
                </table>
                <div class="modal_button_bar">
                    <button type="submit" name="Submit" value="Update">Add</button>
                    <button type="button" onClick="tb_remove();">Close</button>
                </div>
            </form>
        </div>
    <?php } ?>
</body>

</html>