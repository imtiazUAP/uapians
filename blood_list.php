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

                <div>
                    <img src="images/Donate_Blood.jpg" alt="" width="350" height="200" class="image"  align="left"/>
                    <h1 style="color:#FFFFFF">why donate Blood?</h1>
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

                    <h1 style="color:#FFFFFF">Benefits of Donating</h1>
                    <p align="right" style="text-align:left">You don’t need a special reason to give blood.
                        You just need your own reason.
                        Some of us give blood because we were asked by a friend.
                        Some know that a family member or a friend might need blood some day.
                        Some believe it is the right thing we do.
                        Whatever your reason, the need is constant and your contribution is important for a healthy and reliable blood supply.  And  you’ll feel good knowing you've helped change a life.</p>
                </div>

                <form method="post">
                    <tr>
                        <td>Blood Group</td>
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
                    </tr>

                    <p class="signin_button">
                        <input type="Submit" value="Search"/>
                    </p>

                    <table id="itable" width="1100" border="1">
                        <tr>
                            <td align="center" height="50" bgcolor="#006699">Registration No</td>
                            <td align="center" bgcolor="#006699">Name</td>
                            <td align="center" bgcolor="#006699">Blood holders profile</td>
                            <td align="center" bgcolor="#006699">Blood Group Name</td>
                        </tr>

                        <?php
                        $strquery = "SELECT * FROM
            (SELECT SID,S.SReg, S.SName, S.SPortrait, S.SPh_Number, B.Blood_Group_Name,B.Blood_Group_ID FROM s_info S, blood_group_info B
            WHERE
            S.Blood_Group_ID=B.Blood_Group_ID
            ) A where blood_group_ID='" . $_POST[Blood_Group_ID] . "'";
                        $results = mysql_query($strquery);
                        $num = mysql_numrows($results);

                        $i = 0;
                        while ($i < $num) {

                            $SReg = mysql_result($results, $i, "SReg");
                            $SName = mysql_result($results, $i, "SName");
                            $SID = mysql_result($results, $i, "SID");
                            $SPortrait = mysql_result($results, $i, "SPortrait");
                            $Blood_Group_Name = mysql_result($results, $i, "Blood_Group_Name");
                            ?>

                            <tr align="center">
                                <td height="40"><?php echo $SReg; ?></td>
                                <td><a href='profile_list.php?SID=<?php echo($SID) ?>'
                                       target="_blank"> <?php echo $SName; ?></a></td>
                                <td width="100"><a href='profile_list.php?SID=<?php echo($SID) ?>' target="_blank"'><img
                                        src=<?= $SPortrait ?> echo style="height:100px;"></a></td>
                                <td><?php echo $Blood_Group_Name; ?></td>
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
        <?php include("footer.php");
        ?>
        </div>
    </body>
 </html>

            <?php
                }
            ?>