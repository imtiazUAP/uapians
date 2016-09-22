<html>
<head>
    <?php
    include("header.php");
    ?>
</head>
<body>
<?php
    include('dbconnect.php');
    $strquery = "UPDATE news_info SET News_Hints= '" . $_GET['News_Hints'] . "',News_Link= '" . $_GET['News_Link'] . "'where News_ID='" . $_GET['News_ID'] . "' ";
    $results = mysql_query($strquery);
    echo "<div style='color: #000000'>News Updated!!!!!!!! Thank you</div>";
?>
<div align="right" style="padding-right:25">
    <button class="button button_red" onClick="tb_remove()"> Close </button>
</div>
</body>
</html>