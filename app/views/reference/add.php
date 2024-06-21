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
            <form action="<?= BASE_URL . '/reference/save' ?>" method="post">
                <div align="right" style="padding:20px; font-size:22px; font-weight:bold; color:#FFFFFF">Select
                    Course:<br>
                    <select name="CID" id="CID" selected="">
                        <?php
                        foreach ($courses as $course) {
                            if ($selectedCourseId == $course["CID"]) {
                                $selected = 'selected="selected"';
                            } else {
                                $selected = '';
                            }
                            print ("<option value=\"" . $course["CID"] . "\" " . $selected . "  >" . $course["CCode"] . "</option>");
                        }
                        ?>
                    </select>
                </div>
                <div align="right" style="padding:20px; font-size:22px; font-weight:bold; color:#FFFFFF">Select
                    Semester:<br>
                    <select name="SMID" id="SMID" selected="">
                        <?php
                        foreach ($semesters as $semester) {
                            if ($selectedSemesterId == $semester["SMID"]) {
                                $selected = 'selected="selected"';
                            } else {
                                $selected = '';
                            }
                            print ("<option value=\"" . $semester["SMID"] . "\" " . $selected . "  >" . $semester["SMName"] . "</option>");
                        }
                        ?>
                    </select>
                </div>
                <div align="center">
                    <table>
                        <tr>
                            <td>
                                <label data-icon="u">Topic Details:</label>
                            </td>
                            <td>
                                <textarea name="Detail" rows="2" cols="40"> </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label data-icon="u">File Link:</label>
                            </td>
                            <td>
                                <textarea name="Reference_Link" rows="2" cols="40"> </textarea>
                            </td>
                        </tr>
                        <input name="user_id" type="hidden" id="user_id" value="<?= $userInfo['user_id'] ?>" />
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