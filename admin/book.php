<?php

class Book extends User {
    protected static $db_table = "books";
    protected $table_cols = array("id","user_id","author","title","summary","time");

    public $id;
    public $user_id;
    public $author;
    public $title;
    public $time;
    public $summary;

    public $book_id;
    public $file;



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


    public static function find_book($id) {
        global $database;
        $sql = "SELECT * FROM books INNER JOIN photos ON photos.book_id = books.id WHERE books.id = $id";
        $result = $database->run_query($sql);
        $data = $result->fetch_assoc();
        return static::object_data($data);
        // return $data;
    }

    public static function books($userId) {
        global $database;
        $sql = "SELECT * FROM books INNER JOIN photos ON books.id =photos.book_id WHERE user_id = $userId";


        $result = $database->run_query($sql);
        $data_set = array();
        while ($row = $result->fetch_assoc()) {
            $data_set[] = static::object_data($row);
        }
        return $data_set;
        // $data = $result->fetch_assoc();
        // return static::object_data($data);
    }


    public static function showcase_slides() {
        global $database;
        $sql = "SELECT * FROM books INNER JOIN photos ORDER BY books.id DESC LIMIT 6";
        $result = $database->run_query($sql);
        $data_set = array();
        while ($row = $result->fetch_assoc()) {
            $data_set[] = static::object_data($row);
        }
        return $data_set;
    }

    public static function book_with_summary_review($id) {
        global $database;
        $sql = "SELECT * from reviews where book_id = $id";
        $result = $database->run_query($sql);
        $data_set = array();
        while ($row = $result->fetch_assoc()) {
            $data_set[] = $row;
        }
        return $data_set;
    }




}



?>