<?php
session_start();
error_reporting(0);
include("dbconnect.php");
include_once("page.inc.php");
$b = $_SESSION['username'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
if (empty($_SESSION['username'])) {
?>
    <script language="JavaScript">
        window.location = "index.php";
    </script><?php } else { ?>
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
    <div class="realbody" style="min-height:1950px">
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
                <?php
                if (($userdata[admin] == '1')) {
                    ?>
                    <div>
                        <a href="Gallery_Insert.php?keepThis=true&TB_iframe=true&height=100&width=400&modal=true" title="New Student" class="thickbox">Add New Photos</a>
                    </div>
                <?php
                }
                $strquery = "Select * from gallery";
                $results = mysql_query($strquery);
                $num = mysql_numrows($results);

                $i = 0;
                while ($i < $num) {
                    $Photo_Id = mysql_result($results, $i, "Photo_Id");
                    $Photo_Link = mysql_result($results, $i, "Photo_Link");
                    $Photo_Caption = mysql_result($results, $i, "Photo_Caption");
                    ?>
                    <div class="img" style="background-color:#000033">
                        <a target="_blank" href="<?php echo $Photo_Link ; ?>"><img src="<?php echo $Photo_Link ; ?>" alt="Klematis" width="205" height="160"></a>
                        <div class="desc" style="color:#FFFFFF"><?php echo $Photo_Caption ; ?></div>
                    </div>
                    <?php
                    if (($userdata[admin] == '1')) {
                        ?>
                        <div>
                            <?php echo " <a href='Gallery_Delete.php?Photo_Id=" . $Photo_Id . "'> delete </a> "; ?>
                        </div>
                    <?php
                    }
                $i++;
                }
                ?>
                </table>
            </div>
        </div>
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