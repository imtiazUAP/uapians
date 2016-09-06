<html>
    <head>
        <?php
        include("header.php");
        ?>
    </head>
    <body>
    <form action="designation_save.php" method="post">
        <table>
            <tr>
                <td>DName:</td>
                <td><input type="text" name="DName"/></td>
            </tr>
        </table>
        <br>
        <br>

        <input type="Submit"/>
        <a href="#" onClick="tb_remove();">Close</a>
    </form>

    </body>
</html>