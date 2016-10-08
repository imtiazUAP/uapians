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
                                    Welcome!</h1>
                            </div>
                            <p align="left" style="font-size:16; font-weight:bold"> Student Management Tool is just not
                                a Website its a Webased software. It can Collect, Calculate & Store the results of an
                                University....</p>

                            <p align="left">A common English usage misconception is that a paragraph has three to five
                                sentences; single-word paragraphs can be seen in some professional writing, and
                                journalists often use single-sentence paragraphs.[7]
                                The crafting of clear, coherent paragraphs is the subject of considerable stylistic
                                debate. Forms generally vary among types of writing. For example, newspapers, scientific
                                journals, and fictional essays have somewhat different conventions for the placement of
                                paragraph breaks.
                                English students are sometimes taught that a paragraph should have a topic sentence or
                                "main idea", preferably first, and multiple "supporting" or "detail" sentences which
                                explain or supply evidence. One technique of this type, intended for essay writing, is
                                known as the Schaffer paragraph. For example, the following excerpt from Dr. Samuel
                                Johnson's Lives of the English Poets, the first sentence is the main idea: that Joseph
                                Addison is a skilled "describer of life and manners". The succeeding sentences are
                                details that support and explain the main idea in a specific way.
                            </p>
                        </div>
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
                            <p align="left" style="font-size:16; font-weight:bold"> Student Management Tool is just not
                                a Website its a Webased software. I can Collect, Calculate & Store the results of an
                                University....
                            </p>

                            <p align="left">
                                A common English usage misconception is that a paragraph has three to five sentences;
                                single-word paragraphs can be seen in some professional writing, and journalists often
                                use single-sentence paragraphs.[7]
                                The crafting of clear, coherent paragraphs is the subject of considerable stylistic
                                debate. Forms generally vary among types of writing. For example, newspapers, scientific
                                journals, and fictional essays have somewhat different conventions for the placement of
                                paragraph breaks.
                                English students are sometimes taught that a paragraph should have a topic sentence or
                                "main idea", preferably first, and multiple "supporting" or "detail" sentences which
                                explain or supply evidence. One technique of this type, intended for essay writing, is
                                known as the Schaffer paragraph. For example, the following excerpt from Dr. Samuel
                                Johnson's Lives of the English Poets, the first sentence is the main idea: that Joseph
                                Addison is a skilled "describer of life and manners". The succeeding sentences are
                                details that support and explain the main idea in a specific way.
                                As a describer of life and manners, he must be allowed to stand perhaps the first of the
                                first rank. His humour, which, as Steele observes, is peculiar to himself, is so happily
                                diffused as to give the grace of novelty to domestic scenes and daily occurrences. He
                                never "o'ersteps the modesty of nature," nor raises merriment or wonder by the violation
                                of truth. His figures neither divert by distortion nor amaze by aggravation. He copies
                                life with so much fidelity that he can be hardly said to invent; yet his exhibitions
                                have an air so much original, that it is difficult to suppose them not merely the
                                product of imagination.
                            </p>
                        </div>

                        <div>
                            <div id="paragraph_head">
                                <h1 align="left" style="color:#FFFFFF">About!</h1>
                            </div>
                            <p align="left" style="font-size:16; font-weight:bold">
                                Student Management Tool is just not a Website its a Webased software. I can Collect,
                                Calculate & Store the results of an University....</p>

                            <p align="left">A common English usage misconception is that a paragraph has three to five
                                sentences; single-word paragraphs can be seen in some professional writing, and
                                journalists often use single-sentence paragraphs.[7]
                                The crafting of clear, coherent paragraphs is the subject of considerable stylistic
                                debate. Forms generally vary among types of writing. For example, newspapers, scientific
                                journals, and fictional essays have somewhat different conventions for the placement of
                                paragraph breaks.
                                English students are sometimes taught that a paragraph should have a topic sentence or
                                "main idea", preferably first, and multiple "supporting" or "detail" sentences which
                                explain or supply evidence. One technique of this type, intended for essay writing, is
                                known as the Schaffer paragraph. For example, the following excerpt from Dr. Samuel
                                Johnson's Lives of the English Poets, the first sentence is the main idea: that Joseph
                                Addison is a skilled "describer of life and manners". The succeeding sentences are
                                details that support and explain the main idea in a specific way.
                                As a describer of life and manners, he must be allowed to stand perhaps the first of the
                                first rank. His humour, which, as Steele observes, is peculiar to himself, is so happily
                                diffused as to give the grace of novelty to domestic scenes and daily occurrences. He
                                never "o'ersteps the modesty of nature," nor raises merriment or wonder by the violation
                                of truth. His figures neither divert by distortion nor amaze by aggravation. He copies
                                life with so much fidelity that he can be hardly said to invent; yet his exhibitions
                                have an air so much original, that it is difficult to suppose them not merely the
                                product of imagination.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="footer">
                    <?php include("footer.php");
                    ?>
                </div>
            </div>
    </body>
    </html>