<div>
    <?php
    if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 1) {
        ?>
        <div>
            <a href="<?= BASE_URL . '/gallery/add?keepThis=true&TB_iframe=true&height=225&width=400&modal=true' ?>"
                title="New Photo" class="thickbox">Add New Photos</a>
        </div>
        <?php
    }
    ?>
    <?php
    foreach ($photos as $photo) { ?>
        <div class="img" style="background-color:#000033; height: 230px; padding:19px">
            <a target="_blank" href="<?= BASE_URL . '/app/assets/' . $photo['Photo_Link'] ?>">
                <img src="<?= BASE_URL . '/app/assets/' . $photo['Photo_Link'] ?>" alt="Klematis" width="205" height="160">
            </a>
            <div class="desc" style="color:#FFFFFF">
                <?= $photo['Photo_caption'] ?>
            </div>
            <?php if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 1) { ?>
                <a href="<?= BASE_URL . '/gallery/delete-confirm?photo_id=' . $photo['Photo_Id'] . '&keepThis=true&TB_iframe=true&height=200&width=400&modal=true' ?>"
                    class="thickbox"> delete </a>
                <?php
            } ?>
        </div>
    <?php } ?>
</div>