<?php

require_once BASE_DIR . '/app/helpers/dbConnect.php';
// require_once BASE_DIR . '/app/models/Home.php';

class HomeController {
    // public function insert() {
    //     // Handle the insertion logic
    //     include '../views/student/insert.php';
    // }

    public function list() {
        // $students = Student::getAll();
        include __DIR__ . '/../views/home/home.php';
    }

    // Other CRUD methods
}
