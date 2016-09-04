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
        <form id="form1" name="form1" method="get" action="Blog_Update.php">
            <div>Blog:</div>
            <textarea name="Blog" type="text" id="Blog" cols="80" rows="15" >
            <?php echo $row["Blog"]; ?>
            </textarea>
            <br>
            <input name="Blog_ID" type="hidden" id="Blog_ID"  value=" <?php echo $row["Blog_ID"]; ?>" />
            <p>
            <label>
            <input type="submit" name="Submit" value="Update" />
            <a href="#" onClick="tb_remove();">Close</a>
            </label>
            </p>
        </form>
    </body>
</html>