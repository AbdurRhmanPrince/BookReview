<?php require_once("init.php"); ?>
<?php
// global $session;
$user = Profile::find_item($session->user_id);
$photo = new Photo();
?>

<?php require_once("layouts/header.php"); ?>
<?php require_once("layouts/sidebar.php"); ?>



<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Brief Overview of All Uploaded books. </h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Preview </th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Total Reviews </th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $books = Book::find_all_item();
                                ?>

                                <?php foreach ($books as $book) : ?>
                                    <!-- img  -->
                                    <?php
                                        // $photo = Photo::find_item($book->id)->file;
                                    ?>
                                    <!-- end img setting -->
                                    <tr class="text-center">
                                        <th>
                                            <a href="#"><img src="<?php ?>" alt="" width="60px" height="60px"></a>
                                        </th>
                                        <td><?php echo $book->title; ?></td>
                                        <td><?php echo $book->author; ?></td>
                                        <td>28</td>
                                        <td>
                                            <button type="button" class=" viewBook btn btn-success m-1" data-toggle="modal" data-target="#bookModal" data-id="<?php echo $book->id ?> "><i class="bi bi-eye"></i></button>
                                            <a href="editbook.php?id=<?php echo $book->id ?>" class="btn btn-primary m-1">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger text-white m-1"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>

                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- modal -->
<!-- Modal -->
<div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookTitle">Modal title</h5>
                <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="box text-center">
                    <img src="https://picsum.photos/seed/picsum/200" alt="" width="300px" height="300px" id="bookImg">
                </div>
                <div class="content">
                    <br>
                    <div class="float-right">
                        <i class="bi bi-clock-history"></i>
                        <span id="time"></span>
                    </div><br>
                    <div class="lead" id="summary">

                    </div>
                    <br>
                    <footer class="blockquote-footer"> <cite title="Source Title" id="author">Source Title</cite></footer>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="editbook.php?id=<?php echo $book->id ?>" class="btn btn-success">
                    Edit
                </a>
            </div>
        </div>
    </div>
</div>
<!-- modal -->


<?php require_once("layouts/footer.php"); ?>


<script>
    $(".viewBook").on("click", function() {

        let bookTitle = $("#bookTitle");
        let bookImg = $("#bookImg");
        let time = $("#time");
        let summary = $("#summary");
        let author = $("#author");


        let bookId = $(this).attr("data-id");
        // alert(bookId);
        // console.log(bookId);
        $.ajax({
            type: "POST",
            url: "/bookreview/admin/backend/ajax.php",
            data: {
                bookId: bookId
            },
            success: function(response) {
                // console.log(response);
                let book = JSON.parse(response);
                bookTitle.text(book.title);
                time.text(book.time);
                bookImg.attr("src", book.photo_id);
                summary.append(book.summary);
                author.text(book.author);

            },
        });
    });
</script>