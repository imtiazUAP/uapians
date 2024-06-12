<div style="padding-top:40">
	<form>
		<div align="center">
			<?php if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 1) { ?>
				<a href="Student_Insert.php?keepThis=true&TB_iframe=true&height=350&width=280&modal=true"
					title="New Student" class="thickbox">Create New Student</a>
			<?php } ?>
		</div>
		<table class="hoverTable" border="1" align="center" width="800">
			<tr align="center">
				<td bgcolor="588C73" width="120"> Registration Number </td>
				<td bgcolor="588C73" width="200">Name of Student</td>
				<td bgcolor="588C73" width="100px"> Portrait </td>
				<td bgcolor="588C73"> Semester </td>
				<?php if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 1) { ?>
					<td bgcolor="#006699"> Results </td>
					<td bgcolor="#006699" width="100"> Admin|Panel </td>
				<?php } ?>
			</tr>
			<?php
			$students = $studentsList['students'];
			foreach ($students as $student) { ?>
				<tr align="center" class="tablerow">
					<td width="120"><?= $student['SReg'] ?></td>
					<td width="200">
						<a href=<?= BASE_URL . '/student/profile?SID=' . $student['user_id'] ?>>
							<?= $student['SName'] ?>
						</a>
					</td>
					<td width="100">
						<a href=<?= BASE_URL . '/student/profile?SID=' . $student['user_id'] ?>>
							<img src=<?= BASE_URL . '/app/assets/' . $student['SPortrait'] ?> echo style="height:100px;">
						</a>
					</td>
					<td width="200"><?= $student['SMName'] ?></td>
					<?php if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 1) { ?>
						<td> <a href='Single_Mark_List.php? SID=<?= $student['user_id'] ?>'> Results
							</a>
						</td>
						<td width="100">
							<a href=<?= BASE_URL . "/app/views/student/Student_Edit.php?SID=" . $student['SID'] ?>&keepThis=true&TB_iframe=true&height=300&width=350&do=edit&modal=true" class="thickbox">
								edit
							</a> | <a href='Student_Delete.php?SID=<?= $student['user_id'] ?>'> delete
							</a>
						</td>
					<?php } ?>
				</tr>

				<?php
			} ?>
		</table>
		<div style="text-align: center">
			<?= $studentsList['pagination_nav']; ?>
		</div>
	</form>
</div>