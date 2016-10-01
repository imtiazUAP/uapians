<html>
    <?php
    include("dbconnect.php");
    $strquery = "SELECT Blog_ID,Blog from blog where Blog_ID= '" . $_GET["Blog_ID"] . "' ";
    $results = mysql_query ($strquery);
    $row = mysql_fetch_array($results);
    ?>
    <head>
        <?php
        include("header.php");
        ?>
    </head>
    <body>
    <?php
    if ($isLoggedIn) {
    ?>
        <form id="form1" name="form1" method="get" action="blog_update.php">
            <div>Blog:</div>
            <textarea name="Blog" type="text" id="Blog" cols="80" rows="15" ><?php echo $row["Blog"]; ?></textarea>
            <br>
            <input name="Blog_ID" type="hidden" id="Blog_ID"  value=" <?php echo $row["Blog_ID"]; ?>" />
            <button type="submit" class="button button_green"> Save & Update </button>
            <button class="button button_red" onClick="tb_remove()"> Cancel </button>
        </form>
    <?php }else {
        include("permission_error.php");
    } ?>
    </body>
</html>