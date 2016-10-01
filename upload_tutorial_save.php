<?php
error_reporting(0);
include("dbconnect.php");
include("classes/Utility.php");
$utility = new Utility();
$isYoutubeEmbedLink = $utility->isYoutubeEmbedLink($_REQUEST['tutorial_link']);
if($isYoutubeEmbedLink){
 mysql_query($sql = "INSERT INTO video_tutorial (video_tutorial_cat_id,tutorial_link, uploaded_by)VALUES ('" . $_REQUEST['video_tutorial_cat_id'] . "','" . $_REQUEST['tutorial_link'] . "','" . $_REQUEST['SID'] . "')");
    header('location: upload_tutorial.php?success="yes"');
    mysql_close($con);
}else{ ?>
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
                <div id="colOne">
                    <?php
                    include("sidebar.php");
                    ?>
                </div>
                <br>
                <br>
                <?php
                if ($isLoggedIn) {
                ?>
                <div align="center" style="color: #ffffff; padding: 100px">
                    <label style="color: #ffffff; font-size:28px;">Sorry! <span style="color:#ffffff">This video is not a youtube </span>
                        <span style="color:red">Embed video</span> We allow only youtube embed video here. If you don't know how to get link for youtube embed video, learn it here...</label> <a href="https://youtu.be/1w5C4mKdLM8" target="_blank">Click here to learn</a>
                </div>
                <?php }else {
                    include("permission_error.php");
                }
                ?>
            </div>
            <div class="footer">
                <?php
                include("footer.php");
                ?>
            </div>
    </body>
    </html>
<?php
}
?> 