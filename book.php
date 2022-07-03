<?php
require_once("admin/init.php");

if (!empty($_GET["id"])) {
    $book = Book::find_book($_GET["id"]);
    $reviews = Book::book_with_summary_review($_GET["id"]);
} else {
    redirect("home.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/bookreview/home.php">BOOK REVIEW</a>
        </div>
    </nav>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="">
            <div class="col-lg-12">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1 text-capitalize"><?php echo $book->title; ?></h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Uploaded on <?php echo $book->time; ?></div>
                        <!-- Post categories-->


                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4 text-center"><img height="400px" class="rounded" src="<?php echo $book->file; ?>" alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5"> Summary :
                        <p class="fs-5 mb-4"><?php echo $book->summary; ?></p>
                    </section>
                </article>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-white">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4" id="review_form">
                                <textarea class="form-control" rows="3" placeholder="Share the knowledge and leave a review!" id="review"></textarea>
                                <input type="hidden" id="book_id" value="<?php echo $book->book_id ?>"> <br>
                                <?php
                                if ($session->loggedIn) {
                                    $user = Profile::find_item($session->user_id);
                                    echo "<input type='text' id='name' class='form-control' disabled value= $user->name >";
                                } else {
                                    echo "<input type='text' class='form-control' placeholder = 'Name.' id='name'>";
                                }


                                ?>

                                <br>
                                <button type="button" class="btn btn-primary m-auto" id="submit">Submit Review</button>

                            </form>
                            <hr>
                            <!-- Comment with nested comments-->


                            <!-- Single comment-->
                            <?php foreach ($reviews as $review) : ?>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 mr-2"><img class="rounded-circle" src="https://cdn-icons-png.flaticon.com/512/4128/4128176.png" height="60px" width="60px" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold"><?php echo $review["name"]; ?></div>
                                        <?php echo $review["review"]; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        let form = $("#submit");
        $(form).click(function(e) {

            let review = $("#review").val();
            let name = $("#name").val();
            let book_id = $("#book_id").val();

            let data = {
                request: "addReview",
                name: name,
                book_id: book_id,
                review: review
            }

            $.ajax({
                type: "POST",
                url: "/bookreview/admin/backend/request.php",
                data: data,
                success: function(response) {
                    console.log(response);
                    if (response == "success") {
                        window.location.reload();
                    }
                }
            });




            e.preventDefault();

        });
    </script>
</body>

</html>