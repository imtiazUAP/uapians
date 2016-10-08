<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");

    $b=$_SESSION['username'];
    $userrole = mysql_query("select * from userinfo where username='{$b}'");
    $userdata = mysql_fetch_assoc($userrole);
    $SID=$userdata['SID'];
?>

<html>
    <head>
        <?php include("header.php"); ?>
    </head>
    <body>
        <div id="grad1">
            <div class="bodydiv">
                <?php include("logo.php"); ?>
                <div class="realbody">
                    <?php include("menu.php"); ?>
                    <div id="content">
                        <div id="colOne">
                            <?php include("sidebar.php"); ?>
                        </div>
                        <?php
                            $strquery="SELECT vt.*, u.username, u.SID, u.admin, vtc.video_tutorial_cat_name FROM video_tutorial vt INNER JOIN userinfo u ON u.SID = vt.uploaded_by INNER JOIN video_tutorial_category vtc ON vtc.video_tutorial_cat_id = vt.video_tutorial_cat_id WHERE vt.video_tutorial_cat_id='" . $_GET["vtid"] . "'";
                            $results=mysql_query($strquery);
                            $num=mysql_numrows($results);
                            if($num > 0){
                            $i=0;
                            while ($i< $num)
                            {
                                $tutorial_id=mysql_result($results,$i,"tutorial_id");
                                $video_tutorial_cat_id=mysql_result($results,$i,"video_tutorial_cat_id");
                                $video_tutorial_cat_name=mysql_result($results,$i,"video_tutorial_cat_name");
                                $tutorial_link=mysql_result($results,$i,"tutorial_link");
                                $uploaderId=mysql_result($results,$i,"uploaded_by");
                                $uploaderName=mysql_result($results,$i,"username");
                                $userGroup=mysql_result($results,$i,"admin");
                                $uploadTime=mysql_result($results,$i,"upload_time");
                        ?><figure>
                            <table style="padding:5px; float: left; width: 256px; color: #50B9E8">
                                <tr style="height:20px">
                                    <td style="border:inset" colspan=2  align="center"><iframe width="256" height="160" src="<?php echo $tutorial_link ; ?>" frameborder="0" allowfullscreen></iframe></td>
                                </tr>
                                <tr><td><figcaption>Uploaded by : <a style="color: #55AA45; " href='<?php if($userGroup==4 || $userGroup==5){ ?>employee_profile.php<?php }else {?>student_profile.php<?php } ?>?SID=<?php echo ($uploaderId == 9999) ? '29' : $uploaderId; ?>' target="_blank"> <?php echo $uploaderName; ?></a> for <span style="color: #F44336"><?= $video_tutorial_cat_name ?></span> on :<span style="color: #55AA45"> <?= $uploadTime ?></span><?php if($isLoggedIn && $isAdmin){ ?><span style="padding-left: 5px"><a href="tutorials_delete.php?tutorial_id=<?= $tutorial_id; ?>&&vtid=<?= $_GET["vtid"]; ?>">Delete</a></span><?php } ?> </figcaption></td></tr>
                            </table>

                           </figure>
                            <?php $i++; }
                        } else {
                            ?>
                            <div style="font-weight: bold;">
                                </br></br></br></br><p style="text-align:center">No video tutorials are added for this category yet. Stay connected, it will be added...</p>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="footer">
                    <?php include("footer.php");
                    ?>
            </div>
    </body>
</html>


