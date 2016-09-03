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
    </script>
<?php } else {
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
        <?php
            $strquery = "SELECT *,SMName,Blood_Group_Name,username FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID
            INNER JOIN blood_group_info ON s_info.Blood_Group_ID=blood_group_info.Blood_Group_ID
            INNER JOIN userinfo ON s_info.SID=userinfo.SID
            WHERE username='{$b}'";
                    $results = mysql_query($strquery);
                    $num = mysql_numrows($results);
                    $SID = mysql_result($results, $i, "SID");
                    $Portrait = mysql_result($results, $i, "SPortrait");
                    $Semester = mysql_result($results, $i, "SMName");
                    $Name = mysql_result($results, $i, "SName");
                    $Reg = mysql_result($results, $i, "SReg");
                    $Date_of_Birth = mysql_result($results, $i, "SB_of_Date");
                    $Blood_Group = mysql_result($results, $i, "Blood_Group_Name");
                    $School = mysql_result($results, $i, "School");
                    $College = mysql_result($results, $i, "College");
                    $Knows_Programs = mysql_result($results, $i, "Knows_Programs");
                    $Interested_In = mysql_result($results, $i, "Interested_In");
                    $Working_At = mysql_result($results, $i, "Working_At");
                    $House = mysql_result($results, $i, "SHouse");
                    $Home_City = mysql_result($results, $i, "SHome_City");
                    $Phone_Number = mysql_result($results, $i, "SPh_Number");
                    $SE_Mail = mysql_result($results, $i, "SE_Mail");
                    $FB_Link = mysql_result($results, $i, "FB_Link");
                    $Twitter_Link = mysql_result($results, $i, "Twitter_Link");
                    $Blog = mysql_result($results, $i, "Blog");
                    $Noted_Activity = mysql_result($results, $i, "Noted_Activity");
        ?>
        <div class="profileuserinterface">
            <?php
            if (($userdata[admin] == '1')) {
                ?>
                <div align="center" style="background-color:#FFFF00; width:500px; height:20px">
                    <?php echo " <a href='Student_Edit.php?SID=" . $SID . "&keepThis=true&TB_iframe=true&height=500&width=300&do=edit&modal=true' class='thickbox' title='Edit Student - " . $Name . "'> Edit my Profile  </a> "; ?>
                    |
                    <?php echo " <a href='Password_Edit.php?SID=" . $SID . "&keepThis=true&TB_iframe=true&height=200&width=400&do=edit&modal=true'     	class='thickbox' title='Change Password - " . $Name . "'> Change my Password  </a> "; ?>
                    |
                    <?php echo " <a href='Single_Mark_List.php? SID=" . $SID . "'>My  Results Vault  </a>" ?> |
                    <?php echo " <a href='Message_List_personal.php? SID=" . $SID . "'> My Messages  </a>" ?>
                </div>
            <?php
            }
            ?>
            <?php
            if (($userdata['SID'] == $SID)) {
            ?>
                <div align="center" style="background-color:#FFFF00; width:700px; height:20px">
                    <?php
                    echo " <a href='Student_Edit.php?SID=" . $SID . "&keepThis=true&TB_iframe=true&height=300&width=300&do=edit&modal=true'     	class='thickbox' title='Edit Student - " . $Name . "'> Edit my Profile </a> ";
                    ?>
                    |
                    <?php
                    echo " <a href='Password_Edit.php?SID=" . $SID . "&keepThis=true&TB_iframe=true&height=200&width=400&do=edit&modal=true'     	class='thickbox' title='Change Password - " . $Name . "'> Change my Password </a> ";
                    ?>
                    |
                    <?php
                    echo " <a href='Single_Mark_List.php? SID=" . $SID . "'> My Results Vault </a>"
                    ?> |
                    <?php
                    echo " <a href='Message_List_personal.php? SID=" . $SID . "'> My Messages  </a>"
                    ?>
                    <?php
                    echo " <a href='Upload_Project.php?SID=" . $SID . "'> | upload project  </a>"
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
        <div style="font-weight:bold; font-size:16px; padding-left:10px; color:#0099FF";}>
        <ul>
            <li style="list-style-type: none;"><a href="send_message_to_your_friend.php">Send a Message...</a>
            </li>
        </ul>
    </div>

    <div id="margin_figure_profile">
        <br>

        <div class="profilepicturebox">
            <img src="<?php echo $Portrait; ?>" alt="Profile Picture" style="float:right;" width="200">
        </div>

        <br>
        <br>

        <p style="font:Arial, Helvetica, sans-serif; font-size:54px; color:#FFFFFF"><?php echo $Name; ?></P>
        <br>
        <br>
        <br>

        <p style="padding-top:1px; color:#FFFFFF; font-size:16px">Registration No: <?php echo $Reg; ?></P>
        <br>

        <p style="padding-top:10px; color:#FFFFFF; font-size:16px">Semester: <?php echo $Semester; ?></P>
        <br>

        <p style="padding-top:10px; color:#FFFFFF; font-size:16px">Noted
            Activity:<?php echo $Noted_Activity; ?></P>
        <br>

        <p style="padding-top:10px; color:#FFFFFF; font-size:16px">Date of
            Birth:<?php echo $Date_of_Birth; ?></P>
        <br>

        <p style="padding-top:10px; color:#FFFFFF; font-size:16px">Blood Group: <?php echo $Blood_Group; ?></P>
        <br>

        <p style="padding-top:10px; color:#FFFFFF; font-size:16px">House: <?php echo $House; ?></P>
        <br>

        <p style="padding-top:10px; color:#FFFFFF; font-size:16px">Home City: <?php echo $Home_City; ?></P>
        <br>

        <p style="padding-top:10px; color:#FFFFFF; font-size:16px">School:<br></p>
        <br>

        <div class="myprofilebox">
            <p><?php echo $School; ?></P>
        </div>
        <br>
        <br>

        <p style="padding-top:10px; color:#FFFFFF";>College:<br></p>
        <div class="myprofilebox">
            <p><?php echo $College; ?></P>
        </div>
        <br>
        <br>

        <p style="padding-top:10px; color:#FFFFFF";>Knows the Programs:<br></p>

        <div class="myprofilebox">
            <p><?php echo $Knows_Programs; ?></P>
        </div>
        .
        <br>
        <br>

        <p style="padding-top:10px; color:#FFFFFF";>Interested In:<br></p>

        <div class="myprofilebox">
            <p><?php echo $Interested_In; ?></P>
        </div>
        .
        <br>
        <br>

        <p style="padding-top:10px; color:#FFFFFF";>Now Working At:<br></p>
        <div class="myprofilebox">
            <p><?php echo $Working_At; ?></P>
        </div>
        .
        <br>
        <br>


        <p style="padding-top:10px; color:#FFFFFF";>Contact: <br></p>
        <br>
        <br>

        <div style=" padding-bottom:75px;" class="myprofilebox">
            <p>
                Phone Number: <?php echo $Phone_Number; ?> <br>
                E_Mail: <?php echo $SE_Mail; ?> <br>
                Facebook Link: <?php echo $FB_Link; ?> <br>
                Twitter: <?php echo $Twitter_Link; ?> <br>
                Blog: <?php echo $Blog; ?> <br>
            </p>
        </div>


    </div>
    <br>
    <br>

    </div>


    <div class="footer">
        <?php include("footer.php");
        ?>
    </div>

    </body>

    </html>

<?php
}?>