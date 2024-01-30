<?php
include("../../dbConnect.php");
if(isset($_POST['accountName']) && isset($_POST['gmail']) && isset($_POST['gmailPassword']))
{
    $accountName = $_POST['accountName'];

    $gmail = $_POST['gmail'];
    $gmailPassword = $_POST['gmailPassword'];

    $twitter = $_POST['twitter'];
    $twitterPassword = $_POST['twitterPassword'];

    $instagram = $_POST['instagram'];
    $instagramPassword = $_POST['instagramPassword'];

    $discord = $_POST['discord'];
    $discordPassword = $_POST['discordPassword'];

    $twitch = $_POST['twitch'];
    $twitchPassword = $_POST['twitchPassword'];

    $query = "INSERT INTO account_credentials (name,gmail,gmail_password,twitter,twitter_password,instagram,instagram_password,
    discord,discord_password,twitch,twitch_password) VALUES
    ('$accountName','$gmail','$gmailPassword','$twitter','$twitterPassword','$instagram','$instagramPassword',
    '$discord','$discordPassword','$twitch','$twitchPassword')";
    $exec = mysqli_query($conn,$query);
    if($exec===true)
    {
        echo "Account has been added successfully";
    }
    else
    {
        echo "Account has not been added";
    }
}
?>