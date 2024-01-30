<?php
include("dbConnect.php");
include("auth.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security & Privacy</title>
    <!-- Bootstrap CSS v5.2.1 & Other CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-background">

    <!-- GIF Loader -->
    <div id="loader-container">
        <img src="images/loader2.gif" alt="Loading...">
    </div>

    <!-- Header -->
    <section class="header-section">  
        <nav class="navbar navbar-expand-sm bg-info navbar-dark theme-color">
            <a href="home.php" class="navbar-brand ps-2 pt-2">EMERALD<img class="pb-1" src="images/icon.png" alt="" height="40" width="40"></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="home.php" class="nav-link"><i class="fas fa-home"></i> Home </a>
                </li>

                <li class="nav-item">
                    <a href="qualifiedLeads.php" class="nav-link"><i class="fas fa-check-double"></i> Qualified Leads</a>
                </li>

                <li class="nav-item">
                    <a href="follow-up.php" class="nav-link"><i class="fas fa-reply"></i> Follow ups</a>
                </li>

                <li class="nav-item">
                    <a href="closed.php" class="nav-link"><i class="fas fa-check-circle"></i> Closed</a>
                </li>  

                <!-- Access for admins only -->
                <?php if($_SESSION['login_type']==1): ?>
                <li class="nav-item">
                    <a href="members.php" class="nav-link"><i class="fas fa-users"></i> Members</a>
                </li>
                <li class="nav-item">
                    <a href="accounts.php" class="nav-link"><i class="fas fa-id-card"></i> Accounts</a> 
                </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="all_attendance.php" class="nav-link"><i class="fas fa-clock"></i> Attendance</a>
                </li>

                <li class="nav-item">
                    <a href="score.php" class="nav-link"><i class="fas fa-chart-line"></i> Scoreboard</a>
                </li>

                <li class="nav-item">
                    <a href="target.php" class="nav-link"><i class="fas fa-rocket"></i> Targets</a>
                </li>

                <!-- Access for admins only -->
                <?php if($_SESSION['login_type']==1): ?>
                <li class="nav-item">
                    <a href="users.php" class="nav-link"><i class="fas fa-user-circle"></i> Users</a>
                </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="privacy.php" class="nav-link active"><i class="fas fa-key"></i> Privacy</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link logout"><i class="fas fa-power-off"></i> Logout</a>
                </li>
            </ul>
        </nav>   
        <h1 class="text-center text-white jumbo-heading py-5 bg-dark theme-color">CHANGE PASSWORD & STAY SECURE</h1>
    </section>

    <!-- Flare Animation -->
    <!-- <div class="flare-line"></div> -->

    <!-- Change Password Form -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card shadow changePassword-card">
                    <div class="card-body">
                        <h2 class="text-center main-heading text-white" style="letter-spacing: 2px;">EMERALD<img class="pb-2" src="images/icon.png" height="55" width="50" alt=""></h2>
                        <!-- Animation Flare -->
                        <!-- <div class="flare-line"></div> -->
                        <!-- Change Password Form -->
                        <form method="POST" id="changePasswordForm">
                            <!-- Old Password -->
                            <div class="form-group mb-2">
                                <label for="current_password" class="text-white">Current Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    <input type="password" id="current_password" placeholder="Enter Your Current Password" class="form-control">
                                    <span class="input-group-text"> <i class="fa-solid fa-eye-slash" id="eyeIcon1"></i> </span> 
                                </div>
                            </div>
                            <!-- New Password -->
                            <div class="form-group mb-2">
                                <label for="new_password" class="text-white">New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    <input type="password" id="new_password" placeholder="Enter Your New Password" class="form-control">
                                    <span class="input-group-text"> <i class="fa-solid fa-eye-slash" id="eyeIcon2"></i> </span> 
                                </div>
                            </div>
                            <!-- Confirm Password -->
                            <div class="form-group mb-2">
                                <label for="confirm_password" class="text-white">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    <input type="password" id="confirm_password" placeholder="Re-Enter Your Password" class="form-control">
                                    <span class="input-group-text"> <i class="fa-solid fa-eye-slash" id="eyeIcon3"></i> </span> 
                                </div>
                            </div>                            
                            <div class="form-group">
                                <button type="button" id="updatePasswordBtn" class="btn btn-primary"><i class="fa fa-key"></i> Update </button>
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
    <script src="dist/sweetalert2.all.min.js"></script>
    <script src="script.js"></script> 
    <script>

// Change Password
$("#updatePasswordBtn").click(function(){
    let current_password = $("#current_password").val();
    let new_password = $("#new_password").val();
    let confirm_password = $("#confirm_password").val();
    if(current_password==="")
    {
        toaster("Please enter your current password",5);
    }
    else
    {
        if(new_password==="")
        {
            toaster("Please enter your new password",5);
        }
        else
        {
            if(confirm_password==="")
            {
                toaster("Please Re-enter your password",5);
            }
            else
            {
                if(new_password.length<7)
                {
                    toaster("Too short! Your new password must be at least 7 characters long",5);
                }
                else
                {
                    if(new_password!==confirm_password)
                    {
                        toaster("The new password & confirm password are not identical",5)
                    }
                    else
                    {
                        $.ajax({
                            type: "POST",
                            url: "ajax/fetch/privacy.php",
                            data: {current_password:current_password, new_password:new_password},
                            success: function (response) 
                            {
                                if(response==="Current password is incorrect")
                                {
                                    toaster(response,5);
                                }
                                else if(response==="Your password has been updated")
                                {
                                    $("#changePasswordForm input").val("");
                                    swal.fire({
                                        title: "PASSWORD UPDATED",
                                        text: "Your password has been changed",
                                        icon: 'success',
                                        confirmButtonColor: 'blue',
                                        showCloseButton: true,
                                        allowOutsideClick: false,                                    
                                        timer:2000,
                                    }).then(function(){
                                        window.location.href="home.php";
                                    });
                                }
                                else if(response==="Your password has not been updated")
                                {
                                    toaster(response,5);
                                }
                                else
                                {
                                    toaster("An unknown error has occured",5);
                                }
                            }
                        });
                    }
                }
            }
        }
    }
});

    </script> 

</body>
</html>