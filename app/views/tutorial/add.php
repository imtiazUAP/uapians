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
            <form action="<?= BASE_URL . '/tutorial/save' ?>" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <div style="font-weight:bold; color:#FFFFFF;">Select your language:</div>
                        </td>
                        <td>
                            <select name="category_id" id="category_id" selected="">
                                <?php foreach ($categories as $tutorialCategory) { ?>
                                    <option value="<?= $tutorialCategory["category_id"] ?>">
                                        <?= $tutorialCategory["category_name"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                    </tr>
                    <tr>
                        <td>
                            <label data-icon="u">Tutorial name:</label>
                        </td>
                        <td>
                            <textarea name="tutorial_name" rows="2" cols="40"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label data-icon="u">Tutorial Embed Link:</label>
                        </td>
                        <td>
                            <textarea name="tutorial_link" rows="2" cols="40"></textarea>
                        </td>
                    </tr>
                    <input name="added_by" type="hidden" value="<?= $userInfo['user_id'] ?>" />
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