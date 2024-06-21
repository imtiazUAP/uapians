<?php
if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 1) { ?>
    <div>
        <a href="<?= BASE_URL . '/reference/add?user_id=' . $userInfo['user_id'] . '&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' ?>"
            class='thickbox' title='Add reference'> Add a Reference </a>
    </div>
<?php } ?>
<form>
    <table class="hoverTable" border="1" align="center">
        <tr align="center">
            <td bgcolor="#006699" width="80">Course Code</td>
            <td bgcolor="#006699" width="160">Course Name</td>
            <td bgcolor="#006699" width="170">Uploaded by</td>
            <td bgcolor="#006699" width="180">Detail</td>
            <td bgcolor="#006699" width="100px">Download Link</td>
            <td bgcolor="#006699" width="100px">Actions</td>
        </tr>
        <?php
        foreach ($referenceList as $reference) {
            ?>
            <tr align="center" class="tablerow">
                <td width="130" height="50"><?= $reference['CCode'] ?></td>
                <td width="200" height="50"><?= $reference['CName'] ?></td>
                <td align="center" width="220" height="50"><?= $reference['email'] ?></td>
                <td align="center" width="220" height="50"><?= $reference['Detail'] ?></td>
                <td width="150" height="50"><a href="<?= $reference['Reference_Link'] ?>" target="_blank">Download</a></td>
                <?php
                if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 1) { ?>
                    <td>
                        <a href="<?= BASE_URL . '/reference/edit?ref_id=' . $reference['ref_id'] . '&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' ?>"
                            class='thickbox' title='Edit reference'> edit </a>
                        | <a href="<?= BASE_URL . '/reference/delete-confirm?ref_id=' . $reference['ref_id'] . '&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' ?>"
                            class='thickbox' title='Delete reference'> delete </a>
                    </td>
                    <?php
                }
                ?>
            </tr>
            <?php
        }
        ?>
    </table>
</form>