<?php require_once("init.php"); ?>
<?php
$user = Profile::find_item($session->user_id);
$summary = Summary::find_summary($_GET["id"]);
?>

<?php require_once("layouts/header.php"); ?>
<?php require_once("layouts/sidebar.php"); ?>


<!-- summary -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" id="">Links</h5>
            <div class="book_data">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo $summary["file"] ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">
                                    <?php echo $summary["title"] ?>
                                </h5>
                                <p class="card-text book_author">
                                    <?php echo $summary["author"] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <br>
            <div class="card">
                <form id="summary_update" enctype="multipart/form-data" class="row g-3">
                    <input type="hidden" id="summary_id" name="id" value="<?php echo $summary["summary_id"]; ?>">
                    <input type="hidden" id="book_id" name="book_id" value="<?php echo $summary["book_id"]; ?>">

                    <div class="col-12 p-3">
                        <label for="inputPassword4" class="form-label">Summary</label>
                        <div class="col-12">
                            <textarea class="form-control" name="summary" style="height: 100px" id="mytextarea"><?php echo $summary["summary"]; ?>
                    </textarea>
                        </div>
                    </div> <br>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button onclick="delete_summary(<?php echo $summary['summary_id']; ?>);" type="reset" class="btn btn-danger ">DELETE</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- end of summary -->


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