<?php
$con = mysql_connect("localhost", "root", "");
if (!$con) {
    die('Could Not Connect:' . mysql_error());
}
mysql_select_db("mylab", $con);
$sql = "Insert into e_info(EName,EDesignation)
values
('$_POST[EName]','$_POST[EDesignation]')";
if (!mysql_query($sql, $con)) {
    die('Error:' . mysql_error());
}
header('location: https://localhost/mylab/employee_insert.php ');
mysql_close($con)
?>

<html>
<head>
    <?php
    include("header.php");
    ?>
</head>

<body>
<form action="employee_save.php" method="post">
    <table>
        <tr>
            <td>EName:</td>
            <td><input type="text" name="EName"/></td>
        </tr>
        <tr>
            <td>EDesignation:</td>
            <td><input type="text" name="EDesignation"/></td>
        </tr>
    </table>
    <br><br>

    <input type="Submit"/>
    <a href="#" onClick="tb_remove();">Close</a>
</form>

</body>
</html>