<?php require_once("init.php"); ?>
<?php
$user = Profile::find_item($session->user_id);
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
                            <tbody id="tbody">



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
                <a href="editbook.php?id=<?php echo $book->book_id ?>" class="btn btn-success">
                    Edit
                </a>
            </div>
        </div>
    </div>
</div>
<!-- modal -->

<?php require_once("layouts/footer.php"); ?>
