<?php
include("../../dbConnect.php");
if(isset($_POST['id']) && isset($_POST['account_name']) && isset($_POST['platform_name']) && isset($_POST['client_username']))
{
    $id = $_POST['id']; // Primary Key Of Lead Table

    $admin_id_FK = $_POST['admin_id']; // This will goes into target table
    $employee_id_FK = $_POST['employee_id']; // This will goes into target table
    $employee_name = $_POST['employee_name']; // This will goes into target table

    $account_name = $_POST['account_name'];
    $platform_name = $_POST['platform_name'];
    $client_username = $_POST['client_username'];
    $channel_link = $_POST['channel_link'];
    $comments = $_POST['comments'];
    $status = $_POST['status'];
    $follow_up_date_with_remarks = $_POST['follow_up_date_with_remarks'];
    $reason_of_rejection = $_POST['reason_of_rejection'];
    $items = $_POST['items'];
    $amount = $_POST['amount'];
    $query = "UPDATE leads SET account_name='$account_name', platform_name='$platform_name', client_username='$client_username',
    channel_link='$channel_link', comments='$comments', status='$status', follow_up_date_with_remarks='$follow_up_date_with_remarks',
    reason_of_rejection='$reason_of_rejection', items='$items', amount='$amount' WHERE id='$id'";
    $exec = mysqli_query($conn,$query);
    if($exec==true)
    {
        if($status==="Closed" && $amount!=="" && $amount!==null && $amount!="undefined" && $amount!=0 && $items!=="" && $items!==null && $items!=="-")
        {
            $query = "SELECT * FROM targets WHERE lead_id_FK='$id'";
            $result = mysqli_query($conn,$query);
            $row = mysqli_num_rows($result);
            if($row>0)
            {
                echo "Lead has been updated";
            }
            else
            {
                $query = "INSERT INTO targets (employee_name,account_name, platform_name, client_username,
                channel_link, items, amount, admin_id_FK, employee_id_FK, lead_id_FK)
                VALUES ('$employee_name','$account_name','$platform_name','$client_username',
                '$channel_link','$items','$amount','$admin_id_FK','$employee_id_FK','$id')";
                $exec = mysqli_query($conn,$query);
                if($exec==true)
                {
                    $query2 = "UPDATE leads SET quality_of_lead='Qualified' WHERE id='$id'";
                    $exec2 = mysqli_query($conn,$query2);
                    if($exec2==true)
                    {
                        echo "Deal closed";
                    }
                }                
            }
        }
        else
        {
            $query = "DELETE FROM targets WHERE lead_id_FK='$id'";
            $exec = mysqli_query($conn,$query);

            $query2 = "UPDATE leads SET amount=0,items='-',quality_of_lead='Pending' WHERE id='$id'";
            $exec2 = mysqli_query($conn,$query2);
            echo "Lead has been updated";
        }
    }
    else
    {
        echo "Lead has not been updated";
    }
}
?>