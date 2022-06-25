<?php

class Profile {

    // protected static $db_table = "users";
    protected $table_cols = array("photo_id", "name", "email", "password");

    public $id;
    public $photo_id;
    public $name;
    public $email;
    public $password;
    

    public function validate_user() {
        global $database;

        $sql = "SELECT * FROM users WHERE ";


    }







}



?>