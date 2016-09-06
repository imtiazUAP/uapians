<?php
    session_start();
        error_reporting(0);
        include("dbconnect.php");
        $b = $_SESSION['username'];
        $userrole = mysql_query("select * from userinfo where username='{$b}'");
        $userdata = mysql_fetch_assoc($userrole);
        $SID = $userdata['SID'];
        if (empty($_SESSION['username'])) {
?>
    <script language="JavaScript">
        window.location = "index.php";
    </script>
<?php } else {
?>
<html>
<head>
    <?php
    include("header.php");
    ?>
</head>
<body>
<div id="grad1">
    <div class="bodydiv">
        <?php
        include("logo.php");
        ?>
        <div class="realbody" style="min-height:2300px">
            <?php
            include("menu.php");
            ?>
            <div id="content">
                <div id="colOne">
                    <?php
                    include("sidebar.php");
                    ?>
                </div>
                <div id="margin_figure">
                </div>
            </div>
        </div>
        <div class="footer">
            <?php include("footer.php");
            ?>
        </div>
</body>
</html>
<?php
}
?>