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
            <form action="<?= BASE_URL . '/news/save' ?>" method="post">
                <table>
                    <tr>
                        <td>News Hints:</td>
                        <td><input type="news_hints" name="news_hints" /></td>
                    </tr>
                    <tr>
                        <td>News Link:</td>
                        <td><input type="news_link" name="news_link" /></td>
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