<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
    $b = $_SESSION['username'];
    $userrole = mysql_query("select * from userinfo where username='{$b}'");
    $userdata = mysql_fetch_assoc($userrole);
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
            <div class="realbody">
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
                <form>
                    <table class="hoverTable" align="center" width="820">
                        <tr align="center">
                            <td bgcolor="#006699" width="160">Course Name</td>
                            <td bgcolor="#006699" width="170">Course Teacher</td>
                            <td bgcolor="#006699" width="180">Detail</td>
                            <td bgcolor="#006699" width="100px">Download Link</td>
                            <td bgcolor="#006699" width="170">Uploaded By</td>
                            <td bgcolor="#006699" width="170">Upload Date</td>
                            <?php if($isLoggedIn && $isAdmin){ ?>
                            <td bgcolor="#006699" width="170">Admin</td>
                            <?php } ?>
                        </tr>
                        <?php

                        $strquery = "SELECT ref_id, CCode, e_info.group_id, c_info.CID, CName, Reference_Link, EName, Employee_Portrait, Detail, SMName, uploaded_by, SName, SPortrait, upload_date FROM reference_info
                                    INNER JOIN c_info
                                    ON reference_info.CID=c_info.CID
                                    LEFT JOIN e_info
                                    ON reference_info.EID=e_info.EID
                                    LEFT JOIN s_info
                                    ON s_info.SID=reference_info.uploaded_by
                                    LEFT JOIN sm_info
                                    ON reference_info.SMID=sm_info.SMID WHERE c_info.CID='" . $_GET['CID'] . "'";
                        $results = mysql_query($strquery);
                        $num = mysql_numrows($results);
                        $i = 0;
                        while ($i < $num) {
                            $ref_id = mysql_result($results, $i, "ref_id");
                            $CID = mysql_result($results, $i, "CID");
                            $CCode = mysql_result($results, $i, "CCode");
                            $CName = mysql_result($results, $i, "CName");
                            $employeeName = mysql_result($results, $i, "EName");
                            $employeePortrait = mysql_result($results, $i, "Employee_Portrait");
                            $SID = mysql_result($results, $i, "uploaded_by");
                            $userGroup = mysql_result($results, $i, "group_id");
                            $uploaded_by = mysql_result($results, $i, "SName");
                            $SPortrait = mysql_result($results, $i, "SPortrait");
                            $upload_date = mysql_result($results, $i, "upload_date");
                            $Detail = mysql_result($results, $i, "Detail");
                            $f3 = mysql_result($results, $i, "Reference_Link");
                            ?>
                            <tr align="center" class="tablerow">
                                <td width="200" height="50"><?php echo $CName; ?></td>
                                <td align="center" width="220" height="50"><?php echo $employeeName; ?></td>
                                <td align="center" width="220" height="50"><?php echo $Detail; ?></td>
                                <?php if($isLoggedIn){ ?>
                                <td width="150" height="50"><a href="<?php echo $f3; ?>">Click here</a></td>
                                <?php }else{ ?>
                                    <td width="150" style="list-style: none" height="50"><a href="login_modal.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="New Course"
                                                                       class="thickbox">Sign in for link</a></td>
                                <?php } ?>
                                <td width="130" height="50">
                                    <figure>
                                        <a target="_blank" href='<?php if($userGroup==4 || $userGroup==5){ ?>employee_profile.php<?php }else {?>student_profile.php<?php } ?>?SID=<?php echo ($SID == 9999) ? '29' : $SID; ?>'><img src=<?php if($userGroup ==4 || $userGroup == 5){echo $employeePortrait;}else{echo $SPortrait ? $SPortrait : 'images/14101071.jpg';}?> style="height : 50px; border-radius: 25px;"></a>
                                        <figcaption style="font-size: 10px;"><?php if($userGroup ==4 || $userGroup == 5){echo $employeeName; }else{echo $uploaded_by ? $uploaded_by : 'Admin';}  ?></figcaption>
                                    </figure>
                                    </figure>
                                </td>
                                <td width="130" height="50"><?php echo $upload_date ? $upload_date : 'Unknown'; ?></td>

                                <?php
                                if ($isLoggedIn && $isAdmin) {
                                    ?>
                                    <td><?php echo " <a href='reference_edit.php?ref_id=". $ref_id ."&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' class='thickbox' title='Edit reference - ". $ref_id ."'> Edit </a> "; ?> | <?php echo " <a href='reference_delete.php?ref_id=". $ref_id ."&&CID=".$CID."'> Delete </a>";?></td>
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
        <div class="footer">
            <?php
            include("footer.php");
            ?>
        </div>
    </body>
</html>