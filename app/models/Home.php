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
        $qry = "SELECT * FROM news_info";
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
}