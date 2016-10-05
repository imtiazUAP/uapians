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
            <div class="realbody" style="min-height:2300px">
                <?php
                include("menu.php");
                $strquery = "SELECT *,SMName,Blood_Group_Name,username FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID
            INNER JOIN blood_group_info ON s_info.Blood_Group_ID=blood_group_info.Blood_Group_ID
            INNER JOIN userinfo ON s_info.SID=userinfo.SID
            WHERE userinfo.SID = '" . $_GET["SID"] . "'";
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
                //var_dump($authentication->isOwner($SID)); exit;
                ?>
                    <?php if($isAdmin || ($isLoggedIn && $authentication->isOwner($SID))){ ?>
                <div class="profileuserinterface">
                    <div align="center" class="profile_link_div">
                        <a style="background-color: #4285F4;"
                           href='student_edit.php?SID=<?= $SID ?>&keepThis=true&TB_iframe=true&height=470&width=300&do=edit&modal=true'
                           class='thickbox profile_link' title='Edit Student -<?= $Name ?>'>-Edit Profile </a>
                        <a style="background-color: #F1D158;"
                           href='password_edit.php?SID=<?= $SID ?>&keepThis=true&TB_iframe=true&height=200&width=400&do=edit&modal=true'
                           class='thickbox profile_link' title='Change Password -<?= $Name ?>'> -Change Password </a>
                        <a class="profile_link" style="background-color: #55A947"; href='single_mark_list.php?SID=<?= $SID ?>'>- My Results
                        Vault </a>
                        <a class="profile_link" style="background-color: #FF8E65;" href='message_list.php?SID=<?= $SID ?>'>-My Messages </a>
                        <a class="profile_link" style="background-color: #ABDEE1;" href='upload_project.php?SID=<?= $SID ?>'>-Upload
                            Projects </a>
                        <a class="profile_link" style="background-color: #2E313A;" href='upload_material.php?SID=<?= $SID ?>'>-Upload Course
                            Materials </a>
                        <a class="profile_link" style="background-color: #FFFFFD;" href='upload_tutorial.php?SID=<?= $SID ?>'>-Upload Video
                            Tutorials </a>
                        <a  style="background-color: #FF8E65;"
                           href='photo_update.php?SID=<?= $SID ?>&keepThis=true&TB_iframe=true&height=260&width=450&do=edit&modal=true'
                           class='thickbox profile_link' title='Change Profile Photo -<?= $Name ?>'> -Change Profile Photo </a>
                    </div>
                </div>
                    <?php }
                    if ($isLoggedIn && $isGeneralStudent || $isAdmin){
                    ?>
                <div style="font-weight:bold; font-size:16px; padding-left:10px; color:#0099FF">
                <ul>
                    <li style="list-style-type: none;"><a href="message_to_friend.php">Send a Message...</a>
                    </li>
                </ul>
            </div>
                <?php } ?>

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
                        Phone-Number: <?php if($isLoggedIn){ echo $Phone_Number? $Phone_Number : 'Not available'; }else{echo 'Log in to see';} ?> <br>
                        E_Mail: <?php echo $SE_Mail; ?> <br>
                        Facebook-Link: <?php if($isLoggedIn){ echo $FB_Link? $FB_Link : 'Not available'; }else{echo 'Log in to see';} ?> <br>
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