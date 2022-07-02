<?php

class Review extends User {
    protected static $db_table = "reviews";
    protected $table_cols = array("id","book_id","name","review","user_id","time");


    public $id;
    public $book_id;
    public $user_id;
    public $name;
    public $review;
    public $time;



    // find review 

    // public static function reviews() {
    //     $sql = "SELECT books.id,books.title,books.author FROM books INNER JOIN reviews";
    // }





}


?>