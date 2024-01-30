<?php
include('../../dbConnect.php');
$draw = $_POST['draw'];
$start = $_POST['start'];
$length = $_POST['length'];
$searchValue = $_POST['search']['value'];
 
$from = $_POST['from'];
$to = $_POST['to']; 

// If date range is not selected
if($from=="" || $to=="")
{
    if($_SESSION['login_type']==1 || $_SESSION['role']==="Manager")
    {
        $query = "SELECT employee_id_FK, employee_name,
        COUNT(employee_id_FK) AS total_absents 
        FROM attendance 
        WHERE MONTH(date_created) = MONTH(CURRENT_DATE())
        AND YEAR(date_created) = YEAR(CURRENT_DATE())
        AND (employee_name LIKE '%$searchValue%')
        GROUP BY employee_id_FK
        ORDER BY total_absents DESC
        LIMIT $start, $length";        
    }
    else
    {
        $id = $_SESSION['employee_id'];
        $query = "SELECT employee_id_FK, employee_name,
        COUNT(employee_id_FK) AS total_absents 
        FROM attendance 
        WHERE employee_id_FK='$id'
        AND MONTH(date_created) = MONTH(CURRENT_DATE())
        AND YEAR(date_created) = YEAR(CURRENT_DATE())
        AND (employee_name LIKE '%$searchValue%')
        GROUP BY employee_id_FK
        ORDER BY total_absents DESC
        LIMIT $start, $length";
    }
}
else // If date range is selected
{
    if($_SESSION['login_type']==1 || $_SESSION['role']==="Manager")
    {
        $query = "SELECT employee_id_FK, employee_name,
        COUNT(employee_id_FK) AS total_absents 
        FROM attendance 
        WHERE date_created BETWEEN '$from' AND '$to'
        AND (employee_name LIKE '%$searchValue%')
        GROUP BY employee_id_FK
        ORDER BY total_absents DESC
        LIMIT $start, $length";        
    }
    else
    {
        $id = $_SESSION['employee_id'];
        $query = "SELECT employee_id_FK, employee_name,
        COUNT(employee_id_FK) AS total_absents 
        FROM attendance 
        WHERE employee_id_FK='$id'
        AND date_created BETWEEN '$from' AND '$to'
        AND (employee_name LIKE '%$searchValue%')
        GROUP BY employee_id_FK
        ORDER BY total_absents DESC
        LIMIT $start, $length";
    }
}

$result = mysqli_query($conn, $query);
$increment = 1;
$data = [];
while ($row = mysqli_fetch_assoc($result)) 
{
$data[] = [
        'employee_id_FK' => $row['employee_id_FK'],
        'sr_no' => $increment++,
        'employee_name' => $row['employee_name'],
        'total_absents' => $row['total_absents'],
    ];
}

// If date range is not selected
if($from=="" || $to=="")
{
    if($_SESSION['login_type']==1 || $_SESSION['role']==="Manager")
    {
        $query2 = "SELECT * FROM attendance 
        WHERE MONTH(date_created) = MONTH(CURRENT_DATE())
        AND YEAR(date_created) = YEAR(CURRENT_DATE())
        AND (employee_name LIKE '%$searchValue%')
        GROUP BY employee_id_FK";        
    }
    else
    {
        $id = $_SESSION['employee_id'];
        $query2 = "SELECT * FROM attendance 
        WHERE employee_id_FK='$id' 
        AND MONTH(date_created) = MONTH(CURRENT_DATE())
        AND YEAR(date_created) = YEAR(CURRENT_DATE())
        AND (employee_name LIKE '%$searchValue%')
        GROUP BY employee_id_FK";
    }
}
else // If date range is selected
{
    if($_SESSION['login_type']==1 || $_SESSION['role']==="Manager")
    {
        $query2 = "SELECT * FROM attendance 
        WHERE date_created BETWEEN '$from' AND '$to'
        AND (employee_name LIKE '%$searchValue%')
        GROUP BY employee_id_FK";        
    }
    else
    {
        $id = $_SESSION['employee_id'];
        $query2 = "SELECT * FROM attendance 
        WHERE employee_id_FK='$id' 
        AND date_created BETWEEN '$from' AND '$to'
        AND (employee_name LIKE '%$searchValue%')
        GROUP BY employee_id_FK";
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