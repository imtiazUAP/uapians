<div style="padding-top:40">
    <form>
        <?php
        if (!empty($userInfo['group_id'] ) && $userInfo['group_id'] == 1) {
            ?>
            <a href="<?= BASE_URL . '/admin/add-student?keepThis=true&TB_iframe=true&height=565&width=450&modal=true' ?>" title="New Student"
                class="thickbox">Add New Student</a>
            <?php
        }
        ?>
        <table border="1" align="center" width="800">
            <tr align="center">
                <td bgcolor="588C73" width="120"> Registration Number </td>
                <td bgcolor="588C73" width="200">Name of Student</td>
                <td bgcolor="588C73" width="100px"> Portrait </td>
                <td bgcolor="588C73" width="200"> Semester </td>
                <td bgcolor="#006699" width="100"> Admin|Panel </td>
            </tr>
            <?php foreach($signUpStudents as $signUpStudent){
                ?>
                <table border="1" align="center" width="800">
                    <tr align="center">
                        <td width="120"><?= $signUpStudent['SReg'] ?></td>
                        <td width="200"><?= $signUpStudent['SName'] ?></td>
                        <td width="100"><img src="<?= BASE_URL . '/app/assets/' . $signUpStudent['SPortrait'] ?>" style="height:100px;"></td>
                        <td width="200"><?= $signUpStudent['SMName'] ?></td>
                        <?php
                        if (!empty($userInfo['group_id'] ) && $userInfo['group_id'] == 1) { ?>
                            <td width="100">
                                <a href="<?= BASE_URL . '/admin/signup-review?SReg='.$signUpStudent['SReg'] . '&keepThis=true&TB_iframe=true&height=340&do=edit&modal=true' ?>" class="thickbox"> Review</a>
                                | <a href="<?= BASE_URL . '/admin/signup-delete-confirm?SReg=' . $signUpStudent['SReg'] . '&keepThis=true&TB_iframe=true&height=165&do=edit&modal=true' ?>" class="thickbox"> delete </a>
                            </td>
                        <?php } ?>
                    </tr>
                </table>
                <?php
            }
            ?>
    </form>
</div>