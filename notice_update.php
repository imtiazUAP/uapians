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
        echo "<div align='center' style='color: #000000'>Notice Updated!!! Thank you</div>";
        ?>
        <div align="right" style="padding-right:25">
            <button class="button button_red" onClick="tb_remove()"> Close </button>
        </div>
    </body>
</html>