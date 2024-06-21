<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class Reference {

    public static function referenceSave($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
    
        $qry = "INSERT INTO reference_info (CID, SMID, Detail, Reference_Link, user_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param(
                "iissi",
                $data['CID'],
                $data['SMID'],
                $data['Detail'],
                $data['Reference_Link'],
                $data['user_id']
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

    public static function getReferencesByCourseId($CID) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT ref_id, CCode, CName, user.email, Reference_Link, Detail, SMName FROM reference_info
            INNER JOIN c_info
                ON reference_info.CID=c_info.CID
            LEFT OUTER JOIN user
                ON user.user_id = reference_info.user_id
            INNER JOIN sm_info
                ON reference_info.SMID=sm_info.SMID WHERE reference_info.CID=? AND reference_info.deleted = 0";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $CID);
            $stmt->execute();
            $courseReferences = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $courseReferences;
    }

    public static function getReferenceByReferenceId($refId) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT ref_id, CCode, CName, Reference_Link, Detail, SMName FROM reference_info
            INNER JOIN c_info
                ON reference_info.CID=c_info.CID
            INNER JOIN sm_info
                ON reference_info.SMID=sm_info.SMID WHERE reference_info.ref_id=?";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $refId);
            $stmt->execute();
            $referenceResults = $stmt->get_result();
            $referenceInfo = $referenceResults->fetch_assoc();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $referenceInfo;
    }

    public static function updateReference($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE reference_info SET 
                CID=?,
                SMID=?, 
                Detail=?,
                Reference_Link=?,
                user_id=?

                WHERE ref_id=?";
                
        $stmt = $connection->prepare($qry);
        
        if ($stmt) {
            $stmt->bind_param(
                "iissii",
                $data['CID'],
                $data['SMID'],
                $data['Detail'],
                $data['Reference_Link'],
                $data['user_id'],

                $data['ref_id']
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }
    }

    public static function deleteReference($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE reference_info SET 
                deleted=1

                WHERE ref_id=?";
                
        $stmt = $connection->prepare($qry);
        
        if ($stmt) {
            $stmt->bind_param(
                "i",
                $data['ref_id']
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }
    }

}
