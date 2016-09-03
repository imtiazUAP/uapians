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
    && in_array($extension, $allowedExts)
) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

        if (file_exists("images/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],
                "images/" . $_FILES["file"]["name"]);
            $a = 'images/' . $_FILES["file"]["name"];
            echo $a;
            mysql_query($sql = "INSERT INTO s_info (SID,SPortrait,SName,SReg,SAge,SHouse,STransport,SQuality,district_id,SPh_number,SE_mail,SB_of_Date,SMID,Blood_Group_ID,Blood_Donor,Noted_Activity, School, College, Knows_Programs,Interested_In,Working_At,FB_Link,Twitter_Link,Blog)VALUES ('','$a','" . $_REQUEST['name'] . "','" . $_REQUEST['reg'] . "','" . $_REQUEST['age'] . "','" . $_REQUEST['house'] . "','" . $_REQUEST['transport'] . "','" . $_REQUEST['quality'] . "','" . $_REQUEST['district_id'] . "','" . $_REQUEST['contact'] . "','" . $_REQUEST['email'] . "','" . $_REQUEST['dob'] . "','" . $_REQUEST['SMID'] . "','" . $_REQUEST['Blood_Group_ID'] . "','" . $_REQUEST['donor_value'] . "','" . $_REQUEST['Noted_Activity'] . "','" . $_REQUEST['School'] . "','" . $_REQUEST['College'] . "','" . $_REQUEST['Knows_Programs'] . "','" . $_REQUEST['Interested_In'] . "','" . $_REQUEST['Working_At'] . "','" . $_REQUEST['FB_Link'] . "','" . $_REQUEST['Twitter_Link'] . "','" . $_REQUEST['Blog'] . "'
	  )");
        }
    }
} else {
    echo "Invalid file";
}
?> 