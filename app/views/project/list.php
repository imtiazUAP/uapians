<?php if (is_array($projectList) && count($projectList) > 0) {
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
                                    src="<?php echo $project['project_screenshot']; ?>" <span> Click to
                                Download</span></a></td>
                </tr>
                <tr style="height:20px">
                    <td style="border:inset" align="center"><a
                            href='Profile_List.php? SID=<?= $userInfo['SID'] ?>'><?= $userInfo['SName'] ?></a></td>
                    <td style="border:inset" align="center"><?php echo $project['project_cat_id']; ?></td>
                </tr>
            </table>
        </div>

    <?php }
} else { ?>
    <div style="font-weight: bold;">
        </br></br></br></br>
        <p style="text-align:center">No projects are added for this category yet. Stay connected, it
            will be added...</p>
    </div>

<?php } ?>