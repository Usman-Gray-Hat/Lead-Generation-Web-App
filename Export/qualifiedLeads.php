<?php
include("../dbConnect.php");
// For Exporting
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=QualifiedLeads.xls");
$from = $_GET['from']??"";
$to = $_GET['to']??"";


if($from==="" || $to==="") // If date range is not selected
{
    $msg = "QUALIFIED LEAD RECORDS";
    $query = "SELECT * FROM leads
    WHERE quality_of_lead='Qualified'
    ORDER BY id DESC";
}
else // If date range is selected
{
    $msg = "QUALIFIED LEAD RECORDS (FROM ".strtoupper(date('M-d-Y',strtotime($from)))." TO 
    ".strtoupper(date('M-d-Y',strtotime($to))).")";
    $query = "SELECT * FROM leads 
    WHERE lead_date BETWEEN '$from' AND '$to'
    AND quality_of_lead='Qualified'
    ORDER BY id ASC";
}
$result = mysqli_query($conn,$query);
$i = 1;
$rows = mysqli_num_rows($result);
if($rows>0)
{
    $table = "<table border='1px' style='text-align:center;'>
    <thead>
    <tr>
    <th style='text-align:center; background-color: #8ea9db;' colspan='12'>".$msg."</th>
    </tr>
    <tr>
    <th style='text-align:center; background-color: #8ea9db;'>TIMESTAMP</th>
    <th style='text-align:center; background-color: #8ea9db;'>EMPLOYEE</th>
    <th style='text-align:center; background-color: #8ea9db;'>ACCOUNT</th>
    <th style='text-align:center; background-color: #8ea9db;'>PLATFORM</th>
    <th style='text-align:center; background-color: #8ea9db;'>CLIENT'S USERNAME</th>
    <th style='text-align:center; background-color: #8ea9db;'>CHANNEL LINK</th>
    <th style='text-align:center; background-color: #8ea9db;'>COMMENTS</th>
    <th style='text-align:center; background-color: #8ea9db;'>STATUS</th>
    <th style='text-align:center; background-color: #8ea9db;'>ITEMS</th>
    <th style='text-align:center; background-color: #8ea9db;'>FOLLOW UP DATE WITH REMARKS</th>
    <th style='text-align:center; background-color: #8ea9db;'>REASON OF REJECTION</th>
    <th style='text-align:center; background-color: #8ea9db;'>CLOSED AMOUNT</th>
    </thead>
    </tr><tbody>";

    while($data=mysqli_fetch_assoc($result))
    {
       $table.="<tr>
       <td style='text-align:center; vertical-align: middle;'>".date("F-d-Y H:i a",strtotime($data['lead_timestamp']))."</td>
       <td style='text-align:center; vertical-align: middle;'>".$data['employee_name']."</td>
       <td style='text-align:center; vertical-align: middle;'>".$data['account_name']."</td>
       <td style='text-align:center; vertical-align: middle;'>".$data['platform_name']."</td>
       <td style='text-align:center; vertical-align: middle;'>".$data['client_username']."</td>
       <td style='text-align:center; vertical-align: middle;'>".$data['channel_link']."</td>
       <td style='text-align:center; vertical-align: middle;'>".$data['comments']."</td>
       <td style='text-align:center; vertical-align: middle;'>".$data['status']."</td>
       <td style='text-align:center; vertical-align: middle;'>".$data['items']."</td>
       <td style='text-align:center; vertical-align: middle;'>".$data['follow_up_date_with_remarks']."</td>
       <td style='text-align:center; vertical-align: middle;'>".$data['reason_of_rejection']."</td>
       <td style='text-align:center; vertical-align: middle;'>$".number_format($data['amount'],2)."</td>
       </tr>";
    }
}
else
{
    $table = "<table border='1px' style='text-align:center;'>
    <thead>
    <tr>
    <th style='text-align:center; background-color: #8ea9db;' colspan='12'>".$msg."</th>
    </tr>
    <tr>
    <th style='text-align:center; background-color: #8ea9db;'>TIMESTAMP</th>
    <th style='text-align:center; background-color: #8ea9db;'>EMPLOYEE</th>
    <th style='text-align:center; background-color: #8ea9db;'>ACCOUNT</th>
    <th style='text-align:center; background-color: #8ea9db;'>PLATFORM</th>
    <th style='text-align:center; background-color: #8ea9db;'>CLIENT'S USERNAME</th>
    <th style='text-align:center; background-color: #8ea9db;'>CHANNEL LINK</th>
    <th style='text-align:center; background-color: #8ea9db;'>COMMENTS</th>
    <th style='text-align:center; background-color: #8ea9db;'>STATUS</th>
    <th style='text-align:center; background-color: #8ea9db;'>ITEMS</th>
    <th style='text-align:center; background-color: #8ea9db;'>FOLLOW UP DATE WITH REMARKS</th>
    <th style='text-align:center; background-color: #8ea9db;'>REASON OF REJECTION</th>
    <th style='text-align:center; background-color: #8ea9db;'>CLOSED AMOUNT</th>
    </thead>
    </tr><tbody><tr>
    <td style='text-align:center; vertical-align: middle;' colspan='12'>No Records Available</td>
    </tr>";
}

$table.= "</tbody></table>";
echo $table;
?>