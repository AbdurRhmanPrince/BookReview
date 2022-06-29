<?php

class Book extends User {
    protected static $db_table = "books";
    protected $table_cols = array("id","user_id","photo_id","author","title","summary","time");

    public $id;
    public $user_id;
    public $photo_id;
    public $author;
    public $title;
    public $time;
    public $summary;


    public static function title_validation($title) {
        global $database;

        $sql = "SELECT * FROM ". static::$db_table ." WHERE title = '$title'";
        $result = $database->run_query($sql);

        if($result->num_rows > 0) {
            // return "failed, same title exists";
            return false;
        }else{
            return true;
            // return "good to go";
        }
    }






}



?>