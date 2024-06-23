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
            <form action="<?= BASE_URL . '/course/save' ?>" method="post">
                <table>
                    <tr>
                        <td>Course Code:</td>
                        <td><input type="text" name="CCode" /></td>
                    </tr>
                    <tr>
                        <td>Course Name:</td>
                        <td><input type"text" name="CName" /></td>
                    </tr>
                    <tr>
                        <td>Course Semester: </td>
                        <td>
                            <select name="SMID" id="SMID" selected="">
                                <?php
                                foreach ($semesters as $semester) {
                                    print ("<option value=\"" . $semester["SMID"] . "\" " . '' . "  >" . $semester["SMName"] . "</option>");
                                }
                                ?>
                        </td>
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