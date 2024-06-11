<?php
session_start();
error_reporting(1);
include ("dbconnect.php");
$b = $_SESSION['username'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
$SID = $userdata['SID'];
if (empty($_SESSION['username'])) {
    ?>
    <script language="JavaScript"> window.location = "index.php";</script><?php } else { ?>
    <html>

    <head>
        <?php include ("header.php"); ?>
    </head>

    <body>
        <div id="background_canvas">
            <div class="body_wrapper">
                <?php include ("logo.php"); ?>
                <div class="content_wrapper" style="min-height:2300px">
                    <?php include ("menu.php"); ?>
                    <div id="content">
                        <div id="colOne">
                            <?php include ("sidebar.php"); ?>
                        </div>
                        <?php
                        $strquery = "SELECT * FROM video_tutorial WHERE video_tutorial_cat_id='" . $_GET["vtid"] . "'";
                        $results = mysql_query($strquery);
                        $num = mysql_numrows($results);
                        if ($num > 0) {
                            $i = 0;
                            while ($i < $num) {
                                $tutorial_id = mysql_result($results, $i, "tutorial_id");
                                $video_tutorial_cat_id = mysql_result($results, $i, "video_tutorial_cat_id");
                                $tutorial_link = mysql_result($results, $i, "tutorial_link");
                                ?>
                                <table style="padding:5px; float: left">
                                    <tr style="height:20px">
                                        <td style="border:inset" colspan=2 align="center"><iframe width="256" height="160"
                                                src="<?php echo $tutorial_link; ?>" frameborder="0" allowfullscreen></iframe></td>
                                    </tr>
                                </table>
                                <?php $i++;
                            }
                        } else { ?>
                            <div style="font-weight: bold;">
                                </br></br></br></br>
                                <p style="text-align:center">No video tutorials are added for this category yet. Stay connected,
                                    it will be added...</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="footer"> <?php include ("footer.php"); ?>
                </div>
    </body>

    </html>
<?php } ?>