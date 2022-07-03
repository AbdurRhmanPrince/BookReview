$(document).ready(function () {
    
    // Creating new Book 
    const form = document.getElementById('form');
         $(form).submit(function (e) { 
            $.ajax({
                type: "POST",
                url: "/bookreview/admin/backend/bookcrud.php",
                data: new FormData(this),
                success: function (response) {
                    // console.log(response);
                    if(response == "success") {
                        $("#form").trigger("reset");
                        console.log("successfully product added");
                        // alert("successfully product added");
                    }

                },
                cache: false,
                contentType: false,
                processData: false
            });


            e.preventDefault();
            
        });
    show("books");
});




function show(books) {
    // console.log( "your are requesting to show "+ books);
    let tbody = $("#tbody");
    $.ajax({
        type: "POST",
        url: "/bookreview/admin/backend/request.php",
        data: {request:"books"},
        success: function (response) {
            let table_rows = JSON.parse(response);
            // console.log(table_rows[0]);
            if(table_rows.length > 0) {
                for (let i = 0; i < table_rows.length; i ++) {

                    // before appending make sure the tr is unique 
                        $(tbody).append(
                            "<tr id = '" +table_rows[i].id +"'>"+
                            "<td><img src="+ table_rows[i].img +" alt='' width='60px' height='60px'></td>"+
                            "<td>" + table_rows[i].title + "</td>"+
                            "<td>" + table_rows[i].author + "</td>" +
                            "<td>" + 3 + "</td>" +
                            "<td>" + 
                            "<button onclick='view_item(" + table_rows[i].id +");' type='button' class='viewBook btn btn-success m-1' data-toggle='modal' data-target='#bookModal'><i class='bi bi-eye'></i></button>"+
                                    "<a href='editbook.php?id="+ table_rows[i].id +"' class='btn btn-primary m-1'><i class='bi bi-pencil-square'></i></a>"+
                            "<button onclick='delete_item(" + table_rows[i].id +");' type='button' class='btn btn-danger text-white m-1'><i class='bi bi-trash'></i></button>"
                            + "</td>" +
    
                            +"</tr>");

                }
            }
            // console.log(table_rows.length);
            // if (response == "success") {
            //     // $("#form").trigger("reset");
            //     // alert("successfully product added");
            // }

        },
    });
}

// showing content in the modal
function view_item(id) {
    // console.log(id);
            let bookTitle = $("#bookTitle");
            let bookImg = $("#bookImg");
            let time = $("#time");
            let summary = $("#summary");
            let author = $("#author");
            let bookId = id;
            
            $.ajax({
                type: "POST",
                url: "/bookreview/admin/backend/ajax.php",
                data: {
                    find:"book",
                    bookId: bookId
                },
                success: function(response) {
                    // console.log(response);
                    let book = JSON.parse(response);
                    bookTitle.text(book.title);
                    time.text(book.time);
                    bookImg.attr("src", book.file);
                    summary.append(book.summary);
                    author.text(book.author);
                },
            });


    // console.log(ele.attr("data-id"));
}


function delete_item(id) {
    let bookId = id;

    $.ajax({
        type: "POST",
        url: "/bookreview/admin/backend/ajax.php",
        data: {
            delete:"book",
            bookId: bookId
        },
        success: function (response) {
            $("#tbody > tr").empty();
            show("books");
            console.log(response);
        },
    });

    // console.log(ele.attr("data-id"));
}

summaries();
// fetch summaries 
function summaries() {
    let summary_container = $("#summary_container");

    $.ajax({
        type: "POST",
        url: "/bookreview/admin/backend/request.php",
        data: {
            get: "summaries",
        },
        success: function (response) {
            let books_summaries = JSON.parse(response);
            for(let i in books_summaries) {
            let html =
             "<div class='col-lg-6'>" +
              "<div class='card'>"+
                    "<div class='card-body'>"+
                "<h5 class='card-title'>"+
                "<button onclick='view_item(" + books_summaries[i].book_id + ");' type='button' class='viewBook btn btn-primary m-1' data-toggle='modal' data-target='#bookModal'>View Book</button>"+
                "<a href='editbook.php?id="+books_summaries[i].book_id+"' class ='btn btn-success'>Edit Book </a>"
                        +"</h5>"+
                        "<div class='book_data'>"+
                         "<div class='card mb-3'>"+
                                "<div class='row g-0'>"+
                                    "<div class='col-md-4'>"+
                                    "<img src='"+books_summaries[i].file+"' class='img-fluid rounded-start' alt='img'>"+"</div>"+
                                    "<div class='col-md-8'>"+
                                        "<div class='card-body'>"+
                                            "<h5 class='card-title text-capitalize'>" + books_summaries[i].title +"</h5>"+
                                            "<p class='card-text book_author'>"+
                                            books_summaries[i].author
                                            +"</p>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                        "<div class='card'>"+
                    "<div class='card-header d-flex flex-row-reverse'>"+"<a href='editsummary.php?id="+books_summaries[i].book_id+"' class ='btn btn-secondary'> Edit Summary </a></div>"+
                        "<div class='card-body'>"+"<h5 class='card-title'>" +
                         books_summaries[i].summary+"</h5>"+
                         
                        "</div>"+
                        "<div class='card-footer'>"+
                "<button onclick='' type='button' class='btn btn-primary m-1'>Total Reviews</button>" +
                "<a href='editbook.php?id="+books_summaries[i].book_id+"' class ='btn btn-success'>View Reviews </a>"
                        "</div>"+
                    "</div>"+
                    "</div>"+
            "</div>"+
        "</div>";
                summary_container.append(html);
        }

        },
    });

}



$("#summary_update").submit(function (e) { 
        
    let book_id = $("#book_id").val();
    let summary_id = $("#summary_id").val();
    let summary = $("#mytextarea").val();
        summary = summary.trim();
    let data = {
        request:"summary_update",
        id:summary_id,
        book_id:book_id,
        summary:summary
    }

    $.ajax({
        type: "POST",
        url: "/bookreview/admin/backend/request.php",
        data: data,
        success: function (response) {
            if(response == "success") {
                location.reload();
                // console.log(response);            
            }
        }
    });





    
    e.preventDefault();
});


// show summaries quick view

summaries_quick();
// fetch summaries 
function summaries_quick() {
    let summary_container = $("#summary_table");

    $.ajax({
        type: "POST",
        url: "/bookreview/admin/backend/request.php",
        data: {
            get: "summaries",
        },
        success: function (response) {
            let books_summaries = JSON.parse(response);
            // console.log(books_summaries);
            for (let i in books_summaries) {
                let summarize = books_summaries[i].summary.substr(0, 20);

                let html =
                    "<tr>"+
                    "<td>"+
                    "<img width='80px' height='80px' src='" + books_summaries[i].file + "' class='img-fluid rounded-start' alt='img'></td>"+
                    "<td>" + summarize + "..</td><td>"+
                    "<button onclick='view_summary(" + books_summaries[i].summary_id + ");' type='button' class='viewBook btn btn-primary m-1' data-toggle='modal' data-target='#bookModal'><i class='bi bi-eye'></i></button>"+
                    "<a href='editsummary.php?id=" + books_summaries[i].book_id + "' class ='btn btn-success'><i class='bi bi-pencil-square'></i> </a>" + " "+
                    "<button onclick='delete_summary(" + books_summaries[i].summary_id + ");' type='button' class='viewBook btn btn-danger m-1'><i class='bi bi-trash'></i></button>";
                summary_container.append(html);
            }





            // console.log(response);
        },
    });

    // console.log(ele.attr("data-id"));
}


// showing summary in the modal

// showing content in the modal
function view_summary(id) {

    let show_summary = $("#summary");
    let summaryId = id;

    $.ajax({
        type: "POST",
        url: "/bookreview/admin/backend/ajax.php",
        data: {
            find: "summary",
            summaryId: summaryId
        },
        success: function (response) {
            let summary = JSON.parse(response);
            show_summary.append(summary.summary);
        },
    });


}

function delete_summary(id) {
    $.ajax({
        type: "POST",
        url: "/bookreview/admin/backend/ajax.php",
        data: {
            deleteSummary: id
        },
        success: function (response) {
            if(response == "success") {
                window.location = "/bookreview/admin/summary.php";
            }
            // console.log(response);
            // let summary = JSON.parse(response);
            // show_summary.append(summary.summary);
        },
    });
}


// reviews();
// // fetch summaries 
// function reviews() {
//     let summary_container = $("#reviews_container");

//     $.ajax({
//         type: "POST",
//         url: "/bookreview/admin/backend/request.php",
//         data: {
//             get: "reviews",
//         },
//         success: function (response) {
//             // let books_summaries = JSON.parse(response);
//             console.log(response);
//             if(response == "success") {
//                 window.location.reload();
//             }
//         },
//     });

// }