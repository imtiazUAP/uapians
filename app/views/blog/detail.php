<div id="content">
    <div id="new_blog_button"><a href="Blog_Insert.php"> আপনি একটি ব্লগ লিখুন</a></div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div>
        <div style="padding-bottom:100px; padding-right:50px; color:#FFFFFF">
            <img style="width:60px;padding:2px;border:2px solid white;margin:0px; font-size:18px"
                src="<?= BASE_URL . '/app/assets/' . $blogDetail['SPortrait'] ?>" alt="Smiley face" width="50"
                height="60" align="right">
            <div style="padding:10px; font-weight:bold"><?= $blogDetail['SName'] ?> </div>
            <div style="padding-left:10px"><?= $blogDetail['SMName']; ?></div>
            <div style="width:500px;padding:10px;margin:0px; font-size:11px">
                <?= $blogDetail['Date'] ?>
            </div>
            <div>
                <p style="font-size:14px; font-weight:bold">Article:</p>
            </div>
            <div style="width:700px;padding:10px;border:1px solid white;margin:0px; font-size:16px">
                <?= $blogDetail['blog'] ?>
            </div>
            <?php
            if (($userInfo['group_id'] == 1) || $userInfo['user_id'] == $blogDetail['user_id']) {
                ?>
                <div align="right">
                    <a href="<?= BASE_URL . '/blog/edit?Blog_ID=' . $blogDetail['Blog_ID'] . '&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true'?>" class='thickbox' title='Edit Blog'> Edit This Article </a>
                    |
                    <a href="<?= BASE_URL . '/blog/delete-confirm?Blog_ID=' . $blogDetail['Blog_ID'] . '&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true'?>" class='thickbox' title='Delete Blog'> Delete This Article </a>
                </div>
                <?php
            }
            ?>
            <?php
            foreach ($blogComments as $blogComment) { ?>
                <div style="padding-bottom:100px; padding-right:50px; color:#FFFFFF">
                    <img style="padding:2px;border:2px solid white;margin:0px; font-size:18px"
                        src="<?= BASE_URL . '/app/assets/' . $blogComment['SPortrait'] ?>" alt="Smiley face" width="40"
                        height="50">
                    <div style="padding:2px; font-weight:bold"><?= $blogComment['SName'] ?> </div>
                    <div style="padding:2px;border:1px solid white;margin:0px; font-size:12px; width:500px" ;>
                        <?= $blogComment['Comment'] ?>
                    </div>
                <?php }
            ?>

                <br>
                <form action="<?= BASE_URL . '/blog/comment/save' ?>" method="post">
                    <div>
                        <input value="<?php echo $userInfo['user_id']; ?>" name="user_id" type="hidden" />
                        <input value="<?= $blogDetail['Blog_ID'] ?>" name="blog_id" type="hidden" />
                        <div style="font-weight:bold;font-size:20px; color:#FFFFFF;">Comments:
                        </div>
                        <textarea name="comment" rows="4" cols="50" placeholder="Leave your comment here..."></textarea>
                        <br>
                    </div>
                    <br>
                    <br>
                    <div id="detail_blog" float="right">
                        <input type="Submit" Value="Comment" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>