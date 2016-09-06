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
        window.location="index.php";
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
            <?php include("logo.php"); ?>
            <div class="realbody">
                <?php
                include("menu.php");
                $strquery="SELECT *,SMName,Blood_Group_Name FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID INNER JOIN blood_group_info ON s_info.Blood_Group_ID=blood_group_info.Blood_Group_ID WHERE SID='450'";
                $results=mysql_query($strquery);
                $num=mysql_numrows($results);

                $Portrait=mysql_result($results,$i,"SPortrait");
                $Semester=mysql_result($results,$i,"SMName");
                $Name=mysql_result($results,$i,"SName");
                $Reg=mysql_result($results,$i,"SReg");
                $Age=mysql_result($results,$i,"SAge");
                $Blood_Group=mysql_result($results,$i,"Blood_Group_Name");
                $School=mysql_result($results,$i,"School");
                $College=mysql_result($results,$i,"College");
                $Knows_Programs=mysql_result($results,$i,"Knows_Programs");
                $Interested_In=mysql_result($results,$i,"Interested_In");
                $Working_At=mysql_result($results,$i,"Working_At");
                $House=mysql_result($results,$i,"SHouse");
                $Home_City=mysql_result($results,$i,"SHome_City");
                $Phone_Number=mysql_result($results,$i,"SPh_Number");
                $SE_Mail=mysql_result($results,$i,"SE_Mail");
                $FB_Link=mysql_result($results,$i,"FB_Link");
                $Twitter_Link=mysql_result($results,$i,"Twitter_Link");
                $Blog=mysql_result($results,$i,"Blog");
                $Noted_Activity=mysql_result($results,$i,"Noted_Activity");
                ?>

                <div id="margin_figure_profile">
                    <img style="width:200px;padding:10px;border:5px solid white;margin:0px; font-size:18px"src="<?php echo $Portrait; ?>" alt="Smiley face" width="200" height="220" align="right">
                    <p style="font:Arial, Helvetica, sans-serif; font-size:54px; color:#FFFFFF"><?php echo $Name ; ?></P>
                    <p style="padding-top:1px; color:#FFFFFF; font-size:16px">Registration No: <?php echo $Reg; ?></P>
                    <p style="padding-top:10px; color:#FFFFFF; font-size:16px">Semester: <?php echo $Semester; ?></P>
                    <p style="padding-top:10px; color:#FFFFFF; font-size:16px">Noted Activity:<?php echo $Noted_Activity; ?></P>
                    <p style="padding-top:10px; color:#FFFFFF; font-size:16px">Age:<?php echo $Age; ?></P>
                    <p style="padding-top:10px; color:#FFFFFF; font-size:16px">Blood Group: <?php echo $Blood_Group; ?></P>
                    <p style="padding-top:10px; color:#FFFFFF; font-size:16px">House: <?php echo $House; ?></P>
                    <p style="padding-top:10px; color:#FFFFFF; font-size:16px">Home City: <?php echo $Home_City; ?></P>
                    <p style="padding-top:10px; color:#FFFFFF; font-size:16px">School:<br></p>

                    <div>
                        <p style="width:500px;padding:10px;border:2px solid white;margin:0px; font-size:18px"><?php echo $School; ?></P>
                    </div>
                    <p style="padding-top:10px; color:#FFFFFF";>College:<br></p>
                    <div>
                        <p style="width:500px;padding:10px;border:2px solid white;margin:0px; font-size:18px"><?php echo $College; ?></P>
                    </div>
                    <p style="padding-top:10px; color:#FFFFFF";>Knows the Programs:<br></p>
                    <div>
                        <p style="width:500px;padding:10px;border:2px solid white;margin:0px; font-size:18px"><?php echo $Knows_Programs; ?></P>
                    </div>
                    <p style="padding-top:10px; color:#FFFFFF";>Interested In:<br></p>
                    <div>
                        <p style="width:500px;padding:10px;border:2px solid white;margin:0px; font-size:18px"><?php echo $Interested_In; ?></P>
                    </div>
                    <p style="padding-top:10px; color:#FFFFFF";>Now Working At:<br></p>
                    <div>
                        <p style="width:500px;padding:10px;border:2px solid white;margin:0px; font-size:18px"><?php echo $Working_At; ?></P>
                    </div>

                    <p style="padding-top:10px; color:#FFFFFF";>Contact: <br></p>
                    <div style=" padding-bottom:75px;">
                        <p style="width:500px;padding:10px;border:2px solid white;margin:0px; font-size:18px;">
                            Phone Number: <?php echo $Phone_Number; ?> <br>
                            E_Mail: <?php echo $SE_Mail; ?> <br>
                            Facebook Link: <?php echo $FB_Link; ?> <br>
                            Twitter: <?php echo $Twitter_Link; ?> <br>
                            Blog: <?php echo $Blog; ?> <br>
                        </p>
                    </div>
                </div>
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