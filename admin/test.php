<?php
require_once("init.php");

//  $reviews = Book::book_with_summary_review(32);
    $book = Book::find_book(35);
    // foreach($reviews as $review) {
    //     echo $review["name"];
    // }
    // while($row = $books->fetch_assoc()) {
    //     print_r($row);
    //     // print_r($row["name"] . "<br>");
    // }

    print_r($book);
// 

?>

