<?php
include_once (__DIR__ . "/../helpers/page.inc.php");

class Student {
    public static function getAll() {
        $db = new dbClass();
        $query = "SELECT * FROM blogs";
        return $db->query($query);
    }

    public static function getStudentByStudentId($studentId)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT *,SMName,Blood_Group_Name,district_name FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID 
						INNER JOIN
						blood_group_info
						ON
						s_info.Blood_Group_ID=blood_group_info.Blood_Group_ID INNER JOIN districts ON s_info.district_id=districts.district_id WHERE SID=?";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $studentId);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $studentData = $result->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $studentData;
    }

    public static function getStudentsCountBySemesterId($semesterId) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT COUNT(SID) as total_students FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE s_info.SMID=? order by SReg";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $semesterId);
            $stmt->execute();
            $student = $stmt->get_result();
            $stmt->close();
            $studentData = $student->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $studentData['total_students'];
    }

    // TODO: No uyse of this function yet
    // public static function getStudentsBySemesterId($semesterId) {
    //     $dbconnect = new dbClass();
    //     $connection = $dbconnect->getConnection();
    //     $qry = "SELECT SID,SName,SReg,SPortrait,SMName FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE s_info.SMID=? order by SReg";
    //     $stmt = $connection->prepare($qry);
    //     if ($stmt) {
    //         $stmt->bind_param("s", $semesterId);
    //         $stmt->execute();
    //         $students = $stmt->get_result();
    //         $stmt->close();
    //     } else {
    //         die("Query failed: " . $connection->error);
    //     }

    //     return $students;
    // }

    
    public static function getPaginatedStudentsBySemesterId($semesterId) {
        $totalStudents = self::getStudentsCountBySemesterId($semesterId);
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT SID,SName,SReg,SPortrait,SMName FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE s_info.SMID='" . $semesterId . "' order by SReg";
        $recordPerPage = 10;
        $pagination = new Page();
        $pagination->set_page_data(BASE_URL.'/student/list', $semesterId, $totalStudents, $recordPerPage, 0, true, true, true);
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
            'students' => $paginationResult
        ];

        return $paginationData;
    }

    public static function getAllDistricts()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT DISTINCT district_id,district_name FROM districts ORDER BY district_id";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $districtData = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $districtData;
    }

    public static function getAllSemesters()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT DISTINCT SMID,SMName FROM sm_info ORDER BY SMID";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $semesterData = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $semesterData;
    }

    public static function getAllBloodGroups()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT DISTINCT Blood_Group_ID,Blood_Group_Name FROM blood_group_info ORDER BY Blood_Group_ID";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $bloodGroupData = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $bloodGroupData;
    }

    public static function updateStudent($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE s_info SET 
                SName=?, 
                SReg=?, 
                SHouse=?, 
                district_id=?, 
                SPh_Number=?,

                SE_Mail=?, 
                SB_of_Date=?, 
                SPortrait=?, 
                SMID=?, 
                Blood_Group_ID=?, 

                donor_value=?, 
                Noted_Activity=?, 
                School=?, 
                College=?, 
                Knows_Programs=?, 

                Interested_In=?, 
                Working_At=?, 
                FB_Link=?, 
                Twitter_Link=?, 
                Blog=? 

                WHERE SID=?";
                
        $stmt = $connection->prepare($qry);
        
        if ($stmt) {
            $stmt->bind_param(
                "sssissisiiisssssssssi",
                $data['SName'],
                $data['SReg'],
                $data['SHouse'],
                $data['district_id'],
                $data['SPh_Number'],

                $data['SE_Mail'],
                $data['SB_of_Date'],
                $data['SPortrait'],
                $data['SMID'],
                $data['Blood_Group_ID'],

                $data['donor_value'],
                $data['Noted_Activity'],
                $data['School'],
                $data['College'],
                $data['Knows_Programs'],

                $data['Interested_In'],
                $data['Working_At'],
                $data['FB_Link'],
                $data['Twitter_Link'],
                $data['Blog'],

                $data['SID']
            );
            return $stmt->execute();
        } else {
            return false;
        }
    }

}
