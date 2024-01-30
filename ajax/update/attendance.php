<?php
include("../../dbConnect.php");
if(isset($_POST['id']) && isset($_POST['reason']) && isset($_POST['date_of_absence']))
{
    $id = $_POST['id']; // Atendance hidden id (Unique)
    $reason = $_POST['reason'];
    $date_of_absence = $_POST['date_of_absence'];

    $query = "UPDATE attendance SET reason='$reason', date_created='$date_of_absence' WHERE id='$id'";
    $exec = mysqli_query($conn,$query);
    if($exec==true)
    {
        echo "Record has been updated";
    }
    else
    {
        echo "Record has not been updated";
    }
}
?>