<?php
require_once("../init.php");

// FeedBack
$response = array();

// Book Validation
if(Book::title_validation($database->escape_string($_POST["title"]))) {
        $book = new Book();
        $book->user_id = $database->escape_string($_POST["user_id"]);
        $book->title = $database->escape_string($_POST["title"]);
        $book->author = $database->escape_string($_POST["author"]);
        $book->summary = $database->escape_string($_POST["summary"]);
        if($book->save()) {
            echo "book post id is - ". $database->last_id();
        }else{
            echo "adding new books failed";
        }
}else{
    $response["title"] = "Same Title Found.Try another one";
};
// Photo Validation,
// if (Photo::validate_photo($_FILES["file"])) {
//     // upload book and get id;
//     $photo = new Photo();
//     $photo->upload_img($_FILES["file"]);
// } else {
//     $response["photo_type"] = "Only image file can be uploaded.";
// }



