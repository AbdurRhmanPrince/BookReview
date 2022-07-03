<?php

require_once("backend/db/db_con.php");
require_once("backend/session.php");
require_once("center.php");
require_once("user.php");
require_once("photo.php");
require_once("book.php");
require_once("summaryclass.php");
require_once("reviewclass.php");

global $session;

function redirect($url)
{
    return header("Location: " . $url);
}


?>