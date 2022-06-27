<?php

class Photo extends User {
    protected static $db_table = "photos";
    protected $table_cols = array("id", "book_id", "file");

    public $id;
    public $book_id;
    public $file;


    
    public static function validate_photo($file) {
        $allowed_image_extension  = array("png","jpg","jpeg");
         $fileEx = pathinfo($file["name"],PATHINFO_EXTENSION);
         if(in_array($fileEx, $allowed_image_extension)) {
            return true;
         }else{
            return false;;
         }
    }



}



?>