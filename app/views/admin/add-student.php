<!DOCTYPE html>
<html lang="en">
<head>
    <?php include (BASE_DIR . "/app/views/partials/header.php"); ?>
</head>
<body>
    <div class="modal_body">
        <form action="<?= BASE_URL . '/admin/save-student' ?>" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>SReg:</td>
                    <td><input type="text" name="SReg" /></td>
                </tr>
                <tr>
                    <td>SName:</td>
                    <td><input type="text" name="SName" /></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>
                        <select name="SMID" id="SMID">
                            <?php
                            foreach ($semesters as $semester) {
                                echo "<option value=\"" . $semester["SMID"] . "\">" . $semester["SMName"] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Blood Group</td>
                    <td>
                        <select name="Blood_Group_ID" id="Blood_Group_ID">
                            <?php
                            foreach ($bloodGroups as $bloodGroup) {
                                echo "<option value=\"" . $bloodGroup["Blood_Group_ID"] . "\">" . $bloodGroup["Blood_Group_Name"] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>email:</td>
                    <td><input type="text" name="email" /></td>
                </tr>
                <tr>
                    <td>SPh_Number:</td>
                    <td><input type="text" name="contact" /></td>
                </tr>
                <tr>
                    <td>District:</td>
                    <td>
                        <select name="district_id" id="district_id">
                            <?php
                            foreach ($districts as $district) {
                                echo "<option value=\"" . $district["district_id"] . "\">" . $district["district_name"] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>SPortrait:</td>
                    <td><input type="file" name="file" id="file"></td>
                </tr>
                <tr>
                    <td>FB_Link:</td>
                    <td><input type="text" name="FB_Link" /></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="text" name="password" /></td>
                </tr>
            </table>
            <div class="modal_button_bar">
                <button type="submit" name="Submit" value="Update">Save</button>
                <button type="button" onClick="tb_remove();">Close</button>
            </div>
        </form>
    </div>
</body>
</html>
