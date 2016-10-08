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
            <div class="realbody">
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
                                    Programming Contest Club</h1>
                            </div>
                                <p align="left" style="font-size:16; font-weight:bold">Welcome to CSE Programming contest
                                    Club....</p>

                                <p align="left">In the recent years ACM International Collegiate Programming Contest (ICPC)
                                    has achieved immense importance in the computer science arena. Bangladesh has also
                                    become successful to put its footmark in the same. BUET has been attending in the world
                                    finals consecutively six times since 1998 by becoming champions in the international
                                    regional contests. In this connection it could be added that universities from almost
                                    every Asian countries participate in these hard-fought regional contests to qualify for
                                    the world final.
                                    The goal of this club is to develop students of UAP to participate in different national
                                    and regional contests and arrange programming contests of both national and
                                    international level in the UAP campus.
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
                            <marquee behavior="scroll" direction="up" onMouseOver="this.stop();" onMouseOut="this.start();" align="middle"; style="color:#0099FF; font-size:18px; height:300">

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
                        <div>
                            <div id="paragraph_head">
                                <h1 align="left" style="color:#FFFFFF">Activities: </h1>
                            </div>
                            <p align="left" style="font-size:16; font-weight:bold">To achieve the goal, the club will
                                undertake following activities...
                            </p>
                            <p align="left">
                                Arrange regular coaching programs for students to motivate them for participating in the
                                competition and also to enrich their problem solving capability.
                                <br>
                                Arrange intra-department progrmming Contest..
                            </p>
                        </div>
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

                            <p align="left"></p>
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