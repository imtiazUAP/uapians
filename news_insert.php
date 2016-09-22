<html>
<head>
    <?php
    include("header.php");
    ?>
</head>

<body>
<form action="news_save.php" method="post">
    <table style="color: #000000">
        <tr>
            <td>News Hints:</td>
            <td><input type="text" name="News_Hints"/></td>
        </tr>
        <tr>
            <td>News Link:</td>
            <td><input  type="text" name="News_Link"/></td>
        </tr>
    </table>
    <br><br>

    <div align="right" style="padding-right:25">
        <button type="submit" class="button button_blue"> Save </button>
        <button class="button button_red" onClick="tb_remove()"> Cancel </button>
    </div>
</form>

</body>
</html>