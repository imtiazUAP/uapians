<?php
session_start();
error_reporting(0);
include("dbconnect.php");
include_once("page.inc.php");
$b = $_SESSION['username'];
$userrole = mysql_query("select * from userinfo where username='{$b}'");
$userdata = mysql_fetch_assoc($userrole);
if (empty($_SESSION['username'])) {
    ?>
    <script language="JavaScript">
        window.location = "index.php";
    </script><?php } else { ?>
    <!DOCTYPE html>
    <html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <?php
        include("header.php");
        ?>
        <style>
            /* PHOTO GALLERY STYLE STARTS HERE */
            body {
                margin: 0;
            }

            * {
                box-sizing: border-box;
            }

            .row > .column {
                padding: 5px 5px;
            }

            .row > .column:hover {
                opacity: 0.9;
            }

            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            .column {
                float: left;
                width: 25%;
            }

            /* The Modal (background) */
            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                padding-top: 20px;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: black;
            }

            /* Modal Content */
            .modal-content {
                position: relative;
                background-color: #fefefe;
                margin: auto;
                padding: 0;
                width: 90%;
                max-width: auto;
            }

            /* The Close Button */
            .close {
                color: white;
                position: absolute;
                top: 10px;
                right: 25px;
                font-size: 35px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #999;
                text-decoration: none;
                cursor: pointer;
            }

            .mySlides {
                display: none;
            }

            .cursor {
                cursor: pointer
            }

            /* Next & previous buttons */
            .prev,
            .next {
                cursor: pointer;
                position: absolute;
                top: 50%;
                width: auto;
                padding: 16px;
                margin-top: -50px;
                color: white;
                font-weight: bold;
                font-size: 20px;
                transition: 0.6s ease;
                border-radius: 0 3px 3px 0;
                user-select: none;
                -webkit-user-select: none;
            }

            /* Position the "next button" to the right */
            .next {
                right: 0;
                border-radius: 3px 0 0 3px;
            }

            /* On hover, add a black background color with a little bit see-through */
            .prev:hover,
            .next:hover {
                background-color: rgba(0, 0, 0, 0.8);
            }

            /* Number text (1/3 etc) */
            .numbertext {
                color: #f2f2f2;
                font-size: 12px;
                padding: 8px 12px;
                position: absolute;
                top: 0;
            }

            img {
                margin-bottom: -4px;
            }

            .caption-container {
                text-align: center;
                background-color: black;
                padding: 2px 16px;
                color: white;
            }

            .demo {
                opacity: 0.8;
            }

            .active,
            .demo:hover {
                opacity: 1;
            }

            img.hover-shadow {
                transition: 0.3s
            }

            .hover-shadow:hover {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
            }
            /* PHOTO GALLERY STYLE ENDS HERE */
        </style>
    </head>
    <body>
    <div id="grad1">
        <div class="bodydiv">
            <?php
            include("logo.php");
            ?>
            <div class="realbody" style="min-height:1950px">
                <?php
                include("menu.php");
                ?>
                <div id="content">
                    <div id="colOne">
                        <?php
                        include("sidebar.php");
                        ?>
                    </div>
                    <div id="margin_figure">
                        <?php
                        if (($userdata[admin] == '1')) {
                            ?>
                            <div>
                                <a href="gallery_insert.php?keepThis=true&TB_iframe=true&height=100&width=400&modal=true" title="New Student" class="thickbox">Add New Photos</a>
                            </div>
                        <?php
                        }
                        $strquery = "Select * from gallery";
                        $results = mysql_query($strquery);
                        $num = mysql_numrows($results);

                        $i = 0;
                        while ($i < $num) {
                            $Photo_Id = mysql_result($results, $i, "Photo_Id");
                            $Photo_Link = mysql_result($results, $i, "Photo_Link");
                            $Photo_Caption = mysql_result($results, $i, "Photo_Caption");
                            $i++;
                        }
                        ?>

                        <h2 style="text-align:center">UAPians.Net</h2>

                        <div class="row">
                            <?php
                            $i = 0;
                            while ($i < $num) {
                                $Photo_Id = mysql_result($results, $i, "Photo_Id");
                                $Photo_Link = mysql_result($results, $i, "Photo_Link");
                                $Photo_Caption = mysql_result($results, $i, "Photo_Caption");
                                ?>

                                <div class="column" >
                                    <figure>
                                        <img src="<?php echo($Photo_Link); ?>" style="width:100%" onclick="openModal();currentSlide(<?php echo($Photo_Id-1); ?>)" class="hover-shadow cursor">
                                        <figcaption><div class="desc" style="color:#FFFFFF"><?php echo $Photo_Caption ; ?></div></figcaption>
                                    </figure>
                                </div>

                                <?php
                                if (($userdata[admin] == '1')) {
                                    ?>
                                    <div>
                                        <?php echo " <a href='gallery_delete.php?Photo_Id=" . $Photo_Id . "'> delete </a> "; ?>
                                    </div>
                                <?php
                                }
                                $i++;
                            }
                            ?>
                        </div>

                        <div id="myModal" class="modal">
                            <span class="close cursor" onclick="closeModal()">&times;</span>
                            <div class="modal-content">
                                <?php
                                $i = 0;
                                while ($i < $num) {
                                    $Photo_Id = mysql_result($results, $i, "Photo_Id");
                                    $Photo_Link = mysql_result($results, $i, "Photo_Link");
                                    $Photo_Caption = mysql_result($results, $i, "Photo_Caption");
                                    ?>

                                    <div class="mySlides">
                                        <div style="font-size: 28px;text-shadow: 2px 2px #000000;" class="numbertext"><?php echo($Photo_Id-1); ?> / <?php echo($num). ' :'; ?><?php echo(': '. $Photo_Caption); ?></div>
                                        <img src="<?php echo($Photo_Link); ?>" style="width:100%">
                                    </div>

                                    <?php
                                    $i++;
                                }
                                ?>

                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                                <div class="caption-container">
                                    <p id="caption"><?php echo($Photo_Caption); ?></p>
                                </div>

                                <?php
                                $i = 0;
                                while ($i < $num) {
                                    $Photo_Id = mysql_result($results, $i, "Photo_Id");
                                    $Photo_Link = mysql_result($results, $i, "Photo_Link");
                                    $Photo_Caption = mysql_result($results, $i, "Photo_Caption");
                                    ?>

                                    <div class="column" style="padding: 5px;">
                                        <img class="demo cursor" src="<?php echo($Photo_Link); ?>" style="width:100%" onclick="currentSlide(<?php echo($Photo_Id-1); ?>)" alt="<?php echo $Photo_Caption ; ?>">
                                    </div>

                                    <?php
                                    $i++;
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="footer">
                <?php
                include("footer.php");
                ?>
            </div>
    </body>
    </html>
<?php
}
?>
