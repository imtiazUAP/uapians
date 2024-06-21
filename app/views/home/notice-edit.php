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
            <form action="<?= BASE_URL . '/notice/update' ?>" method="post">
                <div align="center">
                    <table>
                        <tr>
                            <td>Notice:</td>
                        </tr>
                    </table>
                    <textarea name="notice" type="text" id="Notice" cols="70" rows="15"><?php echo $noticeInfo["Notice"]; ?></textarea>
                    <input name="notice_id" type="hidden" id="Notice_ID" value=" <?php echo $noticeInfo["Notice_ID"]; ?>" />
                    </table>
                    <div class="modal_button_bar">
                        <button type="submit" name="Submit" value="Update">Update</button>
                        <button type="button" onClick="tb_remove();">Close</button>
                    </div>
            </form>
        </div>
    <?php } ?>
</body>

</html>