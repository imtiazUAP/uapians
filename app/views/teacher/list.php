<?php if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 1) { ?>
<a href="Employee_Insert.php?keepThis=true&TB_iframe=true&height=120&width=240&modal=true" title="New Employee"
class="thickbox">Create New Employee</a>
<?php } ?>
<table class="hoverTable" border="1" style=" padding-bottom:40px;padding-left:40px;padding-right:40px;">
		<tr align="center">
			<td width="50" height="50" bgcolor="588C73">Employee Name</td>
			<td width="150" bgcolor="588C73">Employee Designation</td>
			<td width="150" bgcolor="588C73">Portrait</td>
			<td width="150" bgcolor="588C73">Profiles</td>
			<?php if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 1) { ?>
			<td width="150" bgcolor="#006699">Admin Panel</td>
			<?php } ?>
		</tr>
		<?php
		foreach ($teachersList['teachers'] as $teacher) { ?>
			<tr align="center">
				<td height="40"><?php echo $teacher['EName'] ?></td>
				<td><?php echo $teacher['EDesignation'] ?></td>
				<td width="100"><img src="<?= BASE_URL . '/app/assets/' . $teacher['Employee_Portrait'] ?>" style="height:100px;"></td>
				<td><a href="<?= BASE_URL . '/teacher/profile?user_id=' . $teacher['user_id'] ?>"> Profile </a></td>
				<?php
				if (!empty($userInfo['group_id']) &&  $userInfo['group_id'] == 1) {
					?>
					<td align="center">
						<?php echo " <a href='teacher/edit?user_id=" . $teacher['user_id'] . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit Employee - " . $teacher['user_id'] . "'> edit </a> "; ?>
						| <?php echo " <a href='teacher/delete?user_id=" . $teacher['user_id'] . "'> delete </a> "; ?></td>
					<?php
				}
				?>
			</tr>
		<?php } ?>
	</table>