<?php
error_reporting(0);
session_start();
include("dbconnect.php");
include("classes/Authentication.php");
?>
<html>
<head>
    <?php
    include("header.php");
    ?>
</head>
<body>
<?php
if ($isLoggedIn) {
?>
<?php
    $strquery = "UPDATE s_info SET SName= '" . $_GET['SName'] . "', SReg= '" . $_GET['SReg'] . "',SHouse= '" . $_GET['SHouse'] . "',district_id= '" . $_GET['district_id'] . "',SPh_Number= '" . $_GET['SPh_Number'] . "',SE_Mail= '" . $_GET['SE_Mail'] . "',SB_of_Date= '" . $_GET['SB_of_Date'] . "',SPortrait= '" . $_GET['SPortrait'] . "',SMID= '" . $_GET['SMID'] . "', Blood_Group_ID= '" . $_GET['Blood_Group_ID'] . "', donor_value= '" . $_GET['donor_value'] . "', Noted_Activity= '" . $_GET['Noted_Activity'] . "', School= '" . $_GET['School'] . "', College= '" . $_GET['College'] . "', Knows_Programs= '" . $_GET['Knows_Programs'] . "', Interested_In= '" . $_GET['Interested_In'] . "', Working_At= '" . $_GET['Working_At'] . "', FB_Link= '" . $_GET['FB_Link'] . "', Twitter_Link= '" . $_GET['Twitter_Link'] . "', Blog= '" . $_GET['Blog'] . "'
     where SID=". $_GET['SID'] ." ";
    mysql_query($strquery);

echo "<div align='center' style='color: #000000; font-size: 14px;'>Your profile information updated!!! Thank you</div>";

?>
<div align="center">
    <label>
        <br>
        <br>
        <button class="button button_red" href="#" onClick="tb_remove();">Close</button>
    </label>
</div>
<?php }else {
    include("permission_error.php");
}
?>
</body>
</html>