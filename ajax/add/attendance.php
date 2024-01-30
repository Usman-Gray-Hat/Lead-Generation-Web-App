<?php
include("../../dbConnect.php");
if(isset($_POST['employee_id']) && isset($_POST['employee_name']))
{
    $employee_id = $_POST['employee_id'];
    $employee_name = $_POST['employee_name'];
    $reason = $_POST['reason'];
    $date_of_absence = $_POST['date_of_absence'];
    $marked_by = $_SESSION['name'];

    $query = "SELECT * FROM attendance WHERE employee_id_FK='$employee_id' AND employee_name='$employee_name'
    AND date_created='$date_of_absence'";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    if($rows>0)
    {
        // Extracting name of the admin who already marked this employee as absent for this date.
        $data = mysqli_fetch_assoc($result);
        $name = $data['marked_by'];
        $formattedDate = date('F-d-Y',strtotime($date_of_absence));
        echo "$name has already marked $employee_name as absent for $formattedDate";
    }
    else
    {
        $admin_id = $_SESSION['id'];
        $query = "INSERT INTO attendance (employee_id_FK,employee_name,reason,marked_by,date_created,admin_id_FK) VALUES
        ('$employee_id','$employee_name','$reason','$marked_by','$date_of_absence','$admin_id')";
        $exec = mysqli_query($conn,$query);
        if($exec==true)
        {
            echo "Absent has been marked";
        }
        else
        {
            echo "Absent has not been marked";
        }
    }
}
?>