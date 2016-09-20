<div class="box">
    <br>
    <br>
    <div style="text-decoration:none;font-size:18px; color:#FFFFFF; font-weight:bold">You are Logged in as
        <span
            style="font-style: italic; font-size: 24px">...
            <?php
            print $_SESSION['username']
            ?>
        </span>
    </div>
    <br>
    <?php
    if (($userdata[admin] == '3')) {
    ?>
        <br>
        <a href='sendmail1.php'>Send Email</a>
        <br>
    <?php
    }
    ?>
    <button class="button button_red" onclick="window.open('Log_Out.php','_top')"> Log Out
    </button>
    <br>
    <br>
    <div id="paragraph_head">
        <h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif;">Academic Aspects</h3>
    </div>
    <ul class="bottom">
        <li><a href="employee_list.php">Teachers</a></li>
        <li><a href="student_list.php">Students</a></li>
        <li><a href="course_list.php">Courses</a></li>
        <li><a href="mark_list.php">Results</a></li>
        <li><a href="reference_list_all.php">References</a>
        </li>
    </ul>
</div>
<br>
<br>
<div class="box">
    <div id="paragraph_head">
        <h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Clubs & Social Works</h3>
    </div>
    <ul class="bottom">
        <li><a href="galary.php">Gallery</a></li>
        <li><a href="blood_list.php">Blood Bank</a></li>
        <li><a href="districtwise_students.php">Who is from my District</a></li>
        <li><a href="programing_contest_club.php">Programming Contest Club</a></li>
        <li><a href="research_publication_club.php">Research and Publication Club</a></li>
        <li><a href="sports_club.php">Sports Club</a></li>
        <li><a href="software_hardware_club.php">Software and Hardware Club</a></li>
        <li><a href="cultural_club.php">Cultural and Debating Club</a></li>
        <li><a href="web_club.php">Web Club</a></li>
        <li><a href="message_to_friend.php">Send a Message...</a></li>
    </ul>
</div>
<br>
<br>
<div class="box">
    <div id="paragraph_head">
        <h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Admin Panel</h3>
    </div>
    <ul>
        <a href="admin_nokib.php">
            <li><img src="images/1234554321.jpg" style="width:238px "/> Nokib Mozumder</li>
        </a>
        <p class="bottom">Phone:01670756503
            E_Mail:nokib016@gmail.com
        </p>
        <li><a href="https://www.facebook.com/nokib.mozumder" target="_blank">Find me on facebook</a></li>
        <li><a href="message_to_admin.php">Send him a Message</a></li>
        <?php
        if (($userdata[admin] == '1')) {
        ?>
            <li><a href="messages_admin.php"> My Messages</a></li>
        <?php
        }
        ?>
        <br>
        <a href="admin_jihan.php">
            <li><img src="images/Picture 2963.jpg" style="width:238px "/>MD. Mazharul islam jihan</li>
        </a>
        <p class="bottom">Phone:+8801752512666
            E_Mail:jihanislam007@gmail.com</p>
        <li><a href="https://www.facebook.com/mazaharulislam.jihan">Find him on facebook</a></li>
        <li><a href="message_to_admin.php">Send him a Message</a></li>
        <?php
        if (($userdata[admin] == '1')) {
            ?>
            <li><a href="messages_admin.php"> My Messages</a></li>
        <?php
        }
        ?>
    </ul>
</div>
<br>
<br>
<div class="box">
    <div id="paragraph_head">
        <h3 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">Contact Us</h3>
    </div>
    <p class="bottom">For any query, or any Information contact with us... <br> Student Management Tools,
        University of Asia Pacific
        Phone:+8801720 - 613 683
        E_Mail:emtiaj@yahoo.com
    </p>
    <li style="list-style: none"><a href="http://www.emtiaj.blogspot.com" target="_blank">www.emtiaj.blogspot.com</a></li>
</div>
<br>
<div class="fb-like-box" data-href="https://www.facebook.com/pages/UAPIANSNet/1452237808341753?ref=hl" data-width="238"
     data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false"
     data-show-border="true"></div>