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
    $query = "SELECT id, leads_count_date, name, admin_id_FK, 
    SUM(total_leads) AS total_leads, 
    AVG(total_leads) AS average_leads 
    FROM leads_count
    WHERE MONTH(leads_count_date) = MONTH(CURRENT_DATE())
    AND YEAR(leads_count_date) = YEAR(CURRENT_DATE())
    AND (name LIKE '%$searchValue%')
    GROUP BY admin_id_FK 
    ORDER BY total_leads DESC
    LIMIT $start, $length";
}
else // If date range is selected
{
    $query = "SELECT id, leads_count_date, name, admin_id_FK, 
    SUM(total_leads) AS total_leads, 
    AVG(total_leads) AS average_leads 
    FROM leads_count
    WHERE leads_count_date BETWEEN '$from' AND '$to'
    AND (name LIKE '%$searchValue%')
    GROUP BY admin_id_FK 
    ORDER BY total_leads DESC
    LIMIT $start, $length";
}

$result = mysqli_query($conn, $query);
$increment = 1;
$data = [];
while ($row = mysqli_fetch_assoc($result)) 
{
    // Positions
    if($increment==1)
    {
        $position = "1st";
    }
    else if($increment==2)
    {
        $position = "2nd";
    }
    else if($increment==3)
    {
        $position = "3rd";
    }
    else if($increment==4)
    {
        $position = "4th";
    }
    else if($increment==5)
    {
        $position = "5th";
    }
    else if($increment==6)
    {
        $position = "6th";
    }
    else if($increment==7)
    {
        $position = "7th";
    }
    else if($increment==8)
    {
        $position = "8th";
    }
    else if($increment==9)
    {
        $position = "9th";
    }
    else if($increment==10)
    {
        $position = "10th";
    }
    else
    {
        $position = "Not Eligible";
    }

    // Rank
    if ($row['total_leads'] >= 90) 
    {
        $rank = "<i class='fas fa-crown rank-icon platinum-icon' title='Platinum'></i>";
    } 
    elseif ($row['total_leads'] >= 80) 
    {
        $rank = "<i class='fas fa-gem rank-icon diamond-icon' title='Diamond'></i>";
    } 
    elseif ($row['total_leads'] >= 70) 
    {
        $rank = "<i class='fas fa-trophy rank-icon gold-icon' title='Gold'></i>";
    } 
    elseif ($row['total_leads'] >= 40) 
    {
        $rank = "<i class='fas fa-trophy rank-icon silver-icon' title='Silver'></i>";
    } 
    elseif ($row['total_leads'] >= 20) 
    {
        $rank = "<i class='fas fa-medal rank-icon bronze-icon' title='Bronze'></i>";
    } 
    else 
    {
        $rank = "Not Eligible";
    }
$data[] = [

        'admin_id_FK' => $row['admin_id_FK'],
        'sr_no' => $increment++,
        'name' => $row['name'],
        'total_leads' => $row['total_leads'],
        'average_leads' => number_format($row['average_leads'],1),
        'position' => $position,
        'rank' => $rank,
    ];
}

if($from==="" || $to==="") // If date range is not selected
{
    $query2 = "SELECT * FROM leads_count
    WHERE MONTH(leads_count_date) = MONTH(CURRENT_DATE())
    AND YEAR(leads_count_date) = YEAR(CURRENT_DATE())
    AND (name LIKE '%$searchValue%')
    GROUP BY admin_id_FK";
}
else // If date range is selected
{
    $query2 = "SELECT * FROM leads_count 
    WHERE leads_count_date BETWEEN '$from' AND '$to'
    AND (name LIKE '%$searchValue%')";
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