<?php
require_once("../init.php");

if(!empty($_POST["find"]) && !empty($_POST["bookId"]) && ($_POST["find"] == "book")) {
    $id = $_POST["bookId"];
    $book = Book::find_book($id);
    $img = Photo::img_src($book->file);
    $book->file = $img;
    echo json_encode($book);
}else if(!empty($_POST["delete"]) && !empty($_POST["bookId"]) && ($_POST["delete"] == "book") ) {

    $id = $_POST["bookId"];
    $book = Book::find_book($id);
    Photo::delete_file($book->file);
    echo Book::delete($id);

    // echo json_encode($book);
    // echo "hello there you're trying to delete a book";
    // echo "empty";
}

?>