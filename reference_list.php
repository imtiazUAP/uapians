<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
    $b = $_SESSION['username'];
    $userrole = mysql_query("select * from userinfo where username='{$b}'");
    $userdata = mysql_fetch_assoc($userrole);
    if (empty($_SESSION['username'])) {
?>
    <script language="JavaScript">
        window.location = "index.php";
    </script>
<?php
} else {
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
                <form>
                    <table class="hoverTable" border="1" align="center" width="1100">
                        <tr align="center">
                            <td bgcolor="#006699" width="160">Course Name</td>
                            <td bgcolor="#006699" width="170">Course Teacher</td>
                            <td bgcolor="#006699" width="180">Detail</td>
                            <td bgcolor="#006699" width="100px">Download Link</td>
                            <td bgcolor="#006699" width="170">Uploaded By</td>
                            <td bgcolor="#006699" width="170">Upload Date</td>
                        </tr>
                        <?php

                        $strquery = "SELECT ref_id, CCode, CName, Reference_Link, EName, Detail, SMName, uploaded_by, SName, SPortrait, upload_date FROM reference_info
                                    INNER JOIN c_info
                                    ON reference_info.CID=c_info.CID
                                    INNER JOIN e_info
                                    ON reference_info.EID=e_info.EID
                                    LEFT JOIN s_info
                                    ON s_info.SID=reference_info.uploaded_by
                                    INNER JOIN sm_info
                                    ON reference_info.SMID=sm_info.SMID WHERE CCode='" . $_GET["CCode"] . "'";
                        $results = mysql_query($strquery);
                        $num = mysql_numrows($results);
                        $i = 0;
                        while ($i < $num) {
                            $ref_id = mysql_result($results, $i, "ref_id");
                            $CCode = mysql_result($results, $i, "CCode");
                            $CName = mysql_result($results, $i, "CName");
                            $f10 = mysql_result($results, $i, "EName");
                            $SID = mysql_result($results, $i, "uploaded_by");
                            $uploaded_by = mysql_result($results, $i, "SName");
                            $SPortrait = mysql_result($results, $i, "SPortrait");
                            $upload_date = mysql_result($results, $i, "upload_date");
                            $Detail = mysql_result($results, $i, "Detail");
                            $f3 = mysql_result($results, $i, "Reference_Link");
                            ?>
                            <tr align="center" class="tablerow">
                                <td width="200" height="50"><?php echo $CName; ?></td>
                                <td align="center" width="220" height="50"><?php echo $f10; ?></td>
                                <td align="center" width="220" height="50"><?php echo $Detail; ?></td>
                                <td width="150" height="50"><a href="<?php echo $f3; ?>">Click here</a></td>
                                <td width="130" height="50">
                                    <figure>
                                        <a href='profile_list.php? SID=<?php echo $SID ? $SID : '29' ?>'><img src=<?php echo $SPortrait ? $SPortrait : 'images/14101071.jpg'?> style="height : 50px; border-radius: 25px;"></a>
                                        <figcaption style="font-size: 10px;"><?php echo $uploaded_by ? $uploaded_by : Admin; ?></figcaption>
                                    </figure>
                                    </figure>
                                </td>
                                <td width="130" height="50"><?php echo $upload_date ? $upload_date : 'Unknown'; ?></td>

                                <?php
                                if (($userdata[admin] == '1')) {
                                    ?>
                                    <td><?php echo " <a href='reference_edit.php?ref_id=" . $ref_id . "&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit reference - " . $ref_id . "'> edit </a> "; ?> | <?php echo " <a href='reference_delete.php?ref_id=" . $ref_id . "'> delete </a> "; ?></td>
                                <?php
                                }
                                ?>
                            </tr>
                            <?php
                            $i++;
                            }
                            ?>
                    </table>
                </form>
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