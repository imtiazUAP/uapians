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
        <form id="form1" name="form1" method="post" action="<?= BASE_URL . '/course/update' ?>">
            <table>
                <tr>
                    <td>CCode:</td>
                    <td><input name="CCode" type="text" id="CCode" value=" <?php echo $courseInfo["CCode"]; ?>" /></td>
                </tr>
                <tr>
                    <td>CName:</td>
                    <td><input name="CName" type="text" id="CName" value=" <?php echo $courseInfo["CName"]; ?>" /></td>
                </tr>
                <tr>
                            <td>Semester</td>
                            <td>
                                <select name="SMID" id="SMID" selected="">
                                    <?php
                                    foreach ($semesters as $semester) {
                                        print ("<option value=\"" . $semester["SMID"] . "\" " . "  >" . $semester["SMName"] . "</option>");
                                    }
                                    ?>
                            </td>
                        </tr>
            </table>
            <input name="CID" type="hidden" id="CID" value=" <?php echo $courseInfo["CID"]; ?>" />
            <div class="modal_button_bar">
                <button type="submit" name="Submit" value="Update">Update</button>
                <button type="button" onClick="tb_remove();">Close</button>
            </div>
        </form>
    <?php } ?>
    </div>
</body>

</html>