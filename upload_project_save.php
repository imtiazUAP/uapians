<?php include("dbconnect.php"); ?>
<?php

$post_photo = $_FILES['file']['name'];
$post_photo_tmp = $_FILES['file']['tmp_name'];
$ext = pathinfo($post_photo, PATHINFO_EXTENSION); // getting image extension
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
list($width_min, $height_min) = getimagesize($post_photo_tmp);
$newwidth_min = 350;
$newheight_min = ($height_min / $width_min) * $newwidth_min;
$tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min);
imagecopyresampled($tmp_min, $src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);
$newfilename = round(microtime(true)) . '.' . $ext;
imagejpeg($tmp_min, "images/" . $newfilename, 80); //copy image in folder//
$photo_name = 'images/' . $newfilename; // new name with path to save in database

$strquery = "INSERT INTO project (language_id,project_name,platform_id,project_cat_id,SID,project_link,source_code_link,project_screenshot)VALUES ('" . $_REQUEST['language_id'] . "','" . $_REQUEST['project_name'] . "','" . $_REQUEST['platform_id'] . "','" . $_REQUEST['project_cat_id'] . "','" . $_REQUEST['SID'] . "','" . $_REQUEST['project_link'] . "','" . $_REQUEST['source_code_link'] . "','$photo_name')";
mysql_query($strquery);
}
header('location: https://localhost/uapians/upload_project_confirmation.php ');
?>