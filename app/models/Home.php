<?php

class Home {
    public static function getAllNotice()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT * FROM notice_info";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $noticeResults = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $noticeResults;
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
}