<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class Student {
    public static function getStudentByStudentId($studentId)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT *,SMName,Blood_Group_Name,district_name FROM s_info INNER JOIN sm_info ON s_info.SMID=sm_info.SMID 
						INNER JOIN
						blood_group_info
						ON
						s_info.Blood_Group_ID=blood_group_info.Blood_Group_ID INNER JOIN districts ON s_info.district_id=districts.district_id WHERE user_id=?";
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

    
    public static function getPaginatedStudentsBySemesterId($semesterId) {
        $totalStudents = self::getStudentsCountBySemesterId($semesterId);
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT user_id, SID, SName, SReg, SPortrait, SMName FROM s_info INNER JOIN sm_info ON s_info.SMID = sm_info.SMID WHERE s_info.SMID = '" . $semesterId . "' order by SReg";
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

    public static function updateStudent($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE s_info SET 
                SName=?, 
                SReg=?, 
                SHouse=?, 
                district_id=?, 
                SPh_Number=?,

                email=?, 
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

                $data['email'],
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

    public static function signUpSave($data, $file) {
        $data['SPortrait'] = self::savePortrait($file);

        // Adding to student table
        return self::saveSignUpInfo($data);
    }
    
    public static function saveSignUpInfo($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();

        $sql = "INSERT INTO sign_up
            (SPortrait, SName, SReg, district_id, SE_Mail, SMID, Blood_Group_ID, donor_value, password)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        if ($stmt) {
            $stmt->bind_param(
                "sssisiiis",
                $data['SPortrait'],
                $data['name'],
                $data['reg'],
                $data['district_id'],
                $data['email'],
                $data['SMID'],
                $data['Blood_Group_ID'],
                $data['donor_value'],
                $data['password']
                
            );
            return $stmt->execute();
        } else {
            die("Inser Query to s_info failed: " . $connection->error);
        }
    }
    
    
    public static function savePortrait($file) {
        $post_photo = $file['name'];
        $post_photo_tmp = $file['tmp_name'];
        $ext = pathinfo($post_photo, PATHINFO_EXTENSION);  // getting image extension 
        if ($ext == 'png' || $ext == 'PNG' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'gif' || $ext == 'GIF') {
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG') {
                $src = imagecreatefromjpeg($post_photo_tmp);
            }
            if ($ext == 'png' || $ext == 'PNG') {
                $src = imagecreatefrompng($post_photo_tmp);
            }
            if ($ext == 'gif' || $ext == 'GIF') {
                $src = imagecreatefromgif($post_photo_tmp);
            }
            list($width_min, $height_min) = getimagesize($post_photo_tmp); // fetching original image width and height
            $newwidth_min = 350; // set compressing image width
            $newheight_min = ($height_min / $width_min) * $newwidth_min; // equation for compressed image height
            $tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min); // create frame  for compress image
            imagecopyresampled($tmp_min, $src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min); // compressing image
            $newfilename = round(microtime(true)) . '.' . $ext; // creating a new file name as 2 photo can not be with same name
            imagejpeg($tmp_min, BASE_DIR."/app/assets/images/" . $newfilename, 80); //copy image in folder//
            return 'images/' . $newfilename; // new name with path to save in database
        } else {
            return false;
        }
    }

}
