<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Staff.php';
require_once BASE_DIR . '/app/config/config.php';

class StaffController extends BaseController
{
    public function list()
    {
        $staffsList = Staff::getPaginatedStaffs();
        $data = compact('staffsList');
        $this->render(
            'staff/list.php',
            $data
        );
    }

    public function profile($queryParams)
    {
        $staffInfo = Staff::getStaffByUserId($queryParams['user_id']);

        $this->render(
            'staff/profile.php',
            compact('staffInfo')
        );
    }

    public function edit($queryParams)
    {
        $staffInfo = Staff::getStaffByUserId($queryParams['user_id']);
        $this->render(
            'staff/edit.php',
            compact('staffInfo'),
            false
        );
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'ename' => $_POST['EName'],
                'edesignation' => $_POST['EDesignation'],
                'employee_Contact' => $_POST['Employee_Contact'],
                'employee_Speech' => $_POST['Employee_Speech'],
                'employee_Role' => $_POST['Employee_Role'],
                'email' => $_POST['email'],
                'user_id' => (int)$_POST['user_id'],
            ];

            $success = Staff::updateStaff($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/staff/edit?user_id=' . $data['user_id'] . '&message=Profile+Updated+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/staff/edit?user_id=' . $data['user_id'] . '&message=Profile+Update+Failed');
            }
            exit();
        }
    }
}
