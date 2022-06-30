<?php require_once("admin/init.php"); ?>
<?php
// global $session;
$user = Profile::find_item($session->user_id);
?>

<?php require_once("admin/layouts/header.php"); ?>
<?php require_once("admin/layouts/sidebar.php"); ?>
<?php require_once("admin/layouts/main.php"); ?>
<?php require_once("admin/layouts/footer.php"); ?>








