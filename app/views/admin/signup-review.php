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
        <form id="form1" name="form1" method="post" action="<?= BASE_URL . '/admin/signup-approve?SReg=' . $signUpStudent["SReg"]; ?>">
            <table style="color: black">
                <tr>
                    <td> Name: </td>
                    <td><input name="SName" type="text" id="SName" value="<?php echo $signUpStudent["SName"]; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Registration no:</td>
                    <td><input name="SReg" type="text" id="SReg" value="<?php echo $signUpStudent["SReg"]; ?>" /></td>
                </tr>
                <tr>
                    <td>District</td>
                    <td><select name="district_id" id="district_id" selected="">
                            <?php
                            foreach ($districts as $district) {
                                if ($signUpStudent["district_id"] == $district["district_id"]) {
                                    $selected = 'selected="selected"';
                                } else {
                                    $selected = '';
                                }
                                print ("<option value=\"" . $district["district_id"] . "\" " . $selected . "  >" . $district["district_name"] . "</option>");
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td> <input name="email" type="text" id="email" value="<?php echo $signUpStudent["SE_Mail"]; ?>" />
                    </td>
                </tr>
                <input name="SPortrait" type="hidden" id="SPortrait"
                    value="<?php echo $signUpStudent["SPortrait"]; ?>" />
                <tr>
                    <td>Semester</td>
                    <td> <select name="SMID" id="SMID" selected="">
                            <?php
                            foreach ($semesters as $semester) {
                                if ($signUpStudent["SMID"] == $semester["SMID"]) {
                                    $selected = 'selected="selected"';
                                } else {
                                    $selected = '';
                                }
                                print ("<option value=\"" . $semester["SMID"] . "\" " . $selected . "  >" . $semester["SMName"] . "</option>");
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>Blood Group</td>
                    <td><select name="Blood_Group_ID" id="Blood_Group_ID" selected="">
                            <?php
                            foreach ($bloodGroups as $bloodGroup) {
                                if ($signUpStudent["Blood_Group_ID"] == $bloodGroup["Blood_Group_ID"]) {
                                    $selected = 'selected="selected"';
                                } else {
                                    $selected = '';
                                }
                                print ("<option value=\"" . $bloodGroup["Blood_Group_ID"] . "\" " . $selected . "  >" . $bloodGroup["Blood_Group_Name"] . "</option>");
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>Donor:</td>
                    <td><select name="donor_value" id="donor_value" selected="">
                            <?php
                            foreach ($bloodDonorYesNo as $donor) {
                                if ($signUpStudent["donor_value"] == $donor["donor_value"]) {
                                    $selected = 'selected="selected"';
                                } else {
                                    $selected = '';
                                }
                                print ("<option value=\"" . $donor["donor_value"] . "\" " . $selected . "  >" . $donor["Blood_Donor"] . "</option>");
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>User Name:</td>
                    <td> <input type"text" name="email" id="SPortrait"
                            value="<?php echo $signUpStudent["SE_Mail"]; ?>" /></td>
                </tr>
                <tr>
                    <td> <input type="hidden" name="password" id="SPortrait"
                            value="<?php echo $signUpStudent["password"]; ?>" /></td>
                </tr>
                <tr>
                    <td>SID:</td>
                    <td> <input type="text" name="SID" id="SPortrait" value="<?php echo $signUpStudent["SID"]; ?>" />
                    </td>
                </tr>
            </table>
            <div class="modal_button_bar">
                <button type="submit" name="Submit" value="Update">Approve</button>
                <button type="button" onClick="tb_remove();">Close</button>
            </div>
        </form>
        <?php } ?>
    </div>
</body>

</html>