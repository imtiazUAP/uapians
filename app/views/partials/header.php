<?php
require_once __DIR__ . '/../../config/config.php';
// Define the base path
$basePath = dirname(__DIR__, 3); // Go up three levels from app/views/partials
$baseUrl = "http://localhost/uapians/app"; // Base URL of your site, adjust accordingly

// Construct paths to assets
$jqueryJsPath = $baseUrl . "/assets/js/jquery.js";
$thickboxJsPath = $baseUrl . "/assets/js/thickbox.js";
$thickboxCssPath = $baseUrl . "/assets/css/thickbox.css";
$styleCssPath = $baseUrl . "/assets/css/style.css";
$styleNewCssPath = $baseUrl . "/assets/css/main_menu_style.css";
$engine1StyleCssPath = $baseUrl . "/assets/engine1/style.css";
$engine1JqueryJsPath = $baseUrl . "/assets/engine1/jquery.js";
$scriptJsPath = $baseUrl . "/assets/js/script.js";

?>

<title>A Stack of Uapians</title>
<link rel="shortcut icon" href="<?= $baseUrl ?>/assets/images/tiittleimage.ico" />
<link rel="image_src" href="<?= $baseUrl ?>/assets/images/tittleimage.png" />
<meta name="title" content="Uapians.Net" />
<meta name="description" content="An Exclusive Website only for Uapians..." />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta charset='utf-8'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="<?= $thickboxCssPath ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?= $styleNewCssPath ?>" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="<?= $styleCssPath ?>" />
<link rel="stylesheet" type="text/css" href="<?= $engine1StyleCssPath ?>" />
<link rel="stylesheet" href="<?= $styleNewCssPath ?>">

<script type="text/javascript" src="<?= $jqueryJsPath ?>"></script>
<script type="text/javascript" src="<?= $thickboxJsPath ?>"></script>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="<?= $scriptJsPath ?>"></script>
<script type="text/javascript" src="<?= $baseUrl ?>/assets/engine1/wowslider.js"></script>
<script type="text/javascript" src="<?= $baseUrl ?>/assets/engine1/script.js"></script>
<script type="text/javascript" src="<?= $engine1JqueryJsPath ?>"></script>
<script>(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<div id="fb-root"></div>

