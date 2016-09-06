    <?php
       error_reporting(0);
    ?>
    <?php
            $strquery="SELECT SPortrait,username FROM s_info INNER JOIN userinfo ON s_info.SID=userinfo.SID WHERE username='{$b}'";
            $results=mysql_query($strquery);
            $num=mysql_numrows($results);
            $SPortrait=mysql_result($results,$i,"SPortrait");
            $username=mysql_result($results,$i,"username");
    ?>

    <?php
                $strquery="SELECT Employee_Portrait,username FROM e_info INNER JOIN userinfo ON e_info.SID=userinfo.SID WHERE username='{$b}'";
                $results=mysql_query($strquery);
                $num=mysql_numrows($results);

                $Employee_Portrait=mysql_result($results,$i,"Employee_Portrait");
                $username=mysql_result($results,$i,"username");
    ?>

<div id='cssmenu_new'>


    <ul>


					<?php
					     if ($userdata[admin] == '0') {
					?>

                    <li><a href='my_profile.php'><span><img  style="display:inline; width:13px; height:13px; border:1px solid white;" src="<?php echo $SPortrait; ?>" alt="Profile Picture"><span> &nbsp My Profile</span></a></li>

                     <?php
					    }
	 				?>
					
					
				    <?php
					    if ($userdata[admin] == '1') {
					?>

                    <li><a href='administration.php'><span>Administration</span></a></li>
					<?php
					    }
	 				?>
					
					
					
					
					<?php
					    if ($userdata[admin] == '4') {
					?>
		
                       <li><a href='my_profile_teacher.php'><span><img class="img-responsive img-circle margin" style="display:inline; width:20px; height:20px; border:1px solid white;" src="<?php echo $Employee_Portrait; ?>" alt="Profile Picture"><span> &nbsp My Profile</span></a></li>
					<?php
					}
	 				?>
					
					<?php
					   if ($userdata[admin] == '5') {
					?>
                       <li><a href='my_profile_staff.php'><span><img class="img-responsive img-circle margin" style="display:inline; width:20px; height:20px; border:1px solid white; vertical-align:middle"src="<?php echo $Employee_Portrait; ?>" alt="Profile Picture"><span> &nbsp My Profile</span></a></li>
					<?php
					}
	 				?>

   <li><a href='home.php'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Students</span></a>
      <ul>
         <li class='has-sub'><a href='semester_students.php?SMID=1'><span>1st year 1st Semester</span></a>
         </li>
         <li class='has-sub'><a href='semester_students.php?SMID=2'><span>1st year 2nd Semester</span></a>
         </li>
		          <li class='has-sub'><a href='semester_students.php?SMID=3'><span>2nd year 1st Semester</span></a>
         </li>
		          <li class='has-sub'><a href='semester_students.php?SMID=4'><span>2nd year 2nd Semester</span></a>
         </li>
		          <li class='has-sub'><a href='semester_students.php?SMID=5'><span>3rd year 1st Semester</span></a>
         </li>
		          <li class='has-sub'><a href='semester_students.php?SMID=6'><span>3rd year 2nd Semester</span></a>
         </li>
		          <li class='has-sub'><a href='semester_students.php?SMID=7'><span>4th year 1st Semester</span></a>
         </li>
		          </li>
		          <li class='has-sub'><a href='semester_students.php?SMID=8'><span>4th year 2nd Semester</span></a>
         </li>
		 <li class='has-sub'><a href='semester_students.php?SMID=9'><span>Ex Students of CSE</span></a>
         </li>
      </ul>
   </li>
      <li class='active has-sub'><a href='#'><span>Faculties & Staffs</span></a>
      <ul>
         <li class='has-sub'><a href='faculty_list.php'><span>Faculty</span></a>
         </li>
         <li class='has-sub'><a href='staff_list.php'><span>Staff</span></a>
         </li>
      </ul>
   </li>
   
        <li class='active has-sub'><a href='course_list.php'><span>Courses & References</span></a>
              <ul>
                     <li class='has-sub'><a href='project_gallery.php'><span>Project Gallery</span></a>
                     </li>
                     <li class='has-sub'><a href='tutorial_gallery.php'><span>Video Tutorials</span></a>
                     </li>
                     <li class='has-sub'><a href='course_list.php'><span>Course References</span></a>
                     </li>
              </ul>
        </li>
           <li><a href='blog_list.php'><span>CSE Blog</span></a></li>
           <li><a href='blood_list.php'><span>Blood Bank</span></a></li>
           <li class='last'><a href='about.php'><span>About</span></a></li>
</ul>
</div>
	<div id='cssmenu' align="center" style="vertical-align:middle">
	</div>