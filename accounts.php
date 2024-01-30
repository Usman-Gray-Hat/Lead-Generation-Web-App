<?php
include("dbConnect.php");
include("auth.php");
include("admin_auth.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
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
<body>

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
                    <a href="accounts.php" class="nav-link active"><i class="fas fa-id-card"></i> Accounts</a> 
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
                    <a href="privacy.php" class="nav-link"><i class="fas fa-key"></i> Privacy</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link logout"><i class="fas fa-power-off"></i> Logout</a>
                </li>
            </ul>
        </nav>          
        <h1 class="text-center text-white jumbo-heading py-5 bg-dark theme-color">SOCIAL HANDLES</h1>
    </section>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-outline-primary text-white float-end theme-color" 
                title="Add new account" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i class="fas fa-plus"></i> Add New</button>
            </div>
        </div>
    </div>

    <!-- Animation Flare -->
    <!-- <div class="flare-line"></div> -->
    
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-3">
                    <div class="card-header">
                        <h2 class="text-center main-heading"> ACCOUNTS CREDENTIALS </h2>
                        <!-- <button type="button" class="btn btn-success float-end">Excel</button> -->
                    </div>
                    <div class="card-body">
                        <div id="accountsTable"> <!-- Table will be rendered here --> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copied to clipboard popup -->
    <div class="copied-popup">Copied to clipboard!</div>

    <!-- Add Account Modal -->
    <div class="modal fade" id="addAccountModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">CREATE NEW ACCOUNT</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="addAccountForm">
                        <!-- Account Name -->
                        <div class="form-group">
                            <label for="accountName">Account Name</label>
                            <input type="text" id="accountName" class="form-control mb-1" placeholder="Enter Account Name">
                        </div>                       
                        <!-- Gmail -->
                        <div class="form-group">
                            <label for="gmail">Gmail</label>
                            <input type="text" id="gmail" class="form-control mb-1" placeholder="Enter Gmail">
                            <input type="text" id="gmailPassword" class="form-control mb-1" placeholder="Enter Gmail Password">
                        </div>
                        <!-- Twitter -->
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" id="twitter" class="form-control mb-1" placeholder="Enter Twitter Username">
                            <input type="text" id="twitterPassword" class="form-control mb-1" placeholder="Enter Twitter Password">
                        </div>      
                        <!-- Instagram -->
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" id="instagram" class="form-control mb-1" placeholder="Enter Instagram Username">
                            <input type="text" id="instagramPassword" class="form-control mb-1" placeholder="Enter Instagram Password">
                        </div>   
                        <!-- Discord -->
                        <div class="form-group">
                            <label for="discord">Discord</label>
                            <input type="text" id="discord" class="form-control mb-1" placeholder="Enter Email Or Cell No">
                            <input type="text" id="discordPassword" class="form-control mb-1" placeholder="Enter Discord Password">
                        </div>   
                        <!-- Twitch -->
                        <div class="form-group">
                            <label for="twitch">Twitch</label>
                            <input type="text" id="twitch" class="form-control mb-1" placeholder="Enter Twitch Username">
                            <input type="text" id="twitchPassword" class="form-control mb-1" placeholder="Enter Twitch Password">
                        </div>                                                                                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="addAccountBtn">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Account Modal -->
    <div class="modal fade" id="editAccountModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">EDIT ACCOUNT</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editAccountForm">
                        <!-- Account Name -->
                        <div class="form-group">
                            <label for="edit_accountName">Account Name</label>
                            <input type="text" id="edit_accountName" class="form-control mb-1" placeholder="Enter Account Name">
                        </div>                       
                        <!-- Gmail -->
                        <div class="form-group">
                            <label for="edit_gmail">Gmail</label>
                            <input type="text" id="edit_gmail" class="form-control mb-1" placeholder="Enter Gmail">
                            <input type="text" id="edit_gmailPassword" class="form-control mb-1" placeholder="Enter Gmail Password">
                        </div>
                        <!-- Twitter -->
                        <div class="form-group">
                            <label for="edit_twitter">Twitter</label>
                            <input type="text" id="edit_twitter" class="form-control mb-1" placeholder="Enter Twitter Username">
                            <input type="text" id="edit_twitterPassword" class="form-control mb-1" placeholder="Enter Twitter Password">
                        </div>      
                        <!-- Instagram -->
                        <div class="form-group">
                            <label for="edit_instagram">Instagram</label>
                            <input type="text" id="edit_instagram" class="form-control mb-1" placeholder="Enter Instagram Username">
                            <input type="text" id="edit_instagramPassword" class="form-control mb-1" placeholder="Enter Instagram Password">
                        </div>   
                        <!-- Discord -->
                        <div class="form-group">
                            <label for="edit_discord">Discord</label>
                            <input type="text" id="edit_discord" class="form-control mb-1" placeholder="Enter Email Or Cell No">
                            <input type="text" id="edit_discordPassword" class="form-control mb-1" placeholder="Enter Discord Password">
                        </div>   
                        <!-- Twitch -->
                        <div class="form-group">
                            <label for="edit_twitch">Twitch</label>
                            <input type="text" id="edit_twitch" class="form-control mb-1" placeholder="Enter Twitch Username">
                            <input type="text" id="edit_twitchPassword" class="form-control mb-1" placeholder="Enter Twitch Password">
                        </div>                                                                                        
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- Hidden Account ID -->
                    <input type="hidden" id="hidden_account_id">
                    <button type="button" class="btn btn-primary" id="updateAccountBtn">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
</body>
</html>