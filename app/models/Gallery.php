<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class Gallery
{

    public static function getAllPhotos()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT * FROM gallery WHERE deleted = 0";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $galleryPhotos = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $galleryPhotos;
    }

    public static function photoSave($data, $file)
    {
        $dbConnect = new dbClass();
        $connection = $dbConnect->getConnection();

        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $file["name"]);
        $extension = end($temp);
        if (
            (($file["type"] == "image/gif")
                || ($file["type"] == "image/jpeg")
                || ($file["type"] == "image/jpg")
                || ($file["type"] == "image/pjpeg")
                || ($file["type"] == "image/x-png")
                || ($file["type"] == "image/png"))
            && in_array($extension, $allowedExts)
        ) {
            if ($file["error"] > 0) {
                echo "Return Code: " . $file["error"] . "<br>";
            } else {
                echo "Upload: " . $file["name"] . "<br>";
                echo "Type: " . $file["type"] . "<br>";
                echo "Size: " . ($file["size"] / 1024) . " kB<br>";
                echo "Temp file: " . $file["tmp_name"] . "<br>";
                if (file_exists(BASE_DIR . "/app/assets/images/" . $file["name"])) {
                    die($file["name"] . " already exists. ");
                } else {
                    move_uploaded_file(
                        $file["tmp_name"],
                        BASE_DIR . "/app/assets/images/" . $file["name"]
                    );
                    $photoLink = 'images/' . $file["name"];
                }
            }
        } else {
            die("Invalid file: " . $file["name"]);
        }

        $qry = "INSERT INTO gallery (Photo_Link, Photo_caption) VALUES (?, ?)";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param(
                "ss",
                $photoLink,
                $data['photo_caption'],
            );

            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        } else {
            return false;
        }
    }

    public static function getPhotoByPhotoId($photoId)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT * FROM gallery WHERE Photo_Id=?";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $photoId);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $photo = $result->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $photo;
    }


    public static function deletePhoto($data)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();

        $qry = "UPDATE gallery SET 
                deleted=1
                WHERE Photo_Id=?";

        $stmt = $connection->prepare($qry);

        if ($stmt) {
            $stmt->bind_param(
                "i",
                $data['photo_id']
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }
    }
}