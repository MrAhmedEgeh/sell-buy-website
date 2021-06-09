<?php

function returnUser(){
    include '../dbConnect.php';
    $id = $_POST['edit_id'];
    $getUser = "Select u.userid,u.username, u.user_password, u.email, m.Roll_id from theuser u, members m where u.userid = $id and m.User_id = $id";
    $result = mysqli_query($conn, $getUser);
    $arr = [];
    while ($row = $result->fetch_assoc()) {
        array_push($arr, $row);
    }
    echo json_encode($arr);
}
/*
$getUser = "Select u.userid,u.username, u.user_password, u.email, m.Roll_id from theuser u, members m where u.userid = 17342123 and m.User_id = $id";
*/

returnUser();