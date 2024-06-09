<?php
session_start();
include_once (__DIR__ . "/../../helpers/page.inc.php");
$b = $_SESSION['username'];
$userrole = @mysqli_query("select * from userinfo where username='{$b}'");
$userdata = @mysqli_fetch_assoc($userrole);
if (empty($_SESSION['username'])) { ?>
	<script language="JavaScript">window.location = "index.php";</script><?php
} else { ?>
	<html>
	<head>
		<?php include (__DIR__ . "/../partials/header.php"); ?>
	</head>
	<body>
		<div id="grad1">
			<div class="bodydiv">
				<?php include (__DIR__ . "/../partials/logo.php"); ?>
				<div id="logo">
					<div class="realbody" style="height:2000px">
						<?php include (__DIR__ . "/../partials/menu.php"); ?>
						<div id="content">
							<div id="colOne">
								<?php include (__DIR__ . "/../partials/sidebar.php"); ?>
							</div>
							<div>
								<div style="padding-top:40">
									<form>
										<div align="center">
											 <?php 
											//  if (($userdata['admin'] == '1')) { 
											?>
											<?php if (1) { ?>
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
												<?php
												// if (($userdata['admin'] == '1')) {
													?>
												<?php if (1) { ?>
													<td bgcolor="#006699"> Results </td>
													<td bgcolor="#006699" width="100"> Admin|Panel </td>
												<?php } ?>
											</tr>
											<?php
											$dbconnect = new dbClass();
											$connection = $dbconnect->getConnection();
											$qry = "SELECT SID,SName,SReg,SPortrait,SMName FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE s_info.SMID='" . $_GET["SMID"] . "' order by SReg";
											// $qry = "SELECT SID, SName, SReg, SPortrait, SMName FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE s_info.SMID=? order by SReg";
											$stmt = $connection->prepare($qry);
											$stmt->execute();
											$result = $stmt->get_result();
											$total_records = @mysqli_num_rows($result);
											$record_per_page = 13;
											$scroll = 4;
											$page = new Page(); ///creating new instance of Class Page
											$page->set_page_data($_SERVER['PHP_SELF'], $_GET["SMID"], $total_records, $record_per_page, $scroll, true, true, true);
											$limitStmt = $connection->prepare($qry);
											$limitStmt->execute();
											$limitResult = $limitStmt->get_result();
											while ($data = mysqli_fetch_assoc($limitResult)) { ?>
												<tr align="center" class="tablerow">
													<td width="120"><?= $data['SReg'] ?></td>
													<td width="200">
														<a href=<?= BASE_URL .'/student/profile?SID='. $data['SID'] ?>>
															<?= $data['SName'] ?>
														</a>
													</td>
													<td width="100">
														<a href=<?= BASE_URL .'/student/profile?SID='. $data['SID'] ?>>
															<img src=<?= BASE_URL . '/app/assets/'. $data['SPortrait'] ?> echo style="height:100px;">
														</a>
													</td>
													<td width="200"><?= $data['SMName'] ?></td>
													<?php if (1) { ?>
														<?php 
															// if (($userdata['admin'] == '1')) { 
																?>
														<td> <a href='Single_Mark_List.php? SID=<?= $data['SID'] ?>'> Results </a>
														</td>
														<td width="100">
															<a href=<?= BASE_URL . "/app/views/student/Student_Edit.php?SID=". $data['SID'] ?>&keepThis=true&TB_iframe=true&height=300&width=350&do=edit&modal=true" class="thickbox">
																edit
															</a> | <a
																href='Student_Delete.php?SID=<?= $data['SID'] ?>'> delete </a></td>
													<?php } ?>
												</tr>
											<?php } ?>
										</table>
										<div style="text-align: center">
											<?php echo $page->get_page_nav(); ?>
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