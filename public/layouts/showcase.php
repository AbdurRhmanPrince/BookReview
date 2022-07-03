   <!-- show recent 6 added books  -->
   <?php require_once("admin/init.php"); ?>
   <?php
    $books = Book::showcase_slides();

    ?>
   <!--  -->

   <!-- Product section-->
   <section class="py-5">
       <div class="container">
           <div class="swiper">
               <div class="swiper-wrapper">
                   <?php foreach ($books as $book) : ?>
                       <div class="swiper-slide">
                           <div class="row align-items-center">
                               <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo $book->file ?>" alt="..." /></div>
                               <div class="col-md-6">
                                   <div class="small ">
                                       <?php echo $book->time ?>
                                   </div>
                                   <h1 class="display-5 fw-bolder text-capitalize"><?php echo $book->title ?></h1>
                                   <div class="fs-5 text-capitalize">
                                       <span> <?php echo $book->author ?>
                                       </span>
                                   </div>
                                   <p class="lead"> <?php echo substr($book->summary, 0, 30) ?>
                                   </p>
                                   <div class="d-flex">
                                       <a href="/bookreview/book.php?id=<?php echo $book->id; ?>" class="btn btn-primary">Read Summary | Read Reviews | Write a Review</a>

                                   </div>
                               </div>
                           </div>

                       </div>
                   <?php endforeach ?>
               </div>
               <div class="swiper-button-prev"></div>
               <div class="swiper-button-next"></div>
           </div>
       </div>
   </section>