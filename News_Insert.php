<html>
<head>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/thickbox.js"></script>
    <link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen"/>
</head>

<body>
<form action="News_Save.php" method="post">
    <table>
        <tr>
            <td>News Hints:</td>
            <td><input type="News_Hints" name="News_Hints"/></td>
        </tr>
        <tr>
            <td>News Link:</td>
            <td><input type"News_Link" name="News_Link"/></td>
        </tr>
    </table>
    <br><br>

    <input type="Submit"/>
    <a href="#" onClick="tb_remove();">Close</a>
</form>

</body>
</html>