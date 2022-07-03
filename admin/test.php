<?php
require_once("init.php");

 $books = Book::showcase_slides();

    // while($row = $books->fetch_assoc()) {
    //     print_r($row);
    // }

    print_r($books);


?>

