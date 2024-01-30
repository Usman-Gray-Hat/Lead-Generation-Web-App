<?php
include("../../dbConnect.php");
if(isset($_POST['full_name']) && isset($_POST['full_name'])!=="")
{
    $full_name = $_POST['full_name'];
    $father_name = $_POST['father_name'];
    $cell_no = $_POST['cell_no'];
    $email = $_POST['email'];
    $cnic_no = $_POST['cnic_no'];
    $address = $_POST['address'];
    $doj = $_POST['doj'];
    $added_by = $_SESSION['name'];
    $admin_id = $_SESSION['id'];

    $query = "INSERT INTO employees (full_name, father_name, cell_no, email, cnic_no, address,
    date_of_joining, added_by, admin_id_FK) VALUES
    ('$full_name','$father_name','$cell_no','$email','$cnic_no','$address','$doj','$added_by','$admin_id')";
    $exec = mysqli_query($conn,$query);
    if($exec===true)
    {
        echo "Employee has been added";
    }
    else
    {
        echo "Employee has not been added";
    }
}
?>