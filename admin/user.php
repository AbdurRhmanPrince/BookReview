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

    public function login_user() {
        global $database;
        $sql = "SELECT * FROM users WHERE email = '$this->email'";
        $result = $database->run_query($sql);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $hashedPassword = $data["password"];
            $psw = $this->password;
            if(password_verify($psw,$hashedPassword)) {
                global $session;
                $id = $data["id"];
                $session->login($id);
                return true;
                // return $response["psw"] = "success";
            }else{
                // return $response["psw"] = "Password Incorrect";
                return false;
            }
            // return $this->password;

        } else {
            return false;
            // return $response["psw"] = "No Such User";
        }


    }









}

$user = new Profile();


?>