<?php
include("dbConnect.php");
include("auth.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

    <!-- Notification Message -->
    <div class="notification-container">
        <div id="notification" class="notification">
            <h5 class="text-center py-5 jumbo-heading" id="notification-text"></h5>
        </div>
    </div>

    <!-- Header -->
    <section class="header-section">  
        <nav class="navbar navbar-expand-sm bg-info navbar-dark theme-color">
            <a href="home.php" class="navbar-brand ps-2 pt-2">EMERALD<img class="pb-1" src="images/icon.png" alt="" height="40" width="40"></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="home.php" class="nav-link active"><i class="fas fa-home"></i> Home </a>
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
        <h1 class="text-center text-white jumbo-heading py-5 bg-dark theme-color">LEAD GENERATION</h1>
    </section>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-12">
                <!-- Add Lead Modal -->
                <button type="button" class="btn btn-primary float-end" title="Add new lead"
                data-bs-toggle="modal" data-bs-target="#addLeadModal"><i class="fas fa-plus"></i> Add New</button>
                <!-- Limited Access -->
                <?php if($_SESSION['login_type']==1 || $_SESSION['role']==="Manager"): ?>
                <!-- Export button -->
                <button type="button" id="exportLeadBtn" title="Export as excel"
                class="btn btn-success float-end me-1"><i class="fas fa-file-excel"></i> Export</button>
                <!-- Date Filter -->
                <button type="button" class="btn btn-info text-white float-end me-1" title="Use date range"
                data-bs-toggle="modal" data-bs-target="#leadDateRangeModal"><i class="far fa-calendar"></i> Date Filter</button>
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
                        <h2 class="text-center main-heading"> SALES PRODUCTIVITY RECORDS </h2>
                    </div>
                    <div class="card-body">
                        <table class='table table-bordered text-center table-hover table-striped dataTable'
                        <?php if($_SESSION['role']==="Lead Generation") { echo "style='width:150%'"; } ?>
                        style='width:200%;' id='leadsTable'>
                            <thead>
                                <tr>
                                    <th>HIDDEN ID</th>
                                    <th>ADMIN HIDDEN ID</th>
                                    <th>TIMESTAMP <i class="far fa-clock"></i></th>
                                    <th>EMPLOYEE</th>
                                    <th>ACCOUNT</th>
                                    <th>PLATFORM</th>
                                    <th>CLIENT'S USERNAME</th>
                                    <th>CHANNEL LINK</th>
                                    <th>COMMENTS</th>
                                    <th>STATUS</th>
                                    <th>ITEMS</th>
                                    <th>FOLLOW UP DATE WITH REMARKS</th>
                                    <th>REASON OF REJECTION</th>
                                    <th>QUALITY OF LEAD</th>
                                    <th>CLOSED AMOUNT</th>
                                    <th>OPERATIONS</th>
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

    <!-- Add Lead Modal -->
    <div class="modal fade" id="addLeadModal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">ADD YOUR LEAD</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="addLeadForm">
                        <!-- Account Name (Required) -->
                        <div class="form-group mb-1">
                            <label for="account_name">Account Name</label>
                            <select id="account_name" class="form-control">
                                <option value="">Select Account</option>
                                <?php
                                $query = "SELECT * FROM account_credentials ORDER BY name";
                                $result = mysqli_query($conn,$query);
                                while($data = mysqli_fetch_assoc($result))
                                {
                                    echo "<option value='".$data['name']."'>".$data['name']."</option>";
                                }
                                ?>

                            </select>
                        </div>                       
                        <!-- Platform Name (Required) -->
                        <div class="form-group mb-1">
                            <label for="platform_name">Lead Generated From</label>
                            <select id="platform_name" class="form-control">
                                <option value="">Select Platform</option>
                                <option value="Discord">Discord</option>
                                <option value="Instagram">Instagram</option>
                                <option value="Twitter">Twitter</option>
                            </select>
                        </div>
                        <!-- Client Username Link (Required) -->
                        <div class="form-group mb-1">
                            <label for="client_username">Client Username</label>
                            <input type="text" id="client_username" placeholder="Enter Client Username" class="form-control">
                        </div>                         
                        <!-- Channel Link -->
                        <div class="form-group mb-1" id="channel_link_field">
                            <label for="channel_link">Channel Link</label>
                            <input type="text" id="channel_link" placeholder="Enter Channel Link" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="addLeadBtn">Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Lead Modal -->
    <div class="modal fade" id="editLeadModal" data-bs-backdrop="static">
        <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">LEAD INFO</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editLeadForm">
                        <!-- Account Name -->
                        <div class="form-group mb-1">
                            <label for="edit_account_name">Account Name</label>
                            <select id="edit_account_name" class="form-control">
                                <option value="">Select Account</option>
                                <?php
                                $query = "SELECT * FROM account_credentials ORDER BY name";
                                $result = mysqli_query($conn,$query);
                                while($data = mysqli_fetch_assoc($result))
                                {
                                    echo "<option value='".$data['name']."'>".$data['name']."</option>";
                                }
                                ?>
                            </select>
                        </div>                       
                        <!-- Platform Name -->
                        <div class="form-group mb-1">
                            <label for="edit_platform_name">Lead Generated From</label>
                            <select id="edit_platform_name" class="form-control">
                                <option value="">Select Platform</option>
                                <option value="Discord">Discord</option>
                                <option value="Instagram">Instagram</option>
                                <option value="Twitter">Twitter</option>
                            </select>
                        </div>
                        <!-- Client Username -->
                        <div class="form-group mb-1">
                            <label for="edit_client_username">Client Username</label>
                            <input type="text" id="edit_client_username" placeholder="Enter Client Username" class="form-control">
                        </div>                         
                        <!-- Channel Link -->
                        <div class="form-group mb-1">
                            <label for="edit_channel_link">Channel Link</label>
                            <input type="text" id="edit_channel_link" placeholder="Enter Channel Link" class="form-control">
                        </div>
                        <!-- Comments -->
                        <div class="form-group mb-1">
                            <label for="comments">Comments</label>
                            <textarea id="comments" cols="30" rows="3" placeholder="Please specify reason" class="form-control"></textarea>
                        </div>
                        <!-- Status -->
                        <div class="form-group mb-1">
                            <label for="status">Status</label>
                            <select id="status" class="form-control">
                                <option value="">Select</option>
                                <option value="Pending">Pending</option>
                                <option value="Closed">Closed</option>
                                <option value="Follow up date">Follow up date</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div> 
                        <!-- Items -->
                        <div class="form-group mb-1" id="items_field">
                            <label for="items">Items (Stream Elements)</label>
                            <textarea id="items" cols="30" rows="3" placeholder="Enter Items" class="form-control"></textarea>
                        </div>                         
                        <!-- Amount -->
                        <div class="form-group mb-1" id="amount_field">
                            <label for="amount">Closed Amount</label>
                            <input type="number" id="amount" placeholder="Enter Amount" class="form-control">
                        </div>                         
                        <!-- Follow-up Date -->
                        <div class="form-group mb-1">
                            <label for="follow_up_date">Follow-up Date With Remarks</label>
                            <textarea id="follow_up_date" cols="30" rows="3" placeholder="Enter Follow-up Date With Remarks" class="form-control"></textarea>
                        </div>                         
                        <!-- Reason Of Rejection -->
                        <div class="form-group mb-1">
                            <label for="reason_of_rejection">Reason Of Rejection</label>
                            <textarea id="reason_of_rejection" cols="30" rows="3" placeholder="Please specify reason" class="form-control"></textarea>
                        </div>                       
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- Hidden Fields -->
                    <input type="hidden" id="hiddenLeadId">
                    <input type="hidden" id="hiddenAdminId">
                    <input type="hidden" id="hiddenEmployeeId">
                    <input type="hidden" id="hiddenEmployeeName">
                    <button type="button" class="btn btn-primary" id="updateLeadBtn">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Date Range Modal -->
    <div class="modal fade" id="leadDateRangeModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
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
                    <button type="button" class="btn btn-primary" id="leadDateRangeBtn">Search</button>
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

    // Show Channel Link Field If Platform Is Not Discord
    $(document).ready(function () {
        $("#channel_link_field").hide();
        $("#amount_field").hide();
        $("#items_field").hide();
        $("#platform_name").change(function(){
            let platformName = $("#platform_name").val();
            if(platformName!="" && platformName!="Discord")
            {
                $("#channel_link_field").slideDown('fast');
            }
            else
            {
                $("#channel_link_field").slideUp('fast');
            }
        });

        // Show Amount Field If Status Is Closed
        $("#status").change(function(){
            status = $("#status").val();
            if(status=="Closed")
            {
                $("#amount_field").slideDown('fast');
                $("#items_field").slideDown('fast');
            }
            else
            {
                $("#amount_field").slideUp('fast');
                $("#items_field").slideUp('fast');
            }
        });
    });

    var status = '';
    var from = '';
    var to = '';
    $("#leadDateRangeBtn").click(function(){
        from = $("#from").val();
        to = $("#to").val();
        if(from==="" || to==="")
        {
            toaster("Please select date range in a proper manner",5);
        }
        else
        {
            $("#leadDateRangeModal").modal("hide");
            $("#leadsTable").DataTable().destroy();
            fetchLeads();

            // For Table Heading
            $.ajax({
                type: "POST",
                url: "ajax/headings/lead.php",
                data: {from:from, to:to},
                success: function (response) 
                {
                    $(".main-heading").text(response);
                }
            });
        }
    });

    // Export As Excel
    $("#exportLeadBtn").click(function(){
        from = $("#from").val();
        to = $("#to").val();
        window.location.href=`Export/lead.php?from=${from}&to=${to}`;
    });    

    // Fetch Lead Generation
    function fetchLeads()
    {
        $("#leadsTable").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
            "type": "POST",
            "url": "ajax/fetch/lead.php",
            "data": {from:from, to:to} 
            },
        "columns": [
            { data: 'id', className:'d-none'}, // Lead Hidden ID
            { data: 'admin_id_FK', className:'d-none'}, // Admin Hidden ID
            { data: 'lead_timestamp'},
            { data: 'employee_name'},
            { data: 'account_name'},
            { data: 'platform_name'},
            { data: 'client_username', className:'copied'},
            { data: 'channel_link', className:'copied'},
            { data: 'comments'},
            { data: 'status'},
            { data: 'items'},
            { data: 'follow_up_date_with_remarks'},
            { data: 'reason_of_rejection'},
            { data: 'quality_of_lead'},
            { data: 'amount'},
            { 
                "render": function (data, type, full, meta) {
                    var buttons = '';

                    buttons += `<button type="button" class="btn btn-info text-white me-1" title="Edit Record"
                    onclick="editLead(${full.id})"><i class="fas fa-edit"></i> Edit</button>`;

                    // Delete Button Access Only For Admin 
                    <?php if($_SESSION['login_type']==1): ?>
                    buttons += `<button type='button' class='btn btn-danger me-1' title='Delete record' 
                    onclick="deleteLead(${full.id})"><i class="fas fa-trash-alt"></i> Delete</button>`;
                    <?php endif; ?>                    

                    buttons += `<button type='button' class='btn btn-success qualityBtn me-1'
                    data-id="${full.id}" data-quality-of-lead="Qualified"
                    title='Mark as qualified'><i class="fas fa-check-circle"></i> Qualified</button>`;

                    buttons += `<button type='button' class='btn btn-danger qualityBtn'
                    data-id="${full.id}" data-quality-of-lead="Disqualified" 
                    title='Mark as disqualified'><i class="fas fa-ban"></i> Disqualified</button>`;

                    return buttons;
                }, <?php if($_SESSION['login_type']==2  && $_SESSION['role']==="Lead Generation"): ?>
                    className: 'd-none'
                    <?php endif; ?>
            }
            
        ],
        "pageLength": 10,
        "searching": true,
        });
    }

    // Load Lead Generation Table On Page Initialization
    $(document).ready(function () {
        fetchLeads();
    });

    // Add New Lead
    $("#addLeadBtn").click(function(){
        let account_name = $("#account_name").val();
        let platform_name = $("#platform_name").val();
        let client_username = $("#client_username").val();
        let channel_link = $("#channel_link").val();

        if(channel_link==="")
        {
            channel_link = "-";
        }
  
        if(account_name=="")
        {
            toaster("Please Select account name",5);
        }
        else
        {
            if(platform_name=="")
            {
                toaster("Please Select Platform",5);
            }
            else
            {
                if(client_username=="")
                {
                    toaster("Please Enter Client's username",5);
                }
                else
                {
                    $.ajax({
                        type: "POST",
                        url: "ajax/add/lead.php",
                        data: { account_name:account_name, platform_name:platform_name, 
                        client_username:client_username, channel_link:channel_link },
                        success: function (response) 
                        {
                            if(response=="Your lead has been added")
                            {
                                $("#leadsTable").DataTable().destroy();
                                fetchLeads();
                                toaster(response,5);
                                $("#account_name, #platform_name, #client_username, #channel_link").val("");
                                $("#channel_link_field").slideUp('fast');
                                $("#addLeadModal").modal("hide");
                            }
                            else if(response=="Your lead has not been added")
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
        }
    });

    // Edit Lead
    function editLead(id)
    {
        $("#hiddenLeadId").val(id);
        $.ajax({
            type: "POST",
            url: "ajax/edit/lead.php",
            data: {id:id},
            success: function (response) 
            {
                var lead = JSON.parse(response);
                // For User
                $("#edit_account_name").val(lead.account_name);
                $("#edit_platform_name").val(lead.platform_name);
                $("#edit_client_username").val(lead.client_username);
                $("#edit_channel_link").val(lead.channel_link);

                // For Hidden
                $("#hiddenAdminId").val(lead.admin_id_FK);
                $("#hiddenEmployeeId").val(lead.employee_id_FK);
                $("#hiddenEmployeeName").val(lead.employee_name);

                // For Admin
                $("#comments").val(lead.comments);
                $("#status").val(lead.status);
                $("#follow_up_date").val(lead.follow_up_date_with_remarks);
                $("#reason_of_rejection").val(lead.reason_of_rejection);
                $("#items").val(lead.items);
                $("#amount").val(lead.amount);

                if(lead.status==="Closed")
                {
                    $("#amount_field").show();
                    $("#items_field").show();
                }
                else
                {
                    $("#amount_field").hide();
                    $("#items_field").hide();
                }
                $("#editLeadModal").modal("show");
            }
        });
    }

    // Update Lead
    $("#updateLeadBtn").click(function(){

        let id = $("#hiddenLeadId").val();
        let admin_id = $("#hiddenAdminId").val();
        let employee_id = $("#hiddenEmployeeId").val();
        let employee_name = $("#hiddenEmployeeName").val();
        let account_name = $("#edit_account_name").val();
        let platform_name = $("#edit_platform_name").val();
        let client_username = $("#edit_client_username").val();
        let channel_link = $("#edit_channel_link").val();
        let comments = $("#comments").val();
        let status = $("#status").val();
        let follow_up_date_with_remarks = $("#follow_up_date").val();
        let reason_of_rejection = $("#reason_of_rejection").val();
        let items = $("#items").val();
        let amount = $("#amount").val();

        if(channel_link==="")
        {
            channel_link = "-";
        }
  
        if(account_name=="")
        {
            toaster("Please Select account name",5);
        }
        else
        {
            if(platform_name=="")
            {
                toaster("Please Select Platform",5);
            }
            else
            {
                if(client_username=="")
                {
                    toaster("Please Enter Client's username",5);
                }
                else
                {
                    if(status==="Closed")
                    {
                        if(items==="" || items===null || items===undefined || items==="-")
                        {
                            toaster("Please enter closed items",5);
                        }
                        else
                        {
                            if(amount==0 || amount==null || amount==undefined || amount=="")
                            {
                                toaster("Please enter closed amount",5);
                            }
                            else
                            {
                                $.ajax({
                                    type: "POST",
                                    url: "ajax/update/lead.php",
                                    data: {id:id, admin_id:admin_id ,employee_id:employee_id, 
                                    employee_name:employee_name ,account_name:account_name, 
                                    platform_name:platform_name, client_username:client_username,
                                    channel_link:channel_link, comments:comments, status:status, 
                                    follow_up_date_with_remarks:follow_up_date_with_remarks, 
                                    reason_of_rejection:reason_of_rejection, items:items, amount:amount},
                                    success: function (response) 
                                    {
                                        if(response==="Deal closed")
                                        {
                                            swal.fire({
                                                title: "CONGRATULATIONS",
                                                text: "Deal has been closed",
                                                icon: 'success',
                                                confirmButtonColor: 'blue',
                                                showCloseButton: true,
                                                allowOutsideClick: false,                                    
                                            timer:3000,
                                            });
                                            $("#leadsTable").DataTable().destroy();
                                            fetchLeads();
                                            $("#editLeadModal").modal("hide");
                                        }
                                        else if(response==="Lead has been updated")
                                        {
                                            $("#leadsTable").DataTable().destroy();
                                            fetchLeads();
                                            toaster(response,5);
                                            $("#editLeadModal").modal("hide");
                                        }
                                        else if(response==="Lead has not been updated")
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
                    else
                    {
                        $.ajax({
                        type: "POST",
                        url: "ajax/update/lead.php",
                        data: {id:id, admin_id:admin_id ,employee_id:employee_id, 
                        employee_name:employee_name ,account_name:account_name, 
                        platform_name:platform_name, client_username:client_username,
                        channel_link:channel_link, comments:comments, status:status, 
                        follow_up_date_with_remarks:follow_up_date_with_remarks, 
                        reason_of_rejection:reason_of_rejection, items:items ,amount:amount},
                            success: function (response) 
                            {
                                if(response==="Deal closed")
                                {
                                    swal.fire({
                                        title: "CONGRATULATIONS",
                                        text: "Deal has been closed",
                                        icon: 'success',
                                        confirmButtonColor: 'blue',
                                        showCloseButton: true,
                                        allowOutsideClick: false,                                    
                                        timer:3000,
                                    });
                                    $("#leadsTable").DataTable().destroy();
                                    fetchLeads();
                                    $("#editLeadModal").modal("hide");
                                }
                                else if(response==="Lead has been updated")
                                {
                                    $("#leadsTable").DataTable().destroy();
                                    fetchLeads();
                                    toaster(response,5);
                                    $("#editLeadModal").modal("hide");
                                }
                                else if(response==="Lead has not been updated")
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
    });

    // Delete Lead
    function deleteLead(id)
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
                    url: "ajax/delete/lead.php",
                    data: {id:id},
                    success: function (response) 
                    {
                        if(response==="Lead has been deleted")
                        {
                            $("#leadsTable").DataTable().destroy();
                            fetchLeads();
                            toaster(response,5);
                        }
                        else if(response==="Lead has not been deleted")
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
        }));
    }

    // Lead Approval
    $(document).on("click",".qualityBtn",function(){
        let id = $(this).attr("data-id");
        let quality = $(this).attr("data-quality-of-lead");
        if(quality==="Qualified")
        {
            // Qualified
            $.ajax({
                type: "POST",
                url: "ajax/update/qualified.php",
                data: {id:id, quality:quality},
                success: function (response) 
                {
                    $("#leadsTable").DataTable().destroy();
                    fetchLeads();
                    toaster(response);
                }
            });
        }
        else
        {
            // Disqualified
            $.ajax({
                type: "POST",
                url: "ajax/update/disQualified.php",
                data: {id:id, quality:quality},
                success: function (response) 
                {
                    $("#leadsTable").DataTable().destroy();
                    fetchLeads();
                    toaster(response);
                }
            });
        }
    });
    <?php if($_SESSION['role']=="Lead Generation"): ?>
    //Show Total Leads Notification
    function showNotification() 
    {
        let notification = 'notification';
        $.ajax({
            url: 'ajax/fetch/notification.php',
            type: 'POST',
            data:{notification:notification},
            success: function(response) 
            {
                if(response!=="false")
                {
                    $('#notification-text').text("YOU ARE "+response+" LEADS AWAY TO GET 1ST POSITION");
                    $('.notification').fadeIn('slow').delay(5000).fadeOut('slow');
                }
                else if(response==="false")
                {
                    $('.notification').fadeOut('slow');
                }
                else
                {
                    $('.notification').fadeOut('slow');
                }
            
            }
        });
    }

    setInterval(function() {
        showNotification();
    }, 10000); 
<?php endif; ?>    
</script>
</body>
</html>