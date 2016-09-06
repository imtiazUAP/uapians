<html>
    <head>
        <?php
        include("header.php");
        ?>
    </head>
    <body>
        <form action="course_save.php" method="post">
            <table>
                <tr>
                    <td>CCode:</td>
                    <td><input type="text" name="CCode"/></td>
                </tr>
                <tr>
                    <td>CName:</td>
                    <td><input type"text" name="CName"/></td>
                </tr>
            </table>
        <br>
        <br>
        <input type="Submit"/>
        <a href="#" onClick="tb_remove();">Close</a>
        </form>
    </body>
</html>