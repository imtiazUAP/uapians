<?php
session_start();
error_reporting(0);
include("dbconnect.php");
include_once("page.inc.php");
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

                <div class="realbody" style="min-height:2300px">
                <?php
                   include("menu.php");
                ?>
                    <div id="colOne">
                        <?php
                        include("sidebar.php");
                        ?>
                    </div>
                    <div style="padding: 10px">
                        <img src="images/system_images/Donate_Blood.jpg" alt="" width="350" height="150" class="image"  align="left"/>
                    </div>
                <div style="padding-left: 630px; padding-right: 12px">
                    <h1 style="color:#FFFFFF;">Why donate Blood?</h1>
                    <p align="right" style="text-align:left"> You don’t need a special reason to give blood. Someone can get a new life for your blood, Someone can get his/her stamina back because of your blood. So donate blood - be healthy - be happy! </p>
                </div>

                <form method="post">
                    <div align="left" style="padding-left:630px;">
                        <table>
                        <tr>
                            <td>Select Blood Group</td>
                            <td>
                                <select name="Blood_Group_ID" id="Blood_Group_ID" selected="">
                                    <?php

                                    $query = "SELECT DISTINCT Blood_Group_ID, Blood_Group_Name FROM blood_group_info";
                                    $rs = mysql_query($query) or die ('Error submitting');
                                    while ($rows = mysql_fetch_assoc($rs)) {
                                        if ($row["Blood_Group_ID"] == $rows["Blood_Group_ID"]) {
                                            $selected = 'selected="selected"';
                                        } else {
                                            $selected = '';
                                        }
                                        print("<option value=\"" . $rows["Blood_Group_ID"] . "\" " . $selected . "  >" . $rows["Blood_Group_Name"] . "</option>");
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <button type="Submit" class="button button_red">Search
                                </button>
                            </td>
                        </tr>

                        </table>
                        <?php
                        $strquery = "SELECT
                                          SID,
                                          S.SReg,
                                          S.SName,
                                          S.SHouse,
                                          S.donor_value,
                                          S.SPortrait,
                                          S.SPh_Number,
                                          B.Blood_Group_Name,
                                          S.Blood_Group_ID,
                                          S.SPh_Number,
                                          SM.SMName,
                                          D.district_name
                                        FROM s_info S
                                        INNER JOIN blood_group_info B
                                        ON
                                        S.Blood_Group_ID = B.Blood_Group_ID
                                        INNER JOIN sm_info SM
                                        ON
                                        S.SMID = SM.SMID
                                        INNER JOIN districts D
                                        ON
                                        D.district_id = S.district_id
                                        WHERE
                                        S.Blood_Group_ID='" . $_POST['Blood_Group_ID'] . "'
                                        ORDER BY S.SHouse DESC";
                        $results = mysql_query($strquery);
                        $num = mysql_numrows($results);
                        $Blood_Group_Name = mysql_result($results, $i, "Blood_Group_Name");

                        $query = "SELECT COUNT(SID) AS available_donor FROM s_info WHERE Blood_Group_ID='" . $_POST['Blood_Group_ID'] . "' AND donor_value='1'";
                        $queryResult = mysql_query($query);
                        $availableDonor = mysql_result($queryResult, "available_donor");

                        if($_POST['Blood_Group_ID']){ ?>
                            <div style="padding-right: 12px">
                            <marquee behavior="scroll" direction="left" style="background-color:#F44336;font-size:14px; height:20;">
                                <p><?= $num ?>  (<?= $Blood_Group_Name ?>) donors found <?= $availableDonor ?> of them are available to donate today. </p>
                            </marquee>
                            </div>
                        <?php }else{ ?>
                            <div>
                            <marquee behavior="scroll" direction="left" style="background-color:#F44336;font-size:14px; height:20;">
                                <p>Please select a blood group & hit the search button to get the result! </p>
                            </marquee>
                            </div>
                        <?php } ?>
                    </div>
                    <table id="itable" width="820" border="1" style="padding-top: 5px">
                        <tr>
                            <td align="center" bgcolor="#006699">Name</td>
                            <td align="center" bgcolor="#006699">Phone No</td>
                            <td align="center" bgcolor="#006699">Available?</td>
                            <td align="center" bgcolor="#006699">Semester</td>
                            <td align="center" bgcolor="#006699">Residence</td>
                            <td align="center" bgcolor="#006699">Blood Group</td>
                        </tr>

                        <?php
                        $i = 0;
                        while ($i < $num) {

                            $SReg = mysql_result($results, $i, "SReg");
                            $SName = mysql_result($results, $i, "SName");
                            $SID = mysql_result($results, $i, "SID");
                            $SPortrait = mysql_result($results, $i, "SPortrait");
                            $SPh_Number = mysql_result($results, $i, "SPh_Number");
                            $Blood_Group_Name = mysql_result($results, $i, "Blood_Group_Name");
                            $SMName = mysql_result($results, $i, "SMName");
                            $SHouse = mysql_result($results, $i, "SHouse");
                            $availableToDonate = mysql_result($results, $i, "donor_value");
                            $DistrictName = mysql_result($results, $i, "district_name");
                            ?>

                            <tr align="center">
                                <td>
                                    <figure>
                                        <a href='student_profile.php?SID=<?php echo($SID) ?>' target="_blank"'><img src=<?= $SPortrait ? $SPortrait : 'images/14101071.jpg' ?> echo style="height : 70px; border-radius: 25px;"></a>
                                        <figcaption><a href='student_profile.php?SID=<?php echo($SID) ?>' target="_blank"> <?php echo $SName; ?></a></figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <?php if($isLoggedIn){ echo $SPh_Number ? $SPh_Number : 'Contact with admin'; }else{ echo('Sign In to see'); } ?>
                                </td>
                                <td width="100">
                                    <a href='student_profile.php?SID=<?php echo($SID) ?>' target="_blank"'><img src=images/system_images/<?= ($availableToDonate == 1) ? "check_mark.png" : "cross_mark.png" ?> echo style="height:50px;  border-radius: 5px;"></a>
                                </td>
                                <td>
                                    <a href='student_profile.php?SID=<?php echo($SID) ?>' target="_blank"> <?php echo $SMName; ?></a>
                                </td>
                                <td>
                                    <a href='student_profile.php?SID=<?php echo($SID) ?>' target="_blank"> <?php echo $SHouse; ?></a>
                                </td>
                                <td width="100">
                                    <a href='student_profile.php?SID=<?php echo($SID) ?>' target="_blank"'><img src=images/system_images/blood_groups/<?= $Blood_Group_Name.".png" ?> echo style="height:50px;  border-radius: 5px;"></a>
                                </td>
                            </tr>

                            <?php
                            $i++;
                        }
                        ?>
                    </table>
                </form>
            </div>
                <div class="footer">
                    <?php include("footer.php");
                    ?>
                </div>
            </div>
    </body>
 </html>