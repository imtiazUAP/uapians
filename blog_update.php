<html>
<head>
        <?php
        include("header.php");
        ?>
</head>
<?php
include("dbconnect.php");
$strquery = "UPDATE blog SET Blog= '". $_GET['Blog'] ."' where Blog_ID='". $_GET['Blog_ID'] ."'";
$results = mysql_query($strquery);
?>
<body>
<div align="center">
    <label style="color: #000000; font-size:14px;">OK! <span style="color:#0000ff">Your blog is updated</span></label>
</div>
</body>br>
<div align="center">
    <button class="button button_red" onClick="tb_remove()"> Close </button>
</div>
</body>
</html>