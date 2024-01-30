<?php
include("../../dbConnect.php");
if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['type']))
{
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = MD5($_POST['password']);
    $role = $_POST['role'];
    $type = $_POST['type'];

    $query = "SELECT * FROM admins WHERE username='$username'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);
    if($row>0)
    {
        echo "This username has already taken. Please try different username";
    }
    else
    {
        $query = "SELECT * FROM admins WHERE email='$email'";
        $result = mysqli_query($conn,$query);
        $row2 = mysqli_num_rows($result);
        if($row2>0)
        {
            echo "This email has already taken by another user. Please try different email";
        }
        else
        {
            $query = "INSERT INTO admins (name, username, email ,password, role ,type) VALUES
            ('$name','$username','$email','$password','$role','$type')";
            $exec = mysqli_query($conn,$query);
            if($exec===true)
            {
                echo "User has been added";
            }
            else
            {
                echo "User has not been added";
            }
        }
    }
}
?>