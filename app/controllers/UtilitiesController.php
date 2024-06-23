<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Blog.php';
require_once BASE_DIR . '/app/config/config.php';

class UtilitiesController extends BaseController
{

    public function aboutPage()
    {
        $this->render(
            'utilities/about.php',
            []
        );
    }

}
