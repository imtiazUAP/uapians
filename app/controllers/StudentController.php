<?php

require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Student.php';
require_once __DIR__ . '/../config/config.php';

class StudentController {
    public function add() {
        // Handle the insertion logic
        include '../views/student/add.php';
    }

    public function list($queryParams) {
        // TODO
        $isAdmin = true;
        $semesterId = $queryParams['SMID'];
        $studentsData = Student::getPaginatedStudentsBySemesterId($semesterId);
        include __DIR__ . '/../views/student/list.php';
    }

    public function profile($queryParams) {
        $studentInfo = Student::getStudentByStudentId($queryParams['SID']);
        include __DIR__ . '/../views/student/profile.php';
    }

    public function edit($queryParams) {
        $studentInfo = Student::getStudentByStudentId($queryParams['SID']);
        $districts = Student::getAllDistricts();
        $semesters = Student::getAllSemesters();
        $bloodGroups = Student::getAllBloodGroups();
        include __DIR__ . '/../views/student/edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'SID' => $_POST['SID'],
                'SName' => $_POST['SName'],
                'SReg' => $_POST['SReg'],
                'SHouse' => $_POST['SHouse'],
                'district_id' => $_POST['district_id'],
                'SPh_Number' => $_POST['SPh_Number'],
                'SE_Mail' => $_POST['SE_Mail'],
                'SB_of_Date' => $_POST['SB_of_Date'],
                'SPortrait' => $_POST['SPortrait'],
                'SMID' => $_POST['SMID'],
                'Blood_Group_ID' => $_POST['Blood_Group_ID'],
                'donor_value' => $_POST['donor_value'],
                'Noted_Activity' => $_POST['Noted_Activity'],
                'School' => $_POST['School'],
                'College' => $_POST['College'],
                'Knows_Programs' => $_POST['Knows_Programs'],
                'Interested_In' => $_POST['Interested_In'],
                'Working_At' => $_POST['Working_At'],
                'FB_Link' => $_POST['FB_Link'],
                'Twitter_Link' => $_POST['Twitter_Link'],
                'Blog' => $_POST['Blog']
            ];

            $success = Student::updateStudent($data);
            
            if ($success) {
                header('Location: '.BASE_URL.'/student/edit?SID=' . $data['SID'] . '&message=Profile+Updated+Successfully');
            } else {
                header('Location: '.BASE_URL.'/student/edit?SID=' . $data['SID'] . '&message=Update+Failed');
            }
            exit();
        }
    }

    // Other CRUD methods
}
