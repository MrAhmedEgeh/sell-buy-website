<?php


if(isset($_POST['rejected'])){
    include '../dbConnect.php';
    $id = $_POST['rejected'];
    $query = "Delete from notification where user_id = $id";
    $delMember = mysqli_query($conn, $query);
}