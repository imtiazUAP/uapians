<?php include("dbconnect.php"); ?>
<?php
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
	//echo "Thank You for Registration. please wait for Admin Review (maximum 24 hour)";
    					//echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    					//echo "Type: " . $_FILES["file"]["type"] . "<br>";
   					//echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
					//echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("images/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists please rename your photo ";
      }
      
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "images/" . $_FILES["file"]["name"]);
      
      					//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
	  				//$d = dir(getcwd());
	  
	  $a='images/'.$_FILES["file"]["name"];
	  				//echo $a;
	  mysql_query($sql="INSERT INTO sign_up (SID,SPortrait,SName,SReg,SHouse,district_id,SPh_Number,SE_Mail,SB_of_Date,SMID,Blood_Group_ID,donor_value,School, College, FB_Link,username,password)VALUES ('','$a','" . $_REQUEST['name'] . "','" . $_REQUEST['reg'] . "','" . $_REQUEST['house'] . "','" . $_REQUEST['district_id'] . "','" . $_REQUEST['contact'] . "','" . $_REQUEST['email'] . "','" . $_REQUEST['dob'] . "','" . $_REQUEST['SMID'] . "','" . $_REQUEST['Blood_Group_ID'] . "','" . $_REQUEST['donor_value'] . "','" . $_REQUEST['School'] . "','" . $_REQUEST['College'] . "','" . $_REQUEST['FB_Link'] . "','" . $_REQUEST['username'] . "','" . $_REQUEST['password'] . "'
	  )");
	  
      }
    }
  }
else
  {
  echo "Registration Failed.... <br>Please Fill all the field Correctly";
  }
  
  
  header ('location: http://uapians.net/sign_up_notification.php '); 
mysql_close($con)
?> 