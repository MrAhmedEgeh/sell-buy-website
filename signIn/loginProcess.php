<?php
session_start();
$errors = [];
$datas = [];





/*-------USERNAME----------------*/
if (empty($_POST['user'])) {
    $errors['username'] = 'Username is required.';
}
/*-----------password-------*/
if (empty($_POST['pass'])) {
    $errors['password'] = 'Password is required.';
}

if(!checkDB($_POST['user'],$_POST['pass'])){  // if user is not in database give error
    $errors['red'] = 'Your user name or password is incorrect<br>'
    . 'Or Your user name is not valid';
    
}



function checkDB($name, $pass){
    include '../dbConnect.php';
    // check if user can login by either username or email
    $query = "SELECT * FROM theuser WHERE user_password = '$pass' AND username = '$name' OR email = '$name'  ";
    $result = mysqli_query($conn, $query);
    $rowcount=mysqli_num_rows($result);
    
    //get company id from members
    $checkRollquery = "SELECT * FROM members m, theuser u, companies c WHERE u.userid = m.User_id AND u.username='$name' AND c.company_id = m.Company_Id";
    $checkresult = mysqli_query($conn, $checkRollquery);
    $checkrowcount=mysqli_num_rows($checkresult);

    if($rowcount > 0) // login by username or email
    {
        if($checkrowcount > 0) // company_id in members
        {   
            $_SESSION['login_admin'] = $name;
            while ($rows = $checkresult->fetch_assoc()) 
            {
                $_SESSION['CompanyName']= $rows['company_name']; // for displaying
                $_SESSION['company'] = $rows['Company_Id'];   // for everything
                $_SESSION['userid'] = $rows['User_id'];       // for everything
                $_SESSION['role'] = $rows['Roll_id']; 
            }    
        }
        else
        {
            while($rows = $result->fetch_assoc()){
                $_SESSION['userid'] = $rows['userid'];
            }
            $_SESSION['login_user'] = $name;
        }
        return true;
    }
    else
    {
        return false;
    }
}

            



if (!empty($errors)) {
    $datas['success'] = false;
    $datas['errors'] = $errors;
} else {
    $datas['success'] = true;
    $datas['message'] = 'Success!';
}

echo json_encode($datas);



/*
function checkDB($name, $pass){
    include '../dbConnect.php';
    // check if user can login by either username or email
    $query = "SELECT * FROM theuser WHERE user_password = '$pass' AND username = '$name' OR email = '$name'  ";
    $result = mysqli_query($conn, $query);
    $rowcount=mysqli_num_rows($result);
    
    //get company id from members
    $checkRollquery = "SELECT * FROM members m, theuser u, companies c WHERE u.userid = m.User_id AND u.username='$name' AND c.company_id = m.Company_Id";
    $checkresult = mysqli_query($conn, $checkRollquery);
    $checkrowcount=mysqli_num_rows($checkresult);

    if($rowcount > 0) // login by username or email
    {
        if($checkrowcount > 0) // company_id in members
        {   
            $_SESSION['login_admin'] = $name;
            while ($rows = $checkresult->fetch_assoc()) 
            {
                $_SESSION['CompanyName']= $rows['company_name'];
                $_SESSION['company'] = $rows['Company_Id'];
                $_SESSION['userid'] = $rows['User_id'];
            }    
        }
        else
        {
            $_SESSION['login_user'] = $name;
        }
        return true;
    }
    else
    {
        return false;
    }
}*/