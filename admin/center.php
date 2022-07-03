<?php
require_once("init.php");


class User {
    protected static $db_table;
    // protected $table_cols = array("photo_id","name","email","password");
    

    
    public static function find_all_item() {
        global $database;
        $sql = "SELECT * FROM ". static::$db_table;
        $result = $database->run_query($sql);
        $data_set = array();
        while ($row = $result->fetch_assoc()) {
            $data_set[] = static::object_data($row);
        }
        return $data_set;
    }

    public static function find_item($id)
    {
        global $database;
        $sql = "SELECT * FROM " . static::$db_table . " WHERE id= '$id'";
        $result = $database->run_query($sql);
        $data = $result->fetch_assoc();
        return static::object_data($data);
        // return $sql;
    }

    public  function has_key($key) {
        $prop = get_object_vars($this);
        return array_key_exists($key,$prop);

    }

    public static function object_data($data) {
        $classObject = get_called_class();
        $cls = new $classObject();
            foreach($data as $key => $val) {
                if($cls->has_key($key)) {
                    if($key == "file") {
                       $val= Photo::img_src($val);
                    }
                     $cls->$key= $val;
                }
          }
            
            return $cls;
        


    }


    public function set_properties_val() {
        $prop_val = array();
        $cls = get_called_class();
        global $database;
        foreach($this->table_cols as $col) {
            if(property_exists($cls,$col)) {                
                if(!empty($this->$col)) {
                    if($col == "password") {
                        $psw = password_hash($this->$col,PASSWORD_DEFAULT);
                        $prop_val[$col] = $psw;
                    }else{
                        $prop_val[$col]=$database->escape_string($this->$col);

                    }
                }
            }
        }
        return $prop_val;
    }



    public function create() {
        global $database;
        $properties = $this->set_properties_val();

        $array_keys = array_keys($properties);
        $array_val = array_values($properties);

        $sql = "INSERT INTO ". static::$db_table . " (". implode(",", $array_keys).") VALUES ( '". implode("','",$array_val) ."')";

        $result = $database->run_query($sql);
        if(!$result) {
            return $result;
        }else{
            return true;
        }
        // return true;
    }



    public function update() {
        global $database;
        $properties = $this->set_properties_val();
        $prop_val = array();
        foreach ($properties as $key => $val) {
            $prop_val[] = "{$key} = '{$val}'";
        }
        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", ", $prop_val);
        $sql .= " WHERE id = $this->id";
        $result = $database->run_query($sql);
        
        if ($result > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }

    public static function delete($id) {
        global $database;
        $sql = "DELETE FROM ".static::$db_table . " WHERE id = $id";

        $result = $database->run_query($sql);

        return $result;
    }

    public static function img_src($file)
    {
        $src = "/bookreview/public/img/";
        // return ((empty($this->file) || is_null($this->file)) ? "https://picsum.photos/seed/picsum/200" : $src .$this->file);
        return ((empty($file) || is_null($file)) ? "https://picsum.photos/seed/picsum/200" : $src . $file);
    }


}




?>