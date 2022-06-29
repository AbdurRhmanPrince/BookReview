<?php
require_once("../init.php");

if(!empty($_POST["bookId"])) {
    $id = $_POST["bookId"];
    $book = Book::find_item($id);

    // send data : book details, photo file src,.
    echo json_encode($book);
    // echo "hello ". $_POST["bookId"];
}else{
    echo "empty";
}

?>