<?php
include("../dbConnect.php");
date_default_timezone_set('Asia/Karachi');
$from = $_GET['from']??"";
$to = $_GET['to']??"";

// For Exporting
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=MonthlyLeads.xls");

if($from==="" || $to==="") // If date range is not selected
{
    $msg = "TOTAL LEADS IN THIS MONTH (".strtoupper(date('F-Y')).")";

    $query = "SELECT id, leads_count_date, name, admin_id_FK, 
    SUM(total_leads) AS total_leads, 
    AVG(total_leads) AS average_leads 
    FROM leads_count
    WHERE MONTH(leads_count_date) = MONTH(CURRENT_DATE())
    AND YEAR(leads_count_date) = YEAR(CURRENT_DATE())
    GROUP BY admin_id_FK
    ORDER BY total_leads DESC";
}
else // If date range is selected
{
    $msg = "TOTAL LEADS 
    (FROM ".strtoupper(date('M-d-Y',strtotime($from)))." TO ".strtoupper(date('M-d-Y',strtotime($to))).")";

    $query = "SELECT id, leads_count_date, name, admin_id_FK, 
    SUM(total_leads) AS total_leads, 
    AVG(total_leads) AS average_leads 
    FROM leads_count
    WHERE leads_count_date BETWEEN '$from' AND '$to'
    GROUP BY admin_id_FK
    ORDER BY total_leads DESC";
}

$result = mysqli_query($conn,$query);
$i = 1;
$rows = mysqli_num_rows($result);
if($rows>0)
{
    $table = "<table border='1px' style='text-align:center;'>
    <thead>
    <tr>
    <th style='text-align:center; background-color: #8ea9db;' colspan='4'>".$msg."</th>
    </tr>
    <tr>
    <th style='text-align:center; background-color: #8ea9db;'>SR.NO</th>
    <th style='text-align:center; background-color: #8ea9db;'>EMPLOYEE NAME</th>
    <th style='text-align:center; background-color: #8ea9db;'>TOTAL LEADS</th>
    <th style='text-align:center; background-color: #8ea9db;'>AVERAGE</th>
    </thead>
    </tr><tbody>";

    while($data=mysqli_fetch_assoc($result))
    {
       $table.="<tr>
       <td style='text-align:center; vertical-align: middle;'>".$i++."</td>
       <td style='text-align:center; vertical-align: middle;'>".$data['name']."</td>
       <td style='text-align:center; vertical-align: middle;'>".$data['total_leads']."</td>
       <td style='text-align:center; vertical-align: middle;'><i class='fas fa-trophy'></i> ".number_format($data['average_leads'],1)."</td>
       </tr>";
    }
}
else
{
    $table = "<table border='1px' style='text-align:center;'>
    <thead>
    <tr>
    <th style='text-align:center; background-color: #8ea9db;' colspan='4'>".$msg."</th>
    </tr>
    <tr>
    <th style='text-align:center; background-color: #8ea9db;'>SR.NO</th>
    <th style='text-align:center; background-color: #8ea9db;'>EMPLOYEE NAME</th>
    <th style='text-align:center; background-color: #8ea9db;'>TOTAL LEADS</th>
    <th style='text-align:center; background-color: #8ea9db;'>AVERAGE</th>
    </thead>
    </tr><tbody><tr>
    <td style='text-align:center; vertical-align: middle;' colspan='4'>No Records Available</td>
    </tr>";
}

$table.= "</tbody></table>";
echo $table;
?>