<?php
include("../../dbConnect.php");
if(isset($_POST['id']) && isset($_POST['quality_of_lead']))
{
    $id = $_POST['id'];
    $quality_of_lead = $_POST['quality_of_lead'];
    $query = "UPDATE leads SET quality_of_lead='$quality_of_lead' WHERE id='$id'";
    $exec = mysqli_query($conn,$query);
    if($exec==true)
    {
        echo "The lead has been added to $quality_of_lead";
    }
    else
    {
        echo "The lead has not been to $quality_of_lead";
    }
}
?>