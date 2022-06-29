<?php require_once("init.php"); ?>
<?php
global $session;
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
                                    <?php $photo->file = Photo::find_item($book->photo_id)->file; ?>
                                    <!-- end img setting -->
                                    <tr class="text-center">
                                        <th>
                                            <a href="#"><img src="<?php echo $photo->img_src(); ?>" alt="" width="60px" height="60px"></a>
                                        </th>
                                        <td><?php echo $book->title; ?></td>
                                        <td><?php echo $book->author; ?></td>
                                        <td>28</td>
                                        <td>
                                            <button type="button" class=" viewBook btn btn-success m-1" data-toggle="modal" data-target="#" data-id="<?php echo $book->id ?> "><i class="bi bi-eye"></i></button>
                                            <a href="#" class="btn btn-primary m-1">
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
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->


<?php require_once("layouts/footer.php"); ?>
<script src="/bookreview/admin/layouts/assets/js/ajax.js"></script>


<script>
    $(".viewBook").on("click", function() {
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
                console.log(response);
            },
        });
    });
</script>