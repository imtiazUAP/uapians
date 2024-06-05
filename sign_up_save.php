<?php
error_reporting(1);
include ("dbconnect.php");
$post_photo = $_FILES['file']['name'];
$post_photo_tmp = $_FILES['file']['tmp_name'];
$ext = pathinfo($post_photo, PATHINFO_EXTENSION);  // getting image extension 
if ($ext == 'png' || $ext == 'PNG' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'gif' || $ext == 'GIF') {
    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG') {
        $src = imagecreatefromjpeg($post_photo_tmp);
    }
    if ($ext == 'png' || $ext == 'PNG') {
        $src = imagecreatefrompng($post_photo_tmp);
    }
    if ($ext == 'gif' || $ext == 'GIF') {
        $src = imagecreatefromgif($post_photo_tmp);
    }
    list($width_min, $height_min) = getimagesize($post_photo_tmp); // fetching original image width and height
    $newwidth_min = 350; // set compressing image width
    $newheight_min = ($height_min / $width_min) * $newwidth_min; // equation for compressed image height
    $tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min); // create frame  for compress image
    imagecopyresampled($tmp_min, $src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min); // compressing image
    $newfilename = round(microtime(true)) . '.' . $ext; // creating a new file name as 2 photo can not be with same name
    imagejpeg($tmp_min, "images/" . $newfilename, 80); //copy image in folder//
    $photo_name = 'images/' . $newfilename; // new name with path to save in database
    mysql_query($sql = "INSERT INTO sign_up (SID,SPortrait,SName,SReg,district_id,SE_Mail,SMID,Blood_Group_ID,donor_value,username,password)VALUES ('','$photo_name','" . $_REQUEST['name'] . "','" . $_REQUEST['reg'] . "','" . $_REQUEST['district_id'] . "','" . $_REQUEST['email'] . "','" . $_REQUEST['SMID'] . "','" . $_REQUEST['Blood_Group_ID'] . "','" . $_REQUEST['donor_value'] . "','" . $_REQUEST['username'] . "','" . $_REQUEST['password'] . "')");
} else {
    echo "Registration Failed.... <br>Please Fill all the field Correctly";
}
header('location: https://localhost/uapians/sign_up_notification.php ');
mysql_close($con)
    ?>