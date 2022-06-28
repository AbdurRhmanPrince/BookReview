<?php
require_once("init.php");

$photo = new Photo();
$book = Book::find_item(7);
$photo->file = Photo::find_item($book->photo_id)->file;
echo $photo->img_src();
// echo Photo::find_item(1);
// $photo->file = "category.jpg";
// $photo->book_id = 1;

// if($photo->save()) {
//     echo "success";
// }else{
//     echo "failed";
// }

// global $session;
//  $session->login(1);


// $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);

//  print_r(explode(".", $curPageName));

// echo "The current page name is: " . $curPageName;
// echo "</br>";
?>

<!-- <img src="https://picsum.photos/seed/picsum/200" alt=""> -->
<!-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis itaque optio excepturi eveniet pariatur animi voluptate cupiditate iste quia reiciendis. -->