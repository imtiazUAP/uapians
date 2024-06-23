<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Teacher.php';
require_once BASE_DIR . '/app/config/config.php';

class TeacherController extends BaseController
{
    public function list()
    {
        $teachersList = Teacher::getPaginatedTeachers();
        $data = compact('teachersList');
        $this->render(
            'teacher/list.php',
            $data
        );
    }

    public function profile($queryParams)
    {
        $teacherInfo = Teacher::getTeacherByUserId($queryParams['user_id']);

        $this->render(
            'teacher/profile.php',
            compact('teacherInfo')
        );
    }

    public function edit($queryParams)
    {
        $teacherInfo = Teacher::getTeacherByUserId($queryParams['user_id']);
        $this->render(
            'teacher/edit.php',
            compact('teacherInfo'),
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
                'employee_Qualification' => $_POST['Employee_Qualification'],
                'employee_Experience' => $_POST['Employee_Experience'],
                'employee_Role' => $_POST['Employee_Role'],
                'email' => $_POST['email'],
                'user_id' => (int)$_POST['user_id'],
            ];

            $success = Teacher::updateTeacher($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/teacher/edit?user_id=' . $data['user_id'] . '&message=Profile+Updated+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/teacher/edit?user_id=' . $data['user_id'] . '&message=Profile+Update+Failed');
            }
            exit();
        }
    }

    public function add($queryParams)
    {
        $this->render(
            'teacher/add.php',
            [],
            false
        );
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'ename' => $_POST['EName'],
                'edesignation' => $_POST['EDesignation'],
                'employee_Contact' => $_POST['Employee_Contact'],
                'employee_Speech' => $_POST['Employee_Speech'],
                'employee_Qualification' => $_POST['Employee_Qualification'],
                'employee_Experience' => $_POST['Employee_Experience'],
                'employee_Role' => $_POST['Employee_Role'],
                'email' => $_POST['email'],
                'password' => '123',
            ];

            $success = Teacher::teacherSave($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/teacher/add?message=Teacher+Saved+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/teacher/add?message=Teacher+Save+Failed');
            }
            exit();
        }
    }

    public function deleteConfirm($queryParams) {
        $teacherInfo = Teacher::getTeacherByUserId($queryParams['user_id']);
        $this->render(
            'teacher/delete.php',
            compact('teacherInfo'),
            false
        );

    }
    

    public function deleteExecute()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'user_id' => $_POST['user_id']
            ];

            $success = Teacher::deleteTeacher($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/teacher/delete-confirm?CID=' . $data['CID'] . '&message=Teacher+Deleted+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/teacher/delete-confirm?CID=' . $data['CID'] . '&message=Teacher+Delete+Failed');
            }
            exit();
        }
    }
}
