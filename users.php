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
    <title>Users</title>
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
                    <a href="users.php" class="nav-link active"><i class="fas fa-user-circle"></i> Users</a>
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
        <h1 class="text-center text-white jumbo-heading py-5 bg-dark theme-color">ADMINS AND USERS</h1>
    </section>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-12">
                <!-- Add User Modal -->
                <button type="button" class="btn btn-primary float-end" 
                data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="fas fa-plus"></i> Add New</button>
            </div>
        </div>
    </div>

    <!-- Animation Flare -->
    <!-- <div class="flare-line"></div>  -->

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-3">
                    <div class="card-header">
                        <h2 class="text-center main-heading"> ADMINS AND USERS INFORMATION </h2>
                    </div>
                    <div class="card-body">
                        <table class='table table-bordered text-center table-hover table-striped' style='width:100%;' id='usersTable'>
                            <thead>
                                <tr>
                                    <th>USER HIDDEN ID</th>
                                    <th>SR.NO</th>
                                    <th>FULL NAME</th>
                                    <th>USERNAME</th>
                                    <th>EMAIL</th>
                                    <th>ROLE</th>
                                    <th>TYPE</th>
                                    <th>OPERATIONS</th>
                                </tr> 
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" data-bs-backdrop="static">
        <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">ADD USER</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="addUserForm" autocomplete="off">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" placeholder="Enter Full Name" class="form-control mb-1">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" placeholder="Enter Username" class="form-control">
                        </div>   
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" placeholder="Enter Email" class="form-control">
                        </div>                         
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" placeholder="Enter Password" class="form-control">
                        </div>  
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select id="role" class="form-control">
                                <option value="">Assign Role</option>
                                <option value="Manager">Manager</option>
                                <option value="Team Lead">Team Lead</option>
                                <option value="Closer">Closer</option>
                                <option value="Lead Generation Head">Lead Generation Head</option>
                                <option value="Lead Generation">Lead Generation</option>
                            </select>
                        </div>                         
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select id="type" class="form-control">
                                <option value="">Select Type</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>                                              
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="addUserBtn">Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" data-bs-backdrop="static">
        <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">EDIT USER DETAILS</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editUserForm">
                        <div class="form-group">
                            <label for="edit_name">Full Name</label>
                            <input type="text" id="edit_name" placeholder="Enter Full Name" class="form-control mb-1">
                        </div>
                        <div class="form-group">
                            <label for="edit_username">Username</label>
                            <input type="text" id="edit_username" placeholder="Enter Username" class="form-control">
                        </div>   
                        <div class="form-group">
                            <label for="edit_email">Email</label>
                            <input type="text" id="edit_email" placeholder="Enter Email" class="form-control">
                        </div>   
                        <div class="form-group">
                            <label for="edit_role">Role</label>
                            <select id="edit_role" class="form-control">
                                <option value="">Assign Role</option>
                                <option value="Manager">Manager</option>
                                <option value="Team Lead">Team Lead</option>
                                <option value="Closer">Closer</option>
                                <option value="Lead Generation Head">Lead Generation Head</option>
                                <option value="Lead Generation">Lead Generation</option>
                            </select>
                        </div>                                                
                        <div class="form-group">
                            <label for="edit_type">Type</label>
                            <select id="edit_type" class="form-control">
                                <option value="">Select Type</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>                            
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="user_hidden_id"> <!-- User Hidden ID -->
                    <button type="button" class="btn btn-primary" id="updateUserBtn">Update</button>
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
    <script>

        // Fetch Users
        function fetchUsers()
        {
            $("#usersTable").DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                "type": "POST",
                "url": "ajax/fetch/user.php",
                },
                "columns": [
                { data: 'id', className:'d-none'}, // User Hidden ID
                { data: 'sr_no'},
                { data: 'name'},
                { data: 'username'},
                { data: 'email'},
                { data: 'role'},
                { data: 'type'},
                {
                    "render":function(data,type,full,meta)
                    {
                        var buttons = '';
                        // Edit
                        buttons += `<button type='button' class='btn btn-info text-white me-1' title='Edit record'
                        onclick='editUser(${full.id})'><i class="fas fa-edit"></i> Edit</button>`;
                        // Delete
                        buttons += `<button type='button' class='btn btn-danger me-1' title='Delete record'
                        onclick='deleteUser(${full.id})'><i class="fas fa-trash-alt"></i> Delete</button>`;
                        return buttons;
                    }
                }
                ],
            });
        }

        // Load Lead Generation Table On Page Initialization
        $(document).ready(function () {
            fetchUsers();
        });      
        
        // Add User
        $("#addUserBtn").click(function(){
            let name = $("#name").val();
            let username = $("#username").val();
            let email = $("#email").val();
            let password = $("#password").val();
            let type = $("#type").val();
            let role = $("#role").val();
            if(name==="")
            {
                toaster("Please enter full name",5);
            }
            else
            {
                if(username==="")
                {
                    toaster("Please enter username",5);
                }
                else
                {
                    if(password==="")
                    {
                        toaster("Please enter password",5);
                    }
                    else
                    {
                        if(type==="")
                        {
                            toaster("Please select type",5);
                        }
                        else
                        {
                            if(role==="")
                            {
                                toaster("Please assign role",5);
                            }
                            else
                            {
                                if(password.length<7)
                                {
                                toaster("Too short! The password must be at least 7 characters long",5);
                                }
                                else
                                {
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/add/user.php",
                                        data: {name:name, username:username, email:email, 
                                        password:password, type:type, role:role},
                                        success: function (response) 
                                        {
                                            if(response==="This username has already taken. Please try different username")
                                            {
                                                toaster(response,5);
                                            }
                                            else if(response==="This email has already taken by another user. Please try different email")
                                            {
                                                toaster(response,5);
                                            }
                                            else if(response==="User has been added")
                                            {
                                                $("#usersTable").DataTable().destroy();
                                                fetchUsers();
                                                toaster(response,5);
                                                $("#name,#username,#email,#password,#role,#type").val("");
                                                $("#addUserModal").modal("hide");
                                            }
                                            else if(response==="User has not been added")
                                            {
                                                toaster(response,5);
                                            }
                                            else
                                            {
                                                toaster("An unkown error has occured",5);
                                            }
                                        }
                                    });
                                }
                            }
                        }
                    }
                }
            }
        });

        // Edit User
        function editUser(id)
        {
            $("#user_hidden_id").val(id);
            $.ajax({
                type: "POST",
                url: "ajax/edit/user.php",
                data: {id:id},
                success: function (response) 
                {
                    let users = JSON.parse(response);
                    $("#edit_name").val(users.name);
                    $("#edit_username").val(users.username);
                    $("#edit_email").val(users.email);
                    $("#edit_type").val(users.type);
                    $("#edit_role").val(users.role);
                }
            });
            $("#editUserModal").modal("show");
        }

        // Update User
        $("#updateUserBtn").click(function(){
            let id = $("#user_hidden_id").val();
            let name = $("#edit_name").val();
            let username = $("#edit_username").val();
            let email = $("#edit_email").val();
            let type = $("#edit_type").val();
            let role = $("#edit_role").val();
            if(name==="")
            {
                toaster("Please enter name",5);
            }
            else
            {
                if(username==="")
                {
                    toaster("Please enter username",5);
                }
                else
                {
                    if(type==="")
                    {
                        toaster("Please select type",5);
                    }
                    else
                    {
                        if(role==="")
                        {
                            toaster("Please assign role",5);
                        }
                        else
                        {
                            $.ajax({
                                type: "POST",
                                url: "ajax/update/user.php",
                                data: {id:id, name:name, username:username,
                                email:email, type:type, role:role},
                                success: function (response) 
                                {
                                    if(response==="This username has already taken. Please try different username")
                                    {
                                        toaster(response,5);
                                    }
                                    else if(response==="This email has already taken by another user. Please try different email")
                                    {
                                        toaster(response,5);
                                    }
                                    else if(response==="User has been updated")
                                    {
                                        $("#usersTable").DataTable().destroy();
                                        fetchUsers();
                                        toaster(response,5);
                                        $("#editUserModal").modal("hide");
                                    }
                                    else if(response==="User has not been updated")
                                    {
                                        toaster(response,5);
                                    }
                                    else
                                    {
                                        toaster("An unkown error has occured",5);
                                    }
                                }
                            });
                        }
                    }
                }
            }
        });

        // Delete User
        function deleteUser(id)
        {
            swal.fire({
            title: "ARE YOU SURE?",
            text: "Once deleted, you won't be able to revert this action!",
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'No',
            cancelButtonColor: 'red',
            confirmButtonText: 'Yes! Delete it',
            confirmButtonColor: 'blue',
            showCloseButton: true,
            allowOutsideClick: false
            }).then((result => {
                if(result.isConfirmed)
                {
                    $.ajax({
                        type: "POST",
                        url: "ajax/delete/user.php",
                        data: {id:id},
                        success: function (response) 
                        {
                            if(response==="User has been deleted")
                            {
                                $("#usersTable").DataTable().destroy();
                                fetchUsers();
                                toaster(response,5);
                            }
                            else if(response==="User has not been deleted")
                            {
                                toaster(response,5);
                            }
                            else
                            {
                                toaster("An unkown error has occured",5);
                            }
                        }
                    });
                }
            }));
        }
    </script>
</body>
</html>