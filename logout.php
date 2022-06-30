<?php
    require_once("admin/init.php");
    if($session->loggedIn) {
        $session->logout();
        redirect("/bookreview/login.php");
        // echo "you are logged in";
    }
?>