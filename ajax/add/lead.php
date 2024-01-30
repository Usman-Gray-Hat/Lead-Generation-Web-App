<?php
include("../../dbConnect.php");
date_default_timezone_set('Asia/Karachi');
if(isset($_POST['account_name']) && isset($_POST['platform_name']) && isset($_POST['client_username']))
{
    $id = $_SESSION['id']; // Admin ID
    $employee_id = $_SESSION['employee_id']; // Employee ID
    $name = $_SESSION['name'];
    $account_name = $_POST['account_name'];
    $platform_name = $_POST['platform_name'];
    $client_username = $_POST['client_username'];
    $channel_link = $_POST['channel_link']; 

    $query = "INSERT INTO leads (employee_name, account_name, platform_name,
    client_username, channel_link, admin_id_FK,employee_id_FK)
    VALUES ('$name', '$account_name', '$platform_name', '$client_username', '$channel_link', '$id','$employee_id')";
    $exec = mysqli_query($conn,$query);
    if($exec==true)
    {
        // For Leads Count Table
        $currentDate = date('Y-m-d');
        // Extracting total leads
        $qry = "SELECT * FROM leads WHERE lead_date='$currentDate' AND admin_id_FK='$id'";
        $res = mysqli_query($conn,$qry);
        $total_leads = mysqli_num_rows($res);

        $query = "SELECT * FROM leads_count 
        WHERE leads_count_date='$currentDate' AND admin_id_FK='$id'";
        $result = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
        if($rows>0)
        {
            $query = "UPDATE leads_count SET total_leads='$total_leads' 
            WHERE leads_count_date='$currentDate' AND admin_id_FK='$id'"; 
            $exec = mysqli_query($conn,$query);
        }
        else
        {
            $query = "INSERT INTO leads_count (name,admin_id_FK,employee_id_FK,total_leads) 
            VALUES ('$name','$id','$employee_id','$total_leads')";
            $exec = mysqli_query($conn,$query);
        }
        echo "Your lead has been added";
    }
    else
    {
        echo "Your lead has not been added";
    }
}
?>