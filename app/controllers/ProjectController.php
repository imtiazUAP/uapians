<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Project.php';
require_once BASE_DIR . '/app/models/Utilities.php';
require_once BASE_DIR . '/app/config/config.php';

class ProjectController extends BaseController
{
    public function category($queryParams)
    {
        $this->render(
            'project/category.php',
            []
        );
    }

    public function list($queryParams)
    {
        $projectList = Project::getProjectsByCategoryId($queryParams['category_id']);

        $data = compact('projectList');
        $this->render(
            'project/list.php',
            $data
        );
    }

    public function add() {
        $categories = Utilities:: getProjectCategories();

        $this->render(
            'project/add.php',
            compact('categories'),
            false
        );
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'project_name' => $_POST['project_name'],
                'platform_name' => $_POST['platform_name'],
                'category_id' => $_POST['category_id'],
                'project_link' => $_POST['project_link'],
                'user_id' => $_POST['user_id'],
            ];
    
            $file = $_FILES['file'];
    
            $success = Project::projectSave($data, $file);
    
            if ($success) {
                header('Location: ' . BASE_URL . '/project/add?message=Project+Upload+Successful!+Thank+you');
            } else {
                header('Location: ' . BASE_URL . '/project/add?message=Project+Upload+Failed');
            }
            exit();
        }
    }

}
