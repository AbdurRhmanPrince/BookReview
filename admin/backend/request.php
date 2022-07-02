<?php
require_once("../init.php");

// request:"books"
if(!empty($_POST["request"]) && ($_POST["request"] == "books"))  {
    $all_books = array();
    $user = Profile::find_item($session->user_id);
    $books = Book::books($user->id);
    foreach($books as $book) {
            $img = Photo::img_src($book->file);
            $all_books[] = ["id"=>$book->book_id, "user_id" => $book->user_id, "img" => $img, "title" => $book->title, "author" => $book->author, "summary" => $book->summary, "time" => $book->time];
        }
    $data = json_encode($all_books);
    echo $data;

}

// fetch summaries and books
if((!empty($_POST["get"])) && ($_POST["get"] == "summaries")) {
    $summary_books = Summary::books_summary($session->user_id);
    echo json_encode($summary_books);
}

// update summary
if ( (!empty($_POST["request"]))  && ($_POST["request"] == "summary_update") && (!empty($_POST["id"])) && (!empty($_POST["book_id"])) && (!empty($_POST["summary"]))) {
    // global $database;
    $summary = new Summary;
    $summary->id = $database->escape_string($_POST["id"]);
    $summary->book_id = $database->escape_string($_POST["book_id"]);
    $summary->summary = $database->escape_string($_POST["summary"]);

    if($summary->save()) {
        echo "success";
    }else{
        echo "failed";
    }

}

// fetch summaries and books
if ((!empty($_POST["get"])) && ($_POST["get"] == "reviews")) {
    // $summary_books = Summary::books_summary($session->user_id);
    // echo json_encode($summary_books);
    echo "hello there you are looking for reviews";
}



?>