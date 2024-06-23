<html>

<head>
	<?php include (BASE_DIR . "/app/views/partials/header.php"); ?>
</head>

<body>
	<div class="modal_body">
		<?php if (isset($_GET['message'])) { ?>
			<div class="message"><?php echo htmlspecialchars($_GET['message']); ?></div>
			<div class="modal_button_bar">
				<button type="button" onClick="tb_remove();">Close</button>
			</div>
		<?php } else { ?>
			<form action="<?= BASE_URL . '/teacher/save' ?>" method="post">
				<table>
					<tr>
						<td>Name:</td>
						<td><input type="text" name="EName" /></td>
					</tr>
					<tr>
						<td>Designation:</td>
						<td><input type="text" name="EDesignation" /></td>
					</tr>
					<tr>
						<td>Contact:</td>
						<td><input type="text" name="Employee_Contact" /></td>
					</tr>
					<tr>
						<td>Speech:</td>
						<td><input type="text" name="Employee_Speech" /></td>
					</tr>
					<tr>
						<td>Qualification:</td>
						<td><input type="text" name="Employee_Qualification" /></td>
					</tr>
					<tr>
						<td>Experience:</td>
						<td><input type="text" name="Employee_Experience" /></td>
					</tr>
					<tr>
						<td>Role:</td>
						<td><input type="text" name="Employee_Role" /></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="text" name="email" /></td>
					</tr>
				</table>
				<div class="modal_button_bar">
					<button type="submit" name="Submit" value="Update">Update</button>
					<button type="button" onClick="tb_remove();">Close</button>
				</div>
			</form>
		<?php } ?>
	</div>
</body>

</html>