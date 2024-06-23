<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Course.php';
require_once BASE_DIR . '/app/models/Student.php';
require_once BASE_DIR . '/app/config/config.php';

class CourseController extends BaseController
{
    public function list($queryParams)
    {
        $courseList = Course::getAllCourses();

        $data = compact('courseList');
        $this->render(
            'course/list.php',
            $data
        );
    }

    public function add($queryParams)
    {
        $semesters = Student::getAllSemesters();
        $data = compact('semesters');
        $this->render(
            'course/add.php',
            $data,
            false
        );
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'CCode' => $_POST['CCode'],
                'CName' => $_POST['CName'],
                'SMID' => $_POST['SMID'],
            ];

            $success = Course::courseSave($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/course/add?message=Course+Saved+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/course/add?message=Course+Save+Failed');
            }
            exit();
        }
    }

    public function edit($queryParams)
    {
        $courseInfo = Course::getCourseByCourseId($queryParams['CID']);
        $semesters = Student::getAllSemesters();

        $this->render(
            'course/edit.php',
            compact('courseInfo', 'semesters'),
            false
        );
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'CID' => $_POST['CID'],
                'CName' => $_POST['CName'],
                'CCode' => $_POST['CCode'],
                'SMID' => $_POST['SMID']
            ];

            $success = Course::updateCourse($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/course/edit?CID=' . $data['CID'] . '&message=Course+Updated+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/course/edit?CID=' . $data['CID'] . '&message=Course+Update+Failed');
            }
            exit();
        }
    }

    public function deleteConfirm($queryParams) {
        $courseInfo = Course::getCourseByCourseId($queryParams['CID']);
        $this->render(
            'course/delete.php',
            compact('courseInfo'),
            false
        );

    }
    

    public function deleteExecute()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'CID' => $_POST['CID']
            ];

            $success = Course::deleteCourse($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/course/delete-confirm?CID=' . $data['CID'] . '&message=Course+Deleted+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/course/delete-confirm?CID=' . $data['CID'] . '&message=Course+Delete+Failed');
            }
            exit();
        }
    }

}
