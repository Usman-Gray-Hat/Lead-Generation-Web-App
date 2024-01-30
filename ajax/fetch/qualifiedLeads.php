<?php
include('../../dbConnect.php');
$draw = $_POST['draw'];
$start = $_POST['start'];
$length = $_POST['length'];
$searchValue = $_POST['search']['value'];
$from = $_POST['from'];
$to = $_POST['to'];

if($from==="" || $to==="") // If date range is not selected
{
    if($_SESSION['login_type']==1 || $_SESSION['role']==="Manager")
    {
        $query = "SELECT * FROM leads 
        WHERE quality_of_lead='Qualified'
        AND (employee_name LIKE '%$searchValue%'
        OR account_name LIKE '%$searchValue%' 
        OR platform_name LIKE '%$searchValue%'
        OR client_username LIKE '%$searchValue%'
        OR channel_link LIKE '%$searchValue%' 
        OR comments LIKE '%$searchValue%'
        OR status LIKE '%$searchValue%'
        OR items LIKE '%$searchValue%'
        OR amount LIKE '%$searchValue%'
        OR follow_up_date_with_remarks LIKE '%$searchValue%'
        OR reason_of_rejection LIKE '%$searchValue%')
        ORDER BY id DESC 
        LIMIT $start, $length";        
    }
    else
    {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM leads 
        WHERE admin_id_FK='$id' 
        AND quality_of_lead='Qualified'
        AND (employee_name LIKE '%$searchValue%'
        OR account_name LIKE '%$searchValue%' 
        OR platform_name LIKE '%$searchValue%'
        OR client_username LIKE '%$searchValue%'
        OR channel_link LIKE '%$searchValue%' 
        OR comments LIKE '%$searchValue%'
        OR status LIKE '%$searchValue%'
        OR items LIKE '%$searchValue%'
        OR amount LIKE '%$searchValue%'
        OR follow_up_date_with_remarks LIKE '%$searchValue%'
        OR reason_of_rejection LIKE '%$searchValue%')
        ORDER BY id DESC 
        LIMIT $start, $length";
    }
}
else // If date range is selected
{
    if($_SESSION['login_type']==1 || $_SESSION['role']==="Manager")
    {
        $query = "SELECT * FROM leads 
        WHERE quality_of_lead='Qualified'
        AND lead_date BETWEEN '$from' AND '$to'
        AND (employee_name LIKE '%$searchValue%'
        OR account_name LIKE '%$searchValue%' 
        OR platform_name LIKE '%$searchValue%'
        OR client_username LIKE '%$searchValue%'
        OR channel_link LIKE '%$searchValue%' 
        OR comments LIKE '%$searchValue%'
        OR status LIKE '%$searchValue%'
        OR items LIKE '%$searchValue%'
        OR amount LIKE '%$searchValue%'
        OR follow_up_date_with_remarks LIKE '%$searchValue%'
        OR reason_of_rejection LIKE '%$searchValue%')
        ORDER BY lead_date ASC 
        LIMIT $start, $length";        
    }
    else
    {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM leads 
        WHERE admin_id_FK='$id' 
        AND quality_of_lead='Qualified'
        AND lead_date BETWEEN '$from' AND '$to'
        AND (employee_name LIKE '%$searchValue%'
        OR account_name LIKE '%$searchValue%' 
        OR platform_name LIKE '%$searchValue%'
        OR client_username LIKE '%$searchValue%'
        OR channel_link LIKE '%$searchValue%' 
        OR comments LIKE '%$searchValue%'
        OR status LIKE '%$searchValue%'
        OR items LIKE '%$searchValue%'
        OR amount LIKE '%$searchValue%'
        OR follow_up_date_with_remarks LIKE '%$searchValue%'
        OR reason_of_rejection LIKE '%$searchValue%')
        ORDER BY lead_date ASC 
        LIMIT $start, $length";
    }   
}

$result = mysqli_query($conn, $query);
$increment = 1;
$data = [];

while ($row = mysqli_fetch_assoc($result)) 
{
    $closed_amount = "$".number_format($row['amount'],2)."";

    if($row['status']=="Closed")
    {
        $status = "<b class='text-success'>".$row['status']."</b>";
    }
    else
    {
        $status = $row['status'];
    }

    $data[] = [
        'lead_timestamp' => date("F-d-Y H:i a",strtotime($row['lead_timestamp'])),
        'employee_name' => $row['employee_name'],
        'account_name' => $row['account_name'],
        'platform_name' => $row['platform_name'],
        'client_username' => $row['client_username'],
        'channel_link' => $row['channel_link'],
        'comments' => $row['comments'],
        'status' => $status,
        'items' => $row['items'],
        'follow_up_date_with_remarks' => $row['follow_up_date_with_remarks'],
        'reason_of_rejection' => $row['reason_of_rejection'],
        'amount' => $closed_amount,
    ];
}

if($from==="" || $to==="") // If date range is not selected
{
    if($_SESSION['login_type']==1 || $_SESSION['role']==="Manager")
    {
        $query2 = "SELECT * FROM leads 
        WHERE quality_of_lead='Qualified'
        AND (employee_name LIKE '%$searchValue%'
        OR account_name LIKE '%$searchValue%' 
        OR platform_name LIKE '%$searchValue%'
        OR client_username LIKE '%$searchValue%' 
        OR channel_link LIKE '%$searchValue%'
        OR comments LIKE '%$searchValue%'
        OR status LIKE '%$searchValue%'
        OR items LIKE '%$searchValue%'
        OR amount LIKE '%$searchValue%'
        OR follow_up_date_with_remarks LIKE '%$searchValue%'
        OR reason_of_rejection LIKE '%$searchValue%')";        
    }
    else
    {
        $id = $_SESSION['id'];
        $query2 = "SELECT * FROM leads 
        WHERE admin_id_FK='$id'
        AND  quality_of_lead='Qualified'
        AND (employee_name LIKE '%$searchValue%'
        OR account_name LIKE '%$searchValue%' 
        OR platform_name LIKE '%$searchValue%'
        OR client_username LIKE '%$searchValue%'
        OR channel_link LIKE '%$searchValue%' 
        OR comments LIKE '%$searchValue%'
        OR status LIKE '%$searchValue%'
        OR items LIKE '%$searchValue%'
        OR amount LIKE '%$searchValue%'
        OR follow_up_date_with_remarks LIKE '%$searchValue%'
        OR reason_of_rejection LIKE '%$searchValue%')";
    }
}
else // If date range is selected
{
    if($_SESSION['login_type']==1 || $_SESSION['role']==="Manager")
    {
        $query2 = "SELECT * FROM leads 
        WHERE lead_date BETWEEN '$from' AND '$to'
        AND quality_of_lead='Qualified' 
        AND (employee_name LIKE '%$searchValue%'
        OR account_name LIKE '%$searchValue%' 
        OR platform_name LIKE '%$searchValue%'
        OR client_username LIKE '%$searchValue%' 
        OR channel_link LIKE '%$searchValue%'
        OR comments LIKE '%$searchValue%'
        OR status LIKE '%$searchValue%'
        OR items LIKE '%$searchValue%'
        OR amount LIKE '%$searchValue%'
        OR follow_up_date_with_remarks LIKE '%$searchValue%'
        OR reason_of_rejection LIKE '%$searchValue%')";        
    }
    else
    {
        $id = $_SESSION['id'];
        $query2 = "SELECT * FROM leads 
        WHERE admin_id_FK='$id'
        AND quality_of_lead='Qualified'
        AND lead_date BETWEEN '$from' AND '$to'
        AND (employee_name LIKE '%$searchValue%'
        OR account_name LIKE '%$searchValue%' 
        OR platform_name LIKE '%$searchValue%'
        OR client_username LIKE '%$searchValue%'
        OR channel_link LIKE '%$searchValue%' 
        OR comments LIKE '%$searchValue%'
        OR status LIKE '%$searchValue%'
        OR items LIKE '%$searchValue%'
        OR amount LIKE '%$searchValue%'
        OR follow_up_date_with_remarks LIKE '%$searchValue%'
        OR reason_of_rejection LIKE '%$searchValue%')";
    }
}

$result2 = mysqli_query($conn,$query2);
$totalRecords = mysqli_num_rows($result2);
$response = [
    "draw" => intval($draw),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords,
    "data" => $data
];
header('Content-Type: application/json');
echo json_encode($response);
?>