<?php
// require_once("init.php");


class User {
    protected static $db_table = "users";
    protected $table_cols = array("photo_id","name","email","password");
    
    public $id;
    public $photo_id;
    public $name;
    public $email;
    public $password;

    
    public static function find_all_item() {
        global $database;
        $sql = "SELECT * FROM ". self::$db_table;
        $result = $database->run_query($sql);
        return $result;
    }

    public static function find_item($id)
    {
        global $database;
        $sql = "SELECT * FROM " . self::$db_table . " WHERE id= '$id'";
        $result = $database->run_query($sql);
        return $result;
    }


    public function set_properties_val() {
        $prop_val = array();
        $cls = get_called_class();
        global $database;
        foreach($this->table_cols as $col) {
            if(property_exists($cls,$col)) {                
                if(!empty($this->$col)) {
                    if($col == "password") {
                        $psw = password_hash($col,PASSWORD_DEFAULT);
                        $prop_val[$col] = $database->escape_string($psw);

                    }else{
                        $prop_val[$col]=$database->escape_string($this->$col);

                    }
                }
            }
        }
        return $prop_val;
    }



    public function create_user() {
        global $database;
        $properties = $this->set_properties_val();

        $array_keys = array_keys($properties);
        $array_val = array_values($properties);

        $sql = "INSERT INTO ". static::$db_table . " (". implode(",", $array_keys).") VALUES ( '". implode("','",$array_val) ."')";

        $result = $database->run_query($sql);
        if(!$result) {
            return $result;
        }else{
            return $result;
        }
    }



}

$user = new User();



?>