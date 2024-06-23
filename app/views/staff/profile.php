<?php
if ($userInfo['user_id'] == $staffInfo['user_id'] || ( !empty($userInfo['group_id']) && $userInfo['group_id']) == 1) {
    ?>
    <div align="center" style="width:700px; height:20px">
        <a href="<?= BASE_URL. '/staff/edit?user_id=' . $staffInfo['user_id'].'&keepThis=true&TB_iframe=true&height=543&width=400&do=edit&modal=true' ?>" class='thickbox'> Edit Profile </a>"
    </div>
    <?php
}
?>
<div align="center" style="padding-top:30px">
    <img style="width:150px;padding:10px;border:5px solid white;margin:0px; font-size:18px"
        src="<?= BASE_URL . '/app/assets/' . $staffInfo['Employee_Portrait'] ?>" />
</div>
<p align="center" style="font:Arial, Helvetica, sans-serif; font-size:40px; color:#FFFFFF">
    <?php echo $staffInfo['EName']; ?>
</P>
<p align="center" style="padding-top:1px; color:#FFFFFF; font-size:18px">
    <?php echo $staffInfo['EDesignation']; ?>
</P>
<p align="center" style="padding-top:10px; color:#FFFFFF; font-size:16px">
    <?php echo $staffInfo['Employee_Contact']; ?>
</P>
<p style="padding-top:10px; color:#FFFFFF; font-size:18px">Speech for the Students:<br></p>
<div>
    <p style="padding:10px;border:2px solid white;margin:0px; font-size:14px">
        <?php echo $staffInfo['Employee_Speech']; ?>
    </P>
</div>.
<p style="padding-top:10px; color:#FFFFFF; font-size:18px">Playing Role in UAP:<br></p>
<div style="padding-bottom:75px">
    <p style="padding:10px;border:2px solid white;margin:0px; font-size:14px">
        <?php echo $staffInfo['Employee_Role']; ?>
    </P>
</div>