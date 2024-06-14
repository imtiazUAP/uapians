<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Reference.php';
require_once BASE_DIR . '/app/config/config.php';

class ReferenceController extends BaseController
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
        $projectList = Project::getProjectsByCategoryId($queryParams['language_id']);

        $data = compact('projectList');
        $this->render(
            'project/list.php',
            $data
        );
    }

}
