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

    public static function updatePassword($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE
                    user
                SET 
                    password = ?
                WHERE
                    user_id = ?";
                
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            // TODO: Md5
		    // $stmt->bind_param("si", md5($data['new_password']),$data['user_id']);
            $stmt->bind_param(
                "si",
                $data['new_password'],
                $data['user_id']
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }

    }

    public static function updateRecovery($recovery, $userId) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE
                    user
                SET 
                    recovery = ?
                WHERE
                    user_id = ?";
                
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param(
                "si",
                $recovery,
                $userId
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }

    }


    public static function getUserByEmail($email) {
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

    public static function saveStudent($data, $file) {
        $data['SPortrait'] = self::savePortrait($file);

        // Adding to user table
        self::addUser($data);

        $data['SID'] = $data['user_id'] = self::getUserByEmail($data['SE_Mail']);

        // Adding to student table
        self::saveStudentInfo($data);

        return true;
    }
    
    public static function saveStudentInfo($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $insertStudentInfoQuery = "INSERT INTO s_info
            (user_id, SID, SPortrait, SName, SReg, email, SMID, Blood_Group_ID, district_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($insertStudentInfoQuery);
        if ($stmt) {
            $stmt->bind_param(
                "iissssiis",
                $data['user_id'],
                $data['SID'],
                $data['SPortrait'],
                $data['SName'],
                $data['SReg'],
                $data['email'],
                $data['SMID'],
                $data['Blood_Group_ID'],
                $data['district_id']
            );
            return $stmt->execute();
        } else {
            die("Inser Query to s_info failed: " . $connection->error);
        }
    }
    
    
    public static function savePortrait($file) {
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
                $targetDir = BASE_DIR . "/app/assets/images/";
                $targetFile = $targetDir . basename($file["name"]);
                if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                    return 'images/' . basename($file["name"]);
                } else {
                    echo "Error moving file to target directory.";
                    return null;
                }
            }
        } else {
            echo "Invalid file";
            return null;
        }
    }
    

}
