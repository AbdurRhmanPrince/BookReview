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
                        alert("successfully product added");
                    }

                },
                cache: false,
                contentType: false,
                processData: false
            });


            e.preventDefault();
            
        });




        // modal view 





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

                    $(tbody).append(
                        "<tr>"+
                        "<td><img src="+ table_rows[i].img +" alt='' width='60px' height='60px'></td>"+
                        "<td>" + table_rows[i].title + "</td>"+
                        "<td>" + table_rows[i].author + "</td>" +
                        "<td>" + 3 + "</td>" +
                        "<td>" + 
                        "<button onclick='view_book(" + table_rows[i].id +");' type='button' class='viewBook btn btn-success m-1' data-toggle='modal' data-target='#bookModal'><i class='bi bi-eye'></i></button>"+
                                "<a href='editbook.php?id="+ table_rows[i].id +"' class='btn btn-primary m-1'><i class='bi bi-pencil-square'></i></a>"+
                                "<button type='button' class='btn btn-danger text-white m-1'><i class='bi bi-trash'></i></button>"
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
        // cache: false,
        // contentType: false,
        // processData: false
    });
}


function view_book(id) {
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