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
                <div>
                <img src="images/Donate_Blood.jpg" alt="" width="350" height="200" class="image"  align="left"/>
                <h1 style="color:#FFFFFF">why donate Blood?</h1>

                <p align="right" style="text-align:left"> You don�t need a special reason to give blood.
            You just need your own reason.
            Some of us give blood because we were asked by a friend.
            Some know that a family member or a friend might need blood some day.
            Some believe it is the right thing we do.
            Whatever your reason, the need is constant and your contribution is important for a healthy and reliable blood supply.  And  you�ll feel good knowing you've helped change a life.
            You will receive a mini physical to check your:

            Pulse
            Blood pressure
            Body temperature
            Hemoglobin</p>

            <h1 style="color:#FFFFFF">Benefits of Donating</h1>
                <p align="right" style="text-align:left"> You don�t need a special reason to give blood.
            You just need your own reason.
            Some of us give blood because we were asked by a friend.
            Some know that a family member or a friend might need blood some day.
            Some believe it is the right thing we do.
            Whatever your reason, the need is constant and your contribution is important for a healthy and reliable blood supply.  And  you�ll feel good knowing you've helped change a life.
            You will receive a mini physical to check your:

            Pulse
            Blood pressure
            </p></p>
        </div>
                <form>
                    <table id="itable" width="1100" border="1" style="padding-bottom:25">
                        <tr>
                            <td height="50" bgcolor="#006699">SReg</td>
                            <td align="center" bgcolor="#006699">SName</td>
                            <td align="center" bgcolor="#006699">SPh_Number</td>
                            <td align="center" bgcolor="#006699">Blood_Group_Name</td>
                        </tr>

                        <?php
                        include("dbconnect.php");
                        $strquery = "SELECT * FROM (SELECT S.SReg, S.SName, S.SPh_Number, B.Blood_Group_Name,B.Blood_Group_ID FROM s_info S, blood_group_info B WHERE S.Blood_Group_ID=B.Blood_Group_ID ) A WHERE blood_group_ID='1' OR blood_group_ID='2' OR blood_group_ID='3' OR blood_group_ID='4' OR blood_group_ID='5' OR blood_group_ID='6' OR blood_group_ID='7' OR blood_group_ID='8' ORDER BY blood_group_ID";
                        $results = mysql_query($strquery);
                        $num = mysql_numrows($results);

                        $i = 0;
                        while ($i < $num)
                        {
                        $f1 = mysql_result($results, $i, "SReg");
                        $f2 = mysql_result($results, $i, "SName");
                        $f3 = mysql_result($results, $i, "SPh_Number");
                        $f4 = mysql_result($results, $i, "Blood_Group_Name");
                        ?>
                        <tr align="center">
                            <td height="40"><?php echo $f1; ?></td>
                            <td><?php echo $f2; ?></td>
                            <td><?php echo $f3; ?></td>
                            <td><?php echo $f4; ?></td>
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