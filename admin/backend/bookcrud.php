<?php
require_once("../init.php");

// FeedBack
$response = array();

if(!empty($_POST["user_id"])) {
    
    // assigning values
    $book = new Book;        
    $book->user_id = $database->escape_string($_POST["user_id"]);
    $book->title = $database->escape_string($_POST["title"]);
    $book->author = $database->escape_string($_POST["author"]);
    $book->summary = $database->escape_string($_POST["summary"]);

     $book->save();
        if($_FILES["file"]) {
           if (Photo::validate_photo($_FILES["file"])) {
              $photo = new Photo();
             $photo->upload_img($_FILES["file"]);
            //  global $database;
             $photo->book_id = $database->last_id();
              if($photo->save()) {
                     echo 'success';
                }

           }
        }
}





// Book Validation
// if(Book::title_validation($database->escape_string($_POST["title"]))) {
//         $book = new Book();
//         $book->user_id = $database->escape_string($_POST["user_id"]);
//         $book->title = $database->escape_string($_POST["title"]);
//         $book->author = $database->escape_string($_POST["author"]);
//         $book->summary = $database->escape_string($_POST["summary"]);

//         if (Photo::validate_photo($_FILES["file"])) {
//                 // upload book and get id;
//                 if($book->save()) {
//                     $book_id = $database->last_id();
//                      $photo = new Photo();
//                      $photo->upload_img($_FILES["file"]);
//                     // $photo->file = "category.jpg";
//                      $photo->book_id = $book_id;   
                
//                      if($photo->save()) {
//                         $book->id = $book_id;
//                         $book->photo_id = $database->last_id();
//                         if($book->save()) {
//                             echo "success";
//                         }else{
//                             echo "failed";
//                         }
//                      }else{
//                         echo "failed to insert photo dta";
//                      }
//                 }else{
//                     // echo "adding new books failed";
//                     $response["book_data"] = "Failed to Save Book details.";

//                 }
//         } else {
//             $response["photo_type"] = "Only image file can be uploaded.";
//         }

// }else{
//     $response["title"] = "Same Title Found.Try another one";
// };
// Photo Validation,



