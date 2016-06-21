<?php
	session_start();
	error_reporting(0);
	include("dbconnect.php");
	include_once("page.inc.php");

	$b=$_SESSION['username'];
	$userrole = mysql_query("select * from userinfo where username='{$b}'");
	$userdata = mysql_fetch_assoc($userrole);

if (empty($_SESSION['username'])) {?>
    <script language="JavaScript">window.location="index.php";</script><?php
    } else { ?>

<html>
	<head>
		<?php include("header.php"); ?>
	</head>

<body>
	<div id="grad1">
		<div class="bodydiv">
			<?php include("logo.php"); ?>
			<div id="logo">
				<div class="realbody" style="height:2000px">
					<?php include("menu.php"); ?>

					<div id="content">
						<div id="colOne">
							<?php include("sidebar.php"); ?>
						</div>

						<div>
							<div style="padding-top:40">
								<form>
								<div align="center">
									<?php if (($userdata[admin] == '1')) {?>
									<a href="Student_Insert.php?keepThis=true&TB_iframe=true&height=350&width=280&modal=true" title="New Student" class="thickbox">Create New Student</a>
									<?php } ?>
								</div>
									<table class="hoverTable" border="1" align="center" width="800" >
										<tr align="center">
											<td bgcolor="588C73" width="120"> Registration Number </td>
											<td bgcolor="588C73" width="200">Name of Student</td>
											<td bgcolor="588C73" width="100px"> Portrait </td>
											<td bgcolor="588C73" > Semester </td>
											<?php if (($userdata[admin] == '1')) {?>
											<td bgcolor="#006699" > Results </td>
											<td bgcolor="#006699" width="100"> Admin|Panel </td>
											<?php } ?>
										</tr>
										    <?php
                                            $sql = "SELECT SID,SName,SReg,SPortrait,SMName FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE s_info.SMID='" . $_GET["SMID"] . "' order by SReg";
                                            $result = @mysql_query($sql);
                                            $total_records = @mysql_num_rows($result);
                                            $record_per_page = 13;
                                            $scroll = 4;
                                            $page = new Page(); ///creating new instance of Class Page
                                            $page->set_page_data($_SERVER['PHP_SELF'], $total_records, $record_per_page, $scroll, true, true, true);
                                            $result = @mysql_query($page->get_limit_query($sql));

                                        while ($data = mysql_fetch_assoc($result)) { ?>
                                        <tr align="center" class="tablerow">
                                            <td width="120"><?= $data['SReg'] ?></td>
                                            <td width="200"><a href='Profile_List.php? SID=<?= $data['SID'] ?>'><?= $data['SName'] ?></a></td>
                                            <td width="100"><a href='Profile_List.php? SID=<?= $data['SID'] ?>'><img src=<?= $data['SPortrait'] ?> echo  style="height:100px;" ></a></td>
                                            <td width="200"><?= $data['SMName'] ?></td>
											<?php if (($userdata[admin] == '1')) { ?>
							                <td > <a href='Single_Mark_List.php? SID=<?= $data['SID'] ?>'> Results </a></td>
							                <td width="100"> <a href='Student_Edit.php?SID=<?= $data['SID'] ?>&keepThis=true&TB_iframe=true&height=300&width=350&do=edit&modal=true' class='thickbox'> edit </a> | <a href='Student_Delete.php?SID=<?= $data['SID'] ?>'> delete </a></td>
							                <?php } ?>
							            </tr>
							            <?php } ?>
									</table>
		                            <?php echo $page->get_page_nav(); ?>
		                        </form>
							</div>
						</div>
					</div>
				</div>

			<div class="footer">
				<?php include("footer.php");?>
			</div>
</body>
</html>
<?php } ?>
