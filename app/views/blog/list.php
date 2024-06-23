<div>
    <div id="new_blog_button"><a
            href="<?= BASE_URL . '/blog/add?keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' ?>" class="thickbox" title="Add a Blog">
            আপনি একটি ব্লগ লিখুন</a></div>
    <?php
    foreach ($blogList['blogs'] as $blog) { ?>
        <div style="padding-bottom:100px; padding-right:50px; color:#FFFFFF">
            <img style="width:60px;padding:2px;border:2px solid white;margin:0px; font-size:18px"
                src="<?= BASE_URL . '/app/assets/' . $blog['SPortrait']; ?>" alt="Smiley face" width="50" height="60"
                align="right">
            <div style="padding:10px; font-weight:bold"><?php echo $blog['SName']; ?> </div>
            <div style="padding-left:10px"><?php echo $blog['SMName']; ?></div>
            <div style="width:500px;padding:10px;margin:0px; font-size:11px"><?php echo $blog['Date']; ?></div>
            <div>
                <p style="font-size:14px; font-weight:bold">Article:</p>
            </div>
            <div style="width:700px;padding:10px;border:1px solid white;margin:0px; font-size:16px">
                <?php echo $blog['Blog'] ?>
            </div>
            <div id="detail_blog">
                <a href="<?= BASE_URL . '/blog/detail?Blog_ID=' . $blog['Blog_ID'] ?>"> বিস্তারির দেখুন </a>
            </div>
            <?php
            if (($userInfo['group_id'] && $userInfo['group_id'] == 1) || ($userInfo['user_id'] && $userInfo['user_id'] == $blog['user_id'])) {
                ?>
                <div align="right">
                    <a href="<?= BASE_URL . '/blog/edit?Blog_ID=' . $blog['Blog_ID'] . '&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' ?>"
                        class="thickbox" title="Edit Blog"> Edit This Article </a>
                    | <a
                        href="<?= BASE_URL . '/blog/delete-confirm?Blog_ID=' . $blog['Blog_ID'] . '&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' ?>" class="thickbox" title="Delete Blog">
                        Delete This Article </a>
                </div>
                <?php
            }
            ?>
        </div>
    <?php } ?>
    <?= $blogList['pagination_nav'] ?>
</div>