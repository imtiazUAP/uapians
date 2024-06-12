<?php

require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Home.php';
require_once BASE_DIR . '/app/models/User.php';
require_once __DIR__ . '/../config/config.php';

class HomeController {
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function list() {
        $userInfo = [];
        if (!empty($_SESSION['user_id'])) {
            $userInfo = User::getUserByUserId($_SESSION['user_id']);
        }
        $noticeResults = Home::getAllNotice();
        $newsResults = Home::getAllNews();
        $homePageContents = Home::getHomePageContents();
        foreach($homePageContents as $homePageContent) {
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
        $content = BASE_DIR . '/app/views/home/home.php';
        include BASE_DIR . '/app/views/layouts/layout.php';
    }

}
