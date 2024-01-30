<?php
include("../../dbConnect.php");
if(isset($_POST['employee_edit_id']) && isset($_POST['full_name']) && isset($_POST['doj']))
{
    $id = $_POST['employee_edit_id'];
    $full_name = $_POST['full_name'];
    $father_name = $_POST['father_name'];
    $cell_no = $_POST['cell_no'];
    $email = $_POST['email'];
    $cnic_no = $_POST['cnic_no'];
    $address = $_POST['address'];
    $doj = $_POST['doj'];
    $first_sale = $_POST['first_sale'];
    $status = $_POST['status'];
    $query = "UPDATE employees SET full_name='$full_name',father_name='$father_name',cell_no='$cell_no',
    email='$email',cnic_no='$cnic_no',address='$address',date_of_joining='$doj',first_sale='$first_sale',status='$status' WHERE id='$id'";
    $exec = mysqli_query($conn,$query);
    if($exec==true)
    {
        echo "Employee record has been updated";
    }
    else
    {
        echo "Employee record has not been updated";
    }
}
?>