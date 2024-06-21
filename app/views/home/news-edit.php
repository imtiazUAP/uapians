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
        <form id="form1" name="form1" method="post" action="<?= BASE_URL . '/news/update' ?>">
            <table>
            <tr>
                <td>News Hints:</td>
                <td><input name="news_hints" type="text" id="news_hints" value=" <?php echo $newsInfo['News_Hints']; ?>" />
                </td>
            </tr>
            <tr>
                <td>News Link:</td>
                <td><input name="news_link" type="text" id="news_link" value=" <?php echo $newsInfo['News_Link']; ?>" /></td>
            </tr>
            </table>
            <input name="news_id" type="hidden" id="news_id" value=" <?php echo $newsInfo['News_ID']; ?>" />
            <div class="modal_button_bar">
                <button type="submit" name="Submit" value="Update">Update</button>
                <button type="button" onClick="tb_remove();">Close</button>
            </div>
        </form>
    <?php } ?>
    </div>
</body>

</html>