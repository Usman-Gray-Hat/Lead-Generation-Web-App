<?php
include("dbConnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS v5.2.1 & Other CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-background">

    <!-- GIF Loader -->
    <div id="mail-sending-loader" class="d-none">
        <img src="images/loader2.gif" alt="Loading...">
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card shadow login-card">
                    <div class="card-body">
                        <h2 class="text-center main-heading text-white" style="letter-spacing: 2px;">EMERALD<img class="pb-2" src="images/icon.png" height="55" width="50" alt=""></h2>
                        <!-- Animation Flare -->
                        <div class="flare-line"></div>
                        <!-- Login Form -->
                        <form method="POST" id="loginForm">
                            <!-- Username -->
                            <div class="form-group mb-2">
                                <label for="username" class="text-white">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    <input type="text" id="username" class="form-control" placeholder="Enter Username" autoComplete="off">
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="form-group mb-2">
                                <label for="password" class="text-white">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    <input type="password" id="password" placeholder="Enter Password" class="form-control">
                                    <span class="input-group-text"> <i class="fa-solid fa-eye-slash" id="eyeIcon"></i> </span> 
                                </div>
                            </div>
                            <!-- Forget Password -->
                            <div class="form-group mb-2">
                                <div id='forgetPassword' class="text-secondary">Forgot Password?</div>
                            </div>
                            <!-- Login Button -->
                            <div class="form-group">
                                <button type="button" id="loginBtn" class="btn btn-primary"><i class="fa fa-key"></i> Login </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery & Other CDNs -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> 
    <script src="script.js"></script>  
    <script>
    // Forget Password
    $("#forgetPassword").click(function(){
        let username = $("#username").val();
        if(username==="")
        {
            toaster("Please enter your username",5);
        }
        else
        {
            $.ajax({
                type: "POST",
                url: "ajax/security/extractEmail.php",
                data: {username:username},
                success: function (response) 
                {
                    var email = response;
                    $.ajax({
                        type: "POST",
                        url: "ajax/security/forgetPassword.php",
                        data: {username:username},
                        beforeSend:function()
                        {
                            $("#mail-sending-loader").removeClass("d-none");
                            $("#mail-sending-loader").addClass("d-flex");
                        },
                        success: function (response) 
                        {
                            $("#mail-sending-loader").removeClass("d-flex");
                            $("#mail-sending-loader").addClass("d-none");

                            if(response==="Invalid username")
                            {
                                toaster(response,5);
                            }
                            else if(response==="Something went wrong! We could not find your email to send you a reset link")
                            {
                                toaster(response,5);
                            }
                            else if(response===`The reset link has been sent to ${email}`)
                            {
                                toaster(response,5);
                            }
                            else if(response==="Email not sent")
                            {
                                toaster(response,5);
                            }
                            else
                            {
                                toaster(response,5);
                            }
                        }
                    });
                }
            });
        }
    }); 
    </script>
</body>
</html>