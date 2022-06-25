<?php
require_once("init.php");


if($_POST["email"]) {
    echo "hey there welcome " . $_POST["email"];
}
// $users = new User();

// $users->name = "prince";
// $users->photo_id = 1;
// $users->email = "prince@email.com";
// $users->password = "12345";
// echo "your call received";
//  print_r($users->create_user());
?>