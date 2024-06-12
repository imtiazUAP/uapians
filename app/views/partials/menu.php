<div id='cssmenu_new'>
   <ul>
      <?php if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 5) { ?>
         <li><a href='My_Profile.php'><span><img class="menu_my_profile_icon img-responsive img-circle margin"
                     src="<?php echo $userInfo['SPortrait'] ?>" alt="Profile Picture"><span> &nbsp My Profile</span></a></li>
      <?php } ?>
      <?php if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 1) { ?>
         <li><a href='Admin_Control.php'><span>Administration</span></a></li>
      <?php } ?>
      <?php if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 2) { ?>
         <li><a href='My_Profile_Teacher.php'><span><img class="menu_my_profile_icon img-responsive img-circle margin"
                     src="<?php echo $userInfo['Employee_Portrait']; ?>" alt="Profile Picture"><span> &nbsp My Profile</span></a></li>
      <?php } ?>
      <?php if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 3) { ?>
         <li><a href='My_Profile_Staff.php'><span><img class="menu_my_profile_icon img-responsive img-circle margin"
                     src="<?php echo $userInfo['Employee_Portrait']; ?>" alt="Profile Picture"><span> &nbsp My Profile</span></a></li>
      <?php } ?>
      <li><a href="<?= BASE_URL ?>"><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Students</span></a>
         <ul>
            <li class='has-sub'><a href='<?= BASE_URL ?>/student/list?page=0&SMID=1'><span>1st year 1st Semester</span></a>
            </li>
            <li class='has-sub'><a href='<?= BASE_URL ?>/student/list?page=0&SMID=2'><span>1st year 2nd Semester</span></a>
            </li>
            <li class='has-sub'><a href='<?= BASE_URL ?>/student/list?page=0&SMID=3'><span>2nd year 1st Semester</span></a>
            </li>
            <li class='has-sub'><a href='<?= BASE_URL ?>/student/list?page=0&SMID=4'><span>2nd year 2nd Semester</span></a>
            </li>
            <li class='has-sub'><a href='<?= BASE_URL ?>/student/list?page=0&SMID=5'><span>3rd year 1st Semester</span></a>
            </li>
            <li class='has-sub'><a href='<?= BASE_URL ?>/student/list?page=0&SMID=6'><span>3rd year 2nd Semester</span></a>
            </li>
            <li class='has-sub'><a href='<?= BASE_URL ?>/student/list?page=0&SMID=7'><span>4th year 1st Semester</span></a>
            </li>
      </li>
      <li class='has-sub'><a href='<?= BASE_URL ?>/student/list?page=0&SMID=8'><span>4th year 2nd Semester</span></a>
      </li>
      <li class='has-sub'><a href='<?= BASE_URL ?>/student/list?page=0&SMID=9'><span>Ex Students of CSE</span></a>
      </li>
   </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Faculties & Staffs</span></a>
      <ul>
         <li class='has-sub'><a href='Faculty_List.php'><span>Faculty</span></a>
         </li>
         <li class='has-sub'><a href='Staff_List.php'><span>Staff</span></a>
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='Course_List.php'><span>Courses & References</span></a>
      <ul>
         <li class='has-sub'><a href='project_gallery.php'><span>Project Gallery</span></a>
         </li>
         <li class='has-sub'><a href='video_tutorial_gallery.php'><span>Video Tutorials</span></a>
         </li>
         <li class='has-sub'><a href='Course_List.php'><span>Course References</span></a>
         </li>
      </ul>
   </li>
   <li><a href='Blog_List.php'><span>CSE Blog</span></a></li>
   <li><a href='Blood_List.php'><span>Blood Bank</span></a></li>
   <li class='last'><a href='About.php'><span>About</span></a></li>
   </ul>
</div>
<div id='header_banner'>
</div>