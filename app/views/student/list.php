<?php
session_start();
include_once (__DIR__ . "/../../helpers/page.inc.php");
if (empty($_SESSION['username'])) { ?>
	<script language="JavaScript">window.location = "index.php";</script><?php
} else { ?>
	<html>

	<head>
		<?php include (__DIR__ . "/../partials/header.php"); ?>
	</head>

	<body>
		<div id="background_canvas">
			<div class="body_wrapper">
				<?php include (__DIR__ . "/../partials/logo.php"); ?>
				<div id="logo">
					<div class="content_wrapper" style="height:2000px">
						<?php include (__DIR__ . "/../partials/menu.php"); ?>
						<div id="content">
							<div id="colOne">
								<?php include (__DIR__ . "/../partials/sidebar.php"); ?>
							</div>
							<div>
								<div style="padding-top:40">
									<form>
										<div align="center">
											<?php if ($isAdmin) { ?>
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
												<?php if ($isAdmin) { ?>
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
														<a href=<?= BASE_URL . '/student/profile?SID=' . $student['SID'] ?>>
															<?= $student['SName'] ?>
														</a>
													</td>
													<td width="100">
														<a href=<?= BASE_URL . '/student/profile?SID=' . $student['SID'] ?>>
															<img src=<?= BASE_URL . '/app/assets/' . $student['SPortrait'] ?>
																echo style="height:100px;">
														</a>
													</td>
													<td width="200"><?= $student['SMName'] ?></td>
													<?php if ($isAdmin) { ?>
														<td> <a href='Single_Mark_List.php? SID=<?= $student['SID'] ?>'> Results
															</a>
														</td>
														<td width="100">
															<a href=<?= BASE_URL . "/app/views/student/Student_Edit.php?SID=" . $student['SID'] ?>&keepThis=true&TB_iframe=true&height=300&width=350&do=edit&modal=true"
																class="thickbox">
																edit
															</a> | <a href='Student_Delete.php?SID=<?= $student['SID'] ?>'> delete
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
							</div>
						</div>
					</div>
					<div class="footer">
						<?php include (__DIR__ . "/../partials/footer.php"); ?>
					</div>
	</body>

	</html>
<?php } ?>