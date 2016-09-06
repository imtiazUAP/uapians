<html>
<head>
    <?php
    include("header.php");
    ?>
</head>

<body>
<form action="message_save.php" method="post">
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

</body>
</html>
