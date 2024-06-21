<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Tutorial.php';
require_once BASE_DIR . '/app/config/config.php';

class TutorialController extends BaseController
{
    public function category($queryParams)
    {
        $this->render(
            'tutorial/category.php',
            []
        );
    }

    public function list($queryParams)
    {
        $tutorialList = Tutorial::getTutorialsByCategoryId($queryParams['category_id']);

        $data = compact('tutorialList');
        $this->render(
            'tutorial/list.php',
            $data
        );
    }

    public function add() {
        $categories = Utilities:: getTutorialCategories();

        $this->render(
            'tutorial/add.php',
            compact('categories'),
            false
        );
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'tutorial_name' => $_POST['tutorial_name'],
                'tutorial_link' => $_POST['tutorial_link'],
                'category_id' => $_POST['category_id'],
                'added_by' => $_POST['added_by'],
            ];
    
            $file = $_FILES['file'];
    
            $success = Tutorial::tutorialSave($data, $file);
    
            if ($success) {
                header('Location: ' . BASE_URL . '/tutorial/add?message=Tutorial+Upload+Successful!+Thank+you');
            } else {
                header('Location: ' . BASE_URL . '/tutorial/add?message=Tutorial+Upload+Failed');
            }
            exit();
        }
    }

}
