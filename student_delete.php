<?php
    include("dbconnect.php");
    $previousPage = $_SERVER['HTTP_REFERER'];
    $strquery = " DELETE from s_info where SID = '" . $_GET['SID'] . "'";
    $results = mysql_query($strquery);

    $strquery = " DELETE from userinfo where SID = '". $_GET['SID'] ."'";
    $results = mysql_query($strquery);
?>
<script language="JavaScript">
    window.location = "<?php echo($previousPage); ?>";
</script>