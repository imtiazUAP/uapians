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

        if (file_exists("images/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists please rename your photo ";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],
                "images/" . $_FILES["file"]["name"]);
            $a = 'images/' . $_FILES["file"]["name"];
            mysql_query($sql = "INSERT INTO project (language_id,project_name,platform_id,project_cat_id,SID,project_link,project_screenshot)VALUES ('" . $_REQUEST['language_id'] . "','" . $_REQUEST['project_name'] . "','" . $_REQUEST['platform_id'] . "','" . $_REQUEST['project_cat_id'] . "','" . $_REQUEST['SID'] . "','" . $_REQUEST['project_link'] . "','$a')");
        }
    }
} else {
    echo "Registration Failed.... <br>Please Fill all the field Correctly";
}
header('location: http://localhost/uapians/upload_project_confirmation.php ');
mysql_close($con)
?> 