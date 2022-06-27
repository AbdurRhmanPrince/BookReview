<?php
// require_once("init.php");
class Profile  extends User {

    protected static $db_table = "users";
    protected $table_cols = array("id","photo_id", "name", "email", "password");

    public $id;
    public $photo_id;
    public $name;
    public $email;
    public $password;
    public $time;

    

    public  function validate_user() {
        global $database;
        $sql = "SELECT * FROM users WHERE email = '$this->email'";
        $result = $database->run_query($sql);
        if($result->num_rows > 0) {
            return false;
        }else{
            return true;
        }

    }










}

$user = new Profile();


?>