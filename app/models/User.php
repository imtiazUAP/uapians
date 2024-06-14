<?php

class User {

    public static function getUserByUserId($userId)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT s.*, e.*, u.*, SMName, Blood_Group_Name, district_name
            FROM
                user u
                    LEFT OUTER JOIN
                s_info s ON s.user_id = u.user_id
                    LEFT OUTER JOIN
                e_info e ON e.user_id = u.user_id
                    LEFT OUTER JOIN
                sm_info ON s.SMID = sm_info.SMID
                    LEFT OUTER JOIN
                blood_group_info ON s.Blood_Group_ID = blood_group_info.Blood_Group_ID
                    LEFT OUTER JOIN
                districts ON s.district_id = districts.district_id
            WHERE
                u.user_id = ?";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $userInfo = $result->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $userInfo;
    }

    public static function getAdminInfo()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT s.*, u.*, SMName
            FROM
                user u
                    LEFT OUTER JOIN
                s_info s ON s.user_id = u.user_id
                    LEFT OUTER JOIN
                sm_info ON s.SMID = sm_info.SMID
            WHERE
                u.group_id = 1";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $adminInfo = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $adminInfo;
    }
}