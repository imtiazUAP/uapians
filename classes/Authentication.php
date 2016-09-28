<?php
session_start();
include("../dbconnect.php");
$sessionUser = 0;

class Authentication
{
    function isLoggedIn()
    {
        $sessionUser = $_SESSION['username'];
        if ($sessionUser) {
            return true;
        } else {
            return false;
        }
    }

    function isAdmin()
    {

    }

    function isEditor()
    {

    }

    function isCR()
    {

    }

    function isStaff()
    {

    }

    function isStudent()
    {

    }

    function isCurrentStudent()
    {

    }

    function isExStudent()
    {

    }

    function isFaculty()
    {

    }
}

?>