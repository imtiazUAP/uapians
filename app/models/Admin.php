<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class Admin {

    public static function getSignUpStudents()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT S.*, M.SMName FROM sign_up S, sm_info M WHERE S.SMID=M.SMID AND deleted = 0 ORDER BY S.SReg";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $signUpStudents = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $signUpStudents;
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

    public static function getSignUpStudentByRegistrationId($registrationId) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT * from sign_up where SReg=?";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $registrationId);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $signedUpStudent = $result->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $signedUpStudent;
    }

    public static function signUpApprove($data) {
        // Adding to student table
        self::addStudent($data);


        // Adding to user table
        self::addUser($data);

        // Sending confirmation mail
        $message = 'Your Profile is Activated at http://www.uapians.net please log in to continue.... email:'. $data['SE_Mail'] . 'Thank You!!!';
        self::sendEmail('info@uapians.net',  $data['SE_Mail'], 'Profile Activated', $message);

        self:: deleteSignUp($data);

        return true;

    }

    private static function addStudent($data = []) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $insertStudentInfoQuery = "INSERT INTO s_info
            (SID, SPortrait, SName, SReg, district_id, email, SMID, Blood_Group_ID, donor_value)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($insertStudentInfoQuery);
        if ($stmt) {
            $stmt->bind_param(
                "isssisiii",
                $data['SID'],
                $data['SPortrait'],
                $data['SName'],
                $data['SReg'],
                $data['district_id'],
                $data['SE_Mail'],
                $data['SMID'],
                $data['Blood_Group_ID'],
                $data['donor_value']
            );
            return $stmt->execute();
        } else {
            die("Inser Query to s_info failed: " . $connection->error);
        }
    }

    private static function addUser($data = []) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $insertStudentInfoQuery = "INSERT INTO user
            (email, password, group_id)
            VALUES (?, ?, 5)";
        $stmt = $connection->prepare($insertStudentInfoQuery);
        if ($stmt) {
            $stmt->bind_param(
                "ss",
                $data['SE_Mail'],
                $data['password']
            );
            return $stmt->execute();
        } else {
            die("Inser Query to user failed: " . $connection->error);
        }
    }

    private static function sendEmail($from, $toMail, $subject, $body) {
        $message = wordwrap($body, 70);
        // send mail
        // TODO: Enable while going to production
        // mail($toMail, $subject, $message, "From: $from\n");
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

    public static function deleteSignUp($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE sign_up SET 
                deleted=1

                WHERE SReg=?";
                
        $stmt = $connection->prepare($qry);
        
        if ($stmt) {
            $stmt->bind_param(
                "i",
                $data['SReg']
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }
    }

}
