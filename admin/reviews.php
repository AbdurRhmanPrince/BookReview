<?php require_once("init.php"); ?>
<?php
$user = Profile::find_item($session->user_id);
?>

<?php require_once("layouts/header.php"); ?>
<?php require_once("layouts/sidebar.php"); ?>

<!-- filter -->

<div class="btn-group m-2" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary disabled">Oldest</button>
    <button type="button" class="btn btn-primary">Newest</button>
</div>
<!-- according -->
<section class="section">
    <div class="row" id="review_container">




    </div>
</section>

<!--  -->
<!-- Basic Pagination -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav><!-- End Basic Pagination -->


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
            </div>
        </div>
    </div>
</div>


<?php require_once("layouts/footer.php"); ?>