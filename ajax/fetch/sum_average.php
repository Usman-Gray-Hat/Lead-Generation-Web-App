<?php
include('../../dbConnect.php');
if(isset($_POST['id']) && isset($_POST['id'])!="")
{
    $id = $_POST['id'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    if($from==="" || $to==="") // If date range is not selected
    {
        // For sum
        $query = "SELECT SUM(total_leads) AS sum
        FROM leads_count
        WHERE admin_id_FK='$id'";

        // For average
        $query2 = "SELECT AVG(total_leads) AS average
        FROM leads_count
        WHERE admin_id_FK='$id'";
    }
    else // If date range is selected
    {
        // For sum
        $query = "SELECT SUM(total_leads) AS sum
        FROM leads_count
        WHERE admin_id_FK='$id' 
        AND leads_count_date BETWEEN '$from' AND '$to'";

        // For average
        $query2 = "SELECT AVG(total_leads) AS average
        FROM leads_count
        WHERE admin_id_FK='$id' 
        AND leads_count_date BETWEEN '$from' AND '$to'";        
    }
    
    // For sum
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    $sum = $data['sum'];

    // For average
    $result2 = mysqli_query($conn,$query2);
    $data2 = mysqli_fetch_assoc($result2);
    $average = number_format($data2['average'],1);

    $response = array(
        'sum' => $sum,
        'average' => $average
    );
    echo json_encode($response);
}
?>