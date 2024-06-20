<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class Teacher
{
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

    public static function getTeachersCount()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT COUNT(u.user_id) as total_teachers FROM e_info e INNER JOIN user u ON u.user_id = e.user_id WHERE group_id = 2 AND e.deleted = 0";
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


    public static function getPaginatedTeachers()
    {
        $totalTeachers = self::getTeachersCount();
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT e.* FROM e_info e INNER JOIN user u ON u.user_id = e.user_id WHERE group_id = 2 AND e.deleted = 0";
        $recordPerPage = 20;
        $pagination = new Page();
        $pagination->set_page_data(BASE_URL . '/teacher/list', 1, $totalTeachers, $recordPerPage, 0, true, true, true);
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

    public static function updateTeacher($data)
    {
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

    public static function teacherSave($data)
    {
        // Adding to user table
        self::addUser($data);

        $data['EID'] = $data['user_id'] = self::getUserByEmail($data['email']);

        // Adding to employee table
        self::addTeacher($data);

        return true;
    }

    private static function addUser($data = [])
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $insertStudentInfoQuery = "INSERT INTO user
            (email, password, group_id)
            VALUES (?, ?, 2)";
        $stmt = $connection->prepare($insertStudentInfoQuery);
        if ($stmt) {
            $stmt->bind_param(
                "ss",
                $data['email'],
                $data['password']
            );
            return $stmt->execute();
        } else {
            die("Inser Query to user failed: " . $connection->error);
        }
    }

    public static function getUserByEmail($email)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT * from user where email=?";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $userResult = $stmt->get_result();
            $stmt->close();
            $user = $userResult->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $user['user_id'];

    }

    private static function addTeacher($data = [])
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $insertStudentInfoQuery = "INSERT INTO e_info
            (user_id, EID, EName, EDesignation, Employee_Contact, Employee_Speech, Employee_Qualification, Employee_Experience, Employee_Role, email)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($insertStudentInfoQuery);
        if ($stmt) {
            $stmt->bind_param(
                "iissssssss",
                $data['user_id'],
                $data['EID'],
                $data['ename'],
                $data['edesignation'],
                $data['employee_Contact'],
                $data['employee_Speech'],
                $data['employee_Qualification'],
                $data['employee_Experience'],
                $data['employee_Role'],
                $data['email'],
            );
            return $stmt->execute();
        } else {
            die("Inser Query to e_info failed: " . $connection->error);
        }
    }

    
    public static function deleteTeacher($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE e_info SET 
                deleted = 1

                WHERE user_id = ?";
                
        $stmt = $connection->prepare($qry);
        
        if ($stmt) {
            $stmt->bind_param(
                "i",
                $data['user_id']
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }
    }

}
