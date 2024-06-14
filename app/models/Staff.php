<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class Staff {
    public static function getStaffByUserId($userId)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT e.* FROM e_info e INNER JOIN user u ON u.user_id = e.user_id WHERE group_id = 3 AND u.user_id=?";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $staffData = $result->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $staffData;
    }

    public static function getStaffsCount() {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT COUNT(u.user_id) as total_teachers FROM e_info e INNER JOIN user u ON u.user_id = e.user_id WHERE group_id = 3";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $staffs = $stmt->get_result();
            $stmt->close();
            $staffData = $staffs->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $staffData['total_staffs'];
    }

    
    public static function getPaginatedStaffs() {
        $totalStaffs = self::getStaffsCount();
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT e.* FROM e_info e INNER JOIN user u ON u.user_id = e.user_id WHERE group_id = 3";
        $recordPerPage = 10;
        $pagination = new Page();
        $pagination->set_page_data(BASE_URL.'/staff/list', 1, $totalStaffs, $recordPerPage, 0, true, true, true);
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
            'staffs' => $paginationResult
        ];

        return $paginationData;
    }

    public static function updateStaff($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE e_info SET 
                EName=?, 
                EDesignation=?, 
                Employee_Contact=?, 
                Employee_Speech=?, 
                Employee_Role=?,
                email=?

                WHERE user_id=?";
                
        $stmt = $connection->prepare($qry);
        
        if ($stmt) {
            $stmt->bind_param(
                "ssssssi",
                $data['ename'],
                $data['edesignation'],
                $data['employee_Contact'],
                $data['employee_Speech'],
                $data['employee_Role'],
                $data['email'],

                $data['user_id'],
            );
            return $stmt->execute();
        } else {
           die("Query failed: " . $connection->error);
        }
    }

}
