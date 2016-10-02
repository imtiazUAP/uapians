<?php
session_start();
include("../dbconnect.php");

$authentication = new Authentication();
$isLoggedIn = $authentication->isLoggedIn();
$isAdmin = $authentication->isAdmin();
$isEditor = $authentication->isEditor();
//$isLoggedIn = $authentication->isCR();
$isFaculty = $authentication->isFaculty();
$isGeneralStudent = $authentication->isGeneralStudent();
$isCurrentStudent = $authentication->isCurrentStudent();
$isExStudent = $authentication->isExStudent();
$isStaff = $authentication->isStaff();


class Authentication {

    function isLoggedIn()
    {
        $userrole = mysql_query("select userid as user_id, username as user_name, admin as group_id, SID as student_id, Reg as reg_no, SE_Mail as student_email, date as joining_date from userinfo where username='{$_SESSION['username']}'");
        $userdata = mysql_fetch_assoc($userrole);
        $userName = $userdata['user_name'];

        if ($userName) {
            return true;
        } else {
            return false;
        }
    }

    function isAdmin()
    {
        $userrole = mysql_query("select userid as user_id, username as user_name, admin as group_id, SID as student_id, Reg as reg_no, SE_Mail as student_email, date as joining_date from userinfo where username='{$_SESSION['username']}'");
        $userdata = mysql_fetch_assoc($userrole);
        $userName = $userdata['user_name'];
        $groupId = $userdata['group_id'];

        if ($userName && ($groupId==1)) {
            return true;
        } else {
            return false;
        }
    }

    function isEditor()
    {
        $userrole = mysql_query("select userid as user_id, username as user_name, admin as group_id, SID as student_id, Reg as reg_no, SE_Mail as student_email, date as joining_date from userinfo where username='{$_SESSION['username']}'");
        $userdata = mysql_fetch_assoc($userrole);
        $userName = $userdata['user_name'];
        $groupId = $userdata['group_id'];

        if ($userName && ($groupId == 2)) {
            return true;
        } else {
            return false;
        }
    }

    function isCR()
    {

    }

    function isStaff()
    {
        $userrole = mysql_query("select userid as user_id, username as user_name, admin as group_id, SID as student_id, Reg as reg_no, SE_Mail as student_email, date as joining_date from userinfo where SID='{$_SESSION['SID']}'");
        $userdata = mysql_fetch_assoc($userrole);
        $userName = $userdata['user_name'];
        $groupId = $userdata['group_id'];

        if ($userName &&($groupId == 5)) {
            return true;
        } else {
            return false;
        }
    }

    function isGeneralStudent()
    {
        $userrole = mysql_query("select userid as user_id, username as user_name, admin as group_id, SID as student_id, Reg as reg_no, SE_Mail as student_email, date as joining_date from userinfo where SID='{$_SESSION['SID']}'");
        $userdata = mysql_fetch_assoc($userrole);
        $userName = $userdata['user_name'];
        $groupId = $userdata['group_id'];

        if ($userName && ($groupId == 0)) {
            return true;
        } else {
            return false;
        }
    }

    function isCurrentStudent()
    {
        $userrole = mysql_query("select userid as user_id, username as user_name, admin as group_id, s_info.SID as student_id, Reg as reg_no, s_info.SE_Mail as student_email, date as joining_date, SMID as semester_id from userinfo inner join s_info on s_info.SID = userinfo.SID where username='{$_SESSION['username']}'");
        $userdata = mysql_fetch_assoc($userrole);
        $userName = $userdata['user_name'];
        $semesterId = $userdata['semester_id'];

        if ($userName && ($semesterId < 9)) {
            return true;
        } else {
            return false;
        }
    }

    function isExStudent()
    {
        $userrole = mysql_query("select userid as user_id, username as user_name, admin as group_id, s_info.SID as student_id, Reg as reg_no, s_info.SE_Mail as student_email, date as joining_date, SMID as semester_id from userinfo inner join s_info on s_info.SID = userinfo.SID where username='{$_SESSION['username']}'");
        $userdata = mysql_fetch_assoc($userrole);
        $userName = $userdata['user_name'];
        $semesterId = $userdata['semester_id'];

        if ($userName && ($semesterId == 9)) {
            return true;
        } else {
            return false;
        }
    }

    function isFaculty()
    {
        $userrole = mysql_query("select userid as user_id, username as user_name, admin as group_id, SID as student_id, Reg as reg_no, SE_Mail as student_email, date as joining_date from userinfo where SID='{$_SESSION['SID']}'");
        $userdata = mysql_fetch_assoc($userrole);
        $userName = $userdata['user_name'];
        $groupId = $userdata['group_id'];

        if ($userName && ($groupId==4)) {
            return true;
        } else {
            return false;
        }
    }

    function isOwner($userId = 0)
    {
        $userrole = mysql_query("select userid as user_id, username as user_name, admin as group_id, SID as student_id, Reg as reg_no, SE_Mail as student_email, date as joining_date from userinfo where username='{$_SESSION['username']}'");
        $userdata = mysql_fetch_assoc($userrole);
        $studentId = $userdata['student_id'];
        $userName = $userdata['user_name'];

        if ($userName && ($userId == $studentId)) {
            return true;
        } else {
            return false;
        }
    }
}

?>