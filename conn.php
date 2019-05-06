<?php
$conn = mysqli_connect("localhost","root","","crystal");
date_default_timezone_set("Asia/Kathmandu");
if(!$conn)
{
    echo "Error";
} 

function manipulate($time)
{
    $current = time();
    $time = strtotime($time);
if(($current -$time) < 60)
{
    return floor(($current-$time)).  " secs ago";
}
if(($current-$time) > (60))
{
return floor((($current-$time)/60)). " mins ago ";
}

if(($current-$time) > (60*60))
{
return floor((($current-$time)/(60*60))). " hours ago ";
}


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

