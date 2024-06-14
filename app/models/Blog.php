<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class Blog {

    public static function getAllCourses()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT c_info.CID, c_info.CCode, c_info.CName, sm_info.SMID, sm_info.SMName FROM c_info INNER JOIN sm_info ON c_info.SMID = sm_info.SMID AND c_info.deleted = 0";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $courseData = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $courseData;
    }

    public static function courseSave($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
    
        $qry = "INSERT INTO c_info (CCode, CName, SMID) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param(
                "sss",
                $data['CCode'],
                $data['CName'],
                $data['SMID']
            );
    
            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        } else {
            return false;
        }
    }

    public static function getCourseByCourseId($courseId) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT * FROM c_info WHERE CID=?";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $courseId);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $courseData = $result->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $courseData;
    }

    public static function updateCourse($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE c_info SET 
                CCode=?,
                CName=?, 
                SMID=?

                WHERE CID=?";
                
        $stmt = $connection->prepare($qry);
        
        if ($stmt) {
            $stmt->bind_param(
                "sssi",
                $data['CCode'],
                $data['CName'],
                $data['SMID'],

                $data['CID']
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }
    }

    public static function deleteCourse($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE c_info SET 
                deleted=1

                WHERE CID=?";
                
        $stmt = $connection->prepare($qry);
        
        if ($stmt) {
            $stmt->bind_param(
                "i",
                $data['CID']
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }
    }

}
