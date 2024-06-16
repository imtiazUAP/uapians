<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Admin.php';
require_once BASE_DIR . '/app/models/BloodBank.php';
require_once BASE_DIR . '/app/models/Student.php';
require_once BASE_DIR . '/app/config/config.php';

class AdminController extends BaseController
{
    public function signUpList($queryParams)
    {
        $signUpStudents = Admin::getSignUpStudents();

        $data = compact('signUpStudents');
        $this->render(
            'admin/list.php',
            $data
        );
    }

    public function signUpReview($queryParams)
    {
        $signUpStudent = Admin::getSignUpStudentByRegistrationId($queryParams['SReg']);
        $bloodGroups = BloodBank:: getAllBloodGroups(); 
        $bloodDonorYesNo = BloodBank::getBloodDonorYesNo();
        $districts = Student::getAllDistricts();
        $semesters = Student:: getAllSemesters();

        $data = compact('signUpStudent', 'bloodGroups', 'bloodDonorYesNo', 'districts', 'semesters');
        $this->render(
            'admin/signup-review.php',
            $data,
            false
        );
    }

    public function signUpApprove($queryParams)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $signUpStudent = Admin::getSignUpStudentByRegistrationId($queryParams['SReg']);
            $data = [
                'SID' => $signUpStudent['SID'],
                'SPortrait' => $signUpStudent['SPortrait'],
                'SName' => $signUpStudent['SName'],
                'SReg' => $signUpStudent['SReg'],
                'district_id' => $signUpStudent['district_id'],
                'SE_Mail' => $signUpStudent['SE_Mail'],
                'SMID' => $signUpStudent['SMID'],
                'Blood_Group_ID' => $signUpStudent['Blood_Group_ID'],
                'donor_value' => $signUpStudent['donor_value'],
                'password' => $signUpStudent['password']
            ];

            $success = Admin::signUpApprove($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/admin/signup-review?SReg=' . $data['SReg'] . '&message=This+Profile+is+activated!+Confirmation+Email+Sent!!!+Thank+you');
            } else {
                header('Location: ' . BASE_URL . '/admin/signup-review?SReg=' . $data['SReg'] . '&message=Profile+Activation+Failed');
            }
            exit();
        }
    }

    public function deleteConfirmSignup($queryParams) {
        $signUpStudent = Admin::getSignUpStudentByRegistrationId($queryParams['SReg']);
        $this->render(
            'admin/signup-delete.php',
            compact('signUpStudent'),
            false
        );

    }
    

    public function deleteExecuteSignup()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'SReg' => $_POST['SReg']
            ];

            $success = Admin::deleteSignUp($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/admin/signup-delete-confirm?SReg=' . $data['SReg'] . '&message=Signup+Deleted+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/admin/signup-delete-confirm?SReg=' . $data['SReg'] . '&message=Signup+Delete+Failed');
            }
            exit();
        }
    }

}
