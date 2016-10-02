<?php
include("classes/Authentication.php");
?>
<?php
$strquery = "SELECT SPortrait,username FROM s_info INNER JOIN userinfo ON s_info.SID=userinfo.SID WHERE username='{$b}'";
$results = mysql_query($strquery);
$num = mysql_numrows($results);
$SPortrait = mysql_result($results, $i, "SPortrait");
?>

<?php
$strqueryEmployee = "SELECT Employee_Portrait,username FROM e_info INNER JOIN userinfo ON e_info.SID=userinfo.SID WHERE username='{$b}'";
$resultsEmployee = mysql_query($strqueryEmployee);
$numEmployee = mysql_numrows($resultsEmployee);
$Employee_Portrait = mysql_result($resultsEmployee, $i, "Employee_Portrait");
?>

<div id='cssmenu_new'>
    <ul>
        <?php
        if ($isGeneralStudent && $isLoggedIn) {
            ?>
            <li>
                <a href='student_profile.php?SID=<?= $_SESSION['SID']; ?>'><span><img style="display:inline; width:13px; height:13px; border:1px solid white;" src="<?php echo $SPortrait; ?>" alt="Profile Picture"><span> &nbsp My Profile</span></a>
            </li>
        <?php
        }
        if ($isAdmin && $isLoggedIn) {
            ?>
            <li>
                <a href='administration.php'><span>Administration</span></a>
            </li>
        <?php
        }
        if ($isFaculty && $isLoggedIn) {
            ?>
            <li>
                <a href='my_profile_teacher.php?SID=<?= $_SESSION['SID']; ?>'><span><img style="display:inline; width:13px; height:12px; border:1px solid white;" src="<?php echo $Employee_Portrait; ?>" alt="Profile Picture"><span> &nbsp My Profile</span></a>
            </li>
        <?php
        }
        if ($isStaff && $isLoggedIn) {
            ?>
            <li>
                <a href='my_profile_staff.php?SID=<?= $_SESSION['SID']; ?>'><span><img class="img-responsive img-circle margin" style="display:inline; width:20px; height:20px; border:1px solid white; vertical-align:middle" src="<?php echo $Employee_Portrait; ?>" alt="Profile Picture"><span> &nbsp My Profile</span></a>
            </li>
        <?php
        }
        ?>
        <li>
            <a href='index.php'><span>Home</span></a>
        </li>
        <li class='active has-sub'>
            <a href='#'><span>Students</span></a>
            <ul>
                <li class='has-sub'>
                    <a href='semester_students.php?SMID=1'><span>1st year 1st Semester</span></a>
                </li>
                <li class='has-sub'>
                    <a href='semester_students.php?SMID=2'><span>1st year 2nd Semester</span></a>
                </li>
                <li class='has-sub'>
                    <a href='semester_students.php?SMID=3'><span>2nd year 1st Semester</span></a>
                </li>
                <li class='has-sub'>
                    <a href='semester_students.php?SMID=4'><span>2nd year 2nd Semester</span></a>
                </li>
                <li class='has-sub'>
                    <a href='semester_students.php?SMID=5'><span>3rd year 1st Semester</span></a>
                </li>
                <li class='has-sub'>
                    <a href='semester_students.php?SMID=6'><span>3rd year 2nd Semester</span></a>
                </li>
                <li class='has-sub'>
                    <a href='semester_students.php?SMID=7'><span>4th year 1st Semester</span></a>
                </li>
        </li>
        <li class='has-sub'>
            <a href='semester_students.php?SMID=8'><span>4th year 2nd Semester</span></a>
        </li>
        <li class='has-sub'>
            <a href='semester_students.php?SMID=9'><span>Ex Students of CSE</span></a>
        </li>
    </ul>
    </li>
    <li class='active has-sub'>
        <a href='#'><span>Faculties & Staffs</span></a>
        <ul>
            <li class='has-sub'>
                <a href='faculty_list.php'><span>Faculty</span></a>
            </li>
            <li class='has-sub'>
                <a href='staff_list.php'><span>Staff</span></a>
            </li>
        </ul>
    </li>

    <li class='active has-sub'>
        <a href='course_list.php'><span>Courses & References</span></a>
        <ul>
            <li class='has-sub'>
                <a href='project_gallery.php'><span>Project Gallery</span></a>
            </li>
            <li class='has-sub'>
                <a href='tutorial_gallery.php'><span>Video Tutorials</span></a>
            </li>
            <li class='has-sub'>
                <a href='course_list.php'><span>Course References</span></a>
            </li>
        </ul>
    </li>
    <li>
        <a href='blog_list.php'><span>CSE Blog</span></a>
    </li>
    <li>
        <a href='blood_list.php'><span>Blood Bank</span></a>
    </li>
    <li>
        <a href='about.php'><span>About</span></a>
    </li>
    <?php if ($isLoggedIn) { ?>
    <li class='last'>
        <a href='log_out.php'><span>Sign Out</span></a>
    </li>
    <?php }elseif(!$isLoggedIn){?>
    <li class='last'>
        <a href="login_modal.php?keepThis=true&TB_iframe=true&height=220&width=600&modal=true" title="" class="thickbox">Sign In</a>
        </li>
    <?php } ?>
    </ul>
</div>
<div id='cssmenu' align="center" style="vertical-align:middle">
</div>