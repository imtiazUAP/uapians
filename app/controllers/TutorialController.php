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

}
