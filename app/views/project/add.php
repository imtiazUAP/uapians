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
            <form action="<?= BASE_URL . '/project/save' ?>" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <label data-icon="u">Project Name:</label>
                        </td>
                        <td>
                            <textarea name="project_name" rows="2" cols="40"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label data-icon="u">Platform Name:</label>
                        </td>
                        <td>
                            <textarea name="platform_name" rows="2" cols="40"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="font-weight:bold; color:#FFFFFF;">Category:</div>
                        </td>
                        <td>
                        <select name="category_id" id="category_id" selected="">
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?= $category["category_id"] ?>"><?= $category["category_name"] ?> </option>
                            <?php } ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label data-icon="u">Project_Link:</label>
                        </td>
                        <td>
                            <textarea name="project_link" rows="2" cols="40"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label data-icon="u">Project
                                Screenshot:</label>
                        </td>
                        <td>
                            <input id="file" name="file" required="required" type="file" placeholder="required" />
                        </td>
                    </tr>
                    <input name="user_id" type="hidden" value="<?= $userInfo['user_id'] ?>" />
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