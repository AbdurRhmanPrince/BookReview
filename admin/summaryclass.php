<?php

    class Summary extends User {
    protected static $db_table = "summary";
    protected $table_cols = array("id", "book_id", "summary");

    public $id;
    public $book_id;
    public $file;
    public $summary = array();
    public $user_id;



    public static function books_summary($user) {

        global $database;
        $sql = "SELECT books.id,books.title,books.author , photos.file, summary.summary FROM books INNER JOIN summary ON summary.book_id = books.id INNER JOIN photos ON photos.book_id = books.id WHERE user_id = $user";

        $result = $database->run_query($sql);
        $summary = array();
        while($row = $result->fetch_assoc()) {
            $img = Summary::img_src($row["file"]);
            $summary[] = ["id"=>$row["id"], "title" => $row["title"], "author" => $row["author"], "file" => $img, "summary" => $row["summary"]];
        }
        return $summary;
    }


    public static function find_summary($id) {
        global $database;
        $sql = "SELECT books.id,books.title,books.author, photos.file,summary.summary FROM books INNER JOIN summary ON summary.book_id = books.id INNER JOIN photos ON photos.book_id = books.id where books.id = $id";
        $result = $database->run_query($sql);

        $summary = array();
        while ($row = $result->fetch_assoc()) {
            $img = Summary::img_src($row["file"]);
             $summary["id"] = $row["id"];
             $summary["title"] = $row["title"];
             $summary["author"] = $row["author"];
             $summary["file"] = $img;
             $summary["summary"] = $row["summary"];
        }
        return $summary;
    }






    }
?>