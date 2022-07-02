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
}
else if(!empty($_POST["find"]) && ($_POST["find"] == "summary") && !empty($_POST["summaryId"])) {
    $id = $_POST["summaryId"];

    $summary = Summary::find_item($id);
    echo json_encode($summary);
}
else if(!empty($_POST["deleteSummary"])) {
    $summary = Summary::delete($_POST["deleteSummary"]);

    if($summary > 0) {
        echo "success";
    }
}


?>