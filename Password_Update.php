<html>

<head>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/thickbox.js"></script>
    <link rel="stylesheet" href="assets/css/thickbox.css" type="text/css" media="screen" />
</head>

<body>
    <?php
    include ('dbconnect.php');
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