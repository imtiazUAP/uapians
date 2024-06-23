<?php

class Home {
    public static function getNoticeInfo()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT * FROM notice_info";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $noticeResults = $stmt->get_result();
            $noticeInfo = $noticeResults->fetch_assoc();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $noticeInfo;
    }

    public static function getAllNews()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT * FROM news_info WHERE deleted = 0";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $newsResults = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $newsResults;
    }

    public static function getHomePageContents()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT * FROM site_content WHERE page_name = 'home'";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $homePageContents = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $homePageContents;
    }

    public static function updateNotice($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE notice_info SET 
                Notice=?

                WHERE Notice_ID=?";
                
        $stmt = $connection->prepare($qry);
        
        if ($stmt) {
            $stmt->bind_param(
                "si",
                $data['Notice'],
                $data['Notice_ID']
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }

    }

    public static function newsSave($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
    
        $qry = "INSERT INTO news_info (News_Hints, News_Link) VALUES (?, ?)";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param(
                "ss",
                $data['news_hints'],
                $data['news_link'],
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

    public static function getNewsByNewsId($newsId) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT * FROM news_info WHERE News_ID=?";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $newsId);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $newsData = $result->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $newsData;
    }

    public static function updateNews($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE news_info SET 
                News_Hints=?,
                News_Link=?

                WHERE News_ID=?";
                
        $stmt = $connection->prepare($qry);
        
        if ($stmt) {
            $stmt->bind_param(
                "ssi",
                $data['news_hints'],
                $data['news_link'],
                $data['news_id']
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }
    }

    public static function deleteNews($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE news_info SET 
                deleted=1

                WHERE News_ID=?";
                
        $stmt = $connection->prepare($qry);
        
        if ($stmt) {
            $stmt->bind_param(
                "i",
                $data['news_id']
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }
    }
}