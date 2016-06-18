<?php
include("dbconnect.php");

$strquery="UPDATE s_info SET SRoll= '" . $_GET['SRoll'] . "',SName= '" . $_GET['SName'] . "', SReg= '". $_GET['SReg'] ."',SAge='". $_GET['SAge'] ."',SHouse= '" . $_GET['SHouse'] . "',STransport= '" . $_GET['STransport'] . "',SQuality= '" . $_GET['SQuality'] . "',SHome_City= '" . $_GET['SHome_City'] . "',SPh_Number= '" . $_GET['SPh_Number'] . "',SE_Mail= '" . $_GET['SE_Mail'] . "',SB_of_Date= '" . $_GET['SB_of_Date'] . "',SPortrait= '" . $_GET['SPortrait'] ."',SMID= '" . $_GET['SMID']. "'
,Blood_Group_ID= '" . $_GET['Blood_Group_ID']. "'
,Noted_Activity= '" . $_GET['Noted_Activity']. "'
,School= '" . $_GET['School']. "'
,College= '" . $_GET['College']. "'
,Knows_Programs= '" . $_GET['Knows_Programs']. "'
,Interested_In= '" . $_GET['Interested_In']. "'
,Working_At= '" . $_GET['Working_At']. "'
,FB_Link= '" . $_GET['FB_Link']. "'
,Twitter_Link= '" . $_GET['Twitter_Link']. "'
,Blog= '" . $_GET['Blog']. "'

 where SID='".$_GET['SID']."' ";


$results=mysql_query ($strquery);

header ('location: http://uapians.net/Student_Edit.php '); 

?>
?>