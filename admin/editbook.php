<?php require_once("init.php"); ?>
<?php
// global $session;
$user = Profile::find_item($session->user_id);

$book = Book::find_book($_GET["id"]);


?>

<?php require_once("layouts/header.php"); ?>
<?php require_once("layouts/sidebar.php"); ?>
<div class="add_new_books">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Editing Book</h5>

            <!-- Vertical Form -->
            <form class="row g-3" enctype="multipart/form-data" id="form">
                <div class="box_img text-center">
                    <img src="<?php echo Photo::img_src($book->file); ?>" alt="" height="300px" width="300px">
                </div>
                <input type="hidden" name="user_id" value="<?php echo $session->user_id ?>">
                <input type="hidden" name="book_id" value="<?php echo $book->book_id ?>">
                <input type="hidden" name="photo_id" value="<?php echo $book->id ?>">


                <div class="">
                    <label for="inputNumber" class="col-12 col-form-label">Cover Photo Of The Book</label>
                    <div class="col-12">
                        <input class="form-control" name="file" type="file" id="file">
                    </div>
                </div>
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="<?php echo $book->title; ?>">
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" id="author" value="<?php echo $book->author; ?>">
                </div>
                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Summary</label>
                    <div class="col-12">
                        <textarea class="form-control" name="summary" style="height: 100px" id="mytextarea">
                         <?php echo $book->summary; ?>
                    </textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-danger ">DELETE</button>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
</div>

<?php require_once("layouts/footer.php"); ?>
<!-- <script src="/bookreview/admin/layouts/assets/js/ajax.js"></script> -->