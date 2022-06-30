// console.log("hello");

$(document).ready(function () {

    let createBtn = $(".createBtn");
    let create_form = $ ("#create_form");
    let loginForm = $("#loginForm");
    let setVal = "login";

    $(createBtn).click(function () {

        // changing the Sign in/sing up Form 
        let btnText = createBtn.text();
        if(btnText == "Login") {
        $(this).text("Create new Account");
        setVal = "login"
        }else{
            $(this).text("Login");
            setVal = "create"

        }
        
         localStorage.setItem("show", setVal);
        show_form();

    });

    // when page is refresh the actual form where the user was, will be visible
    show_form();
    function show_form() {
    let show = localStorage.getItem("show");
    if (show == "login") {
        $(create_form).hide();
        $(loginForm).css("display", "block");
        createBtn.text("Create new Account");
    } else {
        $(loginForm).hide();
        $(create_form).css("display", "block");
        createBtn.text("Login");

    }
}
    // Login Data 
    $(loginForm).submit(function (e) {

        let email = $("#user_email").val();
        let password = $("#user_psw").val();

        let new_user = {
            sign:"user",
            email: email,
            password: password
        }

        // checking all object prop and val, if null or empty then return true

        // ajax request 
            $.ajax({
                type: "POST",
                url: "/bookreview/admin/signin.php",
                data: new_user,
                success: function (response) {
                    if(response == "ok") {
                        // window.
                            window.location = "/bookreview/dashboard.php";
                    }
                }
            });
       


        // end of ajax

        e.preventDefault();
    });


    // create form
    $(create_form).submit(function (e) { 

        let name = $("#new_user").val();
        let email = $("#new_email").val();
        let password = $("#new_psw").val();

        let new_user = {
            name : name,
            email: email,
            password: password
        }

        // checking all object prop and val, if null or empty then return true
        
        // ajax request 
        if(check_inputs(new_user)) {
        $.ajax({
            type: "POST",
            url: "/bookreview/admin/signin.php",
            data: new_user,
            success: function (response) {
                console.log(response);
            }
        });
        }else{
            console.log("form inputs invalid");
        }


        // end of ajax

        e.preventDefault();
    });
// console.log(create_form);

    // validator function

    function check_inputs(obj) {
        let val = Object.values(obj);
        for(i = 0; i < val.length; i++) {
            if (val[i] == "" || val[i] == null || val.length < 3) {
                return false;
            }
        }
        return true;
    }






});