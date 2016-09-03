<html>
    <head>
        <?php
        include("header.php");
        ?>
    </head>
    <body>
        <form action="Gallery_Save.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Upload Photo:</td>
                    <td><input type="file" name="file" id="file"></td>
                </tr>

                <tr>
                    <td>Photo Caption:</td>
                    <td><input type"text" name="Photo_Caption"/></td>
                </tr>
            </table>
            </select>
            <br>
            <br>

            <input type="Submit"/>
            <a href="#" onClick="tb_remove();">Close</a>
        </form>
    </body>
</html>