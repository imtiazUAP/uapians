<html>

<head>
    <?php include (BASE_DIR . "/app/views/partials/header.php"); ?>
</head>

<body>
    <div id="canvas">
        <div class="body_wrapper">
            <?php include (BASE_DIR . "/app/views/partials/logo.php"); ?>
            <div class="body">
                <?php include (BASE_DIR . "/app/views/partials/menu.php"); ?>
                <!-- TODO: When goes live change '/uapians/' to '/' OR '' -->
                <?php if ($_SERVER['REQUEST_URI'] == '/uapians/') { ?>
                    <div id="wowslider-container1">
                        <?php include (BASE_DIR . "/app/views/partials/slider1.php"); ?>
                    </div>
                <?php } ?>
                <div id="content_wrapper">
                    <div id="sidebar">
                        <?php include (BASE_DIR . "/app/views/partials/sidebar.php"); ?>
                    </div>
                    <div id="content">
                        <?php include ($content); ?>
                    </div>
                </div>
            </div>
            <div class="footer">
                <?php include (BASE_DIR . "/app/views/partials/footer.php"); ?>
            </div>
        </div>
    </div>
</body>

</html>