<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class Utilities {
    public static function getProjectCategories()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT DISTINCT category_id, category_name FROM project_category";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $categories = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $categories;
    }

    public static function getTutorialCategories()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT DISTINCT category_id, category_name FROM tutorial_category";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $categories = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $categories;
    }
}