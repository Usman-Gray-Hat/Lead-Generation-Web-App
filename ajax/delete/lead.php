<?php
include("../../dbConnect.php");
if(isset($_POST['id']) && isset($_POST['id'])!=="")
{
    $id = $_POST['id'];
    $query = "DELETE FROM leads WHERE id='$id'";
    $exec = mysqli_query($conn,$query);
    if($exec==true)
    {
        echo "Lead has been deleted";
    }
    else
    {
        echo "Lead has not been deleted";
    }
}
?>