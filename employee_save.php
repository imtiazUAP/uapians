<?php
error_reporting(0);
include('dbconnect.php');
include("classes/Authentication.php");
?>

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

$password = $_REQUEST['password'];
mysql_query($sql = "INSERT INTO userinfo (username,password,SE_Mail) VALUES ('" . $_REQUEST['username'] . "','" . md5($password) . "','" . $_REQUEST['email'] . "')");
$lastInsertId = mysql_insert_id();
$userGroup = $_REQUEST['user_group'];
mysql_query($sql = "INSERT INTO e_info (EName,Employee_Portrait,employee_email,SID,group_id) VALUES ('" . $_REQUEST['employee_name'] . "','".$photo_name."','".$_REQUEST['email'] ."','.$lastInsertId.','.$userGroup.')");
mysql_query($sql = "UPDATE userinfo SET SID= ".$lastInsertId.", admin=".$userGroup." WHERE userid = ".$lastInsertId."");
}
?>

<html>
<head>
    <?php
    include("header.php");
    ?>
</head>

<body>
<?php
if ($isLoggedIn && $isAdmin) {
?>
<div style="padding: 50px; color:#000000"> Employee Added</div>
    <div align="right";>
            <button class="button button_red" onClick="tb_remove()"> Close </button>
        </div>
<?php }else {
    include("permission_error.php");
}
?>
</body>
</html>