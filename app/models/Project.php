<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class Project
{

    public static function getProjectsByCategoryId($categoryId)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT project.user_id, project.project_name, project.screenshot, project.project_link, project.category_id, s_info.SName, project.platform_name
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

    public static function projectSave($data, $file)
    {
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
                if (file_exists(BASE_DIR . "/app/assets/images/" . $file["name"])) {
                    echo $file["name"] . " already exists please rename your photo ";
                } else {
                    move_uploaded_file(
                        $file["tmp_name"],
                        BASE_DIR . "/app/assets/images/" . $file["name"]
                    );

                    $data['screenshot'] = 'images/' . $file["name"];
                }
            }
        } else {
            die("Couldn't upload project screenshot");
        }

        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $sql = "INSERT INTO project
            (project_name, platform_name, category_id, project_link, screenshot, user_id)
            VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        if ($stmt) {
            $stmt->bind_param(
                "ssissi",
                $data['project_name'],
                $data['platform_name'],
                $data['category_id'],
                $data['project_link'],
                $data['screenshot'],
                $data['user_id']
            );
            return $stmt->execute();
        } else {
            die("Inser Query to project failed: " . $connection->error);
        }

    }

}
