<?php

require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Student.php';

class StudentController {
    public function insert() {
        // Handle the insertion logic
        include '../views/student/insert.php';
    }

    public function list() {
        // $students = Student::getAll();
        include __DIR__ . '/../views/student/semester_students.php';
    }

    public function profile() {
        // $students = Student::getAll();
        include __DIR__ . '/../views/student/profile.php';
    }

    // Other CRUD methods
}
