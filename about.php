<?php
error_reporting(0);
 session_start();
 include("dbconnect.php");
$b=$_SESSION['username'];
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

<div class="realbody">

		<?php include("menu.php"); ?>

	<div id="content">
	<div id="colOne">
<?php
include_once("sidebar.php");
?>

	</div>

	









	
<div id="margin_figure">

	<div>
	<div>
			<div id="paragraph_head">
			<h1 align="left" style="color:#FFFFFF;font:Georgia, 'Times New Roman', Times, serif "><img src="images/system_images/founder_icon.png">Founders</h1>
			</div>
	<td width="100"><img src=images/11201028.jpg style="height:250px; padding:10px" align="right" ></td>
	<td width="100"><img src=images/11201037.jpg style="height:250px; padding:10px" align="right" ></td>
	<p align="left" style="font-size:16; font-weight:bold">Uapians.Net এর ফাউন্ডারদের সম্পর্কে কিছু কথা...</p>
        <p align="left">Uapians.Net নামের এই পোর্টালটির ফাউন্ডার <a href="student_profile.php?SID=29">Imtiaz Ahmed</a> এবং <a href="student_profile.php?SID=18">Irfan Tanvir</a> প্রথমে শুধুমাত্র একটি  সেমিস্টার কোর্সের জন্যেই ইউনিভার্সিটি থেকে তাদেরকে বলা হয় একটা প্রজেক্ট করার জন্যে। তারা প্রথমে Student Management Tools শিরোনামে একটি সফটওয়্যারের কাজ শুরু করে কিন্তু অল্প কিছুদিন কাজ করার পরেই তারা অনুধাবন করে যে একটু পরিশ্রম করলেই তারা তাদের এই প্রজেক্টের মাধ্যমেই নতুন কিছু করতে পারে যা কিনা তাদের জন্যে এবং পরবর্তী স্টুডেন্টদের জন্যে উপকারী এবং দৃষ্টান্ত হয়ে থাকবে। এবং দেরী না করে তারা সমন্নয় করে কাজ শুরু করে এবং দেখতে-দেখতে কয়েক মাসের মধ্যেই এই পোর্টালটি দাড়িয়ে যায়, যার ফলাফল আজকে সবার সামনেই। এই পোর্টালটি করার অন্যতম একটি উদ্দেশ্য ছিলো সব ধরনের রেফারেন্স সংক্রান্ত হেল্প প্রত্যেক জুনিয়র স্টুডেন্ট পর্যন্ত পৌছে দেওয়া এবং আজকে তাদের সেই উদ্দ্যেশের প্রতিফলন হয়েছে। CSE ডিপার্টমেন্টের প্রায় সব স্টুডেন্ট এই ওয়েব সাইটটির মাধ্যমে তাদের সিনিয়রদের কাছ থেক সব ধরনের বিগত বছরের প্রশ্নপত্র থেকে শুরু করে হ্যান্ডনোট পর্যন্ত পেয়ে থাকে। তাই এই কাজের জন্যে তারা সকল স্টুদেন্টদের কাছ থেকে ধন্যবাদের দাবীদার। তারা উভয়ই CSE Department এর ৩০ তম ব্যাচের ছাত্র।
        </p>
    </div>
	
		</div>

	<br>
	<br>
	<br>
        <div id="paragraph_head">
            <h1 align="left" style="color:#FFFFFF"><img src="images/system_images/developer_icon.png">Contributors!</h1>
        </div>
<div>
        <?php
        $strquery = "SELECT
                      s.SID,
                      s.SName,
                      s.SPortrait,
                      c.contributors_id,
                      c.contributed_as,
                      c.contribution_area,
                      c.contribution_time
                    FROM s_info s
                      INNER JOIN CONTRIBUTORS c
                    ON c.contributors_sid = s.SID;";
        $results = mysql_query($strquery);
        $num = mysql_numrows($results);

            $i = 0;
            while ($i < $num) {
                $contributorsId = mysql_result($results, $i, "SID");
                $contributorsName = mysql_result($results, $i, "SName");
                $contributorsPortrait = mysql_result($results, $i, "SPortrait");
                $contributedAs= mysql_result($results, $i, "contributed_as");
                $contributionArea = mysql_result($results, $i, "contribution_area");
                $contributionTime = mysql_result($results, $i, "contribution_time");
                ?>

                <div style="padding:10px; float: left;">
                    <table style="width:200px; border: 1px solid;">
                        <tr style="height:100px">
                            <td align="center">
                                <a href=student_profile.php?SID=<?=$contributorsId; ?>><span><img style="width:238px; border:1px solid white; vertical-align:middle" src="<?php echo $contributorsPortrait; ?>"</a>
                            </td>
                        </tr>
                        <tr style="height:20px">
                            <td align="center">
                                <a style="color: #50B9E8" href=student_profile.php?SID=<?php echo $contributorsId ? $contributorsId : '#' ?>><span><span><?= $contributorsName; ?> </span></a>
                            </td>
                        </tr>
                        <tr style="height:20px; color: #55AA45">
                            <td align="center"><a style="color: #55AA45" href=student_profile.php?SID=<?php echo $contributorsId  ?$contributorsId :'#'?>>Contributed as: <?= $contributedAs ?></a></td>
                        </tr>
                    </table>
                </div>
                <?php
                $i++;
            }
	?>
</div>
</div>
    <div class="margin_figure" style="padding-left: 280px">
        <div id="paragraph_head">
            <h1 align="left" style="color:#FFFFFF"><img src="images/system_images/developer_icon.png">Special Thanks!</h1>
        </div>
        <td width="100"><img src=images/system_images/contributors/Najmus_Sadat.jpg style="height:250px; padding:10px" align="right" ></td>
        <td width="100"><img src=images/system_images/contributors/Bijan_Paul.jpg style="height:250px; padding:10px" align="right" ></td>
        <td width="100"><img src=images/system_images/contributors/Faruk_Ahmed.jpg style="height:250px; padding:10px" align="right" ></td>
        <td width="100"><img src=images/system_images/contributors/rana.jpg style="height:250px; padding:10px" align="right" ></td>
        <td width="100"><img src=images/system_images/contributors/Sharif_Zaman.jpg style="height:250px; padding:10px" align="right" ></td>
        <p align="left" style="font-size:16; font-weight:bold">এই ওয়েবসাইটটির শুরু থেকে শেষ পর্যন্ত যারা জড়িত...</p>

        <p align="left">প্রথমেই যার কথা বলতে হয় উনি হচ্ছেন <span style="font-size:20px">Faruk Ahmed</span> Microsoft Developer হিসাবে দীর্ঘদিন কাজ করার পর এখন তিনি কানাডার একটি সফটওয়্যার প্রতিষ্ঠানের Lead Developer হিসাবে কাজ করছেন। ইমতিয়াজ আহমাদ এবং ইরফান তানভীর যখন এই পোর্টালটির কাজ যখন শুরু করে তখন তাদের ওয়েব ডেভেলপমেন্ট সম্পর্কে ধারণা ছিলো সামান্য সেই সামান্য ধারণা থেকে আজকের এই রুপ দেওয়া পর্যন্ত এই মানুষটির অবদান সবথেকে বেশী। তাদের যে কোন সমস্যায় রাত-দিন যে কোন সাহায্য তিনি করেছেন।
            <br>
            <span style="font-size:20px">Bijon Paul</span>ওই সময় তাদের ডাটাবেজের Course Teacher ছিলেন। পড়ালেখা করেছেন শাহজালাল বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয় থেকে বর্তমানে তিনি American University of Bangladesh (AIUB) তে শিক্ষকতার দায়িক্ত পালন করছেন তার অবদান অস্বীকার করার মতো নয়। Admin দের ডাটাবেজে হাতেখড়ি উনার কাছেই।
            <br>
            <span style="font-size:20px">Dr. Najmus Sadat</span> পড়ালেখা শেষ করেছেন অস্ট্রেলিয়ার Monash University থেকে উনি বর্তমানে Assistant প্রফেসর হিসাবে দায়িক্তপালন করছেন University of Asia Pacific এ। অ্যালগরিদম সংক্রান্ত সকল জটিলতায় ইমতিয়াজের পাশে ছিলেন উনি সর্বদা...
            <br>
            <span style="font-size:20px">Sharif Zaman</span> জুনিয়র ইঞ্জিনিয়ার,Epsilon Consulting Ltd. পড়াশোনা করেছেন CSE তেই University of Development Alternative থেকে তার পাশে বসেই করা হয়েছে ডিজাইনের সব কাজ।
            <br>
            <span style="font-size:20px">S.M. Saidur Rahman</span> Senior Engineer at Epsilon Consulting Ltd. এই ওয়েবসাইটটির ডোমেইনটি নেওয়া হয়েছে উনার মাধ্যমেই। অত্যান্ত হেল্পফুল এবং জিনিয়াস একজন মানুষ। এখন পর্যন্ত কখন যদি এই ওয়েবসাইটের সার্ভার সংক্রান্ত কোন সমস্যা হয় তাহলে উনি জানা মাত্রই ঠিক করে দেওয়ার জন্যে কাজ করেন। বলা যায় এই ওয়েবসাইটের চুড়ান্ত পরিনতি উনার মাধ্যমেই।</p>
    </div>

</div>

</div>



		<div class="footer">
<?php include("footer.php");
?>
        </div>
</body>
</html>
