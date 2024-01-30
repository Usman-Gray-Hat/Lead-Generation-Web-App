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
    $query = "SELECT employee_name, SUM(amount) AS total_amount 
    FROM targets 
    WHERE MONTH(date_created) = MONTH(CURRENT_DATE())
    AND YEAR(date_created) = YEAR(CURRENT_DATE())
    AND (employee_name LIKE '%$searchValue%')
    GROUP BY admin_id_FK LIMIT $start, $length";
}
else // If date range is selected
{
    $query = "SELECT employee_name, SUM(amount) AS total_amount 
    FROM targets
    WHERE date_created BETWEEN '$from' AND '$to'
    AND (employee_name LIKE '%$searchValue%')
    GROUP BY admin_id_FK LIMIT $start, $length";
}

$result = mysqli_query($conn, $query);
$increment = 1;
$data = [];
while ($row = mysqli_fetch_assoc($result)) 
{
    $total_amount = "$".number_format($row['total_amount'],2)."";

    $data[] = [
        'sr_no' => $increment++,
        'employee_name' => $row['employee_name'],
        'amount' => $total_amount,
    ];
}


if($from==="" || $to==="") // If date range is not selected
{
    $query2 = "SELECT * FROM targets 
    WHERE MONTH(date_created) = MONTH(CURRENT_DATE())
    AND YEAR(date_created) = YEAR(CURRENT_DATE())
    AND (employee_name LIKE '%$searchValue%')
    GROUP BY admin_id_FK";
}
else // If date range is selected
{
    $query2 = "SELECT * FROM targets 
    WHERE date_created BETWEEN '$from' AND '$to'
    AND (employee_name LIKE '%$searchValue%')
    GROUP BY admin_id_FK";
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