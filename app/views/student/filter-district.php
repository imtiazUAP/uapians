<div>
    <form method="post" id="districtFilterForm" action="<?= BASE_URL . '/student/district/list' ?>">
        <table>
            <tr>
                <td>District</td>
                <td>
                    <select name="district_id" id="district_id" selected="" onchange="updateDistrictFilterFormAction()">
                        <?php
                        foreach ($allDistricts as $district) {
                            if ($selectedDistrictId == $district["district_id"]) {
                                $selected = 'selected="selected"';
                            } else {
                                $selected = '';
                            }
                            print ("<option value=\"" . $district["district_id"] . "\" " . $selected . "  >" . $district["district_name"] . "</option>");
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <p class="signin_button">
                        <input type="Submit" value="Search......" />
                    </p>
                </td>
            </tr>
        </table>

        <br>
        <br>
        <table class="hoverTable" border="1" align="center" width="800">
            <tr align="center">
                <td bgcolor="588C73" width="120"> Registration Number </td>
                <td bgcolor="588C73" width="200">Name of Student</td>
                <td bgcolor="588C73" width="100px"> Portrait </td>
                <td bgcolor="588C73"> Semester </td>
                <td bgcolor="588C73"> District </td>
            </tr>
            <?php
            foreach ($studentsList['students'] as $student) {
                ?>
                <tr align="center" class="tablerow">
                    <td width="120"><?= $student['SReg'] ?></td>
                    <td width="200"><a href="<?= BASE_URL . '/student/profile?SID='. $student['user_id'] ?>"><?= $student['SName'] ?></a>
                    </td>
                    <td width="100">
                        <a href="<?= BASE_URL . '/student/profile?SID='. $student['user_id'] ?>">
                            <img src="<?= BASE_URL . '/app/assets/' . $student['SPortrait'] ?>" echo style="height:100px;">
                        </a>
                    </td>
                    <td width="200"><?= $student['SMName'] ?></td>
                    <td width="200"><?= $student['district_name'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <div style="text-align: center">
            <?= $studentsList['pagination_nav']; ?>
        </div>
    </form>
</div>