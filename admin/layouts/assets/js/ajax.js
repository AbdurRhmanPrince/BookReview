$(document).ready(function () {
    
    // Creating new Book 
    const form = document.getElementById('form');
   
         $(form).submit(function (e) { 


            $.ajax({
                type: "POST",
                url: "/bookreview/admin/backend/addbook.php",
                data: new FormData(this),
                success: function (response) {
                    console.log(response);
                },
                cache: false,
                contentType: false,
                processData: false
            });


            e.preventDefault();
            
        });





    // showing single book through modal






});
