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
                    <?php include("slider1.php");
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
                                    Sports Club</h1>
                            </div>
                            <p align="left" style="font-size:16; font-weight:bold"> Welcome to CSE Sports Club...
                            </p>

                            <p align="left">To promote and develop individual interests in various sports and
                                recreational activities.
                                In addition to the development of specific skills, Sport Clubs are designed to be a
                                learning experience for their members and, through involvement in leadership,
                                responsibility, decision-making, public relations, organization, and fiscal management.
                                Uphold the name and fame of the CSE department as well as UAP by promoting the
                                excellence of the students in different sports competitions.
                                Develop the skills of the students in teamwork, critical thinking, quick decision-making
                                and prompt logical response to arguments.
                            </p>
                        </div>
                        <br>
                        <br>

                        <div>
                            <div id="paragraph_head">
                                <h1 align="left"
                                    style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ; text-decoration:blink">
                                    Activities:............</h1>
                            </div>
                            <p>
                                The Club will arrange at least one intradepartmental sports competition in an academic
                                year on regular basis.
                                <br>
                                This club will select the participants from the CSE department for UAP Sports
                                Competitions or any Sports event outside the university.
                                <br>
                                For outdoor games the Club will manage a sports field on part-time basis. Say, 3 days
                                per week starting from 2pm.
                                <br>
                                The Club can manage some sort of training for both indoor and outdoor games.</p>
                        </div>
                        <br>
                        <br>

                        <div id="paragraph_head">
                            <h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">
                                Notice!
                            </h1>
                        </div>
                        <div id="notice_board">
                            <p style="padding-left:60px; padding-right:55px; color:#66CC33;font-size:16px; font-weight:bold; ">
                                <br><br><br><br><br>All Classes of University of Asia Pacific will Reswume on
                                Thursday!!!......... All the Students are requested to attend the Class.<br>
                                <br>Thank You<br>
                            </p>
                        </div>
                        <div>
                            <div id="paragraph_head">
                                <h1 align="left" style="color:#FFFFFF">Mission...</h1>
                            </div>
                            <p align="left" style="font-size:16; font-weight:bold">
                            </p>

                            <p align="left">
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </p>
                        </div>
                        <br>
                        <br>

                        <div>
                            <div id="paragraph_head">
                                <h1 align="left" style="color:#FFFFFF">About!</h1>
                            </div>
                            <p align="left" style="font-size:16; font-weight:bold">
                            </p>
                            <p align="left"><br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="FooterText">
                    <?php include("footer.php");
                    ?>
                </div>
            </div>
    </body>
    </html>