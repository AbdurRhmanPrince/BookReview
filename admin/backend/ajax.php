<?php
require_once("../init.php");

if(!empty($_POST["bookId"])) {
    $id = $_POST["bookId"];
    $book = Book::find_item($id);
    $img = new Photo;
    $img->file = Photo::find_item($book->photo_id)->file;
    // $book->summary = html_entity_decode($book->summary);
    $book->photo_id = $img->img_src();
    echo json_encode($book);
    // echo "hello ". $_POST["bookId"];
}else{
    echo "empty";
}

?>