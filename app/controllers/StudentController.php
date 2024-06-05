<?php

require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Student.php';

class StudentController {
    public function insert() {
        // Handle the insertion logic
        include '../views/student/insert.php';
    }

    public function list() {
        $students = Student::getAll();
        include '../views/student/list.php';
    }

    // Other CRUD methods
}
