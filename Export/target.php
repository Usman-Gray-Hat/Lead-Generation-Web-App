<?php
include("../dbConnect.php");
date_default_timezone_set('Asia/Karachi');
$from = $_GET['from']??"";
$to = $_GET['to']??"";

// For Exporting
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=MonthlyTarget.xls");

if($from==="" || $to==="") // If date range is not selected
{
    $msg = "TARGET ACHIEVED IN THIS MONTH (".strtoupper(date('F-Y')).")";

    $query = "SELECT employee_name, SUM(amount) AS total_amount FROM targets
    WHERE MONTH(date_created) = MONTH(CURRENT_DATE())
    AND YEAR(date_created) = YEAR(CURRENT_DATE())
    GROUP BY admin_id_FK";
}
else // If date range is selected
{
    $msg = "TARGET ACHIEVED 
    (FROM ".strtoupper(date('M-d-Y',strtotime($from)))." TO ".strtoupper(date('M-d-Y',strtotime($to))).")";

    $query = "SELECT employee_name, SUM(amount) AS total_amount FROM targets
    WHERE date_created BETWEEN '$from' AND '$to'
    GROUP BY admin_id_FK";
}

$result = mysqli_query($conn,$query);
$row = mysqli_num_rows($result);
$i = 1;
if($row>0)
{
    $table = "<table border='1px' style='text-align:center;'>
    <thead>
    <tr>
    <th style='text-align:center; background-color: #8ea9db;' colspan='3'>".$msg."</th>
    </tr>
    <tr>
    <th style='text-align:center; background-color: #8ea9db;'>SR.NO</th>
    <th style='text-align:center; background-color: #8ea9db;'>EMPLOYEE NAME</th>
    <th style='text-align:center; background-color: #8ea9db;'>TARGET ACHIEVED</th>
    </thead>
    </tr><tbody>";

    while($data=mysqli_fetch_assoc($result))
    {
       $table.="<tr>
       <td style='text-align:center; vertical-align: middle;'>".$i++."</td>
       <td style='text-align:center; vertical-align: middle;'>".$data['employee_name']."</td>
       <td style='text-align:center; vertical-align: middle;'>$".number_format($data['total_amount'],2)."</td>
       </tr>";
    }
}
else
{
    $table = "<table border='1px' style='text-align:center;'>
    <thead>
    <tr>
    <th style='text-align:center; background-color: #8ea9db;' colspan='3'>".$msg."</th>
    </tr>
    <tr>
    <th style='text-align:center; background-color: #8ea9db;'>SR.NO</th>
    <th style='text-align:center; background-color: #8ea9db;'>EMPLOYEE NAME</th>
    <th style='text-align:center; background-color: #8ea9db;'>TARGET ACHIEVED</th>
    </thead>
    </tr><tbody><tr>
    <td style='text-align:center; vertical-align: middle;' colspan='3'>No Records Available</td>
    </tr></tbody>";
}


$table.= "</tbody></table>";
echo $table;
?>