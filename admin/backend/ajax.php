<?php
require_once("../init.php");

if(!empty($_POST["bookId"])) {
    $id = $_POST["bookId"];
    $book = Book::find_book($id);
    $img = Photo::img_src($book->file);
    $book->file = $img;
    echo json_encode($book);
}else{
    echo "empty";
}

?>