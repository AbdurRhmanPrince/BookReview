<?php
require_once("init.php");

// $photo = new Photo();
$book = Book::find_item(14);
// $string = "<p style='text-center'>text</p>";
$string  = htmlspecialchars_decode($book->summary, ENT_NOQUOTES);

$string = trim($string);
echo $string;
// $photo->file = Photo::find_item($book->photo_id)->file;

// global $session;
//  $session->login(1);



?>

<!-- <img src="https://picsum.photos/seed/picsum/200" alt=""> -->
<!-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis itaque optio excepturi eveniet pariatur animi voluptate cupiditate iste quia reiciendis. -->