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

            <?php include("logo.php"); ?>





            <div class="realbody" style="min-height:2300px">


                <?php include("menu.php"); ?>



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
                                    UAP a School of Research</h1>
                            </div>
                            <p align="left" style="font-size:16; font-weight:bold">Research and Publication Club</p>

                            <p align="left">This club organizes a technical or IT based seminar each month. It also
                                publishes technical journal each year. It helps the students and faculty members of CSE
                                Department to improve their research capability producing quality computer professionals
                                who can make positive contribution in the development of this country. In the budget of
                                The University of Asia Pacific (UAP), some amount of money is dedicated for research and
                                publication. Most of our faculty members and students of UAP are engaged to publish
                                their quality work at home and abroad. A faculty member of CSE Department recently
                                visited Nepal to represent his papers at ITPC-2003 that reflects the fact.
                            </p>
                        </div>
                        <br>
                        <br>

                        <div>
                            <div id="paragraph_head">
                                <h1 align="left"
                                    style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ; text-decoration:blink">
                                    News Feed............</h1>
                            </div>
                            <marquee behavior="scroll" direction="up" onMouseOver="this.stop();"
                                     onMouseOut="this.start();" align="middle"
                            ; style="color:#0099FF; font-size:18px; height:300">

                            <a href='http://devfest.ydesh.com/' style="text-decoration:none; color:#FFFFFF"><span>DevFest The Coolest Developer Conference 30-31 August 2013</span></a><br>
                            <br>
                            <a href='Link: http://www.eventbrite.com/event/10239078359'
                               style="text-decoration:none; color:#FFFF00;font-size:22px;"><span>It's Raining Opportunities ! Google Developer Group Bangladesh</span></a><br>
                            <br>
                            <a href='http://www.ictd.gov.bd/bangla/' style="text-decoration:none; color:#99FF99">Newsletter
                                from National Mobile Application Development</span></a><br> <br>
                            <a href='http://uap-bd.edu/notice/suspended-25-02-2014.html'
                               style="text-decoration:none; color:#FF33CC;font-size:30px;"><span>All classes of UAP will be suspended on 25  February</span></a><br>
                            <br>
                            <a href='http://www.uap-bd.edu/' style="text-decoration:none; color:#FFFF33"><span>Convocation of University of Asia Pacific will be live streamed </span></a><br>
                            <br>
                            <a href='http://www.scholars4dev.com/8054/univeristy-west-england-scholarships-for-international-students/'
                               style="text-decoration:none; color:#FFFFFF"><span>A Big Scholarship Opportunity for All Bangladeshi Students</span></a><br>
                            <br>
                            <a href='http://devfest.ydesh.com/' style="text-decoration:none; color:#FFFF00""><span>DevFest The Coolest Developer Conference 30-31 August 2013</span></a>
                            <br> <br>
                            <a href='http://devfest.ydesh.com/'
                               style="text-decoration:none; color:#FF33CC;font-size:25px;"><span>DevFest The Coolest Developer Conference 30-31 August 2013</span></a><br>
                            <br>
                            <a href='Link: http://www.eventbrite.com/event/10239078359'
                               style="text-decoration:none"><span>It's Raining Opportunities ! Google Developer Group Bangladesh</span></a><br>
                            <br>
                            <a href='http://www.ictd.gov.bd/bangla/' target="iframe"
                               style="text-decoration:none; color:#99FF99;font-size:20px;"><span>Newsletter from National Mobile Application Development</span></a><br>
                            <br>
                            <a href='http://uap-bd.edu/notice/suspended-25-02-2014.html' target="iframe"
                               style="text-decoration:none; color:#FFFF00"><span>All classes of UAP will be suspended on 25  February</span></a><br>
                            <br>
                            <a href='http://www.uap-bd.edu/' target="iframe"
                               style="text-decoration:none; color:#99FF99"><span>Convocation of University of Asia Pacific will be live streamed </span></a><br>
                            <br>
                            <a href='http://www.scholars4dev.com/8054/univeristy-west-england-scholarships-for-international-students/'
                               style="text-decoration:none; color:#FF33CC"><span>A Big Scholarship Opportunity for All Bangladeshi Students</span></a><br>
                            <br>
                            <a href='http://devfest.ydesh.com/' style="text-decoration:none; color:#99FF99"><span>DevFest The Coolest Developer Conference 30-31 August 2013</span></a><br>
                            <br>
                            <a href='Link: http://www.eventbrite.com/event/10239078359'
                               style="text-decoration:none; color:#FFFF00;font-size:25px"><span>It's Raining Opportunities ! Google Developer Group Bangladesh</span></a><br>
                            <br>
                            <a href='http://www.ictd.gov.bd/bangla/' target="iframe" style="text-decoration:none"><span>Newsletter from National Mobile Application Development</span></a><br>
                            <br>
                            <a href='http://uap-bd.edu/notice/suspended-25-02-2014.html' target="iframe"
                               style="text-decoration:none; color:#99FF99;font-size:25px"><span>All classes of UAP will be suspended on 25  February</span></a><br>
                            <br>
                            <a href='http://www.uap-bd.edu/' target="iframe" style="text-decoration:none; color:#FF33CC";font-size:25px;><span>Convocation of University of Asia Pacific will be live streamed </span></a>
                            <br> <br>
                            <a href='http://www.scholars4dev.com/8054/univeristy-west-england-scholarships-for-international-students/'
                               style="text-decoration:none; color:#FFFF00;font-size:25px"><span>A Big Scholarship Opportunity for All Bangladeshi Students</span></a><br>
                            <br>
                            <a href='https://docs.google.com/file/d/0Bz_14UliIWzsT2U0a3BiMWM5VEE/edit'
                               style="text-decoration:none; color:#FFFF00;font-size:25px"><span>Training on:: Excellence in Executive Communication</span></a><br>
                            <br>


                            </marquee>
                        </div>
                        <br>
                        <br>


                        <div id="paragraph_head">
                            <h1 align="center" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif ">
                                Notice!</h1>
                        </div>
                        <div id="notice_board">
                            <p style="padding-left:60px; padding-right:55px; color:#66CC33;font-size:16px; font-weight:bold; ">
                                <br><br><br><br><br>All Classes of University of Asia Pacific will Reswume on
                                Thursday!!!......... All the Students are requested to attend the Class.<br> <br>Thank
                                You<br>

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
                            </p>
                        </div>
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

                        <div>
                            <div id="paragraph_head">
                                <h1 align="left" style="color:#FFFFFF">About!</h1>
                            </div>
                            <p align="left" style="font-size:16; font-weight:bold"></p>

                            <p align="left">
                                <b>
                                    <b>
                                        <b>
                                            <b>
                                                <b>
                                                    <b>
                                                        <b>
                                                            <b>
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