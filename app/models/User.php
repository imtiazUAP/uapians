<?php

class User {

    public static function getUserByUserId($userId)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT u.*, s.*, e.*, SMName, Blood_Group_Name, district_name
            FROM
                user u
                    LEFT JOIN
                s_info s ON s.user_id = u.user_id
                    LEFT JOIN
                e_info e ON e.user_id = u.user_id
                    LEFT JOIN
                sm_info ON s.SMID = sm_info.SMID
                    LEFT JOIN
                blood_group_info ON s.Blood_Group_ID = blood_group_info.Blood_Group_ID
                    LEFT JOIN
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
}