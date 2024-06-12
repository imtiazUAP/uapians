<?php

require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Home.php';
require_once BASE_DIR . '/app/models/User.php';
require_once BASE_DIR . '/app/config/config.php';
require_once BASE_DIR . '/app/controllers/BaseController.php';

class HomeController extends BaseController
{
    public function list()
    {
        $noticeResults = Home::getAllNotice();
        $newsResults = Home::getAllNews();
        $homePageContents = Home::getHomePageContents();

        $introTitle = $intro = $missionTitle = $mission = $aboutTitle = $about = '';
        foreach ($homePageContents as $homePageContent) {
            if ($homePageContent['content_name'] == 'intro') {
                $introTitle = $homePageContent['content_title'];
                $intro = $homePageContent['content'];
            }
            if ($homePageContent['content_name'] == 'mission') {
                $missionTitle = $homePageContent['content_title'];
                $mission = $homePageContent['content'];
            }
            if ($homePageContent['content_name'] == 'about') {
                $aboutTitle = $homePageContent['content_title'];
                $about = $homePageContent['content'];
            }
        }

        $data = compact('noticeResults', 'newsResults', 'introTitle', 'intro', 'missionTitle', 'mission', 'aboutTitle', 'about');
        $this->render('home/home.php', $data);
    }
}
