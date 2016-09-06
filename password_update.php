<html>
    <head>
        <?php
        include("header.php");
        ?>
    </head>
    <body>
        <?php
        include('dbconnect.php');
        $newpassword = $_GET['new_password'];
        $strquery = "UPDATE userinfo SET password='" . md5($newpassword) . "' where SID='" . $_GET['SID'] . "' ";
        $results = mysql_query($strquery);
        echo "Profile is Activated!!!!! Thank you";
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