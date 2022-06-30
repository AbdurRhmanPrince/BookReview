<?php
require_once("init.php");

if($session->loggedIn) {
    echo 'yourre logged in ';
    redirect("/bookreview/dashboard.php");
}else{
echo "not logged in";
}
                                <?php foreach ($books as $book) : ?>
                                    <!-- img  -->
                                    <?php
                                    $img = Photo::img_src($book->file);
                                    ?>
                                    <!-- end img setting -->
                                    <tr class="text-center">
                                        <th>
                                            <a href="#"><img src="<?php echo $img ?>" alt="" width="60px" height="60px"></a>
                                        </th>
                                        <td><?php echo $book->title; ?></td>
                                        <td><?php echo $book->author; ?></td>
                                        <td>28</td>
                                        <td>
                                            <button type='button' class=' viewBook btn btn-success m-1' data-toggle='modal' data-target='#bookModal' data-id=' '><i class='bi bi-eye'></i></button>
                                            <a href='editbook.php?id=' class='btn btn-primary m-1'>
                                                <i class='bi bi-pencil-square'></i>
                                            </a>
                                            <button type="button" class='btn btn-danger text-white m-1'><i class='bi bi-trash'></i></button>
                                        </td>
                                    </tr>

                                <?php endforeach ?>
// echo 'hello';
// $photo = new Photo();
// $book = Book::find_item(14);
// // $string = "<p style='text-center'>text</p>";
// $string  = htmlspecialchars_decode($book->summary, ENT_NOQUOTES);

// $string = trim($string);
// echo $string;
// print_r(Book::books())
// $book = Book::find_book(19);
// $book = Book::object_data($book);

// print_r($book);
// foreach(Book::object_data($book) $as)



// print_r(Book::object_data($book));
// $vars = get_object_vars($book);
// print_r($vars)
// $photo->file = Photo::find_item($book->photo_id)->file;

//  $session->login(6);



?>

<!-- <img src="echo Photo::img_src($book->file);" alt="" height="100"> -->
<!-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis itaque optio excepturi eveniet pariatur animi voluptate cupiditate iste quia reiciendis. -->