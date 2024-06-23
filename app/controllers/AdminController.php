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

    public function addStudent($queryParams)
    {
        $bloodGroups = BloodBank:: getAllBloodGroups(); 
        $bloodDonorYesNo = BloodBank::getBloodDonorYesNo();
        $districts = Student::getAllDistricts();
        $semesters = Student:: getAllSemesters();

        $data = compact('bloodGroups', 'bloodDonorYesNo', 'districts', 'semesters');
        $this->render(
            'admin/add-student.php',
            $data,
            false
        );
    }

    public function saveStudent($queryParams) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'SReg' => $_POST['SReg'],
                'SName' => $_POST['SName'],
                'SMID' => $_POST['SMID'],
                'Blood_Group_ID' => $_POST['Blood_Group_ID'],
                'SE_Mail' => $_POST['email'],
                'SPh_Number' => $_POST['contact'],
                'FB_Link' => $_POST['FB_Link'],
                'password' => $_POST['password'],
                'district_id' => $_POST['district_id']
            ];
    
            $file = $_FILES['file'];
    
            $success = Admin::saveStudent($data, $file);
    
            if ($success) {
                header('Location: ' . BASE_URL . '/admin/signup-review?SReg=' . $data['SReg'] . '&message=This+Profile+is+activated!+Confirmation+Email+Sent!!!+Thank+you');
            } else {
                header('Location: ' . BASE_URL . '/admin/signup-review?SReg=' . $data['SReg'] . '&message=Profile+Activation+Failed');
            }
            exit();
        }
    }

    public function updatePassword()
    {
        $this->render(
            'admin/update-password.php',
            [],
            false
        );
    }

    public function saveNewPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'user_id' => $_POST['user_id'],
                'new_password' => $_POST['new_password']
            ];

            $success = Admin::updatePassword($data);
            if ($success) {
                header('Location: ' . BASE_URL . '/admin/update-password?message=Password+Updated+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/admin/update-password?message=Password+Update+Failed');
            }
            exit();
        }
    }

    public function resetPassword()
    {
        $this->render(
            'admin/reset-password.php',
            [],
            false
        );
    }


    public function resetPasswordConfirm()
    {
        $success = false;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = Admin::getUserByEmail($_POST['email']);
            if ($userId) {
                $randomNumber = date("Y-m-d H:i:s");
                $encrypt = md5($randomNumber * 109 * 19 + $userId);
                $message = "Your password reset link send to your e-mail address.";
                $to = $_POST['email'];
                $subject = "Forget Password";
                $from = 'emtiaj@yahoo.com';
                $body = 'Hi, <br/> <br/>Your Membership ID is ' . $userId . ' <br><br>Click here to reset your password https://localhost/uapians/reset_pass.php?encrypt=' . $encrypt . '&action=reset   <br/> <br/>--<br>UAPians.Net Team<br>Solve your problems.';
                $headers = "From: " . strip_tags($from) . "\r\n";
                $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                Admin:: updateRecovery($encrypt, $userId);
                // TODO: Enable when go live
                // $success = mail($to, $subject, $body, $headers);
                header('location:reset_pass.php?message=confirmation_mail');
            } else {
                header('location:reset_pass.php?message=account_not_found');
            }

            if ($success) {
                header('Location: ' . BASE_URL . '/admin/reset-password?message=confirmation_mail');
            } else {
                header('Location: ' . BASE_URL . '/admin/reset-password?message=account_not_found');
            }
            exit();
        }
    }
    
    

}
