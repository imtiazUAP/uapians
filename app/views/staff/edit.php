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
            <form id="form1" name="form1" method="post" action="<?= BASE_URL . '/staff/update' ?>">
                <table>
                    <tr>
                        <td>EName:</td>
                        <td><input name="EName" type="text" id="EName" value=" <?php echo $staffInfo["EName"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>EDesignation:</td>
                        <td><input name="EDesignation" type="text" id="EDesignation"
                                value=" <?php echo $staffInfo["EDesignation"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>EDesignation:</td>
                        <td><input name="EDesignation" type="text" id="EDesignation"
                                value=" <?php echo $staffInfo["EDesignation"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Employee_Contact :</td>
                        <td><input name="Employee_Contact" type="text" id="Employee_Contact"
                                value=" <?php echo $staffInfo["Employee_Contact"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Employee_Speech :</td>
                        <td><input name="Employee_Speech" type="text" id="Employee_Speech"
                                value=" <?php echo $staffInfo["Employee_Speech"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Employee_Role:</td>
                        <td><input name="Employee_Role" type="text" id="Employee_Role"
                                value=" <?php echo $staffInfo["Employee_Role"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td><input name="email" type="text" id="email" value=" <?php echo $staffInfo["email"]; ?>" /></td>
                    </tr>
                </table>
                <input name="user_id" type="hidden" id="user_id" value=" <?php echo $staffInfo["user_id"]; ?>" />
                <p>
                    <label>
                        <input type="submit" name="Submit" value="Update" />
                        <a href="#" onClick="tb_remove();">Close</a>
                    </label>
                </p>
            </form>
        <?php } ?>
    </div>
</body>

</html>