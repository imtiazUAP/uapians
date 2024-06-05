<html>

<head>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/thickbox.js"></script>
  <link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
</head>

<body>
  <?php
  include ('dbconnect.php');
  $strquery = "UPDATE s_info SET SName= '" . $_GET['SName'] . "', SReg= '" . $_GET['SReg'] . "',SHouse= '" . $_GET['SHouse'] . "',district_id= '" . $_GET['district_id'] . "',SPh_Number= '" . $_GET['SPh_Number'] . "',SE_Mail= '" . $_GET['SE_Mail'] . "',SB_of_Date= '" . $_GET['SB_of_Date'] . "',SPortrait= '" . $_GET['SPortrait'] . "',SMID= '" . $_GET['SMID'] . "'
,Blood_Group_ID= '" . $_GET['Blood_Group_ID'] . "'
,donor_value= '" . $_GET['donor_value'] . "'
,Noted_Activity= '" . $_GET['Noted_Activity'] . "'
,School= '" . $_GET['School'] . "'
,College= '" . $_GET['College'] . "'
,Knows_Programs= '" . $_GET['Knows_Programs'] . "'
,Interested_In= '" . $_GET['Interested_In'] . "'
,Working_At= '" . $_GET['Working_At'] . "'
,FB_Link= '" . $_GET['FB_Link'] . "'
,Twitter_Link= '" . $_GET['Twitter_Link'] . "'
,Blog= '" . $_GET['Blog'] . "'
 where SID='" . $_GET['SID'] . "' ";
  $results = mysql_query($strquery);
  echo "<div align='center'>Your Profile Updated!!! Thank you</div>";
  ?>
  <div align="center">
    <label>
      <br>
      <br>
      <a href="#" onClick="tb_remove();">Close</a>
    </label>
  </div>
</body>

</html>