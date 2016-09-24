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
        window.location="index.php";
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
                    <div id="colOne">
                        <?php
                        include("sidebar.php");
                        ?>
                    </div>
                    <div style="padding: 10px">
                        <img src="images/Donate_Blood.jpg" alt="" width="350" height="200" class="image"  align="left"/>
                    </div>
                <div style="padding-left: 630px">
                    <h1 style="color:#FFFFFF;">why donate Blood?</h1>
                    <p align="right" style="text-align:left"> You don’t need a special reason to give blood.
                        You just need your own reason.
                        Some of us give blood because we were asked by a friend.
                        Some know that a family member or a friend might need blood some day.
                        Some believe it is the right thing we do.
                        Whatever your reason, the need is constant and your contribution is important for a healthy and reliable blood supply.  And  you’ll feel good knowing you've helped change a life.


                        You will receive a mini physical to check your:

                        Pulse
                        Blood pressure
                        Body temperature
                        Hemoglobin</p>
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
                    </div>

                    <table id="itable" width="820" border="1">
                        <tr>
                            <td align="center" bgcolor="#006699">Name</td>
                            <td align="center" bgcolor="#006699">Phone No</td>
                            <td align="center" bgcolor="#006699">Semester</td>
                            <td align="center" bgcolor="#006699">Residence</td>
                            <td align="center" bgcolor="#006699">Home District</td>
                            <td align="center" bgcolor="#006699">Blood Group</td>
                        </tr>

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
                                        S.Blood_Group_ID='" . $_POST[Blood_Group_ID] . "'
                                        ORDER BY S.SHouse DESC";
                        $results = mysql_query($strquery);
                        $num = mysql_numrows($results);

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
                            $DistrictName = mysql_result($results, $i, "district_name");
                            ?>

                            <tr align="center">
                                <td>
                                    <figure>
                                        <a href='profile_list.php?SID=<?php echo($SID) ?>' target="_blank"'><img src=<?= $SPortrait ? $SPortrait : 'images/14101071.jpg' ?> echo style="height : 70px; border-radius: 25px;"></a>
                                        <figcaption><a href='profile_list.php?SID=<?php echo($SID) ?>' target="_blank"> <?php echo $SName; ?></a></figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <a href='profile_list.php?SID=<?php echo($SID) ?>' target="_blank"> <?php echo $SPh_Number ? $SPh_Number : 'Contact with Admin' ?></a>
                                </td>
                                <td>
                                    <a href='profile_list.php?SID=<?php echo($SID) ?>' target="_blank"> <?php echo $SMName; ?></a>
                                </td>
                                <td>
                                    <a href='profile_list.php?SID=<?php echo($SID) ?>' target="_blank"> <?php echo $SHouse; ?></a>
                                </td>
                                <td>
                                    <a href='profile_list.php?SID=<?php echo($SID) ?>' target="_blank"> <?php echo $DistrictName; ?></a>
                                </td>
                                <td width="100">
                                    <a href='profile_list.php?SID=<?php echo($SID) ?>' target="_blank"'><img src=images/system_images/blood_groups/<?= $Blood_Group_Name.".png" ?> echo style="height:50px;  border-radius: 5px;"></a>
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

            <?php
                }
            ?>