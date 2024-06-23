<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/config/config.php';

class ClubController extends BaseController
{

    public function culturalClubDetail()
    {
        $this->render(
            'club/cultural.php',
            []
        );
    }

    public function programmingClubDetail()
    {
        $this->render(
            'club/programming.php',
            []
        );
    }

    public function researchClubDetail()
    {
        $this->render(
            'club/research.php',
            []
        );
    }

    public function softwareClubDetail()
    {
        $this->render(
            'club/software.php',
            []
        );
    }

    public function sportsClubDetail()
    {
        $this->render(
            'club/sports.php',
            []
        );
    }

    public function webClubDetail()
    {
        $this->render(
            'club/web.php',
            []
        );
    }

}