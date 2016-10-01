<?php
error_reporting(0);
include("classes/Authentication.php");
?>
<html>
    <head>
        <?php
        include("header.php");
        ?>
    </head>
    <body>
    <?php
    if($isLoggedIn && $isAdmin) {
    ?>
        <form action="gallery_save.php" method="post" enctype="multipart/form-data">
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
    <?php }else {
        include("permission_error.php");
    }
    ?>
    </body>
</html>