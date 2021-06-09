<?php


$errors = [];
$data = [];

/*---------- Company -------------------**/
if(empty($_POST['companyName'])){
    $errors['companyName'] = 'Company Name is Required.';
}
if(checkDB("companies", "company_name", $_POST['companyName'])){
    $errors['companyName'] = 'Company is already exist. Sign Up as a user and apply for it';
}
/*--------  email -------------------**/
if(empty($_POST['email'])){
    $errors['email'] = 'email is required.';
}
if(checkDB("theuser", "email", $_POST['email'])){
    $errors['email'] = 'email is already exist.';
}
/*--------USERNAME-------------------**/
if (empty($_POST['username'])) {
    $errors['username'] = 'Username is required.';
}
if(checkDB("theuser", "username", $_POST['username'])){
    $errors['username'] = 'Username already exist.';
}
/*--------Password-------------------**/
if (empty($_POST['password'])) {
    $errors['password'] = 'Password is required.';
}


if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';

    include 'signUpClass.php';
    include '../dbConnect.php';

   
    $user = new User($_POST['username'], $_POST['password'], $_POST['email']);
    $user->insertToDB($user->get_id(), $user->get_username(), $user->get_password(), $user->get_email());

    $company = new company($_POST['companyName']);
    $company->insertToDB($company->get_compId(), $company->get_compName());

    $member = new members($user->get_id(), $company->get_compId(), '1');
    $member->insertToDB($member->get_userId(), $member->get_company_id(), $member->get_roll_id());

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
