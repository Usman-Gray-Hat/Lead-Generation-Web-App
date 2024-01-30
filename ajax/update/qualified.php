<?php
include("../../dbConnect.php");
if(isset($_POST['id']) && isset($_POST['quality']))
{
    $id = $_POST['id'];
    $quality = $_POST['quality'];
    $query = "SELECT * FROM leads WHERE quality_of_lead='$quality' AND id='$id'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);
    if($row>0)
    {
        $query = "UPDATE leads SET quality_of_lead='Pending' WHERE id='$id'";
        $exec = mysqli_query($conn,$query);
        if($exec==true)
        {
            echo "Reverted";
        }
    }
    else
    {
        $query = "UPDATE leads SET quality_of_lead='$quality' WHERE id='$id'";
        $exec = mysqli_query($conn,$query);
        if($exec==true)
        {
            echo "The lead has been added to $quality";
        }
        else
        {
            echo "The lead has not been to $quality";
        }
    }
}
?>