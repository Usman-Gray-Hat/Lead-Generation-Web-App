<?php
include("../../dbConnect.php");
if(isset($_POST['employee_edit_id']) && isset($_POST['employee_edit_id'])!=="")
{
    $id = $_POST['employee_edit_id'];
    $query = "SELECT * FROM employees WHERE id='$id'";
    $result = mysqli_query($conn,$query);
    $response = array();
    $rows = mysqli_num_rows($result);
    if($rows>0)
    {
        while($data = mysqli_fetch_assoc($result))
        {
            $response = $data;
        }
        echo json_encode($response);
    }
}
?>