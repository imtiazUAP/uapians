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
    <form action="employee_save.php" method="post">
        <table>
            <tr>
                <td>EName:</td>
                <td><input type="text" name="EName"/></td>
            </tr>
        </table>
        <br><br>

        <input type="Submit"/>
        <a href="#" onClick="tb_remove();">Close</a>
    </form>
<?php
} else {
    include("permission_error.php");
}
?>
</body>
</html>
