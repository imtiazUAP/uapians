<?php

class Student {
    public static function getAll() {
        $db = new dbClass();
        $query = "SELECT * FROM blogs";
        return $db->query($query);
    }

    // Other CRUD methods
}
