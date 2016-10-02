<?php
error_reporting(0);
include('dbconnect.php');
include("classes/Authentication.php");
$strquery = "SELECT * from s_info where SID= '" . $_GET["SID"] . "' ";
$results = mysql_query($strquery);
$row = mysql_fetch_array($results);
?>
<html>
<head>
    <?php
    include("header.php");
    ?>
</head>

<body>
<?php
if ($isLoggedIn && $isAdmin) {
    ?>
    <form action="employee_save.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label class="modal_label">Name:</label></td>
                <td><input type="text" placeholder="employee name" name="employee_name"/></td>
            </tr>
            <tr>
                <td><label class="modal_label">E-Mail:</label></td>
                <td><input type="email" placeholder="employee mail" name="email"/></td>
            </tr>
            <tr>
                <td><label class="modal_label">Faculty/Staff:</label></td>
                <td><select name="user_group">
                        <option value="4">faculty</option>
                        <option value="5">Staff</option>
                    </select></td>
            </tr>
            <tr>
                <td><label for="Portrait" class="modal_label" data-icon="u">Upload Photo:</label>
                </td>
                <td><input id="file" name="file" required="required" type="file"
                           placeholder="required"/></td>
            </tr>
            <tr>
                <td><label class="modal_label">Nick Name:</label></td>
                <td><input type="text" placeholder="employee username" name="username"/></td>
            </tr>
            <tr>
                <td><label class="modal_label">Password:</label></td>
                <td><input type="password" placeholder="password" name="password"/></td>
            </tr>
        </table>
        <br><br>

        <button name="login" type="Submit" class="button button_blue">Add Employee
        </button>
    </form>
    <div align="right";>
        <button class="button button_red" onClick="tb_remove()"> Close </button>
        </div>
<?php
} else {
    include("permission_error.php");
}
?>
</body>
</html>
