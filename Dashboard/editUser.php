<?php
    include '../dbConnect.php';




$id = $_POST['ids'];
$username = $_POST['usernames'];
$password = $_POST['passwords'];
$roll = $_POST['roll'];
$email = $_POST['emails'];


$firstQuery = "UPDATE members SET Roll_id = $roll WHERE 'User_id' = $id";
$result = mysqli_query($conn, $firstQuery);

$secondQuery = "UPDATE theuser SET username = '$username', user_password = '$password', email = '$email' WHERE `userid` = $id";
$result2 = mysqli_query($conn, $secondQuery);