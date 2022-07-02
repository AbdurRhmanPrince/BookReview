<?php require_once("init.php"); ?>
<?php
global $session;
$user = Profile::find_item($session->user_id);
?>

<?php require_once("layouts/header.php"); ?>
<?php require_once("layouts/sidebar.php"); ?>


<!-- Top Selling -->
<div class="col-12">
    <div class="card top-selling overflow-auto">

        <div class="card-body pb-0">
            <h5 class="card-title">Total Summaries <span>|</span></h5>

            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Book</th>
                        <th scope="col">Summary</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="summary_table">

                </tbody>
            </table>

        </div>

    </div>
</div><!-- End Top Selling -->



<div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <div class="content">
                    <div class="lead" id="summary">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php require_once("layouts/footer.php"); ?>