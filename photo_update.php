<?php
include('dbconnect.php');
$strquery = "SELECT SID,SPortrait from s_info where SID= '" . $_GET["SID"] . "' ";
$results = mysql_query($strquery);
$row = mysql_fetch_array($results);
?>
<html>
    <head>
        <?php
        include("header.php");
        ?>
    </head>
    <body>
    <?php if(!$_POST['SID']){
    ?>
            <table style="padding:30px; color: #000000" >
                <tr>
                    <td><label style="color: black">Your Old Photo:</label></td>
                    <td><img src=<?php echo $row['SPortrait'] ?> style="height:100px; border-radius:45px;"></td>
                </tr>
                <form id="form1" name="form1" method="post" action="photo_update.php" enctype="multipart/form-data">
                <tr>
                    <td>
                        <label style="color: black" for="Portrait" class="signup_field" data-icon="u">Select New Photo:</label>
                    </td>
                    <td>
                        <input id="file" name="file" required="required" type="file" placeholder="Select photo"/>
                    </td>
                </tr>
            </table>
            <input name="SID" type="hidden" id="SID" value=" <?php echo $row["SID"]; ?>"/>
            <input name="SPortrait" type="hidden" id="SID" value="<?php echo $row['SPortrait']; ?>"/>

            <div align="right"; style="padding-right:15px">
                <button name="login" type="Submit" class="button button_blue">Update Photo
                </button>
            </div>
        </form>
    <?php
    } elseif($_POST['SID']){
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

            $strquery = "UPDATE s_info SET SPortrait= '" . $photo_name . "' WHERE SID=". $_REQUEST['SID'] ." ";
            mysql_query($strquery);

            $oldPhoto = $_REQUEST['SPortrait'];
            unlink($oldPhoto);
            ?>
            <div align="center">
                <label style="color: #008CBA; font-size:14px;">Your profile picture is changed!  <span
                        style="color: #ff0000">Chill!</span></label>
            </div>
        <?php
        }else{ ?>
            <div align="center">
                <label style="color: #008CBA; font-size:14px;">This file is not valid. Please select a <span style="color: #ff0000">png/jpg/jpeg/gif</span> </br> file to upload as a profile photo.</label>
            </div>
        <?php
        }
    }
    ?>
    <div align="center">
    <button class="button button_red" onClick="tb_remove()"> Cancel </button>
    </div>
    </body>
</html>