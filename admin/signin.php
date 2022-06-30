<?php
require_once("init.php");

if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["name"])) {
    // global $database;
    $users = new Profile();
    $users->name = $database->escape_string($_POST["name"]);
    $users->email = $database->escape_string($_POST["email"]);
    $users->password = $database->escape_string($_POST["password"]);

    // echo $users->password;
    if($users->validate_user()) {
        if($users->save()) {
             $id = $database->last_id();
             $session->login($id);
            echo $session->user_id;
            // redirect("/bookreview/dashboard.php");
        }else{
            echo "failed";
        }
    }else{
        echo "email is being used";
    }




} else if (!empty($_POST["sign"]) && !empty($_POST["email"]) && !empty($_POST["password"] )) {
    $users = new Profile();

    $users->email = $database->escape_string($_POST["email"]);
    $users->password =($_POST["password"]);
    if($users->login_user()) {
        //  header("Location:test.php");
        $response = "ok";
        echo $response;
    }else{
        echo "failed to login";
    }
    // echo "hello " . $users->email . "and your pass is ". $users->password; 

}



// $users->name = "prince";
// $users->photo_id = 1;
// $users->email = "prince@email.com";
// $users->password = "12345";
// echo "your call received";
//  print_r($users->create_user());
?>