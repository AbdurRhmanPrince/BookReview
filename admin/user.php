<?php
// require_once("init.php");
class Profile  extends User {

    protected static $db_table = "users";
    protected $table_cols = array("photo_id", "name", "email", "password");

    public $id;
    public $photo_id;
    public $name;
    public $email;
    public $password;
    

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

    public function save() {
        // return !empty($id) ? $this->update() : $this->create_user();

        return isset($this->id) ? $this->update() : $this->create_user();
        // if(isset($this->id)) {
        //     echo "update method";
        // }else{
        //     echo "create method";
        // }
    }







}



?>