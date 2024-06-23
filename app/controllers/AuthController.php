<?php
require_once BASE_DIR . '/app/config/config.php';
class AuthController
{
    public function logOut()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: '.BASE_URL);
    }
}
?>