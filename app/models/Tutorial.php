<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class Tutorial {

    public static function getTutorialsByCategoryId($categoryId) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT * FROM tutorial WHERE category_id=?";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $categoryId);
            $stmt->execute();
            $tutorialData = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $tutorialData;
    }

    public static function tutorialSave($data, $file)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();

        $tutorialLink = self::convertToEmbedUrl($data['tutorial_link']);
        $sql = "INSERT INTO tutorial
            (tutorial_name, tutorial_link, category_id, added_by)
            VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        if ($stmt) {
            $stmt->bind_param(
                "ssii",
                $data['tutorial_name'],
                $tutorialLink,
                $data['category_id'],
                $data['added_by']
            );
            return $stmt->execute();
        } else {
            die("Inser Query to project failed: " . $connection->error);
        }
    }


    public static function convertToEmbedUrl($url) {
        $parsedUrl = parse_url($url);
        if (!isset($parsedUrl['query'])) {
            return false;
        }
    
        parse_str($parsedUrl['query'], $queryParams);
        if (!isset($queryParams['v'])) {
            return false;
        }
    
        $videoId = $queryParams['v'];
        $newUrl = "https://www.youtube.com/v/" . $videoId;
    
        return $newUrl;
    }


}
