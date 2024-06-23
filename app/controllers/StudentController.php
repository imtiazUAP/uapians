<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Student.php';
require_once BASE_DIR . '/app/models/BloodBank.php';
require_once BASE_DIR . '/app/config/config.php';

class StudentController extends BaseController
{
    public function list($queryParams)
    {
        $semesterId = !empty($queryParams['SMID']) ? $queryParams['SMID'] : 0;
        $studentsList = Student::getPaginatedStudentsBySemesterId($semesterId);

        $data = compact('semesterId', 'studentsList');
        $this->render(
            'student/list.php',
            $data
        );
    }

    public function signUp() {
        $districts = Student::getAllDistricts();
        $semesters = Student::getAllSemesters();
        $bloodGroups = BloodBank::getAllBloodGroups();
        $bloodDonorYesNo = BloodBank::getBloodDonorYesNo();

        $this->render(
            'student/sign-up.php',
            compact('districts', 'semesters', 'bloodGroups', 'bloodDonorYesNo')
        );
    }

    public function signUpSave() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'reg' => $_POST['reg'],
                'name' => $_POST['name'],
                'SMID' => $_POST['SMID'],
                'Blood_Group_ID' => $_POST['Blood_Group_ID'],
                'donor_value' => $_POST['donor_value'],
                'district_id' => $_POST['district_id'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];
    
            $file = $_FILES['file'];
    
            $success = Student::signUpSave($data, $file);
    
            if ($success) {
                header('Location: ' . BASE_URL . '/student/sign-up?message=Signup+Successful!!!+Thank+you');
            } else {
                header('Location: ' . BASE_URL . '/student/sign-up?message=Signup+Failed');
            }
            exit();
        }
    }

    public function profile($queryParams)
    {
        $studentInfo = Student::getStudentByStudentId($queryParams['SID']);

        $this->render(
            'student/profile.php',
            compact('studentInfo')
        );
    }

    public function edit($queryParams)
    {
        $studentInfo = Student::getStudentByStudentId($queryParams['SID']);
        $districts = Student::getAllDistricts();
        $semesters = Student::getAllSemesters();
        $bloodGroups = BloodBank::getAllBloodGroups();

        $this->render(
            'student/edit.php',
            compact('studentInfo', 'districts', 'semesters', 'bloodGroups'),
            false
        );
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'SID' => $_POST['SID'],
                'SName' => $_POST['SName'],
                'SReg' => $_POST['SReg'],
                'SHouse' => $_POST['SHouse'],
                'district_id' => $_POST['district_id'],
                'SPh_Number' => $_POST['SPh_Number'],
                'email' => $_POST['email'],
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
                header('Location: ' . BASE_URL . '/student/edit?SID=' . $data['SID'] . '&message=Profile+Updated+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/student/edit?SID=' . $data['SID'] . '&message=Profile+Update+Failed');
            }
            exit();
        }
    }

    public function filterDistrict($queryParams)
    {
        $districtId = !empty($queryParams['district_id']) ? $queryParams['district_id'] : 0;
        $selectedDistrictId = $districtId;
        $studentsList = Student::getPaginatedStudentsByDistrictId($districtId);
        $allDistricts = Student::getAllDistricts();

        $data = compact('districtId', 'selectedDistrictId', 'studentsList', 'allDistricts');
        $this->render(
            'student/filter-district.php',
            $data
        );
    }
}
