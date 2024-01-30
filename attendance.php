<?php
include("dbConnect.php");
include("auth.php");
$id = $_GET['id']??"";
$name = $_GET['name']??"";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
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
        <h1 class="text-center text-white jumbo-heading py-5 bg-dark theme-color">OVERALL ATTENDANCE HISTORY</h1>
    </section>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-12">
                <!-- Only for Admin -->
                <?php if($_SESSION['login_type']==1): ?>
                <!-- Mark Absent -->
                <button type="button" class="btn btn-primary text-white float-end" title="Mark Absent"
                data-bs-toggle="modal" data-bs-target="#markAbsentModal"><i class="fas fa-pen"></i> Mark Absent </button>
                <?php endif; ?>  
                
                <!-- Only For Admin & Manager -->
                <?php if($_SESSION['login_type']==1 || $_SESSION['role']==="Manager"): ?>
                <!-- Export As Excel -->
                <button type="button" id='exportAttendanceBtn' title="Export as excel"
                class='btn btn-success text-white float-end me-1'><i class="fas fa-file-excel"></i> Export</a>          
                <!-- Date Filter -->
                <button type="button" class="btn btn-info text-white float-end me-1" title="Use date range"
                data-bs-toggle="modal" data-bs-target="#attendanceDateRangeModal"><i class="far fa-calendar"></i> Date Filter</button> 
                <?php endif; ?>               
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
                        <h2 class="text-center main-heading"> ATTENDANCE REPORT OF <?php echo strtoupper($name); ?> </h2>
                    </div>
                    <div class="card-body">
                        <table class='table table-bordered text-center table-hover table-striped' id='attendanceTable' style='width:100%;'>
                            <thead> 
                                <tr>
                                    <th>HIDDEN ID</th>
                                    <th>SR.NO</th>
                                    <th>DATE OF ABSENCE</th>
                                    <th>REASON OF ABSENCE</th>
                                    <th>ABSENT MARKED BY</th>
                                    <th>OPERATIONS</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mark Absent Modal -->
    <div class="modal fade" id="markAbsentModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">MARK ABSENT</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="markAbsentForm">

                        <!-- Employee ID (Hidden) -->
                        <input type="hidden" id="employee_id" value="<?php echo $id; ?>" readonly>

                        <!-- Employee Name (Hidden) -->
                        <input type="hidden" id="employee_name" value="<?php echo $name; ?>" readonly>

                        <!-- Reason -->
                        <div class="form-group">
                            <label for="reason">Reason Of Absence</label>
                            <textarea id="reason" cols="30" rows="3" class="form-control" placeholder="Specify Reason"></textarea>
                        </div>  
                        <!-- Date -->
                        <div class="form-group">
                            <label for="date_of_absence">Date Of Absence</label>
                            <input type="date" id="date_of_absence" class="form-control mb-1">
                        </div>                                                                                                                                                                                                      
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="markAbsentBtn">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Mark Absent Modal -->
    <div class="modal fade" id="editMarkAbsentModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">EDIT ABSENT DETAILS</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editMarkAbsentForm">
                        <!-- Reason -->
                        <div class="form-group">
                            <label for="edit_reason">Reason Of Absence</label>
                            <textarea id="edit_reason" cols="30" rows="3" class="form-control" placeholder="Specify Reason"></textarea>
                        </div>  
                        <!-- Date -->
                        <div class="form-group">
                            <label for="edit_date_of_absence">Date Of Absence</label>
                            <input type="date" id="edit_date_of_absence" class="form-control mb-1">
                        </div>                                                                                                                                                                                                      
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="attendance_hidden_id">
                    <button type="button" class="btn btn-primary" id="updateMarkAbsentBtn">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Attendance Date Range Modal -->
    <div class="modal fade" id="attendanceDateRangeModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">SELECT DATA RANGE</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="attendanceDateRangeForm">                       
                        <!-- From -->
                        <div class="form-group">
                            <label for="from">From</label>
                            <input type="date" id="from" class="form-control mb-1">
                        </div>  
                        <!-- To -->
                        <div class="form-group">
                            <label for="reason">To</label>
                            <input type="date" id="to" class="form-control mb-1">
                        </div>                                                                                                                                                                                                       
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="attendanceDateRangeBtn">Search</button>
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

var employee_id = $("#employee_id").val(); 
var employee_name = $("#employee_name").val();
var from = "";
var to = "";

// Date Filter
$("#attendanceDateRangeBtn").click(function(){
    from = $("#from").val();
    to = $("#to").val();
    if(from==="" || to==="")
    {
        toaster("Please select date range in a proper manner",5);
    }
    else
    {
        $("#attendanceDateRangeModal").modal("hide");
        $("#attendanceTable").DataTable().destroy();
        fetchAttendance();

        // For Table Heading
        $.ajax({
            type: "POST",
            url: "ajax/headings/attendance.php",
            data: {from:from, to:to, employee_name:employee_name},
            success: function (response) 
            {
                $(".main-heading").text(response);
            }
        });
    }
});

// Export As Excel
$("#exportAttendanceBtn").click(function(){
    window.location.href=`Export/attendance.php?employee_id=${employee_id}&employee_name=${employee_name}
    &from=${from}&to=${to}`;
});

// Fetch Attendance
function fetchAttendance()
{
    $("#attendanceTable").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
        "type": "POST",
        "url": "ajax/fetch/attendance.php", 
        "data": {employee_id:employee_id, from:from, to:to},
        },
        "columns": [
            { data: 'id', className:'d-none'},
            { data: 'sr_no'},
            { data: 'date_created'},
            { data: 'reason' },
            { data: 'marked_by' },
            { 
                "render": function (data, type, full, meta) {
                    var buttons = '';
                    buttons += `<button class="btn btn-info text-white me-1" title="Edit Record" 
                    onclick="editAttendance(${full.id})"><i class="fas fa-edit"></i> Edit</button>`;

                    buttons += `<button class="btn btn-danger text-white me-1" title="Delete Record" 
                    onclick="deleteAttendance(${full.id})"><i class="fas fa-trash-alt"></i> Delete</button>`;
                    
                    return buttons;
                }, <?php if($_SESSION['login_type']==2): ?> 
                    className: "d-none"
                    <?php endif; ?> 
            }
        ],
        "pageLength": 10,
        "searching": true,
    });
}   

// Load Attendance Table On Page Initialization
$(document).ready(function () {
  fetchAttendance();
});

// Mark Absent
$("#markAbsentBtn").click(function(){
  let reason = $("#reason").val();
  let date_of_absence = $("#date_of_absence").val();
  if(reason==="")
  {
    toaster("Please specify reason");
  }
  else
  {
    if(date_of_absence==="")
    {
      toaster("Please select date");
    }
    else
    {
      $.ajax({
        type: "POST",
        url: "ajax/add/attendance.php",
        data: {employee_id:employee_id, employee_name:employee_name, 
        reason:reason, date_of_absence:date_of_absence},
        success: function (response) 
        {
          if(response==="Absent has been marked")
          {
            $("#attendanceTable").DataTable().destroy();
            fetchAttendance();
            toaster(response,5);
            $("#reason,#date_of_absence").val("");
            $("#markAbsentModal").modal("hide");
          }
          else if(response==="Absent has not been marked")
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
  } 
});

// Edit Attendance
function editAttendance(id)
{
  $("#attendance_hidden_id").val(id);
  $.ajax({
    type: "POST",
    url: "ajax/edit/attendance.php",
    data: {id:id},
    success: function (response) 
    {
      let attn = JSON.parse(response);
      $("#edit_reason").val(attn.reason);
      $("#edit_date_of_absence").val(attn.date_created);
      $("#editMarkAbsentModal").modal("show");
    }
  });
}

// Update Attendance
$("#updateMarkAbsentBtn").click(function(){
 let id = $("#attendance_hidden_id").val();
 let reason = $("#edit_reason").val();
 let date_of_absence = $("#edit_date_of_absence").val();
 if(reason==="")
 {
    toaster("Please specify reason");
 }
 else
 {
    if(date_of_absence==="")
    {
      toaster("Please select date");
    }
    else
    {
      $.ajax({
        type: "POST",
        url: "ajax/update/attendance.php",
        data: {id:id, reason:reason, date_of_absence:date_of_absence},
        success: function (response) 
        {
          if(response==="Record has been updated")
          {
            $("#attendanceTable").DataTable().destroy();
            fetchAttendance();
            toaster(response,5);
            $("#editMarkAbsentModal").modal("hide");
          }
          else if(response==="Record has not been updated")
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

// Delete Attendance
function deleteAttendance(id)
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
          url: "ajax/delete/attendance.php",
          data: {id:id},
          success:function(response) 
          {
            if(response==="Absent has been removed")
            {
                $("#attendanceTable").DataTable().destroy();
                fetchAttendance();
                toaster(response,5);
            }
            else if(response==="Absent has not been removed")
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
    </script>    
</body>
</html>