<?php
require_once("init.php");

if(!empty($_POST["email"]) && !empty($_POST["password"])) {
    global $database;
    
    $users = new Profile();
    $users->name = $database->escape_string($_POST["name"]);
    $users->email = $database->escape_string($_POST["email"]);
    $users->password = $database->escape_string($_POST["password"]);

    if($profile->validate_user()) {
        if($users->create_user()) {
            $id = $database->last_id();
            $session->login($id);
            echo "success $id";
        }
    }else{
        echo "email is being used";
    }




}



// $users->name = "prince";
// $users->photo_id = 1;
// $users->email = "prince@email.com";
// $users->password = "12345";
// echo "your call received";
//  print_r($users->create_user());
?>