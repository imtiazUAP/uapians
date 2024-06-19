<?php
require_once BASE_DIR . '/app/config/config.php';

// Construct paths to assets
$jqueryJsPath = BASE_URL . "/app/assets/js/jquery.js";
$thickboxJsPath = BASE_URL . "/app/assets/js/thickbox.js";
$thickboxCssPath = BASE_URL . "/app/assets/css/thickbox.css";
$styleCssPath = BASE_URL . "/app/assets/css/style.css";
$styleNewCssPath = BASE_URL . "/app/assets/css/main_menu_style.css";
$engine1StyleCssPath = BASE_URL . "/app/assets/engine1/style.css";
$engine1JqueryJsPath = BASE_URL . "/app/assets/engine1/jquery.js";
$scriptJsPath = BASE_URL . "/app/assets/js/script.js";

?>

<title>A Stack of Uapians</title>
<link rel="shortcut icon" href="<?= BASE_URL ?>/app/assets/images/tiittleimage.ico" />
<link rel="image_src" href="<?= BASE_URL ?>/app/assets/images/tittleimage.png" />
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
<script type="text/javascript" src="<?= BASE_URL ?>/app/assets/engine1/wowslider.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/app/assets/engine1/script.js"></script>
<script type="text/javascript" src="<?= $engine1JqueryJsPath ?>"></script>
<script>(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<div id="fb-root"></div>

<!-- For Blood Bank Form -->
<script type="text/javascript">
  function updateBloodBankFormAction() {
    var form = document.getElementById('bloodGroupForm');
    var selectedBloodGroupId = document.getElementById('Blood_Group_ID').value;
    form.action = "<?= BASE_URL . '/blood-bank/list' ?>?group_id=" + selectedBloodGroupId;
  }
</script>

<script type="text/javascript">
  function updateDistrictFilterFormAction() {
    var form = document.getElementById('districtFilterForm');
    var selectedDistrictId = document.getElementById('district_id').value;
    form.action = "<?= BASE_URL . '/student/district/list' ?>?district_id=" + selectedDistrictId;
  }
</script>

