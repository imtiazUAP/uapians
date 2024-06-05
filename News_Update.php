<html>

<head>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/thickbox.js"></script>
    <link rel="stylesheet" href="assets/css/thickbox.css" type="text/css" media="screen" />
</head>

<body>
    <?php
    include ('dbconnect.php');
    $strquery = "UPDATE news_info SET News_Hints= '" . $_GET['News_Hints'] . "',News_Link= '" . $_GET['News_Link'] . "'where News_ID='" . $_GET['News_ID'] . "' ";
    $results = mysql_query($strquery);
    echo "News Updated!!!!!!!! Thank you";
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