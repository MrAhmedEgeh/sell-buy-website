<?php


$errors = [];
$data = [];

/*--------  email -------------------**/
if(empty($_POST['emails'])){
    $errors['emails'] = 'email is required.';
}
if(checkDB("theuser", "email", $_POST['emails'])){
    $errors['emails'] = 'email is already exist.';
}
/*--------USERNAME-------------------**/
if (empty($_POST['usernames'])) {
    $errors['usernames'] = 'Username is required.';
}
if(checkDB("theuser", "username", $_POST['usernames'])){
    $errors['usernames'] = 'Username already exist.';
}
/*--------Password-------------------**/
if (empty($_POST['passwords'])) {
    $errors['passwords'] = 'Password is required.';
}


if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';

    include 'signUpClass.php';
    include '../dbConnect.php';


    $user = new User($_POST['usernames'], $_POST['passwords'], $_POST['emails']);
    $user->insertToDB($user->get_id(), $user->get_username(), $user->get_password(), $user->get_email());

}



function checkDB($table,$param,$name){
    include '../dbConnect.php';
    $query = "SELECT * FROM $table WHERE $param = '$name'";
    $result = mysqli_query($conn, $query);
    $rowcount=mysqli_num_rows($result);
    if($rowcount > 0){
        return true;
    }else{
        return false;
    }
}

echo json_encode($data);
