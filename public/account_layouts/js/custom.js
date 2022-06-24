// console.log("hello");

$(document).ready(function () {

    let createBtn = $(".createBtn");
    let create_form = $ ("#create_form");
    let loginForm = $("#loginForm");

    $(createBtn).click(function () {

        // changing the Sign in/sing up Form
        let btnText = createBtn.text();
        if(btnText == "Login") {
        $(create_form).hide();
        $(loginForm).css("display","block");
        $(this).text("Create new Account");
        }else{
            $(this).text("Login");
            $(loginForm).hide();
            $(create_form).css("display", "block");
            $(this).text("Login");
        }






    });






});