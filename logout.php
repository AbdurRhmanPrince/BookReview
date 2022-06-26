<?php
    require_once("admin/init.php");
    if($session->loggedIn) {
        $session->logout();
        // echo "you are logged in";
    }
    echo "your logged out";

?>