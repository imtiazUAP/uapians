<?php
$previousPage = $_SERVER['HTTP_REFERER'];
error_reporting(0);
session_start();
session_destroy();
unset($_SESSION);
session_regenerate_id(true);
?>

<script language="JavaScript">
    window.location = "<?php echo($previousPage); ?>";
</script>
