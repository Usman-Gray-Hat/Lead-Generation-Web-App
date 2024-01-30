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
    <title>Members</title>
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
                    <a href="members.php" class="nav-link active"><i class="fas fa-users"></i> Members</a>
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
                    <a href="privacy.php" class="nav-link"><i class="fas fa-key"></i> Privacy</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link logout"><i class="fas fa-power-off"></i> Logout</a>
                </li>
            </ul>
        </nav>      
        <h1 class="text-center text-white jumbo-heading py-5 bg-dark theme-color">TEAM MEMBERS</h1>
    </section>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-12">
                <!-- Add Employee Button -->
                <button type="button" class="btn btn-outline-primary text-white float-end theme-color" title="Add new member"
                data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i class="fas fa-plus"></i> Add New</button>
                <!-- Export As Excel Button -->
                <a href="Export/employees.php" class="btn btn-success float-end me-1" title="Export as excel">
                <i class="fas fa-file-excel"></i> Export</a>
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
                        <h2 class="text-center main-heading"> EMPLOYEE DETAILS </h2>
                    </div>
                    <div class="card-body">
                        <table class='table table-bordered text-center table-hover table-striped dataTable' style='width:160%;' id='employeesTable'>
                            <thead>
                                <tr>
                                    <th>HIDDEN ID</th>
                                    <th>SR.NO</th>
                                    <th>FULL NAME</th>
                                    <th>FATHER NAME</th>
                                    <th>CELL NO</th>
                                    <th>EMAIL</th>
                                    <th>CNIC NO</th>
                                    <th>ADDRESS</th>
                                    <th>DATE OF JOINING</th>
                                    <th>DATE OF FIRST SALE</th>
                                    <th>OPERATIONS</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <!-- Add Employee Modal -->
    <div class="modal fade" id="addEmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">ADD NEW EMPLOYEE</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="addEmployeeForm">
                        <!-- Full Name -->
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="full_name" class="form-control mb-1" placeholder="Enter Full Name">
                        </div>  
                        <!-- Father Name -->
                        <div class="form-group">
                            <label for="father_name">Father Name</label>
                            <input type="text" id="father_name" class="form-control mb-1" placeholder="Enter Father Name">
                        </div>   
                        <!-- Cell No -->
                        <div class="form-group">
                            <label for="cell_no">Cell No</label>
                            <input type="number" id="cell_no" class="form-control mb-1" placeholder="Enter Cell No">
                        </div> 
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control mb-1" placeholder="Enter Email">
                        </div> 
                        <!-- CNIC NO -->
                        <div class="form-group">
                            <label for="cnic_no">CNIC No</label>
                            <input type="text" id="cnic_no" class="form-control mb-1" placeholder="Enter CNIC No">
                        </div>  
                        <!-- Address -->
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="address" cols="30" rows="3" class="form-control mb-1" placeholder="Enter Address"></textarea>
                        </div>   
                        <!-- Date Of Joining -->
                        <div class="form-group">
                            <label for="doj">Date Of Joining</label>
                            <input type="date" id="doj" class="form-control mb-1">
                        </div>                                                                                                                                                                                 
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="addEmployeeBtn">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Employee Modal -->
    <div class="modal fade" id="editEmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">EDIT DETAILS</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editEmployeeForm">
                        <!-- Full Name -->
                        <div class="form-group">
                            <label for="edit_full_name">Full Name</label>
                            <input type="text" id="edit_full_name" class="form-control mb-1" placeholder="Enter Full Name">
                        </div>  
                        <!-- Father Name -->
                        <div class="form-group">
                            <label for="edit_father_name">Father Name</label>
                            <input type="text" id="edit_father_name" class="form-control mb-1" placeholder="Enter Father Name">
                        </div>   
                        <!-- Cell No -->
                        <div class="form-group">
                            <label for="edit_cell_no">Cell No</label>
                            <input type="number" id="edit_cell_no" class="form-control mb-1" placeholder="Enter Cell No">
                        </div> 
                        <!-- Email -->
                        <div class="form-group">
                            <label for="edit_email">Email</label>
                            <input type="text" id="edit_email" class="form-control mb-1" placeholder="Enter Email">
                        </div> 
                        <!-- CNIC NO -->
                        <div class="form-group">
                            <label for="edit_cnic_no">CNIC No</label>
                            <input type="text" id="edit_cnic_no" class="form-control mb-1" placeholder="Enter CNIC No">
                        </div>  
                        <!-- Address -->
                        <div class="form-group">
                            <label for="edit_address">Address</label>
                            <textarea id="edit_address" cols="30" rows="5" class="form-control mb-1" placeholder="Enter Address"></textarea>
                        </div>   
                        <!-- Date Of Joining -->
                        <div class="form-group">
                            <label for="edit_doj">Date Of Joining</label>
                            <input type="date" id="edit_doj" class="form-control mb-1">
                        </div>
                        <!-- Date Of First Sale -->
                        <div class="form-group">
                            <label for="first_sale">Date Of 1st Sale</label>
                            <input type="date" id="first_sale" class="form-control mb-1">
                        </div>                        
                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" class="form-control">
                                <option value="Active">Active</option>
                                <option value="Left">Left</option>
                            </select>
                        </div>                                                                                                                                                                                  
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="employee_hidden_id">
                    <button type="button" class="btn btn-primary" id="updateEmployeeBtn">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Make Admin Modal -->
    <div class="modal fade" id="makeAdminModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title">GIVE ACCESS</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" id="makeAdminForm" autocomplete="off">
                <!-- Name -->
                <div class="form-group mb-1">
                  <label for="name2">Name</label>
                  <input type="text" id="name2" class="form-control" readonly>
                </div>
                <!-- Username -->
                <div class="form-group mb-1">
                  <label for="username">Username</label>
                  <input type="text" id="username" class="form-control" placeholder="Enter Username" autocomplete="off">
                </div> 
                <!-- Email -->
                <div class="form-group mb-1">
                  <label for="email2">Email</label>
                  <input type="text" id="email2" class="form-control" placeholder="Enter Email" autocomplete="off">
                </div>                 
                <!-- Password -->
                <div class="form-group mb-1">
                  <label for="password">Password</label>
                  <input type="password" id="password" class="form-control" placeholder="Enter Password" autocomplete="off">
                </div> 
                <!-- Role -->
                <div class="form-group mb-1">
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
              </form>
            </div>
            <div class="modal-footer">
              <input type="hidden" id="employee_hidden_id2">
              <button type="button" class="btn btn-primary" id="giveAccessBtn">Save</button>
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

// Fetch Employees
function fetchEmployees()
{
  $(document).ready(function () {
    $("#employeesTable").DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": {
    "type": "POST",
    "url": "ajax/fetch/employees.php", 
    },
    "columns": [
      { data: 'id', className:'d-none'}, // Employee Hidden ID
      { data: 'sr_no'},
      { data: 'full_name' },
      { data: 'father_name' },
      { data: 'cell_no' },
      { data: 'email' },
      { data: 'cnic_no' },
      { data: 'address' },
      { data: 'date_of_joining' },
      { data: 'first_sale' },
      { 
        "render": function (data, type, full, meta) 
        {
          var buttons = '';
          buttons = `<a href="attendance.php?id=${full.id}&name=${full.full_name}"
          class="btn btn-success me-1" title="Check attendance report"><i class="fas fa-clock"></i> Attendance</a>`;
          buttons += '<button class="btn btn-info text-white me-1" title="Edit Record" onclick="editEmployee('+full.id+')"><i class="fas fa-edit"></i> Edit</button>';
          buttons += '<button class="btn btn-danger text-white me-1" title="Delete Record" onclick="deleteEmployee('+full.id+')"><i class="fas fa-trash-alt"></i> Delete</button>';
          buttons += '<button class="btn btn-primary text-white" title="Delete Record" onclick="makeAdmin('+full.id+')"><i class="fas fa-unlock"></i> Give Access</button>';
              
          return buttons;
        }
      }
    ],
    "pageLength": 10,
    "searching": true,
  });
});
}


// Load Employees Table On Page Initialization
$(document).ready(function () {
  fetchEmployees();
});

// Add New Employee
$("#addEmployeeBtn").click(function(){
  let full_name = $("#full_name").val();
  let father_name = $("#father_name").val();
  let cell_no = $("#cell_no").val();
  let email = $("#email").val();
  let cnic_no = $("#cnic_no").val();
  let address = $("#address").val();
  let doj = $("#doj").val();
  if(full_name==="")
  {
    toaster("Name of employee is required",5);
  }
  else
  {
    if(doj==="")
    {
      toaster("Please select date of joining",5);
    }
    else
    {
      $.ajax({
        type: "POST",
        url: "ajax/add/employees.php",
        data: {full_name:full_name, father_name:father_name, cell_no:cell_no, 
        email:email, cnic_no:cnic_no, address:address, doj:doj},
        success: function (response) 
        {
          if(response==="Employee has been added")
          {
            $("#employeesTable").DataTable().destroy();
            fetchEmployees();
            toaster(response,5);
            $("#addEmployeeForm input,textarea").val("");
            $("#addEmployeeModal").modal("hide");
          }
          else if(response==="Employee has not been added")
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
});

// Edit Employee
function editEmployee(employee_edit_id)
{
  $("#employee_hidden_id").val(employee_edit_id);
  $.ajax({
    type: "POST",
    url: "ajax/edit/employees.php",
    data: {employee_edit_id:employee_edit_id},
    success: function (response) 
    {
      var emp = JSON.parse(response);
      $("#edit_full_name").val(emp.full_name);
      $("#edit_father_name").val(emp.father_name);
      $("#edit_cell_no").val(emp.cell_no);
      $("#edit_email").val(emp.email);
      $("#edit_cnic_no").val(emp.cnic_no);
      $("#edit_address").val(emp.address);
      $("#status").val(emp.status);
      $("#edit_doj").val(emp.date_of_joining);
      $("#first_sale").val(emp.first_sale);
      $("#editEmployeeModal").modal("show");
    }
  });
}

// Update Employee
$("#updateEmployeeBtn").click(function(){
  let full_name = $("#edit_full_name").val();
  let father_name = $("#edit_father_name").val();
  let cell_no = $("#edit_cell_no").val();
  let email = $("#edit_email").val();
  let cnic_no = $("#edit_cnic_no").val();
  let address = $("#edit_address").val();
  let doj = $("#edit_doj").val();
  let first_sale = $("#first_sale").val();
  let status = $("#status").val();
  let employee_edit_id = $("#employee_hidden_id").val();
  if(full_name==="")
  {
    toaster("Name is required",5);
  }
  else
  {
    if(doj==="")
    {
      toaster("Please select date of joining",5);
    }
    else
    {
      $.ajax({
        type: "POST",
        url: "ajax/update/employees.php",
        data: { employee_edit_id:employee_edit_id, full_name:full_name, father_name:father_name,
        cell_no:cell_no, email:email, cnic_no:cnic_no, address:address, doj:doj, first_sale:first_sale,
        status:status },
        success: function (response) 
        {
          if(response==="Employee record has been updated")
          {
            $("#employeesTable").DataTable().destroy();
            fetchEmployees();
            toaster(response,5);
            $("#editEmployeeModal").modal("hide");
          }
          else if(response==="Employee record has not been updated")
          {
            toaster(response,5);
          }
          else
          {
            toaster("An unknown error occured",5);
          }
        }
      });
    }
  }
});

// Delete Employee
function deleteEmployee(employee_delete_id)
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
          url: "ajax/delete/employees.php",
          data: {employee_delete_id:employee_delete_id},
          success:function(response) 
          {
            if(response==="Employee record has been deleted")
            {
              $("#employeesTable").DataTable().destroy();
              fetchEmployees();
              toaster(response,5);
            }
            else if(response==="Employee record has not been deleted")
            {
              toaster(response,5);
            }
            else
            {
              toaster("An unknown error occured",5);
            }
          }
        });
      }
  }));
}        

// Make Admin
function makeAdmin(id)
{
  $("#employee_hidden_id2").val(id);
  $.ajax({
    type: "POST",
    url: "ajax/fetch/makeAdmin.php",
    data: {id:id},
    success: function (response) 
    {
      let admin = JSON.parse(response);
      $("#name2").val(admin.full_name);
      $("#email2").val(admin.email);
    }
  });
  $("#makeAdminModal").modal("show");
}

// Give Access
$("#giveAccessBtn").click(function(){
  let id = $("#employee_hidden_id2").val();
  let name = $("#name2").val();
  let username = $("#username").val();
  let email = $("#email2").val();
  let password = $("#password").val();
  let role = $("#role").val();
  if(username==="")
  {
    toaster("Please Enter Username");
  }
  else
  {
    if(password==="")
    {
      toaster("Please Enter Password");
    }
    else
    {
      if(role==="")
      {
        toaster("Please assign role");
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
            url: "ajax/add/giveAccess.php",
            data: {id:id, name:name, username:username, email:email, password:password, role:role},
            success: function (response) 
            {
              if(response==="Access has already been given to this user")
              {
                swal.fire({
                  title:"CAN'T GIVE ACCESS",
                  text:"Access has already been given to this user",
                  icon:"info",
                  confirmButtonText: 'Ok',
                  confirmButtonColor: 'blue',
                  showCloseButton: true,
                  allowOutsideClick: false
                });
              }
              else if(response==="This username has already taken by another user. Please try different username.")
              {
                swal.fire({
                  title:"USERNAME DUPLICATION",
                  text:"This username has already taken by another user. Please try different username.",
                  icon:"error",
                  confirmButtonText: 'Ok',
                  confirmButtonColor: 'blue',
                  showCloseButton: true,
                  allowOutsideClick: false
                });
              }
              else if(response==="This email has already taken by another user. Please try different email.")
              {
                swal.fire({
                  title:"EMAIL DUPLICATION",
                  text:"This email has already taken by another user. Please try different email.",
                  icon:"error",
                  confirmButtonText: 'Ok',
                  confirmButtonColor: 'blue',
                  showCloseButton: true,
                  allowOutsideClick: false
                });
              }
              else if(response==="Access has been given")
              {
                $("#employeesTable").DataTable().destroy();
                fetchEmployees();
                swal.fire({
                  title:"ACCESS GRANTED",
                  text:"Access has been given!",
                  icon:"success",
                  confirmButtonText: 'Ok',
                  confirmButtonColor: 'blue',
                  showCloseButton: true,
                  allowOutsideClick: false,
                  timer:2000
                });
                $("#username, password").val("");
                $("#makeAdminModal").modal("hide");
              }
              else if(response==="Access has not been given")
              {
                swal.fire({
                  title:"CAN'T GIVE ACCESS",
                  text:"Access has not been given to this user",
                  icon:"error",
                  confirmButtonText: 'Ok',
                  confirmButtonColor: 'blue',
                  showCloseButton: true,
                  allowOutsideClick: false
                });
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
});

    </script> 
</body>
</html>