<!DOCTYPE html>
<html lang="en">

<head>
    <title>BOOK REVIEW | User Entrance</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/bookreview/public/account_layouts/images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/bookreview/public/account_layouts/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/bookreview/public/account_layouts/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/bookreview/public/account_layouts/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/bookreview/public/account_layouts/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="/bookreview/public/account_layouts/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="/bookreview/public/account_layouts/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="/bookreview/public/account_layouts/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/bookreview/public/account_layouts/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="/bookreview/public/account_layouts/css/util.css">
    <link rel="stylesheet" type="text/css" href="/bookreview/public/account_layouts/css/main.css">
</head>
<style>
</style>

<body>
    <div class="navigation d-flex justify-content-center m-2">
        <a href="/bookreview/home.php" class="btn btn-primary mr-2">Home</a>
        <button id="createBtn" class="btn btn-info createBtn"></button>
    </div>



    <div class="limiter">
        <div class="container-login100">

            <div class="wrap-login100">
                <!-- <form class="login100-form validate-form"> -->

                <form class="login100-form validate-form" id="loginForm">
                    <span class="login100-form-title p-b-43">
                        Login to continue
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" id="user_email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" id="user_psw">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            or sign up using
                        </span>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </a>

                        <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

                <form class="login100-form validate-form" id="create_form">
                    <span class="login100-form-title p-b-43">
                        Create A New Account...
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" id="new_email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Valid User Name is required: ex@abc.xyz">
                        <input class="input100" type="text" name="userName" id="new_user">
                        <span class="focus-input100"></span>
                        <span class="label-input100">User Name</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" id="new_psw">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">

                        <div>
                            <a href="#" class="txt1">
                                Have Account ? Sign in
                            </a>
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" id="new_user">
                            Create Account!.
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            or sign up using
                        </span>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-google" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </a>

                        <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('/bookreview/public/account_layouts/images/bg-01.jpg');">
                </div>
            </div>
        </div>
    </div>





    <script src="/bookreview/public/account_layouts/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="/bookreview/public/account_layouts/vendor/animsition/js/animsition.min.js"></script>
    <script src="/bookreview/public/account_layouts/vendor/bootstrap/js/popper.js"></script>
    <script src="/bookreview/public/account_layouts/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/bookreview/public/account_layouts/vendor/select2/select2.min.js"></script>
    <script src="/bookreview/public/account_layouts/vendor/daterangepicker/moment.min.js"></script>
    <script src="/bookreview/public/account_layouts/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="/bookreview/public/account_layouts/vendor/countdowntime/countdowntime.js"></script>
    <script src="/bookreview/public/account_layouts/js/main.js"></script>
    <script src="/bookreview/public/account_layouts/js/custom.js"></script>

</body>

</html>