<?php
session_start();
if (empty($_SESSION['username'])) { ?>
    <script language="JavaScript">
        window.location = "index.php";
    </script> <?php } else { ?>
    <html>
        <head>
            <?php include (__DIR__ . "/../partials/header.php"); ?>
        </head>
        <body>
            <div id="canvas">
                <div class="body_wrapper">
                    <?php include (__DIR__ . "/../partials/logo.php"); ?>
                    <div class="body">
                        <?php include (__DIR__ . "/../partials/menu.php"); ?>
                        <!-- TODO: When goes live change '/uapians/' to '/' OR '' -->
                        <?php if ($_SERVER['REQUEST_URI'] == '/uapians/') { ?>
                            <div id="wowslider-container1">
                                <?php include (__DIR__ . "/../partials/slider1.php"); ?>
                            </div>
                        <?php } ?>
                        <div id="content_wrapper">
                            <div id="sidebar">
                                <?php include (__DIR__ . "/../partials/sidebar.php"); ?>
                            </div>
                            <div id="content">
                                <?php include ($content); ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <?php include (__DIR__ . "/../partials/footer.php"); ?>
                    </div>
                </div>
            </div>
        </body>
    </html>
<?php } ?>