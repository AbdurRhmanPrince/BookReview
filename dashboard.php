<?php require_once("admin/init.php"); ?>
<?php
$user = Profile::find_item($session->user_id);
if(!$session->loggedIn) {
    redirect("/bookreview/login.php");
}


?>

<?php require_once("admin/layouts/header.php"); ?>
<?php require_once("admin/layouts/sidebar.php"); ?>
<?php require_once("admin/layouts/main.php"); ?>
<?php require_once("admin/layouts/footer.php"); ?>








