<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
    include_once("page.inc.php");
    $b = $_SESSION['username'];
    $userrole = mysql_query("select * from userinfo where username='{$b}'");
    $userdata = mysql_fetch_assoc($userrole);
    ?>
<html>
<head>
    <?php
    include("header.php");
    ?>
</head>
<body>
<div id="grad1">
    <div class="bodydiv">
        <?php
        include("logo.php");
        ?>
        <div class="realbody" style="min-height:2300px">
            <?php
            include("menu.php");
            ?>
            <div id="wowslider-container1" style="height:200px">
                <?php
                include("slider1.php");
                ?>
            </div>
            <div id="content">
                <div id="colOne">
                    <?php
                    include("sidebar.php");
                    ?>
                </div>
                <div id="margin_figure">
                    <div>
                        <div id="paragraph_head">
                            <h1 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">
                                Software and Hardware Club</h1>
                        </div>
                        <p align="left" style="font-size:16; font-weight:bold">Aim:....</p>

                        <p align="left">The aim of the Club is to develop and improve student skills through the
                            developments of various Software and Hardware projects regularly.
                            <br>
                            The Club will collect and preserve all the academic projects (current and previous ones)
                            developed by the students of the department that include Term Projects, Lab Projects,
                            Research Projects etc. and will work on the ones selected by the Executive Body on their
                            modifications and further developments as necessary to make them market/international
                            standards. The Club will also work on the development of new projects with the help of
                            the member students.
                            <br>
                            <br>
                            The Club will arrange at least one Software Fair per year with the developed projects.
                            Through this, it aims to
                            <br>
                            Give the students of the department the exposure to the outside world and the job market
                            presenting their developed projects before the various Firms and Organizations.
                            <br>
                            Enhance the University image in education sector.
                            <br>
                            Introduce students before the latest and more recent technologies in the market.
                        </p>
                    </div>
                    <br>
                    <br>
                    <div>
                        <div id="paragraph_head">
                            <h1 align="left"
                                style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ; text-decoration:blink">
                                UAP Software & Hardware Club initiated several programs to achieve its goal. Till
                                now the club organized the following events</h1>
                        </div>
                        <p>Three-day workshop on C and C++ before mid term examination of Fall – 2002 in order to
                            help junior students to strengthen their knowledge in programming language.
                            <br>
                            Software & Hardware Fair on CSE – DAY 2003.
                            <br>
                            Oracle Certified Programmer (OCP) training course to make students more competitive in
                            job market.</p>
                    </div>
                    <br>
                    <br>
                    <div>
                        <div id="paragraph_head">
                            <h1 align="left" style="color:#FFFFFF">Activities</h1>
                        </div>
                        <p align="left" style="font-size:16; font-weight:bold"> Software & Hardware Fair on CSE –
                            DAY 2003:
                        </p>
                        <p align="left">
                            UAP Software & Hardware Club organized a successful Software & Hardware Fair on 29th
                            June’03 to mark CSE – DAY 2003. There were thirty-three outstanding projects developed
                            by students and supervised under the guidance of UAP Software & Hardware Club. Our
                            honorable Foundation Member Fazle Hussein Bhuiyan, Registrar Dr. Abu Sayeed Mustaque
                            Ahmed and Head CSE M. Fayyaz Khan inaugurated the fair. The club invited three judges.
                            They are Md. Yunus Ali, Md. Monowar Hafiz and Md. Sohel Rahman, from Bangladesh
                            University of Engineering & Technology (BUET). They selected three best projects as
                            first, second and third, and the club awarded those students with prizes. The club
                            invited all UAP teachers, officers, media peoples and experts from software industries.
                            After the fair a press release was issued which was published in leading dailies and IT
                            magazines.
                        </p>
                    </div>
                    <br>
                    <br>
                    <div>
                        <div id="paragraph_head">
                            <h1 align="left" style="color:#FFFFFF">Forthcoming Activities:</h1>
                        </div>
                        <p align="left" style="font-size:16; font-weight:bold">
                            Upcoming Activities of Software & Hardware Club....
                        </p>
                        <p align="left">In future the Club will provide internship facilities to students. The
                            students will have the opportunity to gain valuable work experience in local and
                            international projects under the supervision of leading software companies of our
                            country. The Club also aims to arrange a nation wide ‘Inter University Software &
                            Hardware Fair’ once in a year.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php include("footer.php");
            ?>
        </div>
</body>
</html>