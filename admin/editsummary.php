<?php require_once("init.php"); ?>
<?php
$user = Profile::find_item($session->user_id);
$summary = Summary::find_summary($_GET["id"]);
?>


</div><?php require_once("layouts/header.php"); ?>
<?php require_once("layouts/sidebar.php"); ?>
<!-- summary -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" id="">Default Accordion</h5>
            <div class="book_data">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/bookreview/public/img/favicon.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title book_title">Card with an image on left</h5>
                                <p class="card-text book_author">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- end of summary -->
<?php require_once("layouts/footer.php"); ?>