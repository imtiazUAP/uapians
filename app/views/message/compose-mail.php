<?php if (isset($_GET['message'])) { ?>
    <div class="message"><?php echo htmlspecialchars($_GET['message']); ?></div>
<?php } else { ?>

    <form action="<?= BASE_URL . '/mail/send' ?>" method="post" name="form1" enctype="multipart/form-data">
        <table width="830" border="2" style="padding:100px;">
            <tr>
                <td>Receiver Group:</td>
                <td>
                    <select name="receiver_group_id" id="receiver_group_id" selected="">
                        <?php
                        foreach ($receiverGroups as $receiverGroup) { ?>
                            <option value="<?= $receiverGroup["receiver_group_id"] ?>">
                                <?= $receiverGroup["receiver_group_name"] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Subject:</td>
                <td><input name="txtSubject" type="text" id="txtSubject"></td>
            </tr>
            <tr>
                <td>Message:</td>
                <td><textarea name="txtDescription" cols="40" rows="8" id="txtDescription"></textarea>
                </td>
            </tr>
            <tr>
                <td>Sender Name:</td>
                <td><input name="txtFormName" type="text"></td>
            </tr>
            <tr>
            <tr>
                <td>Attach file:</td>
                <td><input name="fileAttach" type="file"></td>
            </tr>
        </table>
        <input name="from_email" value="<?= $userInfo['email'] ?>" type="hidden">
        <div class="modal_button_bar">
            <button type="submit" name="Submit" value="Update">Send</button>
        </div>
    </form>
<?php } ?>