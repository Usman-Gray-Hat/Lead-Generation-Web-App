<?php
include("dbConnect.php");
include("auth.php");
date_default_timezone_set('Asia/Karachi');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Targets</title>
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
                    <a href="target.php" class="nav-link active"><i class="fas fa-rocket"></i> Targets</a>
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
        <h1 class="text-center text-white jumbo-heading py-5 bg-dark theme-color">CUMULATIVE TARGETS</h1>
    </section>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-12">
                <!-- Only for Admin -->
                <?php if($_SESSION['login_type']==1 || $_SESSION['role']==="Manager"): ?>
                <!-- Export button --> 
                <button type="button" id="exportTargetBtn" title="Export as excel"
                class="btn btn-success float-end me-1"><i class="fas fa-file-excel"></i> Export</button>
                <!-- Date Filter -->
                <button type="button" class="btn btn-info text-white float-end me-1" title="Use date range"
                data-bs-toggle="modal" data-bs-target="#targetDateRangeModal"><i class="far fa-calendar"></i> Date Filter</button>
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
                        <h2 class="text-center main-heading"> <?php echo "TARGET ACHIEVED IN THIS MONTH (".strtoupper(date('F-Y')).")"; ?>  </h2>
                    </div>
                    <div class="card-body">
                        <table class='table table-bordered text-center table-hover table-striped dataTable' style='width:100%;' id='targetTable'>
                            <thead>
                                <tr>
                                    <th>SR</th>
                                    <th>EMPLOYEE NAME</th>
                                    <th>TARGET ACHIEVED</th>
                                </tr> 
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copied to clipboard popup -->
    <div class="copied-popup">Copied to clipboard!</div>

    <!-- Date Range Modal -->
    <div class="modal fade" id="targetDateRangeModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">SELECT DATA RANGE</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="leadDateRangeForm">                       
                        <!-- From -->
                        <div class="form-group">
                            <label for="from">From</label>
                            <input type="date" id="from" class="form-control mb-1">
                        </div>  
                        <!-- To -->
                        <div class="form-group">
                            <label for="to">To</label>
                            <input type="date" id="to" class="form-control mb-1">
                        </div>                                                                                                                                                                                                       
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="targetDateRangeBtn">Search</button>
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

    var from = '';
    var to = '';
    $("#targetDateRangeBtn").click(function(){
        from = $("#from").val();
        to = $("#to").val();
        if(from==="" || to==="")
        {
            toaster("Please select date range in a proper manner",5);
        }
        else
        {
            $("#targetDateRangeModal").modal("hide");
            $("#targetTable").DataTable().destroy();
            fetchTarget();

            // For Table Heading
            $.ajax({
                type: "POST",
                url: "ajax/headings/target.php",
                data: {from:from, to:to},
                success: function (response) 
                {
                    $(".main-heading").text(response);
                }
            });
        }
    });

    // Export As Excel
    $("#exportTargetBtn").click(function(){
        from = $("#from").val();
        to = $("#to").val();
        window.location.href=`Export/target.php?from=${from}&to=${to}`;
    });    

    // Fetch Lead Generation
    function fetchTarget()
    {
        $("#targetTable").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
            "type": "POST",
            "url": "ajax/fetch/target.php",
            "data": {from:from, to:to} 
            },
        "columns": [
            { data: 'sr_no'},
            { data: 'employee_name'},
            { data: 'amount'},
        ],
        "pageLength": 10,
        "searching": true,
        });
    }

    // Load Lead Generation Table On Page Initialization
    $(document).ready(function () {
        fetchTarget();
    });
</script>
</body>
</html>