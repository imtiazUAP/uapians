<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class Teacher {
    public static function getTeacherByUserId($userId)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT e.* FROM e_info e INNER JOIN user u ON u.user_id = e.user_id WHERE group_id = 2 AND u.user_id=?";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $teacherData = $result->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $teacherData;
    }

    public static function getTeachersCount() {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT COUNT(u.user_id) as total_teachers FROM e_info e INNER JOIN user u ON u.user_id = e.user_id WHERE group_id = 2";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $teachers = $stmt->get_result();
            $stmt->close();
            $teacherData = $teachers->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $teacherData['total_teachers'];
    }

    
    public static function getPaginatedTeachers() {
        $totalTeachers = self::getTeachersCount();
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT e.* FROM e_info e INNER JOIN user u ON u.user_id = e.user_id WHERE group_id = 2";
        $recordPerPage = 10;
        $pagination = new Page();
        $pagination->set_page_data(BASE_URL.'/teacher/list', 1, $totalTeachers, $recordPerPage, 0, true, true, true);
        $paginationQuery = $pagination->get_limit_query($qry);
        $paginationStmt = $connection->prepare($paginationQuery);
        if ($paginationStmt) {
            $paginationStmt->execute();
            $paginationResult = $paginationStmt->get_result();
            $paginationStmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        $paginationData = [
            'pagination_nav' => $pagination->get_page_nav('', true),
            'teachers' => $paginationResult
        ];

        return $paginationData;
    }

    public static function updateTeacher($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE e_info SET 
                EName=?, 
                EDesignation=?, 
                Employee_Contact=?, 
                Employee_Speech=?, 
                Employee_Qualification=?,

                Employee_Experience=?, 
                Employee_Role=?,
                email=?

                WHERE user_id=?";
                
        $stmt = $connection->prepare($qry);
        
        if ($stmt) {
            $stmt->bind_param(
                "ssssssssi",
                $data['ename'],
                $data['edesignation'],
                $data['employee_Contact'],
                $data['employee_Speech'],
                $data['employee_Qualification'],

                $data['employee_Experience'],
                $data['employee_Role'],
                $data['email'],
                $data['user_id'],
            );
            return $stmt->execute();
        } else {
            return false;
        }
    }

}
