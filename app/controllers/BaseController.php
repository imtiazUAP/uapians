<?php

require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Home.php';
require_once BASE_DIR . '/app/models/User.php';
require_once BASE_DIR . '/app/config/config.php';

class BaseController
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    protected function render($view, $data = [], $includeLayout = true)
    {
        // Extract passed data
        extract($data);

        // Including user data
        $userInfo = [];
        if (!empty($_SESSION['user_id'])) {
            $userInfo = User::getUserByUserId($_SESSION['user_id']);
        }

        // Including admin info
        $adminInfo = User::getAdminInfo();

        if ($includeLayout) {
            // rendering with the layout
            $content = BASE_DIR . '/app/views/' . $view;
            include BASE_DIR . '/app/views/layouts/layout.php';
        } else {
            // rendering only passed view
            include BASE_DIR . '/app/views/' . $view;
        }
    }
}
