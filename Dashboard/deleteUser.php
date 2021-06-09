<?php



if(isset($_POST['user_ids'])){
    include '../dbConnect.php';
    $id = $_POST['user_ids'];
    $deleteMember = "Delete from members where User_id = $id";
    $result = mysqli_query($conn, $deleteMember);
    
    $deleteTheuser = "Delete from theuser where userid = $id";
    $result = mysqli_query($conn, $deleteTheuser);
}
?>