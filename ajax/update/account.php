<?php
include("../../dbConnect.php");
if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['gmail']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];

    $gmail = $_POST['gmail'];
    $gmail_password = $_POST['gmail_password'];

    $twitter = $_POST['twitter'];
    $twitter_password = $_POST['twitter_password'];

    $instagram = $_POST['instagram'];
    $instagram_password = $_POST['instagram_password'];

    $discord = $_POST['discord'];
    $discord_password = $_POST['discord_password'];

    $twitch = $_POST['twitch'];
    $twitch_password = $_POST['twitch_password'];

    $query = "UPDATE account_credentials SET name='$name', gmail='$gmail', gmail_password='$gmail_password',
    twitter='$twitter', twitter_password='$twitter_password',
    instagram='$instagram', instagram_password='$instagram_password',
    discord='$discord', discord_password='$discord_password',
    twitch='$twitch', twitch_password='$twitch_password' WHERE id='$id'";
    $exec = mysqli_query($conn,$query);
    if($exec==true)
    {
        echo "Account has been updated";
    }
    else
    {
        echo "Account has not been updated";
    }
}
?>