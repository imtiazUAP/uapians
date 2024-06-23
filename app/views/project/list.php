<?php
    foreach ($projectList as $project) {
        ?>

        <div style="padding:10px;">
            <table style="width:250px; border: inset;">
                <tr style="height:20px">
                    <td style="border:inset" colspan=2 align="center"><?php echo $project['project_name']; ?></td>
                </tr>
                <tr style="height:100px">
                    <td style="border:inset" colspan=2 align="center"> <a
                            href='<?php echo $project['project_link']; ?>'><span><img
                                    style="width:300px; height:200px; border:1px solid white; vertical-align:middle"
                                    src="<?= BASE_URL .'/app/assets/'. $project['screenshot'] ?>" <span> Click to
                                Download</span></a></td>
                </tr>
                <tr style="height:20px">
                    <td style="border:inset" align="center"><a
                            href="<?= BASE_URL . '/student/profile?SID=' . $userInfo['user_id'] ?>"><?= $userInfo['SName'] ?></a></td>
                    <td style="border:inset" align="center"><?php echo $project['category_id']; ?></td>
                </tr>
            </table>
        </div>
    <?php } ?>