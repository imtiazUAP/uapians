<html>
    <head>
        <?php
        include("header.php");
        ?>
    </head>
    <body>
        <?php
        include("dbconnect.php");
        $strquery = "UPDATE notice_info SET Notice= '" . $_GET['Notice'] . "'where Notice_ID='" . $_GET['Notice_ID'] . "' ";
        $results = mysql_query($strquery);
        echo "<div align='center'>Notice Updated!!! Thank you</div>";
        ?>
        <div align="center">
            <label>
                <br>
                <br>
                <a href="#" onClick="tb_remove();">Close</a>
            </label>
        </div>
    </body>
</html>