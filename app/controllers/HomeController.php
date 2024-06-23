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
        $noticeInfo = Home::getNoticeInfo();
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

        $data = compact('noticeInfo', 'newsResults', 'introTitle', 'intro', 'missionTitle', 'mission', 'aboutTitle', 'about');
        $this->render('home/home.php', $data);
    }

    public function edit($queryParams)
    {
        $noticeInfo = Home::getNoticeInfo();

        $this->render(
            'home/notice-edit.php',
            compact('noticeInfo'),
            false
        );
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'Notice_ID' => $_POST['notice_id'],
                'Notice' => $_POST['notice'],
            ];

            $success = Home::updateNotice($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/notice/edit?notice_id=' . $data['Notice_ID'] . '&message=Notice+Updated+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/notice/edit?notice_id=' . $data['Notice_ID'] . '&message=Notice+Update+Failed');
            }
            exit();
        }
    }

    public function newsAdd($queryParams)
    {
        $this->render(
            'home/news-add.php',
            [],
            false
        );
    }

    public function newsSave()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'news_hints' => $_POST['news_hints'],
                'news_link' => $_POST['news_link']
            ];

            $success = Home::newsSave($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/news/add?message=News+Saved+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/news/add?message=News+Save+Failed');
            }
            exit();
        }
    }

    public function newsEdit($queryParams)
    {
        $newsInfo = Home::getNewsByNewsId($queryParams['news_id']);

        $this->render(
            'home/news-edit.php',
            compact('newsInfo'),
            false
        );
    }

    public function newsUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'news_id' => $_POST['news_id'],
                'news_hints' => $_POST['news_hints'],
                'news_link' => $_POST['news_link']
            ];

            $success = Home::updateNews($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/news/edit?news_id=' . $data['news_id'] . '&message=News+Updated+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/news/edit?news_id=' . $data['news_id'] . '&message=News+Update+Failed');
            }
            exit();
        }
    }

    public function newsDeleteConfirm($queryParams) {
        $newsInfo = Home::getNewsByNewsId($queryParams['news_id']);
        $this->render(
            'home/news-delete.php',
            compact('newsInfo'),
            false
        );

    }
    

    public function newsDeleteExecute()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'news_id' => $_POST['news_id']
            ];

            $success = Home::deleteNews($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/news/delete-confirm?news_id=' . $data['news_id'] . '&message=News+Deleted+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/news/delete-confirm?news_id=' . $data['news_id'] . '&message=News+Delete+Failed');
            }
            exit();
        }
    }
}
