<div>
<?php
if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 1) { ?>
    <div>
        <a href="<?= BASE_URL . '/project/add?keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' ?>"
            class='thickbox' title='Add reference'> Add a Project </a>
    </div>
<?php } ?>
    <table>
        <tr>
            <td>
                <a href="<?= BASE_URL . '/project/list?category_id=1' ?>"><img border="0" alt="W3Schools" src="<?=BASE_URL .'/app/assets/images/system_images/project_thumbnails/java.jpg' ?>" width="265"
                        height="160"></a>
            </td>
            <td>
                <a href="<?= BASE_URL . '/project/list?category_id=2' ?>"><img border="0" alt="W3Schools" src="<?=BASE_URL .'/app/assets/images/system_images/project_thumbnails/c.jpg' ?>" width="265"
                        height="160"></a>
            </td>
            <td>
                <a href="<?= BASE_URL . '/project/list?category_id=3' ?>"><img border="0" alt="W3Schools" src="<?=BASE_URL .'/app/assets/images/system_images/project_thumbnails/c++.jpg' ?>" width="265"
                        height="160"></a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?= BASE_URL . '/project/list?category_id=4' ?>"><img border="0" alt="W3Schools" src="<?=BASE_URL .'/app/assets/images/system_images/project_thumbnails/csharp.jpg' ?>" width="265"
                        height="160"></a>
            </td>
            <td>
                <a href="<?= BASE_URL . '/project/list?category_id=5' ?>"><img border="0" alt="W3Schools" src="<?=BASE_URL .'/app/assets/images/system_images/project_thumbnails/android.jpg' ?>"
                        width="265" height="160"></a>
            </td>
            <td>
                <a href="<?= BASE_URL . '/project/list?category_id=6' ?>"><img border="0" alt="W3Schools" src="<?=BASE_URL .'/app/assets/images/system_images/project_thumbnails/assembly.jpg' ?>"
                        width="265" height="160"></a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?= BASE_URL . '/project/list?category_id=7' ?>"><img border="0" alt="W3Schools" src="<?=BASE_URL .'/app/assets/images/system_images/project_thumbnails/webapps.jpg' ?>"
                        width="265" height="160"></a>
            </td>
            <td>
                <a href="<?= BASE_URL . '/project/list?category_id=8' ?>"><img border="0" alt="W3Schools" src="<?=BASE_URL .'/app/assets/images/system_images/project_thumbnails/python.jpg' ?>" width="265"
                        height="160"></a>
            </td>
            <td>
                <a href="<?= BASE_URL . '/project/list?category_id=9' ?>"><img border="0" alt="W3Schools" src="<?=BASE_URL .'/app/assets/images/system_images/project_thumbnails/database.jpg' ?>"
                        width="265" height="160"></a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?= BASE_URL . '/project/list?category_id=10' ?>"><img border="0" alt="W3Schools" src="<?=BASE_URL .'/app/assets/images/system_images/project_thumbnails/php.jpg' ?>" width="265"
                        height="160"></a>
            </td>
            <td>
                <a href="<?= BASE_URL . '/project/list?category_id=11' ?>"><img border="0" alt="W3Schools" src="<?=BASE_URL .'/app/assets/images/system_images/project_thumbnails/graphics.jpg' ?>"
                        width="265" height="160"></a>
            </td>
            <td>
                <a href="<?= BASE_URL . '/project/list?category_id=12' ?>"><img border="0" alt="W3Schools" src="<?=BASE_URL .'/app/assets/images/system_images/project_thumbnails/wordpress.jpg' ?>"
                        width="265" height="160"></a>
            </td>
        </tr>
    </table>
</div>