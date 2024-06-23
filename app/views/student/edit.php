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
        <form id="form1" name="form1" method="post" action=<?= BASE_URL . "/student/update" ?>>
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input name="SName" type="text" id="SName" value="<?php echo $studentInfo["SName"]; ?>" /></td>
                </tr>
                <tr>
                    <td>Registration No:</td>
                    <td><input name="SReg" type="text" id="SReg" value="<?php echo $studentInfo["SReg"]; ?>" /></td>
                </tr>
                <tr>
                    <td>Present Address:</td>
                    <td><input name="SHouse" type="text" id="SHouse" value="<?php echo $studentInfo["SHouse"]; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>District:</td>
                    <td>
                        <select name="district_id" id="district_id" selected="">
                            <?php
                            foreach ($districts as $district) {
                                if ($studentInfo["district_id"] == $district["district_id"]) {
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
                    <td>Phone Number:</td>
                    <td><input name="SPh_Number" type="text" id="SPh_Number"
                            value="<?php echo $studentInfo["SPh_Number"]; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input name="email" type="text" id="email" value="<?php echo $studentInfo["email"]; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input name="SB_of_Date" type="text" id="SB_of_Date"
                            value="<?php echo $studentInfo["SB_of_Date"]; ?>" />
                    </td>
                </tr>
                <input type="hidden" name="SPortrait" type="text" id="SPortrait"
                    value="<?php echo $studentInfo["SPortrait"]; ?>" />
                <tr>
                    <td>Semester</td>
                    <td>
                        <select name="SMID" id="SMID" selected="">
                            <?php
                            foreach ($semesters as $semester) {
                                if ($studentInfo["SMID"] == $semester["SMID"]) {
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
                    <td>
                        <select name="Blood_Group_ID" id="Blood_Group_ID" selected="">
                            <?php
                            foreach ($bloodGroups as $bloodGroup) {
                                if ($studentInfo["Blood_Group_ID"] == $bloodGroup["Blood_Group_ID"]) {
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
                    <td>Blood Donor:</td>
                    <td>
                        <select name="donor_value" id="donor_value" selected="">
                            <?php
                            if ($studentInfo["donor_value"] == $abc["donor_value"]) {
                                $selected = 'selected="selected"';
                            } else {
                                $selected = '';
                            } ?>
                            <option value="1" <?= $selected ?>>Yes</option>
                            <option value="2" <?= $selected ?>>No</option>
                    </td>
                </tr>
                <tr>
                    <td>Noted Activity:</td>
                    <td><input type="text" name="Noted_Activity" id="SPortrait"
                            value="<?php echo $studentInfo["Noted_Activity"]; ?>" /></td>
                </tr>
                <tr>
                    <td>School:</td>
                    <td><input type="text" name="School" id="SPortrait" value="<?php echo $studentInfo["School"]; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>College:</td>
                    <td><input type="text" name="College" id="SPortrait"
                            value="<?php echo $studentInfo["College"]; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Knows Programs:</td>
                    <td><input type="text" name="Knows_Programs" id="SPortrait"
                            value="<?php echo $studentInfo["Knows_Programs"]; ?>" /></td>
                </tr>
                <tr>
                    <td>Interested In:</td>
                    <td><input type="text" name="Interested_In" id="SPortrait"
                            value="<?php echo $studentInfo["Interested_In"]; ?>" /></td>
                </tr>
                <tr>
                    <td>Working At:</td>
                    <td><input type="text" name="Working_At" id="SPortrait"
                            value="<?php echo $studentInfo["Working_At"]; ?>" /></td>
                </tr>
                <tr>
                    <td>Facebook Link:</td>
                    <td><input type="text" name="FB_Link" id="SPortrait"
                            value="<?php echo $studentInfo["FB_Link"]; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Twitter Link:</td>
                    <td><input type="text" name="Twitter_Link" id="SPortrait"
                            value="<?php echo $studentInfo["Twitter_Link"]; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Blog/Website:</td>
                    <td><input type="text" name="Blog" id="SPortrait" value="<?php echo $studentInfo["Blog"]; ?>" />
                    </td>
                </tr>
            </table>
            </select>
            <input name="SID" type="hidden" id="SID" value="<?php echo $studentInfo["SID"]; ?>" />
            <div class="modal_button_bar">
                <button type="submit" name="Submit" value="Update">Update</button>
                <button type="button" onClick="tb_remove();">Close</button>
            </div>
        </form>
        <?php } ?>
    </div>
</body>

</html>