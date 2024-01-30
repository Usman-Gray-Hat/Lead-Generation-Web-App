<?php
include("../../dbConnect.php");
if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['username']) && isset($_POST['type']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $type = $_POST['type'];

    $query = "UPDATE admins SET name='$name', username='$username',
    email='$email', role='$role', type='$type' WHERE id='$id'";
    $exec = mysqli_query($conn,$query);
    if($exec==true)
    {
        echo "User has been updated";
    }
    else
    {
        echo "User has not been updated";
    }
}
?>