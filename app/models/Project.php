<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class Project {

    public static function getProjectsByCategoryId($categoryId) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT project.user_id, project.project_name, project.screenshot, project.project_link, project. category_id, s_info.SName, project.platform_name
            FROM project
        INNER JOIN project_category
            ON project.category_id = project_category.category_id
        INNER JOIN s_info
            ON project.user_id = s_info.user_id
        WHERE project.category_id=?";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $categoryId);
            $stmt->execute();
            $projects = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $projects;
    }

}
