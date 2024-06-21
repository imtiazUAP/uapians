<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Reference.php';
require_once BASE_DIR . '/app/models/Student.php';
require_once BASE_DIR . '/app/models/Course.php';
require_once BASE_DIR . '/app/config/config.php';

class ReferenceController extends BaseController
{

    public function list($queryParams)
    {
        $referenceList = Reference::getReferencesByCourseId($queryParams['CID']);

        $data = compact('referenceList');
        $this->render(
            'reference/list.php',
            $data
        );
    }

    public function add($queryParams)
    {
        $selectedSemesterId = !empty($queryParams['SMID']) ? $queryParams['SMID'] : 0;
        $selectedCourseId = !empty($queryParams['CID']) ? $queryParams['CID'] : 0;
        $semesters = Student::getAllSemesters();
        $courses = Course::getAllCourses();
        $data = compact('semesters', 'courses', 'selectedSemesterId', 'selectedCourseId');
        $this->render(
            'reference/add.php',
            $data,
            false
        );
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'CID' => $_POST['CID'],
                'SMID' => $_POST['SMID'],
                'Detail' => $_POST['Detail'],
                'Reference_Link' => $_POST['Reference_Link'],
                'user_id' => $_POST['user_id'],
            ];

            $success = Reference::referenceSave($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/reference/add?message=Reference+Saved+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/reference/add?message=Reference++Save+Failed');
            }
            exit();
        }
    }

    public function edit($queryParams)
    {
        $referenceInfo = Reference::getReferenceByReferenceId($queryParams['ref_id']);
        $semesters = Student::getAllSemesters();
        $courses = Course::getAllCourses();

        $this->render(
            'reference/edit.php',
            compact('referenceInfo', 'semesters', 'courses'),
            false
        );
    }

    public function update($queryParams)
    {
        $refId = !empty($queryParams['ref_id']) ? $queryParams['ref_id'] : 0;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'CID' => $_POST['CID'],
                'SMID' => $_POST['SMID'],
                'Detail' => $_POST['Detail'],
                'Reference_Link' => $_POST['Reference_Link'],
                'user_id' => $_POST['user_id'],
                'ref_id' => $refId,
            ];

            $success = Reference::updateReference($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/reference/edit?ref_id=' . $data['ref_id'] . '&message=Reference+Updated+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/reference/edit?ref_id=' . $data['ref_id'] . '&message=Reference+Update+Failed');
            }
            exit();
        }
    }

    public function deleteConfirm($queryParams) {
        $referenceInfo = Reference::getReferenceByReferenceId($queryParams['ref_id']);
        $this->render(
            'reference/delete.php',
            compact('referenceInfo'),
            false
        );

    }
    

    public function deleteExecute()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'ref_id' => $_POST['ref_id']
            ];

            $success = Reference::deleteReference($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/reference/delete-confirm?ref_id=' . $data['ref_id'] . '&message=Reference+Deleted+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/reference/delete-confirm?ref_id=' . $data['ref_id'] . '&message=Reference+Delete+Failed');
            }
            exit();
        }
    }

}
