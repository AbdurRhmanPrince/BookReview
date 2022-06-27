<?php
require_once("init.php");
// require_once("layouts/header.php");
// require_once("layouts/sidebar.php");

// require_once("layouts/footer.php");
// $book = new Book();
// echo get_called_class();
// print_r(Profile::find_all_item());
global $session;
// $session->login(1);
$user = Profile::find_item($session->user_id);
// echo $session->user_id;
print_r($user->name);
?>