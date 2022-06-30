$(document).ready(function () {
    
    // Creating new Book 
    const form = document.getElementById('form');
   
         $(form).submit(function (e) { 


            $.ajax({
                type: "POST",
                url: "/bookreview/admin/backend/bookcrud.php",
                data: new FormData(this),
                success: function (response) {
                    console.log(response);
                    // if(response == "success") {
                    //     location.reload();
                    // }

                },
                cache: false,
                contentType: false,
                processData: false
            });


            e.preventDefault();
            
        });





    // showing single book through modal






});
